  <?php include('header.php'); ?>
  <!--scripts to dynamically populate form -->
  <script>
    $( document ).ready(function() {
      $('#an_studiu').on('change', function(){
        var an_studiu = this.value; // get the selection value
        $.ajax({
          type: "POST",  // method of sending data
          url: "selectare_studenti.php", // name of PHP script
          data:'an_studiu='+an_studiu, // parameter name and value
          success: function(result){ // deal with the results
            $("#studenti").html(result); // insert in div above
            }
        });
        $.ajax({
          type: "POST",  // method of sending data
          url: "selectare_materii.php", // name of PHP script
          data:'an_studiu='+an_studiu, // parameter name and value
          success: function(result){ // deal with the results
            $("#materii").html(result); // insert in div above
            }
        });
      });
    });
  </script>
  <!-- end of scripts -->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Acasa</a>
        </li>
        <li class="breadcrumb-item active">Inscriere Student Disciplina</li>
      </ol>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
        <form class="form-horizontal" action="inscriere-student-disciplina.php" method="POST" >
          <fieldset>

          <legend>Inscriere Student Disciplina</legend>

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
            <label class="col-md-4 control-label" for="studenti">Alege Student</label>
            <div class="col-md-4">
              <select id="studenti" name="studenti" class="form-control">
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="materii">Alege Materia</label>
            <div class="col-md-4">
              <select id="materii" name="materii" class="form-control">  
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="inscrie_student"></label>
            <div class="col-md-4">
              <button id="inscrie_student" name="inscrie_student" class="btn btn-primary">Inscrie Student</button>
            </div>
          </div>

          </fieldset>
        </form>
        <?php   
          if(is_array($_POST) && isset($_POST['inscrie_student'])){
                $id_student = mysqli_real_escape_string($conn, $_POST['studenti']);
                $id_materie = mysqli_real_escape_string($conn, $_POST['materii']);

                $query ="INSERT INTO inscriere_studenti (id_student, id_materie) VALUES ( '". $id_student."','".$id_materie."')";
                $result = mysqli_query($conn, $query);
                
                echo 'Studentul a fost inscris cu succes';

          }
        ?>

        </div>
      </div>
    </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('footer.php'); ?>
