<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>Dulcería - Karamelo</title>
  <link rel="shortcut icon" href="{{ asset('assets/img/invoice-logo.png') }}" type="image/x-icon">
  <link href="{{ asset('assets\css\login.css') }}" rel="stylesheet">
  

</head>
<body>
<div class="wrapper"><br><br>&nbsp;<br>&nbsp;
	<div class="container">
		<h1 class="name">Dulcería Karamelo</h1>


		<form class="form">
			<input type="text" id="user"placeholder="Usuario">
			<input type="password" placeholder="Password">
			<button type="submit" id="login-button">Iniciar Sesión</button>
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
        <li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>

   <script src="{{ asset('assets\js\jquery.min.js') }}"></script>
  
   <script src="{{ asset('assets\js\login.js') }}"></script>
</body>
</html>
