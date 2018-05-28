<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Campus Virtual</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
   <!-- Bootstrap core JavaScript-->
   <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
</head>

<body class="fixed-nav sticky-footer" id="page-top">
  <?php 
    session_start();
    if(!$_SESSION['user_logged']) {
      header("Location:login.php"); 
    }

  ?>
<?php include('database_connection.php'); ?>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">UPT | Campus Virtual</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa fa-fw fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Prima Pagina">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">Prima Pagina</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Materii">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMaterii" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-book"></i>
            <span class="nav-link-text">Materii</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMaterii">
            <?php 
            if($_SESSION['user_logged'] == 'student') {
              $query = 'SELECT materii.ID, materii.nume_materie FROM inscriere_studenti RIGHT JOIN materii ON inscriere_studenti.id_materie = materii.ID WHERE inscriere_studenti.id_student ='.$_SESSION['id_utilizator'];
              $loop = mysqli_query($conn, $query);
              while ($row = mysqli_fetch_array($loop))
              {
                    echo '<li>
                            <a href="materie.php?id_materie='.$row['ID'].'">'.$row['nume_materie'].'</a>
                          </li>';
              }   
            }
            
            if($_SESSION['user_logged'] == 'profesor') {
              $query = 'SELECT * FROM materii WHERE profesor_coordonator ='.$_SESSION['id_utilizator'];
              $loop = mysqli_query($conn, $query);
              while ($row = mysqli_fetch_array($loop))
              {
                    echo '<li>
                            <a href="materie.php?id_materie='.$row['ID'].'">'.$row['nume_materie'].'</a>
                          </li>';
              }   
            }
            
            
            ?>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Noutati">
          <a class="nav-link" href="noutati.php">
            <i class="fa fa-fw fa-info-circle"></i>
            <span class="nav-link-text">Noutati</span>
          </a>
        </li>
        <?php 
          if($_SESSION['user_logged'] == 'profesor') {
        ?>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Adauga Materie">
            <a class="nav-link" href="adauga-materie.php">
              <i class="fa fa-fw fa-plus-square"></i>
              <span class="nav-link-text">Adauga Materie</span>
            </a>
          </li>
        <?php
          }
        ?>
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
            <span class="d-lg-none">Mesaje
              <span class="badge badge-pill badge-primary">12 noi</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">Mesaje noi:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Ion Popescu</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Ai un mesaj nou de la Ion Popescu</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Prof. Popescu</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Ai un mesaj nou de la Prof. Popescu</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Ion Popescu</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Ai un mesaj nou de la Ion Popescu</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">Vezi toate mesajele</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerte
              <span class="badge badge-pill badge-warning">6 noi</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">Alerte noi:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">A fost incarcat un fisier nou in Fizica</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Salut, maine e termenul limita pentru proiectul la Fizica!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Ai un examen in 12 zile</div>
            </a>
            <div class="dropdown-divider"></div>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Cauta">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <p class="user"> Bun venit, <?php echo $_SESSION['nume_utilizator']; ?> </p>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Deconectare</a>
        </li>
      </ul>
    </div>
  </nav>