@extends('app defaults.Index')

@section('body')
<div class ="col-lg-12 col-md-12 ">
    <div class="card">	 
		<div class="card-header header-dark">
			<h2><span class="card-category">{{ __('Defaults') }} </span> 
			<a href="{{config('app.url')}}/appDefaults/create" class="btn btn-secondary pull-right">Create New</a></h2>
		</div>

		<div class="card-body">
			<div class =" table-responsive" id = "Rtable">
				<table class="table table-condensed table-striped" >
					<thead>
						<tr class="tr-danger">
						  <th>Id</th>			
						  <th>CompanyName</th>
						  <th>AppTitle</th>  
						  <th>BrandHeading</th>						  
						  <th>Phone</th>
						  <th>Email</th>		  
						  <th>Actions</th>
						</tr>
					</thead>
					<tbody>

				@if($appDefaults)
						@foreach($appDefaults as $sd)
						<tr>
							<td>{{$sd->id}}</td>
							<td>{{$sd->companyName}}</td>
							<td>{{$sd->appTitle}}</td>
							<td>{{$sd->brandHeading}}</td>																
							<td>{{$sd->phone}}</td>
							<td>{{$sd->email}}</td>				

							<td>
								<a href="appDefaults/{{$sd->id}}"  id="show-btn" class="btn btn-primary ">Show <div class="fa fa-eye text-white"></div></a>
							</td>
						</tr>
						@endforeach
				@else
				<tr>
				<td colspan="10"><p class="errortext">No record present</p></td>
				</tr>

				@endif

					</tbody>
			<tfoot>
				<tr>
					<td colspan="3" class="footnotes"></td>
					<td colspan="4" class="footnotes">{{ $appDefaults->links() }}</td>
					<td colspan="3" class="footnotes"><span>Current Page:{{ $appDefaults->currentPage()}}</span></td>
				</tr>
			</tfoot>
				</table>
			</div>   
		</div>
	</div>
</div>
@endsection