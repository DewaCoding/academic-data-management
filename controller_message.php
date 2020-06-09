<?php
  include_once ("koneksi_db.php");
  
  if (isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Insert user into table
    $result = mysqli_query($connection, "INSERT INTO contact_me(name,email,phone,message) VALUES('$name','$email','$phone','$message')");

    // Show message when user added succesfully
    echo '<div class="alert alert-primary" role="alert"> Pesan Anda sudah terkirim!
    </div>';
    header("Location: index.php");
    }
?>