  <?php include('header.php'); 
       if($_SESSION['user_logged'] == 'student') {
        header("Location:index.php");
      }
  
  ?>
  <!--scripts to dynamically populate form -->
  <script>
    $( document ).ready(function() {
      $('#specializare').on('change', function(){
        var specializare = this.value; 
        $.ajax({
          type: "POST",  
          url: "selectare_studenti.php", 
          data:'specializare='+specializare, 
          success: function(result){ 
            $("#studenti").html(result); 
            }
        });
        $.ajax({
          type: "POST",  
          url: "selectare_materii.php", 
          data:'specializare='+specializare, 
          success: function(result){
            $("#materii").html(result);
            }
        });
      });
    });
  </script>
  <!-- end of scripts -->
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
        <form class="form-horizontal" action="inscriere-student-disciplina.php" method="POST" >
          <fieldset>

          <legend>Inscriere Student Disciplina</legend>

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
