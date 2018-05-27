  <?php include('header.php'); ?>
  
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Acasa</a>
        </li>
        <li class="breadcrumb-item active">Adauga Materie</li>
      </ol>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form class="form-horizontal" action="adauga-materie.php" method="POST" >
            <fieldset>

            <legend>Adauga materie</legend>

            <div class="form-group">
              <label class="col-md-4 control-label" for="nume_materie">Nume materie</label>  
              <div class="col-md-4">
              <input id="nume_materie" name="nume_materie" type="text" placeholder="" class="form-control input-md" required="">
                
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="specializare">Specializare</label>  
              <div class="col-md-4">
              <input id="specializare" name="specializare" type="text" placeholder="" class="form-control input-md" required="">
                
              </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="profesor_coordonator">Profesor Coordonator</label>
              <div class="col-md-4">
                <select id="profesor_coordonator" name="profesor_coordonator" class="form-control">
                <option value="-">-Alege-</option>
                <?php
                  $query = "SELECT * FROM profesori";
                  
                  $loop = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_array($loop))
                  {
                        echo '<option value="'.$row['ID'].'">'.$row['nume_profesor']." " .$row['prenume_profesor'].'</option>';
                  }                    
                ?>   
                </select>
              </div>
            </div>

            <div class="form-group">
            <label class="col-md-4 control-label" for="an_studiu">Alege anul de studiu</label>
            <div class="col-md-4">
              <select id="an_studiu" name="an_studiu" class="form-control">
                <option value="-">-Alege-</option>
                <option value="an_1_licenta">Anul 1 Licenta</option>
                <option value="an_2_licenta">Anul 2 Licenta</option>
                <option value="an_3_licenta">Anul 3 Licenta</option>
                <option value="an_4_licenta">Anul 4 Licenta</option>
                <option value="an_1_master">Anul 1 Master</option>
                <option value="an_2_master">Anul 2 Master</option>
              </select>
            </div>
          </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="adauga_materie"></label>
              <div class="col-md-4">
                <button id="adauga_materie" name="adauga_materie" value="1" class="btn btn-primary">Adauga Materie</button>
              </div>
            </div>

            </fieldset>
            </form>
            <?php 
              
              if(is_array($_POST) && isset($_POST['adauga_materie'])){
                    $nume_materie = mysqli_real_escape_string($conn, $_POST['nume_materie']);
                    $specializare = mysqli_real_escape_string($conn, $_POST['specializare']);
                    $an_studiu = mysqli_real_escape_string($conn, $_POST['an_studiu']);
                    $profesor_coordonator = mysqli_real_escape_string($conn, $_POST['profesor_coordonator']);
                  
                    
                    $query ="INSERT INTO materii (nume_materie, specializare, profesor_coordonator, an_studiu) VALUES ( '". $nume_materie."','".$specializare."','".$profesor_coordonator."','".$an_studiu."')";
                    
                   $result = mysqli_query($conn, $query);
                   echo 'Materia a fost adaugata cu succes';

              }
          ?>
        </div>
      </div>
    </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('footer.php'); ?>
