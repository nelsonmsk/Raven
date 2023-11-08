
 
@section('contentsView')
	<div class="col-md-9 maincard">
		<div class="menu-card ">
		  <div class="menu-card-header header-success">
			<h3> <span class="card-title menu-name">Coffee</span>
			</h3>			
		  </div>
		<div class =" table-responsive" id = "Rtable">
          <table class="table table-condensed table-bordered  table-striped" >  
		  <tbody>
		  @foreach($rtemplate['coffees'] as $co)
            <tr class="popviews">
				<td>
					<div class="card-avatar">
					  <a href="javascript:void(0)">
						  <img class=" menu-icon-cover" src="{{url('/img/f2.jpg')}}" align="left" />
					  </a>
					</div>

                   <h5 class="card-title"><b>{{$co->id}}.</b>{{$co->name}}</h5>
					<h6 class="card-description">
					   {{$co->description}}
				    </h6>


					<a href="javascript:void(0)"  class="btn btn-danger btn-round">${{$co->price}}</a>
				</td>
            </tr>
			@endforeach
           </tbody>
	      </table>
        </div> 
	</div>
</div>		
@endsection


