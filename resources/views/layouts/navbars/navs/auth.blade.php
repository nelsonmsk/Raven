<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="#">{{$titlePage}} </a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
    <span class="sr-only">Toggle navigation</span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <form class="navbar-form searchForm" method="GET" action="{{$activePage}}">
        <div class="input-group no-border">
        <input type="text" id="search_text" name="search_text"  class="form-control" placeholder="Search...">
        <button type="submit" id="search-btn" name="Search" class="btn btn-white btn-round btn-just-icon">
          <i class="material-icons fa fa-search"></i>
          <div class="ripple-container"></div>
        </button>
        </div>
      </form>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">notifications</i>
            <span class="notification"></span>
            <p class="d-lg-none d-md-block">
              {{ __('Some Actions') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">	
            <a class="dropdown-item not1" href="{{ url('notifications/1') }}"></a>
            <a class="dropdown-item not2" href="{{ url('notifications/2') }}"></a>
            <a class="dropdown-item not3" href="{{ url('notifications/3') }}"></a>
            <a class="dropdown-item not4" href="{{ url('notifications/4') }}"></a>			
          </div>
        </li>
	@if(Auth::user()->isAdmin())		
        <li class="nav-item dropdown">
          <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">Reports</i>
            <p class="d-lg-none d-md-block">
              {{ __('Reports') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ url('subsReports') }}"><i class="fa fa-envelope-open text-default"></i> {{ __('Subscriptions') }}</a>
            <a class="dropdown-item" href="{{ url('clientsReports') }}"><i class="fa fa-phone text-default"></i> {{ __('Clients') }}</a>
            <a class="dropdown-item" href="{{ url('projectsReports') }}"><i class="fa fa-bar-chart text-default"></i> {{ __('Projects') }}</a>
            <a class="dropdown-item" href="{{ url('messagesReports') }}"><i class="fa fa-envelope text-default"></i> {{ __('Messages') }}</a>
            <a class="dropdown-item" href="{{ url('usersReports') }}"><i class="fa fa-user text-default"></i> {{ __('Users') }}</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">{{auth()->user()->name}}</i>
            <p class="d-lg-none d-md-block">
              {{ __('Account') }}
            </p>
          </a>
		  
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
            <a class="dropdown-item" href="{{ url('profiles') }}"><i class="fa fa-user text-default"></i> {{ __('Profile') }}</a>
            <a class="dropdown-item" href="{{ url('appDefaults') }}"><i class="fa fa-gears text-default"></i> {{ __('Settings') }}</a>
            <div class="dropdown-divider"></div>		   
			<a class="dropdown-item" href="{{ url('emails') }}"><i class="fa fa-envelope text-default"></i>  {{ __('Emails') }}</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ url('logout') }}" id="logout-link" ><i class="fa fa-power-off text-default"></i> {{ __('Log out') }}</a>
          </div>
        </li>
	@else
        <li class="nav-item dropdown">
          <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">Reports</i>
            <p class="d-lg-none d-md-block">
              {{ __('Reports') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ url('subsReports') }}">{{ __('Subscriptions') }}</a>
            <a class="dropdown-item" href="{{ url('clientsReports') }}">{{ __('Clients') }}</a>
            <a class="dropdown-item" href="{{ url('projectsReports') }}">{{ __('Projects') }}</a>
            <a class="dropdown-item" href="{{ url('messagesReports') }}">{{ __('Messages') }}</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">{{auth()->user()->name}}</i>
            <p class="d-lg-none d-md-block">
              {{ __('Account') }}
            </p>
          </a>
		  
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
            <a class="dropdown-item" href="{{ url('profiles') }}">{{ __('Profile') }}</a>
            <div class="dropdown-divider"></div>		   
			<a class="dropdown-item" href="{{ url('emails') }}"> {{ __('Emails') }}</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ url('logout') }}" id="logout-link" >{{ __('Log out') }}</a>
          </div>
        </li>		
	
	@endif
      </ul>
    </div>
  </div>
</nav>
