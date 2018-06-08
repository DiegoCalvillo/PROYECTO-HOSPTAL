<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Sistema de Hospital - Login</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        @include('alerts.errors')
        @include('alerts.request')
        {!! Form::open(['route' => 'login/store', 'method' => 'POST', 'novalidate']) !!}
          <div class="form-group">
            <label for="exampleInputEmail1">Usuario</label>
            <input name="username" class="form-control" placeholder="Nombre de Usuario">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Contraseña</label>
            <input name="password" class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">
          </div>
          <!--<a class="btn btn-primary btn-block" href="index.html">Login</a>-->
          <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
