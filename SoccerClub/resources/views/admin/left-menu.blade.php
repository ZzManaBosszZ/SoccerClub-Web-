<div class="navbar nav_title" style="border: 0;">
    <a  href="{{route('admin.dashboard')}}" class="site_title"><i class="fa fa-futbol-o" aria-hidden="true"></i></i> <span>Soccer Club</span></a>
</div>

<div class="clearfix"></div>

<!-- menu profile quick info -->
<div class="profile clearfix">
    <div class="profile_pic">
        <img src="{{asset('admin_images/no-avatar.png')}}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>Welcome,</span>
        <h2><?=$user->name?></h2>
    </div>
</div>
<!-- /menu profile quick info -->

<br />

<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Menu <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('listing.index',['model'=>'Player'])}}">Players</a></li>
                    <li><a href="{{route('listing.index',['model'=>'Coach'])}}">Coachs</a></li>
                    <li><a href="{{route('listing.index',['model'=>'Product'])}}">Products</a></li>
                    <li><a href="{{route('listing.index',['model'=>'Order'])}}">Orders</a></li>
                    <li><a href="{{route('listing.index',['model'=>'Admin'])}}">Admins</a></li>
                    <li><a href="{{route('listing.index',['model'=>'Users'])}}">Users</a></li>
                    <li><a href="{{route('listing.index',['model'=>'Feedback'])}}">Feedbacks</a></li>
                    <li><a href="{{route('listing.index',['model'=>'ProductReview'])}}">Product Review</a></li>

                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{route('admin.logout')}}">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>
<!-- /menu footer buttons -->
