  <?php include('header.php'); 
    if($_SESSION['user_logged'] == 'student' || $_SESSION['user_logged'] == 'profesor' ) {
      header("Location:index.php");
    }
  
  ?>
  
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form class="form-horizontal" action="adauga-profesor.php" method="POST">
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
              <input id="parola" name="parola" type="password" placeholder="" class="form-control input-md" required="">
                
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
                <button id="adauga-profesor" name="adauga-profesor" value="1" class="btn btn-primary">Adauga Profesor</button>
              </div>
            </div>

            </fieldset>
            </form>

            <?php 
              if(is_array($_POST) && isset($_POST['adauga-profesor'])){
                    $nume_profesor = mysqli_real_escape_string($conn, $_POST['nume_profesor']);
                    $prenume_profesor = mysqli_real_escape_string($conn, $_POST['prenume_profesor']);
                    $parola = base64_encode($_POST['parola']);
                    $mail = mysqli_real_escape_string($conn, $_POST['mail']);

                    
                    $check_mail = "SELECT * FROM profesori WHERE mail = '".$mail."'";
                    $check_mail_result = mysqli_query($conn, $check_mail);

                    if(mysqli_num_rows($check_mail_result)) {?>
                    <script>
                        $(document).ready(function(){
                          alert('Adresa de e-mail exista in baza de date');
                        });
                    </script>
                    <?php
                      exit();
                    } else {
                    
                    $query ="INSERT INTO profesori (nume_profesor, prenume_profesor, parola, mail) VALUES ( '". $nume_profesor."','".$prenume_profesor."','".$parola."','".$mail."')";
                    
                   $result = mysqli_query($conn, $query);
                    echo 'Profesorul a fost adaugat cu succes';
                  }

              }
          ?>
        </div>
      </div>
    </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('footer.php'); ?>
