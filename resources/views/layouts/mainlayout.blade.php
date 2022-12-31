<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Laravel 9 | @yield('title')</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">Blade Templating</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarNav">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="/">Home</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="/students">Student</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="/class">Class</a>
	        </li>
			<li class="nav-item">
				<a class="nav-link" href="/extracurricular">Extracurricular</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/teacher">Teacher</a>
			</li>
	      </ul>
		  <ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link active" href="/logout">Logout</a>
			</li>
		  </ul>
	    </div>
	  </div>
	</nav>

	<div class="container">
		@yield('content')
	</div>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>