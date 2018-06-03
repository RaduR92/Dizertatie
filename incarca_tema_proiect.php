<?php 
    include('header.php');
    include('database_connection.php');
    if($_SESSION['user_logged'] != 'student'){
        header("Location:login.php");
    } else {
?>
    <div class="content-wrapper">
        <div class="container-fluid">      
            <div class="row">
                <div class="col-md-12 content">
                    <form class="form-horizontal adauga_laborator" method="POST" enctype="multipart/form-data">
                    <fieldset>

                    <!-- Form Name -->
                    <legend>Incarca Tema/Proiect</legend>

                    <!-- File Button --> 
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="uploaded_file">Incarca fisier</label>
                        <div class="col-md-4">
                        <input id="uploaded_file" name="uploaded_file" class="input-file" type="file">
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="incarca_lab"></label>
                        <div class="col-md-4">
                        <input type="submit" class="btn btn-primary" value="Incarca Tema/Proiect"></input>
                        </div>
                    </div>

                    </fieldset>
                    </form>
                    <?php
                        if(!empty($_FILES['uploaded_file'])) {
                            $error = "";
                            if (isset($_FILES["uploaded_file"])) {
                                $allowedExts = array("doc", "docx", "pdf", "odt");
                                $temp = explode(".", $_FILES["uploaded_file"]["name"]);
                                $extension = end($temp);
                            
                                if ($_FILES["uploaded_file"]["error"] > 0) {
                                    $error .= "Error opening the file<br />";
                                }
                                if ( $_FILES["uploaded_file"]["type"] != "application/pdf" &&
                                        $_FILES["uploaded_file"]["type"] != "application/vnd.openxmlformats-officedocument.wordprocessingml.document" &&
                                        $_FILES["uploaded_file"]["type"] != "application/msword" &&
                                        $_FILES["uploaded_file"]["type"] != "application/vnd.oasis.opendocument.text") {	
                                    $error .= "Mime type not allowed<br />";
                                }
                                if (!in_array($extension, $allowedExts)) {
                                    $error .= "Extension not allowed<br />";
                                }
                                if ($_FILES["uploaded_file"]["size"] > 5242880) {
                                    $error .= "File size shoud be less than 5MB<br />";
                                }
                            
                                if ($error == "") {
                                    $nume_materie = "SELECT * FROM materii WHERE ID=".$_GET['id_materie'];
                                    $loop = mysqli_query($conn, $nume_materie);
                                    while ($row = mysqli_fetch_array($loop))
                                    {
                                          $materia_curenta = $row['nume_materie'];
                                    }                   
                                    $path = "uploads/teme-proiecte/".$materia_curenta."/";
                                    if(!is_dir($path)){
                                        mkdir($path, 0755, true);
                                    }
                                    $file_name = str_replace(' ', '_', $_FILES['uploaded_file']['name']);
                                    $path = $path . basename($file_name);
                                    $id_tema_proiect = $_GET['id_tema_proiect'];
                                    $id_materie = $_GET['id_materie'];
                                    $id_student =  $_SESSION['id_utilizator'];

                                    $query ="INSERT INTO teme_proiecte_incarcate (url_fisier,id_tema_proiect, id_materie, id_student) VALUES ( '". $path."','".$id_tema_proiect."','".$id_materie."','".$id_student."')";
                                                    
                                    $result = mysqli_query($conn, $query);
                                    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path) && $result) {
                                    echo "Fisierul ".  basename( $_FILES['uploaded_file']['name']). 
                                    " a fost incarcat";
                                    } 
                                } else {
                                    echo $error;
                                }
                            }	
                            
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