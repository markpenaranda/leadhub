<div class="navbar navbar-static-top navbar-inverse">
	<div class="navbar-inner">
		<div class="container">
			<!-- Be sure to leave the brand out there if you want it shown -->
			<a class="brand" href="/admin/dashboard">PinoyrealTV</a>

			<div class="nav-collapse collapse">
				<!-- .nav, .navbar-search, .navbar-form, etc -->
				<ul class="nav">
					<li class="<?php echo Request::is('admin/shows') ? 'active' : '' ;?>"><a href="/admin/shows">Shows</a></li>
					<li class="<?php echo Request::is('admin/featured') ? 'active' : '' ;?>"><a href="/admin/featured">Featured</a></li>
					<li class="<?php echo Request::is('admin/upcoming') ? 'active' : '' ;?>"><a href="/admin/upcoming">Upcoming</a></li>
					<li class="<?php echo Request::is('admin/playlist') ? 'active' : '' ;?>"><a href="/admin/playlist">Playlist</a></li>
					<li class="<?php echo Request::is('admin/categories') ? 'active' : '' ;?>"><a href="/admin/categories">Categories</a></li>
					<li class="<?php echo Request::is('admin/tags') ? 'active' : '' ;?>"><a href="/admin/tags">Tags</a></li>
					<li class="<?php echo Request::is('admin/hashes') ? 'active' : '' ;?>"><a href="/admin/hashes">Twitter Hashes</a></li>
					
					<li class="<?php echo Request::is('admin/analytics') ? 'active' : '';?> dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Analytics <b class="caret">&nbsp;</b></a>
						<ul class="dropdown-menu">
							<li><a href="/admin/analytics/">General Analytics</a></li>
							<li><a href="/admin/analytics/shows">Per Show</a></li>
						</ul>
					</li>
					<li class="<?php echo Request::is('admin/users') ? 'active' : '';?> dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <b class="caret">&nbsp;</b></a>
						<ul class="dropdown-menu">
							<li><a href="/admin/users/create">Create New</a></li>
							<li><a href="/admin/users/">Show All</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav pull-right">
					<li class="divider-vertical"></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo isset($_SESSION['admin']) ? $_SESSION['admin']['username'] : ''; ?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/user/preferences"><i class="icon-cog"></i> Preferences</a></li>
							<li><a href="/help/support"><i class="icon-envelope"></i> Contact Support</a></li>
							<li class="divider"></li>
							<li><a href="/admin/logout"><i class="icon-off"></i> Logout</a></li>
                        			</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>