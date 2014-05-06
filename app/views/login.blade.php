<html>
<head><title>Acceso al sistema</title>
{{ HTML::style('css/bootstrap.min.css') }}
{{ HTML::style('css/bootstrap-theme.min.css') }}

{{ HTML::script('js/jquery.js') }}
{{ HTML::script('js/ajaxlogin.js') }}

</head>
<body>
 <div class="container">
{{ Form::open(array('url' => 'ajax', 'class' => 'form-signin',
 'id' => 'ajaxform')) }}
<h2 class="form-signin-heading">Acceder</h2>
<input type="text" class="form-control"
name="username" placeholder="Usuario"
required autofocus>
<input type="password" class="form-control"
name="password" placeholder="Password" required>
<label class="checkbox">
<input type="checkbox" name="remember" value="1"> Recordarme
</label>
<button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
{{ Form::close() }}
</div>
<div class='load' align="center" style="display: none">
<img src="img/350.gif"></div>
<div class='errors'></div>
<div class='respuesta'></div>