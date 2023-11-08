<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PdfReport;

use App\Models\User;

class PDFController extends Controller
{
    public function __contruct()
    {
        $this->middleware("guest");
    }

    public function index()
    {
 	
    }

	public function displayReport(Request $request)
	{
		   $this->validate($request, [
				'from_date'=>'required',
			'to_date'=>'required',
			'sort_by'=>'required',
				]
			);

			$fromDate = $request['from_date'];
			$toDate = $request['to_date'];
			$sortby = $request['sort_by'];

		$pagehead ='The Twelve Apostles Church of Heaven and Earth In All Nations (NPC)';
		$title = 'Registered User Report'; // Report title

	   $subtitle ='Protea Glean Users'; //sub title

		$meta = [ // For displaying filters description on header
			 'Registered on' =>$fromDate . ' To ' . $toDate,
			'Sort By' => $sortby
		];

		$queryBuilder = User::select(['id', 'name', 'created_at']) // Do some querying..
							->whereBetween('created_at', [$fromDate, $toDate])
				->orderBy($sortby);

		$columns = [ // Set Column to be displayed
			'ID' => 'id',
			'Name' => 'name',
			'Created At',
		];

		// Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).
		return PdfReport::of($pagehead, $title,$subtitle, $meta, $queryBuilder, $columns)
						->editColumn('Created At', [ // Change column class or manipulate its data for displaying to report
							'displayAs' => function($result) {
								return $result->created_at->format('d M Y');
							},
							'class' => 'left'
				])
						->stream(); // other available method: download() to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
	 }
		
}