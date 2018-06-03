<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Campus UPT</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <?php include('database_connection.php'); ?>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Conectare</div>
      <div class="card-body">
        <form action="login.php" method="POST">
          <div class="form-group">
            <label for="email_adresa">Adresa e-mail</label>
            <input class="form-control" id="email_adresa" name="email_adresa" type="email" aria-describedby="emailHelp" placeholder="introdu adresa de e-mail">
          </div>
          <div class="form-group">
            <label for="parola_conectare">Parola</label>
            <input class="form-control" id="parola_conectare" name="parola_conectare" type="password" placeholder="Introdu parola">
          </div>
          <div class="form-group">
            <label class="control-label" for="tip_utilizator">Student/Profesor</label>
            <select id="tip_utilizator" name="tip_utilizator" class="form-control">
              <option value="-">-Alege-</option>
              <option value="student">Student</option>
              <option value="profesor">Profesor</option>
            </select>
          </div>
          <button id="conectare" name="singlebutconectareton" value="1" class="btn btn-primary">Conectare</button>
        </form>
        <div class="text-center">

          <a class="d-block small" href="forgot-password.php">Ai uitat parola?</a>
        </div>

        <?php 
          session_start();
        
          if (isset($_POST['email_adresa']) != "" && $_POST['parola_conectare'] != '') {

          // preia datele din formular
          $mail = $_POST['email_adresa'];
          $parola = base64_encode($_POST['parola_conectare']);
          if($_POST['tip_utilizator'] && $_POST['tip_utilizator'] == 'student' ){
        
          // formeaza si executa query-ul de select din baza de date
          $query = "SELECT * FROM studenti WHERE mail='".$mail."' AND parola='".$parola."'";

          $result = mysqli_query($conn, $query) or die ( "Error : ". mysqli_error($conn) );

          // verifica daca interogarea MySQL a gasit date valide
          if (mysqli_num_rows($result) == 1) {
            $_SESSION['mail'] = $mail;
            $_SESSION['parola'] = $parola;
      
            // afiseaza un mesaj de succes        
            echo "Autentificarea a fost efectuata cu succes.";
            $_SESSION['user_logged'] = 'student';

            while ($row = $result->fetch_assoc())
                {    
                     $_SESSION['id_utilizator'] = $row['ID'];
                     $_SESSION['nume_utilizator'] = $row['nume'].' '.$row['prenume'];
                     $_SESSION['an_studiu'] = $row['an_studiu'];
                     $_SESSION['specializare'] = $row['specializare'];
                }

           header("Location:index.php");
            
          } else {
          
                // daca nu, afiseaza un mesaj de eroare
                echo "Datele introduse sunt incorecte<br>";
              
          }

          } elseif($_POST['tip_utilizator'] && $_POST['tip_utilizator'] == 'profesor' ) {
            $query = "SELECT * FROM profesori WHERE mail='".$mail."' AND parola='".$parola."'";
            echo $query;
            $result = mysqli_query($conn, $query);
            
            // verifica daca interogarea MySQL a gasit date valide
            if (mysqli_num_rows($result) == 1) {
            
                // salveaza username-ul si parola in sesiune
                $_SESSION['mail'] = $mail;
                $_SESSION['parola'] = $parola;
                while ($row = $result->fetch_assoc())
                {
                     $_SESSION['id_utilizator'] = $row['ID'];
                     $_SESSION['nume_utilizator'] = $row['nume_profesor'].' '.$row['prenume_profesor'];
                }
                $_SESSION['user_logged'] = 'profesor';
                header("Location:index.php");
          
                // afiseaza un mesaj de succes        
                echo "Autentificarea a fost efectuata cu succes.";

                  } else {
                    
                   // daca nu, afiseaza un mesaj de eroare
                   echo "Datele introduse sunt incorecte<br>";
           }
          } else {
            print_r($_POST);
            if(isset($_POST['email_adresa']) && ($_POST['email_adresa'] == 'admin@uptclassroom.ro')) {
              echo 'altceva';
              if(base64_encode($_POST['parola_conectare']) == base64_encode('admin_2018') ){
                echo 'ceva';
                $_SESSION['mail'] = $mail;
                $_SESSION['parola'] = $parola;
                $_SESSION['nume_utilizator'] = 'Administrator';
                $_SESSION['user_logged'] = 'admin';
                header("Location:index.php");
              }
            }
          }
        }
        ?>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
