<?php
include 'model/connexion.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public\css\style1.css" />
    <title>Admin Panel</title>
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
</head>
<body>
    <div class="login-form">
      <h2>ADMIN</h2>
      <form method="POST">
        <div class="input-field">
        <i class='bx bx-user-circle'></i>
          <input type="text" placeholder="Admin name" name="adminname">
        </div>

        <div class="input-field">
        <i class='bx bxs-lock-alt'></i>
        <input type="password" placeholder="Password" name="adminpassword">
        </div>

        <button type="submit" name="login">Log in</button>
        
      </form>
    </div>
    <?php
    if(isset($_POST['login'])){
      $sql = "SELECT * FROM admin_login WHERE admin_name = :adminname AND admin_password = :adminpassword";
      $req = $cnx->prepare($sql);
      $req->execute(array(
        'adminname' => $_POST['adminname'],
        'adminpassword' => md5($_POST['adminpassword']) // Utiliser md5 sur le mot de passe entré par l'utilisateur
    ));
      if($req->rowCount() == 1){
        header('location:dashboard.php');
      }else{
        echo"<script>alert('veuillez mettre le bon code');</script>";
      }

    }


   
    
    ?>
</body>
</html>
