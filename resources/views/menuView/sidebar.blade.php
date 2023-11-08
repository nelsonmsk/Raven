
<div class=" menu-sidebar" data-color="blue" data-background-color="black" data-image="{{ asset('material/img/sidebar-1.jpg') }}">

  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->

  <div class="logo">
 
   <a href="{{ url('page-home') }}" class="nav-link simple-text logo-normal">
 {{ __('Hi Guest') }}
 
  </a>
 
 </div>
 
 <div class="menu-sidebar-wrapper">
 
   <ul class="nav">
 
    <li class="nav-item ">
  
      <a class="nav-link" data-toggle="collapse" href="#contentMenus" aria-expanded="true">

		<i style="width:25px" class="glyphicon glyphicon-cutlery" aria-hidden="true"></i>
         <p>{{ __('Menus') }}
 
           <b class="caret"></b>
		</p>
		
      </a>
	    <div class="collapse " id="contentMenus"> 
				 
			<ul class="nav">
				   
				 <li class="nav-item">
		 
					 <a class="nav-link view-link" href="menuView/coffee">
		 
					   <span class="sidebar-mini"> Co </span>
		 
					   {{ __('Coffee') }} 
		 
					 </a>
		  
				  </li>
		  
				  <li class="nav-item">
		 
					 <a class="nav-link view-link" href="menuView/breakfast">
		   
					 <span class="sidebar-mini"> BF </span>
		 
					   {{ __('Breakfast') }} 
		  
					</a>
		 
				   </li>
				   
				  <li class="nav-item">
		 
					 <a class="nav-link view-link" href="menuView/starters">
		 
					   <span class="sidebar-mini"> SA </span>
		 
					  {{ __('Starters') }} 
		 
					 </a>
		  
				  </li>
		  
				  <li class="nav-item">
		 
					 <a class="nav-link view-link" href="menuView/mains">
		   
					 <span class="sidebar-mini"> MA </span>
		 
					   {{ __('Mains') }} 
		  
					</a>
		 
				   </li>
				   
				 <li class="nav-item">
		 
					 <a class="nav-link view-link" href="menuView/wines">
		 
					   <span class="sidebar-mini"> WI </span>
		 
					   {{ __('Wines') }} 
		 
					 </a>
		  
				  </li>
		  
				  <li class="nav-item">
		 
					 <a class="nav-link  view-link" href="menuView/desserts">
		   
					 <span class="sidebar-mini"> DS </span>
		 
					   {{ __('Desserts') }} 
		  
					</a>
		 
				   </li>		   
			 </ul>
				 
		</div>
					  	
	   
    </li>
  
  </ul>
 
 </div>

</div>
