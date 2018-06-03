  <?php include('header.php'); 
    if($_SESSION['user_logged'] == 'student') {
      header("Location:index.php");
    }
  
  ?>
  
  <div class="content-wrapper">
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

            <?php if($_SESSION['user_logged'] == 'admin') { ?>
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

            <?php } ?>

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
            <label class="col-md-4 control-label" for="specializare">Alege specializarea</label>
            <div class="col-md-4">
              <select id="specializare" name="specializare" class="form-control">
              <option value="-">-Alege-</option>
                <option value="etc">ETC - Anul 1/2 Licenta</option>
                <option value="etc-ea">ETC - EA</option>
                <option value="etc-tst">ETC - TST</option>
                <option value="etc-master-irt">ETC Master IRT</option>
                <option value="etc-master-cn">ETC Master CN</option>
                <option value="etc-master-esi">ETC Master ESI</option>
                <option value="etc-master-ebi">ETC Master EBI</option>
                <option value="etc-master-tm">ETC Master TM</option>
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
                    if($_SESSION['user_logged'] == 'admin'){
                      $profesor_coordonator = mysqli_real_escape_string($conn, $_POST['profesor_coordonator']);
                    } else {
                      $profesor_coordonator = $_SESSION['id_utilizator'];
                    }
                  
                    
                    $query ="INSERT INTO materii (nume_materie, specializare, profesor_coordonator, an_studiu) VALUES ( '". $nume_materie."','".$specializare."','".$profesor_coordonator."','".$an_studiu."')";
                    
                   $result = mysqli_query($conn, $query);
                   if($result){
                    echo 'Materia a fost adaugata cu succes';
                   }
                   mysql_free_result($result);

              }
          ?>
        </div>
      </div>
    </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('footer.php'); ?>
