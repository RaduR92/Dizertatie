<?php 
    include('database_connection.php');
    $sel = "'".$_POST['specializare']."'";

    $query = "SELECT * from materii where specializare = ". $sel;
    $loop = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($loop))
    {
          echo '<option value="'.$row['ID'].'">'.$row['nume_materie'].'</option>';
    }                    
?>