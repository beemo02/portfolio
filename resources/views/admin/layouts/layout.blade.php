<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

	<title>@yield('admin_title')</title>

	<link href="{{asset('admin-asset/css/app.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
					<span class="align-middle">AdminKit</span>
				</a>
				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Main
					</li>
					<li class="sidebar-item {{request()->routeIs('admin')?'active': ''}}">
						<a class="sidebar-link" href="{{route('admin')}}">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
						</a>
			        <li class="sidebar-header">Category</li>
		            <li class="sidebar-item  {{request()->routeIs('category.create')?'active': ''}}">
						<a class="sidebar-link" href="{{route('category.create')}}">
                            <i class="align-middle" data-feather="plus"></i> <span class="align-middle">Create</span>
                        </a>
					</li>

					<li class="sidebar-item {{request()->routeIs('category.manage')?'active': ''}}">
						<a class="sidebar-link" href="{{route('category.manage')}}">
                            <i class="align-middle" data-feather="list"></i> <span class="align-middle">Manage</span>
                        </a>
			        <li class="sidebar-header"> Sub Category</li>

					<li class="sidebar-item {{request()->routeIs('subcategory.create')?'active': ''}}">
						<a class="sidebar-link" href="{{route('subcategory.create')}}">
                            <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Create</span>
                        </a>
					</li>

					<li class="sidebar-item {{request()->routeIs('subcategory.manage')?'active': ''}}">
						<a class="sidebar-link" href="{{route('subcategory.manage')}}">
                            <i class="align-middle" data-feather="book"></i> <span class="align-middle">Manage</span>
                        </a>
					<li class="sidebar-header">Discount</li>

					<li class="sidebar-item {{request()->routeIs('discount.create')?'active': ''}}">
						<a class="sidebar-link" href="{{route('discount.create')}}">
                            <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Create</span>
                        </a>
					</li>

					<li class="sidebar-item {{request()->routeIs('discount.manage')?'active': ''}}">
						<a class="sidebar-link" href="{{route('discount.manage')}}">
                            <i class="align-middle" data-feather="book"></i> <span class="align-middle">Manage</span>
                        </a>
            
					</li>

					<li class="sidebar-header">Payment</li>

					<li class="sidebar-item {{request()->routeIs('payment.create')?'active': ''}}">
						<a class="sidebar-link" href="{{route('payment.create')}}">
                            <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Create</span>
                        </a>
					</li>

					<li class="sidebar-item  {{request()->routeIs('payment.manage')?'active': ''}}">
						<a class="sidebar-link" href="{{route('payment.manage')}}">
                            <i class="align-middle" data-feather="book"></i> <span class="align-middle">Manage</span>
                        </a>
            
					</li>

					<li class="sidebar-header">ProductAttribute</li>

					<li class="sidebar-item {{request()->routeIs('product-attribute.create')?'active': ''}}">
						<a class="sidebar-link" href="{{route('product-attribute.create')}}">
                            <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Create</span>
                        </a>
					</li>

					<li class="sidebar-item  {{request()->routeIs('product-attribute.manage')?'active': ''}}">
						<a class="sidebar-link" href="{{route('product-attribute.manage')}}">
                            <i class="align-middle" data-feather="book"></i> <span class="align-middle">Manage</span>
                        </a>
            
					</li>

					<li class="sidebar-header">Product</li>

					<li class="sidebar-item {{request()->routeIs('admin.products.manage')?'active': ''}}">
						<a class="sidebar-link" href="{{route('admin.products.manage')}}">
                            <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Manage</span>
                        </a>
					</li>

					<li class="sidebar-item  {{request()->routeIs('product.review.manage')?'active': ''}}">
						<a class="sidebar-link" href="{{route('product.review.manage')}}">
                            <i class="align-middle" data-feather="book"></i> <span class="align-middle">Manage Review</span>
                        </a>
            
					</li>

					<li class="sidebar-item {{ request()->routeIs('admin.products.create') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('admin.products.create') }}">
							<i class="align-middle" data-feather="book"></i> 
							<span class="align-middle">Create Product</span>
						</a>
					</li>
					
					

					<li class="sidebar-header">
						History
					</li>

					<li class="sidebar-item {{request()->routeIs('cart.history')?'active': ''}}">
						<a class="sidebar-link" href="{{route('cart.history')}}">
							<i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Cart</span>
						</a>
					</li>

					<li class="sidebar-item {{request()->routeIs('order.history')?'active': ''}}">
						<a class="sidebar-link" href="{{route('order.history')}}">
							<i class="align-middle" data-feather="map"></i> <span class="align-middle">Order</span>
						</a>
					</li>
					<li class="sidebar-item {{request()->routeIs('settings')?'active': ''}}">
						<a class="sidebar-link" href="{{route('settings')}}">
							<i class="align-middle" data-feather="map"></i> <span class="align-middle">Settings</span>
						</a>
					</li>
				</ul>

				
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.8</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Christina accepted your request.</div>
												<div class="text-muted small mt-1">14h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1"/> <span class="text-dark">{{auth()->user()->name}}</span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<form id= "logout-form" action="{{route('logout')}}" method="POST">@csrf</form>
								<a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					

					@yield('admin_layout')

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit</strong></a> - <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Bootstrap Admin Template</strong></a>								&copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="{{asset('public/admin-asset/js/app.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>