  <?php include('header.php'); 
      if($_SESSION['user_logged'] == 'student') {
        header("Location:index.php");
      }
  
  ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form class="form-horizontal" action="adauga-student.php" method="POST">
            <fieldset>

            <legend>Adauga Student</legend>

            <div class="form-group">
              <label class="col-md-4 control-label" for="nume">Nume</label>  
              <div class="col-md-4">
              <input id="nume" name="nume" type="text" placeholder="" class="form-control input-md" required="">
                
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="prenume">Prenume</label>  
              <div class="col-md-4">
              <input id="prenume" name="prenume" type="text" placeholder="" class="form-control input-md" required="">
                
              </div>
            </div>

             <div class="form-group">
              <label class="col-md-4 control-label" for="numar_matricol">Numar Matricol</label>  
              <div class="col-md-4">
              <input id="numar_matricol" name="numar_matricol" type="text" placeholder="" class="form-control input-md" required="">
                
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="mail">Adresa e-mail</label>  
              <div class="col-md-4">
              <input id="mail" name="mail" type="text" placeholder="" class="form-control input-md" required="">
                
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="parola">Parola</label>
              <div class="col-md-4">
                <input id="parola" name="parola" type="password" placeholder="" class="form-control input-md" required="">
                
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
              <label class="col-md-4 control-label" for="specializare">Specializarea</label>  
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
              <div class="col-md-4">
                <button id="singlebutton" name="singlebutton" value="1" class="btn btn-primary">Adauga Student</button>
              </div>
            </div>

            </fieldset>
          </form>

          <?php 
              if(is_array($_POST) && isset($_POST['singlebutton'])){
                    $nume = mysqli_real_escape_string($conn, $_POST['nume']);
                    $prenume = mysqli_real_escape_string($conn, $_POST['prenume']);
                    $numar_matricol = mysqli_real_escape_string($conn, $_POST['numar_matricol']);
                    $mail = mysqli_real_escape_string($conn, $_POST['mail']);
                    $parola = base64_encode($_POST['parola']);
                    $an_studiu = mysqli_real_escape_string($conn, $_POST['an_studiu']);
                    $specializare = mysqli_real_escape_string($conn, $_POST['specializare']);

                    $check_mail = "SELECT * FROM studenti WHERE mail = '".$mail."'";
                    $check_mail_result = mysqli_query($conn, $check_mail);

                    $check_nr_matricol = "SELECT * FROM studenti WHERE numar_matricol = ".$numar_matricol;
                    $check_nr_matricol_result = mysqli_query($conn, $check_nr_matricol);
                    if(mysqli_num_rows($check_mail_result)) {?>
                    <script>
                        $(document).ready(function(){
                          alert('Adresa de e-mail exista in baza de date');
                        });
                    </script>
                    <?php
                      exit();
                      } elseif(mysqli_num_rows($check_nr_matricol_result)) {?>
                        <script>
                            $(document).ready(function(){
                              alert('Numarul matricol exista in baza de date');
                            });
                        </script>
                        <?php
                          exit();
                    } else {
                      $query ="INSERT INTO studenti (nume, prenume, numar_matricol, mail, parola, an_studiu, specializare) VALUES ( '". $nume."','".$prenume."','".$numar_matricol."','".$mail."','".$parola."','".$an_studiu."'
                      ,'".$specializare."' )";
                    
                      $result = mysqli_query($conn, $query);
                      echo 'Studentul a fost adaugat cu succes';
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
