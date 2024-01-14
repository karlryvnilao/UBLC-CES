<div class="header">
	<!-- Logo -->
	<div class="header-left">
		<a href="index.php" class="logo">
			<img src="../../../images/ubicon.png" width="40" height="40" alt="">
		</a>
	</div>
	<!-- /Logo -->
	
	<a id="toggle_btn" href="javascript:void(0);">
		<span class="bar-icon">
			<span></span>
			<span></span>
			<span></span>
		</span>
	</a>
	
	<!-- Header Title -->
	<div class="page-title-box">
		<h3>Vehicle Reservation System</h3>
		<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
	</div>
	<!-- /Header Title -->
	
	
	
	<!-- Header Menu -->

	<!-- /Mobile Menu -->
	<ul class="navbar-nav ml-auto d-flex">
        <div class="header-right d-flex justify-content-end p-3">
		<li class="dropdown me-md-3"><i class="fa fa-bell"></i>
       <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	   
	   <span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-envelope" style="font-size:18px;"></span></a>
       <ul class="dropdown-menu"></ul>
      </li>
            
            <li class="nav-item">
                <div class="login-user text-light font-weight-bolder">Hi!, <?= $_SESSION['role'] ?>!</div>
            </li>
        </div>
    </ul>
	
	
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>