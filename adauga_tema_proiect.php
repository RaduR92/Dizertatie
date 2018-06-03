<?php 
    include('header.php');
    include('database_connection.php');
    if($_SESSION['user_logged'] != 'profesor'){
        header("Location:login.php");
    } else {
?>
     <!-- scripts-->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  <script>
    $(document).ready(function(){
      var date_input=$('input[name="termen_limita"]');
      var options={
        format: 'mm/dd/yyyy',
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
  </script>

  <!-- end of scripts -->
    <div class="content-wrapper">
        <div class="container-fluid">      
            <div class="row">
                <div class="col-md-12 content">
                <form class="form-horizontal" method="POST" action="adauga_tema_proiect.php?id_materie=<?php echo $_GET['id_materie'];?>">
                    <fieldset>

                    <!-- Form Name -->
                    <legend>Adauga Tema/Proiect</legend>

                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="nume_tema_proiect">Nume Tema/Proiect</label>  
                    <div class="col-md-4">
                    <input id="nume_tema_proiect" name="nume_tema_proiect" type="text" placeholder="" class="form-control input-md">
                        
                    </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="scurta_descriere_tema_proiect">Scurta Descriere</label>
                    <div class="col-md-4">                     
                        <textarea class="form-control" id="scurta_descriere_tema_proiect" name="scurta_descriere_tema_proiect"></textarea>
                    </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="termen_limita">Termen Limita</label>  
                    <div class="col-md-4">
                    <input id="termen_limita" name="termen_limita" type="text" placeholder="" class="form-control input-md">
                        
                    </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="adauga_tema_proiect"></label>
                    <div class="col-md-4">
                        <button id="adauga_tema_proiect" name="adauga_tema_proiect" class="btn btn-primary">Adauga Tema/Proiect</button>
                    </div>
                    </div>

                    </fieldset>
                </form>
                    <?php 
                        if(is_array($_POST) && isset($_POST['adauga_tema_proiect'])){
                            $nume_tema_proiect = mysqli_real_escape_string($conn, $_POST['nume_tema_proiect']);
                            $scurta_descriere_tema_proiect = mysqli_real_escape_string($conn, $_POST['scurta_descriere_tema_proiect']);
                            $termen_limita = mysqli_real_escape_string($conn, date('Y-m-d',strtotime($_POST['termen_limita'])));
                            $id_materie = $_GET['id_materie'];
                            $id_profesor = $_SESSION['id_utilizator'];

                            $query ="INSERT INTO teme_proiecte (nume_tema_proiect, scurta_descriere_tema_proiect, termen_limita, id_materie, id_profesor) VALUES ( '". $nume_tema_proiect."','".$scurta_descriere_tema_proiect."','".$termen_limita."','".$id_materie."','".$id_profesor."')";
                            
                           $result = mysqli_query($conn, $query);
                            echo 'Tema/Proiectul a fost adaugat(a) cu succes';
                      }
                    ?>
                    <a href="materie.php?id_materie=<?php echo $_GET['id_materie']?>" class="go-back"> Catre pagina materiei </a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
      <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('footer.php'); ?>