@extends('profiles.Index')

@section('body')
<div class="row">
	<div class="col-md-8">
		<div class="card ">
			<div class="card-header header-danger">
				<h2> <span class="card-title">{{ __('Add Profile') }}</span>
				<a href="{{config('app.url')}}/profiles" class="btn btn-secondary pull-right">View All</a></h2>			
			</div>
			<div class="card-body ">
				<form method="post" action="profiles"  id="profiles-form1" autocomplete="off" class="form-horizontal fileupload" enctype="multipart/form-data" data-parsley-validate>
					<div class="form-group">
						<input type="hidden" value="{{csrf_token()}}" name="_token" id="_token" />	
					  <label class="col-sm-2 control-label">{{ __('Name') }}</label>
					  <div class="col-sm-10">
							<input id="name" type="text"  class="form-control" name="name" required />
					  </div>
					</div>
					<div class="form-group">
					  <label class="col-sm-2 control-label">{{ __('Email') }}</label>
					  <div class="col-sm-10">
						  <input class="form-control" name="email" id="email" type="email"  required />
					</div>
				  </div>
				  <div class="form-group">
					  <label class="col-sm-2 control-label">{{ __('Phone') }}</label>
					  <div class="col-sm-10">
						  <input class="form-control" name="phone" id="phone" type="text"  required />
					</div>
				  </div>		  
				  <div class="form-group">
					  <label class="col-sm-2 control-label">{{ __('Title') }}</label>
					  <div class="col-sm-10">
						  <input class="form-control" name="title" id="title" type="text" required />
					</div>
				  </div>		  
				<div class="form-group">
					  <label class="col-sm-2 control-label">{{ __('Bio') }}</label>
					  <div class="col-sm-10">
						  <textarea id="bio" name="bio" class="form-control"> </textarea>
					</div>
				  </div>		  
				  <div class="form-group">
					  <label class="col-sm-2 control-label">{{ __('Address') }}</label>
					  <div class="col-sm-10">
						  <textarea id="address" name="address" class="form-control"></textarea>
					</div>
				  </div>
				  <div class="form-group">
				  <label for="image" class="col-sm-2 control-label">Image:</label>
					<div class="col-sm-10">
						<div class="dropzone" id="my-dropzone" name="my-dropzone">
							<div class="dz-default dz-message">
								<h3 class="sbold">Drop files here to upload </br>or</h3>
								<h4 class="text-danger">You can also click to open file browser</h4>
							</div>		
							<div class="fallback"><!-- this is the fallback if JS isn't working -->
								<input id="file" class="form-control" name="file" type="file" />
							</div>
						</div>	
					</div>
				  </div>		  
				  <div class="card-footer ml-auto mr-auto">
					  <button type="submit" class="btn btn-success btn-lg col-sm-5" id="submit" name="save">Save</button>
					  <a href="{{url()->previous()}}" class="btn btn-primary btn-lg col-sm-5 col-sm-offset-1" id="cancel" name="cancel">Cancel</a>			
				  </div>
				</form>
			</div>		  
		</div>
  </div>
  
  <div class="col-md-4">
	  <div class="card card-profile">
		  <div class="card-body">
		  	<div class="card-avatar">
			  <a href="javascript:void(0)">
				  <img class="img-round" src="{{url('/img/avatar4.jpg')}}" />
			  </a>
		  </div>
			  <h6 class="card-category text-gray">CEO / Co-Founder</h6>
			  <h4 class="card-title">Nelson Maseko</h4>
			  <p class="card-description">
				  Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owensâ€™ bed design but the back is...
			  </p>
			  <a href="javascript:void(0)" class="btn btn-danger btn-round">Follow</a>
		  </div>
	  </div>
  </div>
</div>
@endsection