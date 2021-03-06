<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Sistema Hospital</title>
  <!-- Bootstrap core CSS
  <link href="css/bootstrap.min.css" rel="stylesheet">-->
  {!! Html::style('css/bootstrap.min.css') !!}
  <!-- Custom fonts for this template
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
  {!! Html::style('vendor/font-awesome/css/font-awesome.min.css') !!}
  <!-- Page level plugin CSS-
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">-->
  {!! Html::style('vendor/datatables/dataTables.bootstrap4.css') !!}
  <!-- Custom styles for this template
  <link href="css/sb-admin.css" rel="stylesheet">-->
  {!! Html::style('css/sb-admin.css') !!}
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="/">
      <img width="50%" src="{!! asset('imagenes/principal.png') !!}" sizes="32x32" style="margin-left: -5px;margin-top: -10px;">
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="User">
          <a class="nav-link" href="">
            <img class="rounded-circle img-fluid d-block mx-auto" width="100px;"  border-radius="150px;" sizes="32x32" src="{!! asset(Auth::User()->ruta_foto_perfil) !!}">
            <center><span style="color: #ffff" class="nav-link-text"><b>{{ Auth::User()->name }} {{ Auth::User()->ap_paterno }}</b></span></center>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="/">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Inicio</span>
          </a>
        </li>
        @if(Auth::User()->tipo_usuario->clave == "01")
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Users">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseUsers" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-user"></i>
              <span class="nav-link-text">Usuarios</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseUsers">
              <li>
                <a href="{{ url('/usuarios') }}">Usuarios</a>
              </li>
              <li>
                <a href="{{ url('/tipo_usuarios') }}">Tipos de Usuario</a>
              </li>
            </ul>
          </li>
        @endif
        @if(Auth::User()->tipo_usuario->clave == "02")
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Doctors">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMedicos">
              <i class="fa fa-fw fa-circle"></i>
              <span class="nav-link-text">Consulta de Personal</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseMedicos">
              <li>
                <a href="/medicos">Médicos</a>
              </li>
              <li>
                <a href="">Enfermeros</a>
              </li>
            </ul>
          </li>
        @endif
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pacientes">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePacientes" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-users"></i>
            @if(Auth::User()->tipo_usuario->clave == "05")
              <span class="nav-link-text">Mis Pacientes</span>
            @else
              <span class="nav-link-text">Pacientes</span>
            @endif
          </a>
          <ul class="sidenav-second-level collapse" id="collapsePacientes">
            <li>
              <a href="{{ url('/pacientes') }}">Lista de Pacientes</a>
            </li>
            <li>
              <a href="{{ url('pacientes/create') }}">Registrar Nuevo Paciente</a>
            </li>
          </ul>
        </li>
        @if(Auth::User()->tipo_usuario->clave == "01")
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Configuracion">
            <a class="nav-link" href="{{ url('/configuracion') }}">
              <i class="fa fa-fw fa-cog"></i>
              <span class="nav-link-text">Configuración</span>
            </a>
          </li>
        @endif
        <!--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="charts.html">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Charts</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="/tables">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Tables</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Components</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="navbar.html">Navbar</a>
            </li>
            <li>
              <a href="cards.html">Cards</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Example Pages</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="login.html">Login Page</a>
            </li>
            <li>
              <a href="register.html">Registration Page</a>
            </li>
            <li>
              <a href="forgot-password.html">Forgot Password Page</a>
            </li>
            <li>
              <a href="blank.html">Blank Page</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Menu Levels</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2">
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Link</span>
          </a>
        </li>-->
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li class="nav-item">
          <!--<form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>-->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/logout') }}">
            <i class="fa fa-fw fa-sign-out"></i>Salir</a>
        </li>
      </ul>
    </div>
  </nav>
  <br>
  @yield('content_inicio')
  @yield('content_tables')
  <!-- Usuarios -->
  @yield('content_usuarios')
  @yield('content_usuarios_registro')
  @yield('content_usuarios_editar')
  @yield('content_usuarios_perfil')
  <!-- Tipos de Usuarios -->
  @yield('content_tipo_usuarios')
  @yield('content_tipo_usuarios_registro')
  @yield('content_tipo_usuarios_editar')
  @yield('content_tipo_usuarios_perfil')
  <!--Pacientes-->
  @yield('content_pacientes')
  @yield('content_pacientes_registro')
  @yield('content_pacientes_editar')
  @yield('content_pacientes_perfil')
  <!--Medicos-->
  @yield('content_medicos')
  <!--Expedientes-->
  @yield('content_expediente_medico')
  <!--Configuracion-->
  @yield('content_configuracion')
  @yield('content_configuracion_editar')
  @yield('content_configuracion_perfil')
  <!--Cambio de contraseña-->
  @yield('content_cambio_contrasena')
   <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->
    {!! Html::script('js/jquery.min.js') !!}

    {!! Html::script('vendor/bootstrap/js/bootstrap.bundle.min.js') !!}
    <!-- Core plugin JavaScript
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>-->
    {!! Html::script('vendor/jquery-easing/jquery.easing.min.js') !!}
    <!-- Page level plugin JavaScript
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>-->
    {!! Html::script('vendor/chart.js/Chart.min.js') !!}
    {!! Html::script('vendor/datatables/jquery.dataTables.js') !!}
    {!! Html::script('vendor/datatables/dataTables.bootstrap4.js') !!}

    <!--Dropdown Estado-->
    {!! Html::script('js/dropdown_estados.js') !!}
    
    <!-- Custom scripts for all pages
    <script src="js/sb-admin.min.js"></script>-->
    {!! Html::script('js/sb-admin.min.js') !!}
    <!-- Custom scripts for this page
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
    {!! Html::script('js/sb-admin-datatables.min.js') !!}-->
    {!! Html::script('js/sb-admin-charts.min.js') !!}
</body>

</html>
