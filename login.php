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
          <button id="conectare" name="singlebutconectareton" value="1" class="btn btn-primary">Conectare</button>
        </form>
        <div class="text-center">

          <a class="d-block small" href="forgot-password.php">Ai uitat parola?</a>
        </div>

        <?php 
           if ($_POST['email_adresa'] != "" && $_POST['parola_conectare'] != '') {
 
            // preia datele din formular
            $mail = $_POST['email_adresa'];
            $parola = base64_encode($_POST['parola_conectare']);
         
            // formeaza si executa query-ul de select din baza de date
            $query = "SELECT * FROM profesori, studenti WHERE mail='".$mail."' AND parola='".$parola."'";
            $result = mysqli_query($conn, $query) or die ( "Error : ". mysqli_error($conn) );
            echo $query;
            print_r($result);
         
            // verifica daca interogarea MySQL a gasit date valide
            if ($result || mysql_num_rows($result) < 1) {
                // daca nu, afiseaza un mesaj de eroare
                echo "Datele introduse sunt incorecte<br>";
            } else {
            
                // salveaza username-ul si parola in sesiune
                $_SESSION['mail'] = $mail;
                $_SESSION['parola'] = $parola;
         
                // afiseaza un mesaj de succes        
                echo "Autentificarea a fost efectuata cu succes.";
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
