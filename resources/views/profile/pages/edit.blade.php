@extends('profile.Index')

@section('body')
	<div class="col-lg-9">
		<div class="card ">
			<div class="card-header header-danger">
				<h2> <span class="card-title">{{ __('Edit Profile') }}</span>
				<a href="{{config('app.url')}}/profiles" class="btn btn-secondary pull-right">View </a></h2>	
			</div>
			<div class="card-body ">
				<form method="post" action="profiles" id="profiles-form2" autocomplete="off" class="form-horizontal singleForm"  data-parsley-validate>
					<div class="form-group">
						<input type="hidden" value="{{csrf_token()}}" name="_token" id="_token"/>
						 <input type="hidden" id="id" value="{{$profile->id}}" name="id" />			   
						 <input type="hidden" id="username" value="{{$profile->username}}" name="username" />
						 <input type="hidden" id="user_id" value="{{$profile->user_id}}" name="user_id" />									
					  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
					  <div class="col-sm-6">
						  <input class="form-control" name="name" id="name" type="text"  value="{{ $profile->name }}" required />
					  </div>
					</div>
					<div class="form-group">
					  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
					  <div class="col-sm-6">
						  <input class="form-control" name="email" id="email" type="email" value="{{ $profile->email }}" required />
					</div>
				  </div>
				  <div class="form-group">
					  <label class="col-sm-2 col-form-label">{{ __('Phone') }}</label>
					  <div class="col-sm-6">
						  <input class="form-control" name="phone" id="phone" type="tel" value="{{$profile->phone}}" required />
					</div>
				  </div>		  
				  <div class="form-group">
					  <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
					  <div class="col-sm-6">
						  <input class="form-control" name="title" id="title" type="text" value="{{ $profile->title}}" required />
					</div>
				  </div>		  
				<div class="form-group">
					  <label class="col-sm-2 col-form-label">{{ __('Bio') }}</label>
					  <div class="col-sm-6">
						  <textarea id="bio" name="bio" class="form-control">{{$profile->bio}} </textarea>
					</div>
				  </div>		  
				  <div class="form-group">
					  <label class="col-sm-2 col-form-label">{{ __('Address') }}</label>
					  <div class="col-sm-6">
						  <textarea id="address" name="address" class="form-control">{{$profile->address}} </textarea>
					</div>
				  </div>
				  <div class="form-group">
					  <label class="col-sm-2 control-label">{{ __('Facebook') }}</label>
					  <div class="col-sm-10">
						  <input class="form-control" name="facebook" id="facebook" type="url" value="{{ $profile->facebook}}"  />
					</div>
				  </div>
				  <div class="form-group">
					  <label class="col-sm-2 control-label">{{ __('Twitter') }}</label>
					  <div class="col-sm-10">
						  <input class="form-control" name="twitter" id="twitter" type="url" value="{{ $profile->twitter}}"  />
					</div>
				  </div>
				  <div class="form-group">
					  <label class="col-sm-2 control-label">{{ __('Instagram') }}</label>
					  <div class="col-sm-10">
						  <input class="form-control" name="instagram" id="instagram" type="url" value="{{ $profile->instagram}}" />
					</div>
				  </div>
				  <div class="form-group">
					  <label class="col-sm-2 control-label">{{ __('LinkedIn') }}</label>
					  <div class="col-sm-10">
						  <input class="form-control" name="linkedin" id="linkedin" type="url" value="{{ $profile->linkedin}}" />
					</div>
				  </div>				  		  
				  <div class="card-footer ml-auto mr-auto">
					  <button type="submit" class="btn btn-primary btn-lg col-sm-5" id="save-btn" name="Update">Update <div class="fa fa-save text-white"></button>
					  <a href="{{url()->previous()}}" class="btn btn-danger btn-lg col-sm-5 col-sm-offset-1" id="cancel" name="cancel">Cancel <div class="fa fa-close text-white"></div></a>			
				  </div>
				</form>
		    </div>
		</div>
  </div>
  
@endsection