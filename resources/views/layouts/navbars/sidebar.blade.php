<div class="sidebar" data-color="blue" data-background-color="black" data-image="{{ asset('material/img/cover.jpg') }}">

  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->

  <div class="logo">
 
   <a href="{{ url('home') }}" class="nav-link simple-text logo-normal">
 {{ __('') }}
 
  </a>
 
 </div>
 

 
 <div class="sidebar-wrapper">
 @if(Auth::user()->isAdmin())
    <ul class="nav">
 
		<li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">

			<a class="nav-link" href="{{ url('dashboard') }}">
			
			<i style="width:25px" class="fa fa-dashboard" aria-hidden="true"></i>
			
			   <p>{{ __('Dashboard') }}</p>
	  
		  </a>
	 
		</li>
  
		<li class="nav-item {{ ($activePage == 'profiles' || $activePage == 'user-management') ? ' active' : '' }}">
	  
		  <a class="nav-link" data-toggle="collapse" href="#users-control" aria-expanded="true">
	  
			<i style="width:25px" class="fa fa-user" aria-hidden="true"></i>
	  
			 <p>{{ __('App User') }}
	 
			   <b class="caret"></b>
			</p>
		  </a>
	 
		   <div class="collapse " id="users-control">
	 
			 <ul class="nav">
	   
			 <li class="nav-item{{ $activePage == 'profiles' ? ' active' : '' }}">
	 
				 <a class="nav-link" href="{{ url('profiles') }}">
	 
				   <span class="sidebar-mini"> UP </span>
	 
				   <span class="sidebar-normal">{{ __('User profile') }} </span>
	 
				 </a>
	  
			  </li>
	  
			  <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
	 
				 <a class="nav-link" href="{{ url('users') }}">
	   
				 <span class="sidebar-mini"> UM </span>
	 
				   <span class="sidebar-normal">{{ __('User Management') }} </span>
	  
				</a>
	 
			   </li>
					   
			 </ul>
	 
		   </div>
	 
		 </li>
 
		<li class="nav-item{{ $activePage == 'appDefaults' ? ' active' : '' }}">
	  
			<a class="nav-link" href="{{ url('appDefaults') }}">
		  
				<i style="width:25px" class="fa fa-star" aria-hidden="true"></i>
			
				<p>{{ __('App Defaults') }}</p>
	  
			</a>
	  
		</li>
		<li class="nav-item{{ $activePage == 'services' ? ' active' : '' }}">
	 
		   <a class="nav-link" href="{{ url('services') }}">
		   
			<i style="width:25px" class="fa fa-gears" aria-hidden="true"></i>
			
			 <p>{{ __('Services') }}</p> 
		   </a>
	 
		</li>
  
		<li class="nav-item {{ ($activePage == 'projectTypes' || $activePage == 'projects' || $activePage == 'tasks') ? ' active' : '' }}">
	  
		  <a class="nav-link" data-toggle="collapse" href="#portfolio-control" aria-expanded="true">
	  
			<i style="width:25px" class="fa fa-bar-chart" aria-hidden="true"></i>
	  
			 <p>{{ __('Portfolio') }}
	 
			   <b class="caret"></b>
			</p>
		  </a>
	 
		   <div class="collapse " id="portfolio-control">
	 
			 <ul class="nav">
			 
			 <li class="nav-item{{ $activePage == 'projectTypes' ? ' active' : '' }}">
	 
				 <a class="nav-link" href="{{ url('projectTypes') }}">
	 
				   <span class="sidebar-mini"> PT </span>
	 
				   <span class="sidebar-normal">{{ __('Project Types') }} </span>
	 
				 </a>
	  
			  </li>		   
			 <li class="nav-item{{ $activePage == 'projects' ? ' active' : '' }}">
	 
				 <a class="nav-link" href="{{ url('projects') }}">
	 
				   <span class="sidebar-mini"> PJ </span>
	 
				   <span class="sidebar-normal">{{ __('Projects') }} </span>
	 
				 </a>
	  
			  </li>	  
			  <li class="nav-item{{ $activePage == 'tasks' ? ' active' : '' }}">
	 
				 <a class="nav-link" href="{{ url('tasks') }}">
	   
				 <span class="sidebar-mini"> TK </span>
	 
				   <span class="sidebar-normal">{{ __('Tasks') }} </span>
	  
				</a>
	 
			   </li>
					   
			 </ul>
	 
		   </div>
	 
		 </li>
 		<li class="nav-item {{ $activePage == 'clients' ? ' active' : '' }}">
	  
		    <a class="nav-link" href="{{ url('clients') }}">
		  
				<i style="width:25px" class="fa fa-phone" aria-hidden="true"></i>
				
				<p>{{ __('Clients') }}</p>
			
		     </a>
	  
		</li>
   
		<li class="nav-item{{ $activePage == 'messages' ? ' active' : '' }}">
	 
		    <a class="nav-link" href="{{ url('messages') }}">
		   
				<i style="width:25px" class="fa fa-envelope" aria-hidden="true"></i>
				
				 <p>{{ __('Messages') }}</p> 
		    </a>
	 
		 </li>

		<li class="nav-item {{ $activePage == 'galleryImages' ? ' active' : '' }}">
	  
		    <a class="nav-link" href="{{ url('galleryImages') }}">
		  
				<i style="width:25px" class="fa fa-picture-o" aria-hidden="true"></i>
				
				<p>{{ __('Images Gallery') }}</p>
			
		     </a>
	  
		</li>
	 
        <li class="nav-item{{ $activePage == 'mailSubscriptions' ? ' active' : '' }}">
 
		   <a class="nav-link" href="{{ url('mailSubscriptions') }}">
		   
				<i style="width:25px" class="fa fa-envelope-open" aria-hidden="true"></i>
				
				 <p>{{ __('Mail Subscriptions') }}</p> 
		   </a>
 
        </li> 
	 
	    <li class="nav-item{{ $activePage == 'newsletters' ? ' active' : '' }}">
 
		    <a class="nav-link" href="{{ url('newsletters') }}">
		   
				<i style="width:25px" class="fa fa-newspaper-o" aria-hidden="true"></i>
				
				 <p>{{ __('Newsletters') }}</p> 
		    </a>
 
        </li>
 
		 <li class="nav-item  {{ ($activePage == 'banners' || $activePage == 'features' || $activePage == 'supports' || $activePage == 'plans' || $activePage == 'testimonials') ? ' active' : '' }}">
	  
			<a class="nav-link" data-toggle="collapse" href="#MoreOptions" aria-expanded="true">
		  
				<i style="width:25px" class="fa fa-briefcase" aria-hidden="true"></i>
		  
				 <p>{{ __('More') }}
		 
				   <b class="caret"></b>
				</p>
			</a>
	 
		   <div class="collapse " id="MoreOptions">
	 
			 <ul class="nav">
			 
			 <li class="nav-item{{ $activePage == 'banners' ? ' active' : '' }}">
	 
				 <a class="nav-link" href="{{ url('banners') }}">
	 
				   <span class="sidebar-mini fa fa-money"></span>
	 
				   <span class="sidebar-normal">{{ __('Banners') }} </span>
	 
				 </a>
	  
			  </li>
	  
				<li class="nav-item{{ $activePage == 'features' ? ' active' : '' }}">
		 
					 <a class="nav-link" href="{{ url('features') }}">
		   
					 <span class="sidebar-mini fa fa-comment "></span>
		 
					   <span class="sidebar-normal">{{ __('Features') }} </span>
		  
					</a>
		 
				</li>		   
			 <li class="nav-item{{ $activePage == 'plans' ? ' active' : '' }}">
	 
				 <a class="nav-link" href="{{ url('plans') }}">
	 
				   <span class="sidebar-mini fa fa-money"></span>
	 
				   <span class="sidebar-normal">{{ __('Plans & Pricing') }} </span>
	 
				 </a>
	  
			  </li>
	  
				<li class="nav-item{{ $activePage == 'testimonials' ? ' active' : '' }}">
		 
					 <a class="nav-link" href="{{ url('testimonials') }}">
		   
					 <span class="sidebar-mini fa fa-comment "></span>
		 
					   <span class="sidebar-normal">{{ __('Testimonials') }} </span>
		  
					</a>
		 
				</li>
			
				<li class="nav-item{{ $activePage == 'supports' ? ' active' : '' }}">
		 
					 <a class="nav-link" href="{{ url('supports') }}">
		   
					 <span class="sidebar-mini fa fa-comment "></span>
		 
					   <span class="sidebar-normal">{{ __('Supports') }} </span>
		  
					</a>
		 
				</li>				
			</ul>
	 
		   </div>
	 
		 </li>
  
    </ul>	 
@else

    <ul class="nav">
 
		<li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">

			<a class="nav-link" href="{{ url('dashboard') }}">
			
			<i style="width:25px" class="fa fa-dashboard" aria-hidden="true"></i>
			
			   <p>{{ __('Dashboard') }}</p>
	  
		  </a>
	 
		</li>
  
		<li class="nav-item {{ ($activePage == 'profiles' || $activePage == 'user-management') ? ' active' : '' }}">
	  
		  <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
	  
			<i style="width:25px" class="fa fa-user" aria-hidden="true"></i>
	  
			 <p>{{ __('App User') }}
	 
			   <b class="caret"></b>
			</p>
		  </a>
	 
		   <div class="collapse " id="laravelExample">
	 
			 <ul class="nav">
	   
			 <li class="nav-item{{ $activePage == 'profiles' ? ' active' : '' }}">
	 
				 <a class="nav-link" href="{{ url('profiles') }}">
	 
				   <span class="sidebar-mini"> UP </span>
	 
				   <span class="sidebar-normal">{{ __('User profile') }} </span>
	 
				 </a>
	  
			  </li>
	  				   
			 </ul>
	 
		   </div>
	 
		 </li>
  
		<li class="nav-item {{ ($activePage == 'projects' || $activePage == 'tasks') ? ' active' : '' }}">
	  
		  <a class="nav-link" data-toggle="collapse" href="#portfolio-control" aria-expanded="true">
	  
			<i style="width:25px" class="fa fa-bar-chart" aria-hidden="true"></i>
	  
			 <p>{{ __('Portfolio') }}
	 
			   <b class="caret"></b>
			</p>
		  </a>
	 
		   <div class="collapse " id="portfolio-control">
	 
			 <ul class="nav">
			 	   
			 <li class="nav-item{{ $activePage == 'projects' ? ' active' : '' }}">
	 
				 <a class="nav-link" href="{{ url('projects') }}">
	 
				   <span class="sidebar-mini"> PJ </span>
	 
				   <span class="sidebar-normal">{{ __('Projects') }} </span>
	 
				 </a>
	  
			  </li>	  
			  <li class="nav-item{{ $activePage == 'tasks' ? ' active' : '' }}">
	 
				 <a class="nav-link" href="{{ url('tasks') }}">
	   
				 <span class="sidebar-mini"> TK </span>
	 
				   <span class="sidebar-normal">{{ __('Tasks') }} </span>
	  
				</a>
	 
			   </li>
					   
			 </ul>
	 
		   </div>
	 
		 </li>

   
		<li class="nav-item{{ $activePage == 'messages' ? ' active' : '' }}">
	 
		    <a class="nav-link" href="{{ url('messages') }}">
		   
				<i style="width:25px" class="fa fa-envelope" aria-hidden="true"></i>
				
				 <p>{{ __('Messages') }}</p> 
		    </a>
	 
		 </li>
	 
        <li class="nav-item{{ $activePage == 'mailSubscriptions' ? ' active' : '' }}">
 
		   <a class="nav-link" href="{{ url('mailSubscriptions') }}">
		   
				<i style="width:25px" class="fa fa-male" aria-hidden="true"></i>
				
				 <p>{{ __('Mail Subscriptions') }}</p> 
		   </a>
 
        </li> 
	 
	    <li class="nav-item{{ $activePage == 'newsletters' ? ' active' : '' }}">
 
		    <a class="nav-link" href="{{ url('newsletters') }}">
		   
				<i style="width:25px" class="fa fa-newspaper-o" aria-hidden="true"></i>
				
				 <p>{{ __('Newsletters') }}</p> 
		    </a>
 
        </li>
  
		<li class="nav-item {{ $activePage == 'clients' ? ' active' : '' }}">
	  
		    <a class="nav-link" href="{{ url('clients') }}">
		  
				<i style="width:25px" class="fa fa-phone" aria-hidden="true"></i>
				
				<p>{{ __('Clients') }}</p> 
			
		     </a>
	  
		</li>
	
		 <li class="nav-item active-pro {{ ($activePage == 'plans' || $activePage == 'testimonials') ? ' active' : '' }}">
	  
			<a class="nav-link" data-toggle="collapse" href="#MoreOptions" aria-expanded="true">
		  
				<i style="width:25px" class="fa fa-briefcase" aria-hidden="true"></i>
		  
				 <p>{{ __('More') }}
		 
				   <b class="caret"></b>
				</p>
			</a>
	 
		   <div class="collapse " id="MoreOptions">
	 
			 <ul class="nav">
	   
			 <li class="nav-item{{ $activePage == 'plans' ? ' active' : '' }}">
	 
				 <a class="nav-link" href="{{ url('plans') }}">
	 
				   <span class="sidebar-mini fa fa-money"></span>
	 
				   <span class="sidebar-normal">{{ __('Plans & Pricing') }} </span>
	 
				 </a>
	  
			  </li>
	  
				<li class="nav-item{{ $activePage == 'testimonials' ? ' active' : '' }}">  
		 
					 <a class="nav-link" href="{{ url('testimonials') }}">
		   
					 <span class="sidebar-mini fa fa-comment "></span>
		 
					   <span class="sidebar-normal">{{ __('Testimonials') }} </span>
		  
					</a>
		 
				</li>
					   
			</ul>
	 
		   </div>
	 
		 </li>
 
    </ul>
  @endif
 </div>

</div>