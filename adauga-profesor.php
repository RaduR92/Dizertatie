  <?php include('header.php'); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Acasa</a>
        </li>
        <li class="breadcrumb-item active">Adauga Profesor</li>
      </ol>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form class="form-horizontal">
            <fieldset>

            <legend>Adauga Profesor</legend>

            <div class="form-group">
              <label class="col-md-4 control-label" for="nume_profesor">Nume</label>  
              <div class="col-md-4">
              <input id="nume_profesor" name="nume_profesor" type="text" placeholder="" class="form-control input-md" required="">
                
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="prenume_profesor">Prenume</label>  
              <div class="col-md-4">
              <input id="prenume_profesor" name="prenume_profesor" type="text" placeholder="" class="form-control input-md" required="">
                
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="parola">Parola</label>  
              <div class="col-md-4">
              <input id="parola" name="parola" type="text" placeholder="" class="form-control input-md" required="">
                
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="mail">Adresa e-mail</label>  
              <div class="col-md-4">
              <input id="mail" name="mail" type="text" placeholder="" class="form-control input-md" required="">
                
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-4">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Adauga Profesor</button>
              </div>
            </div>

            </fieldset>
            </form>
        </div>
      </div>
    </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('footer.php'); ?>
