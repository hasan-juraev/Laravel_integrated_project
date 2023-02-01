   <!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="{{ asset('logo/logo.jpg') }}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="{{ asset('logo/logo.jpg') }}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>

                <!-- Advertisements -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Advertisements</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa  fa-bar-chart-o"></i><a href="">All Advertisement</a></li>        
                        <li><i class="fa  fa-bar-chart-o"></i><a href="">Add Advertisement</a></li>  
                    </ul>
                </li>

                <!-- Announcements -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Announcements</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-bullhorn"></i><a href="{{ route('all.announcement') }}">All Announcement</a></li>
                        <li><i class="fa fa-bullhorn"></i><a href="{{ route('add.announcement') }}">Add Announcement</a></li>
                    </ul>
                </li>

                <!-- Blogs -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-circle"></i>Blogs</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-circle"></i><a href="{{ route('all.blog')}}">All Blogs</a></li>
                        <li><i class="menu-icon fa fa-circle"></i><a href="{{ route('add.blog')}}">Add Blogs</a></li>
                    </ul>
                </li>              
                
                <!-- Blogs Category -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-circle-o"></i>Blog Categories</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-circle-o"></i><a href="{{ route('all.blog.category')}}">All Blog Category</a></li>
                        <li><i class="menu-icon fa fa-circle-o"></i><a href="{{ route('add.blog.category')}}">Add Blog Category</a></li>
                    </ul>
                </li>              

                <!-- Cargo -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-truck"></i>Cargos</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-truck"></i><a href="{{ route('all.cargo') }}">All Cargo</a></li>
                        <li><i class="menu-icon fa fa-truck"></i><a href="{{ route('add.cargo') }}">Add Cargo</a></li>
                       
                    </ul>
                </li>

                <!-- Useful links -->
                <li>
                    <a href="widgets.html"> <i class="menu-icon ti-email"></i>Useful links </a>
                </li>

                <!-- Education -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Education</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-book"></i><a href="{{ route('all.education')}}">All Education</a></li>
                        <li><i class="menu-icon fa fa-book"></i><a href="{{ route('add.education')}}">Add Education</a></li>
                       
                    </ul>
                </li>

                <!-- Entertainment -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-asterisk"></i>Entertainments</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-asterisk"></i><a href="{{ route('all.entertainment')}}">All Entertainment</a></li>
                        <li><i class="menu-icon fa  fa-asterisk"></i><a href="{{ route('add.entertainment')}}">Add Entertainment</a></li>                       
                    </ul>
                </li>
                
                <!-- Housing -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-home"></i>Housing</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-home"></i><a href="charts-chartjs.html">All Housing</a></li>
                        <li><i class="menu-icon fa fa-home"></i><a href="charts-flot.html">Add Housing</a></li>                       
                    </ul>
                </li>

                <!-- Mosque -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-location-arrow"></i>Mosques</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-location-arrow"></i><a href="maps-gmap.html">All Mosques</a></li>
                        <li><i class="menu-icon fa fa-location-arrow"></i><a href="maps-vector.html">Add Mosques</a></li>
                    </ul>
                </li>

                <!-- Restaurant -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cutlery"></i>Restaurants</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-cutlery"></i><a href="maps-gmap.html">All Restaurant</a></li>
                        <li><i class="menu-icon fa fa-cutlery"></i><a href="maps-vector.html">Add Restaurant</a></li>
                    </ul>
                </li>
                
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

    <!-- Left Panel -->