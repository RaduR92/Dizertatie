  <?php include('header.php'); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="container-fluid">
        <?php if($_SESSION['user_logged'] == 'student') { ?>
        <div class="row">
          <div class="col-md-12">
            <div class="page-header">
              <h2>Materii Studiate</h2>      
            </div>
          </div>
        </div>  
        <?php } ?>  
        <?php if($_SESSION['user_logged'] == 'admin') { ?>
          <div class="row">
            <div class="col-md-12 content">
                <!-- Nav pills -->
                <ul class="nav nav-pills" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#studenti">Studenti</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#profesori">Profesori</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#materii">Materii</a>
                  </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div id="studenti" class="container tab-pane active"><br>
                    <h3> Tabel Studenti </h3>

                    <table class="table">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nume</th>
                          <th>Prenume</th>
                          <th>Numar Matricol</th>
                          <th>E-mail</th>
                          <th>An Studiu</th>
                          <th>Specializare</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $query_studenti = "SELECT * from studenti";
                        $loop = mysqli_query($conn, $query_studenti);
                        while ($row = mysqli_fetch_array($loop))
                        {
                              $an_studiu = ucwords(str_replace('_', ' ', $row['an_studiu']));
                              $specializare = strtoupper(str_replace('_', ' ', $row['specializare']));
                              echo '<tr>
                                      <td>'.$row['ID'].'</td>
                                      <td>'.$row['nume'].'</td>
                                      <td>'.$row['prenume'].'</td>
                                      <td>'.$row['numar_matricol'].'</td>
                                      <td>'.$row['mail'].'</td>
                                      <td>'.$an_studiu.'</td>
                                      <td>'.$specializare.'</td>
                                    </tr>';
                        }                     
                      ?>
                      </tbody>
                    </table>
                  </div>
                  <div id="profesori" class="container tab-pane fade"><br>
                    <h3> Tabel Profesori </h3>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nume</th>
                          <th>Prenume</th>
                          <th>E-mail</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $query_profesori = "SELECT * from profesori";
                        $loop = mysqli_query($conn, $query_profesori);
                        while ($row = mysqli_fetch_array($loop))
                        {
                            
                              echo '<tr>
                                      <td>'.$row['ID'].'</td>
                                      <td>'.$row['nume_profesor'].'</td>
                                      <td>'.$row['prenume_profesor'].'</td>
                                      <td>'.$row['mail'].'</td>
                                    </tr>';
                        }                     
                      ?>
                      </tbody>
                    </table>
                  </div>
                  <div id="materii" class="container tab-pane fade"><br>
                    <h3> Tabel Materii </h3>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nume Materie</th>
                          <th>Specializare</th>
                          <th>Profesor Coordonator</th>
                          <th>An Studiu</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $query_materii = "SELECT * FROM materii INNER JOIN profesori ON materii.profesor_coordonator = profesori.ID";
                        $loop = mysqli_query($conn, $query_materii);
                        while ($row = mysqli_fetch_array($loop))
                        {
                              $an_studiu = ucwords(str_replace('_', ' ', $row['an_studiu']));
                              $specializare = strtoupper(str_replace('_', ' ', $row['specializare']));
                              echo '<tr>
                                      <td>'.$row['ID'].'</td>
                                      <td>'.$row['nume_materie'].'</td>
                                      <td>'.$specializare.'</td>
                                      <td>'.$row['nume_profesor'].' '.$row['prenume_profesor'].'</td>
                                      <td>'.$an_studiu.'</td>
                                    </tr>';
                        }                     
                      ?>
                      </tbody>
                    </table>                
                  </div>
                </div>
          </div>
        <?php    
          }
        ?>

        <?php 
          
          if($_SESSION['user_logged'] == 'student') { ?>
           <div class="row">
          <?php
            $query = 'SELECT materii.ID, materii.nume_materie FROM inscriere_studenti RIGHT JOIN materii ON inscriere_studenti.id_materie = materii.ID WHERE inscriere_studenti.id_student ='.$_SESSION['id_utilizator'];
            $loop = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($loop))
            {
                  echo '<div class="col-md-3 text-center">
                          <a  class="materie-studiata" href="materie.php?id_materie='.$row['ID'].'">'.$row['nume_materie'].'</a>
                        </div>';
            }  
          ?>
          </div>
          <?php } ?>
          <?php
          if($_SESSION['user_logged'] == 'profesor') { ?>
           <div class="row">
          <?php
            $query = 'SELECT materii.ID, materii.nume_materie FROM materii  WHERE profesor_coordonator ='.$_SESSION['id_utilizator'];
            $loop = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($loop))
            {
                  echo '<div class="col-md-3 text-center">
                          <a  class="materie-studiata" href="materie.php?id_materie='.$row['ID'].'">'.$row['nume_materie'].'</a>
                        </div>';
            }  
          ?>
          </div>
          <?php } ?>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('footer.php'); ?>
