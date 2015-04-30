      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" style=" text-transform: uppercase;" href="#"><i class='fa fa-user'></i> SELAMAT DATANG  &nbsp;
			@if(Session::has("username"))
		      {{Session::get("username")}}
			@endif
            </a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav" id="left-menu" >
		   <li><a href="{{URL::to('/panel')}}/kategori"><i class="fa fa-arrow-right"></i>&nbsp;Tags</a></li>	
		   <li class="dropdown user-dropdown">
		      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-arrow-right"></i> Tips  <b class="caret"></b></a>
              <ul class="dropdown-menu">
				<li ><a href="{{URL::to('/panel')}}/tips"><i class="fa fa-arrow-right"></i>&nbsp; List Tips</a></li>
				<li ><a href="{{URL::to('/panel')}}/tips/create"><i class="fa fa-arrow-right"></i>&nbsp; Tambah Tips</a></li>
              </ul>
			  </li>
             <li class="dropdown user-dropdown">
		      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-arrow-right"></i> Batik  <b class="caret"></b></a>
              <ul class="dropdown-menu">
				<li ><a href="{{URL::to('/panel')}}/batik"><i class="fa fa-arrow-right"></i>&nbsp; List Batik</a></li>
				<li ><a href="{{URL::to('/panel')}}/batik/create"><i class="fa fa-arrow-right"></i>&nbsp; Tambah Batik</a></li>
              </ul>
			  </li>		
             <li class="dropdown user-dropdown">
		      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-arrow-right"></i> Laundry Guide  <b class="caret"></b></a>
              <ul class="dropdown-menu">
				<li ><a href="{{URL::to('/panel')}}/laundryguide"><i class="fa fa-arrow-right"></i>&nbsp; List Guide</a></li>
				<li ><a href="{{URL::to('/panel')}}/laundryguide/create"><i class="fa fa-arrow-right"></i>&nbsp; Tambah Guide</a></li>
              </ul>
			  </li>	
             <li class="dropdown user-dropdown">
		      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-arrow-right"></i> Promo & Event  <b class="caret"></b></a>
              <ul class="dropdown-menu">
				<li ><a href="{{URL::to('/panel')}}/promoevent"><i class="fa fa-arrow-right"></i>&nbsp; List Promo & Event</a></li>
				<li ><a href="{{URL::to('/panel')}}/promoevent/create"><i class="fa fa-arrow-right"></i>&nbsp; Tambah Promo & Event</a></li>
              </ul>
			  </li>				  
		  </ul>
		  
          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="divider"></li>
                <li><a href="{{URL::to('/users/logout')}}"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
         
        </div><!-- /.navbar-collapse -->
      </nav>