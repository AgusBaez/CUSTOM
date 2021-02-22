<?php

session_start();

if (isset($_SESSION['user_id'])) {
  header('Location: /CUSTOM/shop.php');
}
require 'database.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $records = $conn->prepare("SELECT id, email, password, tipo_user FROM users WHERE email = :email");
  $records->bindParam(':email', $_POST['email']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
    $_SESSION['user_id'] = $results['id'];
    header("Location: /CUSTOM/shop.php");
  } else {
    $message = 'Intentalo de nuevo, las credenciales no coincide';
  }
}

?> 

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Baez Agustin">
    <meta name="description" content="CUSTOM es una tienda online en la cual podras ver ofertas y distintos tipos de ropa para poder comprar">
    <title>Logeate | CUSTOM</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <!-- Google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600" rel="stylesheet">

        <!-- Style -->
      <link rel="stylesheet" href="assets/css/login.css">

  </head>
  <body>
    <div class="login-box">
      <img src="assets/images/CUSTOM.ICO" class="avatar" alt="Avatar Image">
      
      <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
      <?php endif; ?>
      
      <h1>Inicia Sesion</h1>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <label for="email">Email</label>
      <input name="email" type="text" placeholder="Escribe aqui tu mail">
      <label for="password">Contraseña</label>
      <input name="password" type="password" placeholder="Escribe aqui tu Contraseña">
      <input type="submit" value="Ingresar">
      <a href="#">Olvidaste tu Contraseña?</a><br>
        <a href="signup.php">No tienes una cuenta?</a><br>
        <a href="index.php">Volver</a>
    </form>
    </div>
  </body>
</html>
