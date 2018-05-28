  <?php include('header.php'); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Acasa</a>
        </li>
        <li class="breadcrumb-item active">Pagina de pornire</li>
      </ol>
      <div class="container-fluid">
        <?php if($_SESSION['user_logged'] == 'student') { ?>
        <div class="row">
          <div class="col-md-12">
            <div class="page-header">
              <h2>Materii Studiate</h2>      
            </div>
          </div>
        </div>  
        <?php } ?>  
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('footer.php'); ?>
