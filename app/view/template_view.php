<!DOCTYPE html>
<html>
<head>
	<title><? echo $data['title']; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="/js/main.js"></script>
	
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
	<nav>
		<div class="nav-wrapper">
			<a href="#" class="brand-logo"><?= $data['title'] ?></a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="/">Main page</a></li>
				<li><a href="/tree/add">Add member</a></li>
				<li><a href="/tree/list">Members list</a></li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<?php include_once 'app/view/'.$content_view;?>
	</div>
</body>
</html>