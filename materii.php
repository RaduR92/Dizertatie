  <?php include('header.php'); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Acasa</a>
        </li>
        <li class="breadcrumb-item active">Materii</li>
      </ol>
     
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <ul class="nav nav-pills">
              <li class="active"><a data-toggle="pill" href="#home">Home</a></li>
              <li><a data-toggle="pill" href="#menu1">Menu 1</a></li>
              <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
              <li><a data-toggle="pill" href="#menu3">Menu 3</a></li>
            </ul>
  
            <div class="tab-content">
              <div id="home" class="tab-pane fade in active">
                <h3>HOME</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
              <div id="menu1" class="tab-pane fade">
                <h3>Menu 1</h3>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
              <div id="menu2" class="tab-pane fade">
                <h3>Menu 2</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
              </div>
              <div id="menu3" class="tab-pane fade">
                <h3>Menu 3</h3>
                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('footer.php'); ?>
