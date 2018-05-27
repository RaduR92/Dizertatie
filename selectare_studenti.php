<?php 
    include('database_connection.php');
    $sel = "'".$_POST['an_studiu']."'";
    
    $query = "SELECT * from studenti where an_studiu = ". $sel;
    $loop = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($loop))
    {
          echo '<option value="'.$row['ID'].'">'.$row['nume']." " .$row['prenume'].'</option>';
    }                    

?>