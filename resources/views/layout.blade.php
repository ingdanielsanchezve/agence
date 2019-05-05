<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Title -->
		<title>Consultores Agence</title>

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/themify-icons/themify-icons.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/animate.css/animate.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/jscrollpane/jquery.jscrollpane.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/waves/waves.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/chartist/chartist.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/switchery/dist/switchery.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/morris/morris.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/jvectormap/jquery-jvectormap-2.0.3.css') }}">

		<!-- Neptune CSS -->
		<link rel="stylesheet" href="{{ asset('css/core.css') }}">

		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="large-sidebar fixed-sidebar fixed-header content-appear">
		<div class="wrapper">

			<!-- Sidebar -->
			<div class="site-sidebar-overlay"></div>
			<div class="site-sidebar">
				<a class="logo" href="index.html">
					<span class="l-text">Agence</span>
					<span class="l-icon"></span>
				</a>
				<div class="custom-scroll custom-scroll-light">
					<ul class="sidebar-menu">
						<li>
							<a href="calendar.html" class="waves-effect  waves-light">
								<span class="s-icon"><i class="ti-id-badge"></i></span>
								<span class="s-text">Receitas</span>
							</a>
						</li>						
					</ul>
				</div>
			</div>			

			<!-- Header -->
			<div class="site-header">
				<nav class="navbar navbar-light">
					<ul class="nav navbar-nav">
						<li class="nav-item m-r-1 hidden-lg-up">
							<a class="nav-link collapse-button" href="#">
								<i class="ti-menu"></i>
							</a>
						</li>
					</ul>
					<ul class="nav navbar-nav pull-xs-right">

						<li class="nav-item dropdown">
							<a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">
								<div class="avatar box-32">
									<img src="img/avatars/daniel.jpeg" alt="">
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-right animated flipInY">
								<a class="dropdown-item" href="#">
									Daniel Sánchez
								</a>
								<a class="dropdown-item" href="#">
									Computer Engineer
								</a>
								<a class="dropdown-item" href="#">
									Senior Fullstack PHP Developer
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="https://www.linkedin.com/in/ingdanielsanchezvzla/" target="_blank">
									<i class="ti-linkedin m-r-0-5"></i> Contact
								</a>
							</div>
						</li>
						
					</ul>

				</nav>
			</div>

			<div class="site-content">
				<!-- Content -->
				<div class="content-area p-y-1">
					<div class="container-fluid">
						<div class="box box-block bg-white b-t-0 m-b-2">
							
							<div class="text-muted m-b-1">Seleccione el período a Consultar</div>
							<div class="form-group row">
								<label for="from-date" class="col-xs-1 col-form-label">Desde</label>
								<div class="col-xs-3">
									<input class="form-control" type="month" value="2017-01" id="from-date">
								</div>
								<label for="to-date" class="col-xs-1 col-form-label">Hasta</label>
								<div class="col-xs-3">
									<input class="form-control" type="month" value="2017-12" id="to-date">
								</div>
							</div>	
							<div class="row m-b-1">
								<div class="col-md-4">
									<div class="card">
										<div class="card-header text-uppercase"><b>Listado de Consultores</b></div>
										<div class="items-list">
											<div class="il-item">
												<a class="text-black" href="#">
													<div class="media">
														<div class="media-body">
															<h6 class="media-heading">John Doe</h6>
														</div>
													</div>
													<div class="il-icon"><i class="fa fa-angle-right"></i></div>
												</a>
											</div>
										</div>
										<div class="card-block">
											<button type="submit" class="btn btn-success btn-block">Seleccionar Todos</button>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card">
										<div class="card-header text-uppercase"><b>Consultores Seleccionados</b></div>
										<div class="items-list">
											<div class="il-item-left">
												<a class="text-black" href="#">
													<div class="il-icon-left"><i class="fa fa-angle-left"></i></div>
													<div class="media">
														<div class="media-body">
															<h6 class="media-heading">John Doe</h6>
														</div>
													</div>
												</a>
											</div>
										</div>
										<div class="card-block">
											<button type="submit" class="btn btn-danger btn-block">Limpiar Todos</button>
										</div>
									</div>
								</div>
								<div class="col-md-3 col-md-offset-1 m-b-2 m-md-b-0">


										<button type="button" class="btn bg-facebook btn-block waves-effect waves-light">
											<i class="ti-menu pull-xs-right"></i> Relatorio
										</button>

										<button type="button" class="btn bg-twitter btn-block waves-effect waves-light">
											<i class="ti-bar-chart pull-xs-right"></i> Gráfico
										</button>

										<button type="button" class="btn bg-linkedin btn-block waves-effect waves-light">
											<i class="ti-pie-chart pull-xs-right"></i> Pizza
										</button>


								</div>
							</div>
							<div class="text-muted m-b-1">Haga click sobre el nombre del consultor para seleccionarlo</div>

						</div>
						<div class="row row-md m-b-2">

							<div class="col-md-12">
								<div class="box bg-white">
									<table class="table table-grey-head m-md-b-0">
										<thead>
											<tr>
												<th>#</th>
												<th>Username</th>
												<th>Project</th>
												<th>Last update</th>
												<th>Progress</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th scope="row">1</th>
												<td>Jonathan Mel</td>
												<td>
													<a class="text-primary" href="#"><span class="underline">First project</span></a>
												</td>
												<td>
													<span class="text-muted">5 minutes ago</span>
												</td>
												<td>
													<progress class="progress progress-success progress-sm d-inline-block m-b-0" value="44" max="100">100%</progress>
												</td>
											</tr>
											<tr>
												<th scope="row">2</th>
												<td>Larry Hal</td>
												<td>
													<a class="text-primary" href="#"><span class="underline">Second project</span></a>
												</td>
												<td>
													<span class="text-muted">3 days ago</span>
												</td>
												<td>
													<progress class="progress progress-danger progress-sm d-inline-block m-b-0" value="75" max="100">100%</progress>
												</td>
											</tr>
											<tr>
												<th scope="row">3</th>
												<td>Ron Carran</td>
												<td>
													<a class="text-primary" href="#"><span class="underline">Third project</span></a>
												</td>
												<td>
													<span class="text-muted">Last monday</span>
												</td>
												<td>
													<progress class="progress progress-warning progress-sm d-inline-block m-b-0" value="20" max="100">100%</progress>
												</td>
											</tr>
											<tr>
												<th scope="row">4</th>
												<td>Carleton Josiah</td>
												<td>
													<a class="text-primary" href="#"><span class="underline">Another project</span></a>
												</td>
												<td>
													<span class="text-muted">5 minutes ago</span>
												</td>
												<td>
													<progress class="progress progress-primary progress-sm d-inline-block m-b-0" value="10" max="100">100%</progress>
												</td>
											</tr>
											<tr>
												<th scope="row">5</th>
												<td>Wolfe Stevie</td>
												<td>
													<a class="text-primary" href="#"><span class="underline">Old project</span></a>
												</td>
												<td>
													<span class="text-muted">3 days ago</span>
												</td>
												<td>
													<progress class="progress progress-info progress-sm d-inline-block m-b-0" value="90" max="100">100%</progress>
												</td>
											</tr>
											<tr>
												<th scope="row">6</th>
												<td>Vance Osborn</td>
												<td>
													<a class="text-primary" href="#"><span class="underline">Important project</span></a>
												</td>
												<td>
													<span class="text-muted">Last monday</span>
												</td>
												<td>
													<progress class="progress progress-warning progress-sm d-inline-block m-b-0" value="35" max="100">100%</progress>
												</td>
											</tr>
											<tr>
												<th scope="row">7</th>
												<td>Jonathan Mel</td>
												<td>
													<a class="text-primary" href="#"><span class="underline">First project</span></a>
												</td>
												<td>
													<span class="text-muted">5 minutes ago</span>
												</td>
												<td>
													<progress class="progress progress-success progress-sm d-inline-block m-b-0" value="44" max="100">100%</progress>
												</td>
											</tr>
											<tr>
												<th scope="row">8</th>
												<td>Larry Hal</td>
												<td>
													<a class="text-primary" href="#"><span class="underline">Second project</span></a>
												</td>
												<td>
													<span class="text-muted">3 days ago</span>
												</td>
												<td>
													<progress class="progress progress-danger progress-sm d-inline-block m-b-0" value="75" max="100">100%</progress>
												</td>
											</tr>
											<tr>
												<th scope="row">9</th>
												<td>Ron Carran</td>
												<td>
													<a class="text-primary" href="#"><span class="underline">Third project</span></a>
												</td>
												<td>
													<span class="text-muted">Last monday</span>
												</td>
												<td>
													<progress class="progress progress-warning progress-sm d-inline-block m-b-0" value="20" max="100">100%</progress>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

					</div>
				</div>
				<!-- Footer -->
				<footer class="footer">
					<div class="container-fluid">
						2019 © Daniel Sánchez Test for Agence
					</div>
				</footer>
			</div>

		</div>

		<!-- Vendor JS -->
		<script type="text/javascript" src="{{ asset('vendor/jquery/jquery-1.12.3.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('vendor/tether/js/tether.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('vendor/detectmobilebrowser/detectmobilebrowser.js') }}"></script>
		<script type="text/javascript" src="{{ asset('vendor/jscrollpane/jquery.mousewheel.js') }}"></script>
		<script type="text/javascript" src="{{ asset('vendor/jscrollpane/mwheelIntent.js') }}"></script>
		<script type="text/javascript" src="{{ asset('vendor/jscrollpane/jquery.jscrollpane.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('vendor/waves/waves.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('vendor/chartist/chartist.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('vendor/switchery/dist/switchery.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('vendor/flot/jquery.flot.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('vendor/flot/jquery.flot.resize.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('vendor/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('vendor/CurvedLines/curvedLines.js') }}"></script>
		<script type="text/javascript" src="{{ asset('vendor/TinyColor/tinycolor.js') }}"></script>
		<script type="text/javascript" src="{{ asset('vendor/sparkline/jquery.sparkline.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('vendor/raphael/raphael.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('vendor/morris/morris.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('vendor/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('vendor/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>

		<!-- Neptune JS -->
		<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
	</body>
</html>