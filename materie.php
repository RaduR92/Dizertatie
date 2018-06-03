  <?php include('header.php'); ?>
  <div class="content-wrapper">
    
    <?php 
      if($_SESSION['user_logged'] == 'profesor'){
    ?>
    <div class="container-fluid sectiune-adaugare">
      <div class="row">
        <div class="col-md-12 content">
        <a href="adauga_curs.php?id_materie=<?php echo $_GET['id_materie']?>">
          <button type="button" class="btn btn-primary">
            <i class="fa fa-fw fa-plus"></i> Adauga Curs
          </button> 
        </a>
        <a href="adauga_laborator.php?id_materie=<?php echo $_GET['id_materie']?>">
          <button type="button" class="btn btn-primary">
            <i class="fa fa-fw fa-plus"></i> Adauga Laborator
          </button>
        </a>
        <a href="adauga_tema_proiect.php?id_materie=<?php echo $_GET['id_materie']?>">
          <button type="button" class="btn btn-primary">
            <i class="fa fa-fw fa-plus"></i> Adauga Tema/Proiect
          </button>
        </a>              
        </div>
      </div>
    </div>
    <?php
      }
    ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 content">
            <?php  
              $nume_materie = "SELECT * from materii where ID = ".$_GET['id_materie']; 
              $nume_materie_result = mysqli_query($conn, $nume_materie);
              while ($row = mysqli_fetch_array($nume_materie_result))
              {
                    echo '<h2>'.$row['nume_materie'].'</h2>';
              }   
            
            ?>

            <!-- Nav pills -->
            <ul class="nav nav-pills" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#cursuri">Cursuri</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#laboratoare">Laboratoare</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#teme_proiecte">Teme/Proiecte</a>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div id="cursuri" class="container tab-pane active"><br>
                <?php 
                  $id_materie = $_GET['id_materie'];
                  if($_SESSION['user_logged'] == 'profesor'){
                  $id_profesor = $_SESSION['id_utilizator'];
      
                  $query = "SELECT * from cursuri where id_materie = ".$id_materie." AND id_profesor = ".$id_profesor;
                  } elseif($_SESSION['user_logged'] == 'student') {

                    $query = "SELECT * from cursuri where id_materie = ".$id_materie;
                  }
                  $loop = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_array($loop))
                  {
                        echo '<div class="continut-materie"><a href="'.$row['nume_fisier'].'" target="_blank">'.$row['scurta_descriere'].'</a></div>';
                  }       
                ?>
               
              </div>
              <div id="laboratoare" class="container tab-pane fade"><br>
                <?php 
                  $id_materie = $_GET['id_materie'];
                  if($_SESSION['user_logged'] == 'profesor'){
                    $id_profesor = $_SESSION['id_utilizator'];
        
                    $query = "SELECT * from laboratoare where id_materie = ".$id_materie." AND id_profesor = ".$id_profesor;
                    } elseif($_SESSION['user_logged'] == 'student') {
  
                      $query = "SELECT * from laboratoare where id_materie = ".$id_materie;
                    }
                  $loop = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_array($loop))
                  {
                        echo '<div class="continut-materie"><a href="'.$row['fisier'].'" target="_blank">'.$row['scurta_descriere'].'</a></div>';
                  }       
                ?>
              </div>
              <div id="teme_proiecte" class="container tab-pane fade"><br>
                <?php 
                  $id_materie = $_GET['id_materie'];
                  if($_SESSION['user_logged'] == 'profesor'){
                    $id_profesor = $_SESSION['id_utilizator'];
        
                    $query = "SELECT * from teme_proiecte where id_materie = ".$id_materie." AND id_profesor = ".$id_profesor;
                    } elseif($_SESSION['user_logged'] == 'student') {
  
                      $query = "SELECT * from teme_proiecte where id_materie = ".$id_materie;
                    }
                  $loop = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_array($loop))
                  {
                        echo '<div class="continut-materie">
                                <p class="nume-tema"><b>Nume tema:</b> '.$row['nume_tema_proiect'].'</p>
                                <p class="descriere-tema"><b>Scurta descriere:</b> '.$row['scurta_descriere_tema_proiect'].'</p>
                                <p class="termen-limita"><b>Termen limita:</b>'.$row['termen_limita'].'</p>';
                                if($_SESSION['user_logged'] == 'student') {
                                  $check_tema_incarcata = "SELECT * FROM teme_proiecte_incarcate WHERE id_tema_proiect = ".$row['ID_tema_proiect']." AND id_student=".$_SESSION['id_utilizator'];
                                  $check_tema_incarcata_result = mysqli_query($conn, $check_tema_incarcata);
                                  if(mysqli_num_rows($check_tema_incarcata_result)) {
                                      echo 'Tema/Proiectul a fost incarcat.';
                                  } else {
                                        $curent_date = date('Y-m-d', time());
                                        if($curent_date < $row['termen_limita']) {
                                          echo 'Tema/Proiectul poate fi incarcat(a) pana la data limita la ora 23:59.Ulterior, incarcarea temei/proiectului nu mai poate fi realizata.</br>';
                                      echo '<a href="incarca_tema_proiect.php?id_materie='.$_GET['id_materie'].'&id_tema_proiect='.$row['ID_tema_proiect'].'">
                                        <button type="button" class="btn btn-primary">
                                          <i class="fa fa-fw fa-upload"></i> Incarca Tema/Proiect
                                        </button>
                                      </a>';  
                                        } else {
                                          echo 'Termenul limita a expirat. Nu se mai poate realiza incarcarea temei/proiectului';
                                        }
                                      }
                                    }
                        echo '</div>'; 
                  }
                       
                ?>
              </div>
            </div>
      </div>
    </div>
     
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('footer.php'); ?>
