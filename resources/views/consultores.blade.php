<!DOCTYPE html>
<html lang="en">
	@include('header')
	<body class="large-sidebar fixed-sidebar fixed-header content-appear">
		<div class="wrapper">

			<!-- Sidebar -->
			@include('sidebar')			

			<!-- Header -->
			@include('page_header')

			<div class="site-content">
				<!-- Content -->

				<div id="app" class="content-area p-y-1">
					<consultores></consultores>
				</div>

				<!-- Footer -->
				@include('footer')
			</div>

		</div>

		<!-- Vendor JS -->
		@include('vendorJs')

		<!-- Neptune JS -->
		<script type="text/javascript" src="{{ asset('js/neptune.js') }}"></script>

		<!-- Consultores JS -->	
		<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>		

	</body>
</html>