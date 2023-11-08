@extends('users.Index')

@section('body')
<div class="col-md-12">
	<div class="card">
		<div class="card-header header-danger">
			<h2><span class="card-category">{{ __('Edit User') }} </span>
			<a href="{{config('app.url')}}/users" class="btn btn-secondary pull-right">View All</a></h2>
		</div>
	
	
		<div class="card-body ">
		  <form method="post" action="users" class="form-horizontal singleForm"  id="user-form" data-parsley-validate>				
				<div class="form-group" >
					<input type="hidden" value="{{csrf_token()}}" name="_token" />
					<input type="hidden" id="id" value="{{$user->id}}" name="id" />			
				  <label class="col-sm-2 control-label">{{ __('Name') }}</label>
					<div class="col-sm-10">
					  <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name',$user->name) }}" required="true" aria-required="true"/>
					</div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">{{ __('Email') }}</label>
				  <div class="col-sm-10">
					  <input class="form-control" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email',$user->email) }}" required />
				  </div>
				</div>	
				<div class="form-group">
				  <label class="col-sm-2 control-label">{{ __('Type') }}</label>
				  <div class="col-sm-10">
					  <select class="form-control" name="type"  id="type" required >
					@if($user->type == "admin")
							<option value="ALL"> ALL  </option>					  
							<option value="admin" selected> admin  </option>
							<option value="it-support "> it-support</option>
							<option value="sales-support"> sales-support  </option>
							<option value="billing-support "> billing-support</option>							
					  @elseif ($user->type == "it_support")
							<option value="ALL"> ALL  </option>					  
							<option value="admin" > admin  </option>
							<option value="it_support" selected> it-support</option>
							<option value="sales_support"> sales-support  </option>
							<option value="billing_support "> billing-support</option>
					  @elseif ($user->type == "sales_support")
							<option value="ALL"> ALL  </option>					  
							<option value="admin"> admin  </option>
							<option value="it_support"> it-support</option>
							<option value="sales_support" selected> sales-support  </option>
							<option value="billing_support "> billing-support</option>
					  @elseif ($user->type == "billing_support")
							<option value="ALL"> ALL  </option>					  
							<option value="admin"> admin  </option>
							<option value="it_support "> it-support</option>
							<option value="sales_support"> sales-support  </option>
							<option value="billing_support" selected> billing-support</option>							
					  @else 
							<option value="ALL" selected> ALL  </option>					  
							<option value="admin" > admin  </option>
							<option value="it_support"> it-support</option>
							<option value="sales_support"> sales-support  </option>
							<option value="billing_support "> billing-support</option>								
					  @endif						
					  </select> 
				  </div>
				</div>					
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="input-password">{{ __(' Password') }}</label>
				  <div class="col-sm-10">
					  <input class="form-control" input type="password" name="password" id="input-password" placeholder="{{ __('Password') }}" value="" required />
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
				  <div class="col-sm-10">
					  <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm Password') }}" value="" required />
				  </div>
				</div>
				<div id="b-element" class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-primary btn-lg col-sm-5" id="save-btn" name="Update">Update <div class="fa fa-save text-white"></div></button>
				  <a href="{{url()->previous()}}" class="btn btn-danger btn-lg col-sm-5 col-sm-offset-1" id="cancel" name="cancel">Cancel <div class="fa fa-close text-white"></div></a>
				</div>
				</div>	
			</form>
		</div>	
	</div>
</div>
@endsection