@extends('profiles.Index')

@section('body')

	<div class="col-md-9">
		<div class="card ">
			<div class="card-header header-danger">
				<h2> <span class="card-title">{{ __('Add Profile') }}</span>
				<a href="{{config('app.url')}}/profiles" class="btn btn-secondary pull-right">View All</a></h2>			
			</div>
			<div class="card-body ">
				<form method="post" action="profiles"  id="profiles-form1" autocomplete="off" class="form-horizontal singleForm"  data-parsley-validate>
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
						  <input class="form-control" name="phone" id="phone" type="tel"  required />
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
					  <label class="col-sm-2 control-label">{{ __('Facebook') }}</label>
					  <div class="col-sm-10">
						  <input class="form-control" name="facebook" id="facebook" type="url" required />
					</div>
				  </div>
				  <div class="form-group">
					  <label class="col-sm-2 control-label">{{ __('Twitter') }}</label>
					  <div class="col-sm-10">
						  <input class="form-control" name="twitter" id="twitter" type="url" required />
					</div>
				  </div>
				  <div class="form-group">
					  <label class="col-sm-2 control-label">{{ __('Instagram') }}</label>
					  <div class="col-sm-10">
						  <input class="form-control" name="instagram" id="instagram" type="url" required />
					</div>
				  </div>
				  <div class="form-group">
					  <label class="col-sm-2 control-label">{{ __('LinkedIn') }}</label>
					  <div class="col-sm-10">
						  <input class="form-control" name="linkedin" id="linkedin" type="url" required />
					</div>
				  </div>
				  <div class="form-group">
					  <label class="col-sm-2 control-label">{{ __('User Id') }}</label>
					  <div class="col-sm-10">
						  <input class="form-control" name="user_id" id="user_id" type="text" required />
					</div>
				  </div>				  
				  <div class="card-footer ml-auto mr-auto">
					  <button type="submit" class="btn btn-success btn-lg col-sm-5" id="save-btn" name="Save">Save <div class="fa fa-save text-white"></div></button>
					  <a href="{{url()->previous()}}" class="btn btn-danger btn-lg col-sm-5 col-sm-offset-1" id="cancel" name="cancel">Cancel <div class="fa fa-close text-white"></div></a>			
				  </div>
				</form>
			</div>		  
		</div>
  </div>

@endsection