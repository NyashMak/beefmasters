<nav id="sidebar" aria-label="Main Navigation">
	<!-- Side Header -->
	<div class="bg-header-dark">
	  <div class="content-header bg-white-5">
		<!-- Logo -->
		<a class="fw-semibold text-white tracking-wide" href="index.html">
		  <span class="smini-visible">
			D<span class="opacity-75">x</span>
		  </span>
		  <span class="smini-hidden">
			Beef<span class="opacity-75">Masters</span>
		  </span>
		</a>
		<!-- END Logo -->

		<!-- Options -->
		<div>
		  <!-- Toggle Sidebar Style -->
		  <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
		  <!-- Class Toggle, functionality initialized in Helpers.dmToggleClass() -->
		  <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle" data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on" onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');">
			<i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
		  </button>
		  <!-- END Toggle Sidebar Style -->

		  <!-- Dark Mode -->
		  <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
		  <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle" data-target="#dark-mode-toggler" data-class="far fa" onclick="Dashmix.layout('dark_mode_toggle');">
			<i class="far fa-moon" id="dark-mode-toggler"></i>
		  </button>
		  <!-- END Dark Mode -->

		  <!-- Close Sidebar, Visible only on mobile screens -->
		  <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
		  <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_close">
			<i class="fa fa-times-circle"></i>
		  </button>
		  <!-- END Close Sidebar -->
		</div>
		<!-- END Options -->
	  </div>
	</div>
	<!-- END Side Header -->

	<!-- Sidebar Scrolling -->
	<div class="js-sidebar-scroll">
	  <!-- Side Navigation -->
	  <div class="content-side">
		<ul class="nav-main">
				  <li class="nav-main-item">
					<a class="nav-main-link active" href="be_pages_ecom_dashboard.html">
					  <i class="nav-main-link-icon fa fa-location-arrow"></i>
					  <span class="nav-main-link-name">Dashboard</span>
					</a>
				  </li>
				  <li class="nav-main-item">
					<a class="nav-main-link" href="be_pages_ecom_orders.html">
					  <span class="nav-main-link-name">Orders</span>
					  <span class="nav-main-link-badge badge rounded-pill bg-primary">8</span>
					</a>
				  </li>
				  <li class="nav-main-item">
					<a class="nav-main-link" href="be_pages_ecom_products.html">
					  <span class="nav-main-link-name">Deliveries</span>
					</a>
				  </li>
				  <li class="nav-main-item">
					<a class="nav-main-link" href="">
					  <span class="nav-main-link-name">Inventory</span>
					</a>
				  </li>
				  <li class="nav-main-item">
					<a class="nav-main-link" href="{{route('categories.index')}}">
					  <span class="nav-main-link-name">Categories</span>
					</a>
				  </li>
				  <li class="nav-main-item">
					<a class="nav-main-link" href="{{route('products.index')}}">
					  <span class="nav-main-link-name">Products</span>
					</a>
				  </li>
				  <li class="nav-main-item">
					<a class="nav-main-link" href="">
					  <span class="nav-main-link-name">Discounts</span>
					</a>
				  </li>
				  <li class="nav-main-item">
					<a class="nav-main-link" href="">
					  <span class="nav-main-link-name">Customers</span>
					</a>
				  </li>

			  </li>

		</ul>
	  </div>
	  <!-- END Side Navigation -->
	</div>
	<!-- END Sidebar Scrolling -->
  </nav>
  <!-- END Sidebar -->