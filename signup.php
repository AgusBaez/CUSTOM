<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Te has registrado correctamente';
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro | CUSTOM</title>
    <link rel="stylesheet" href="assets/css/register.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600" rel="stylesheet">
  </head>
  <body>

    <div class="login-box">
    
      <img src="assets/images/CUSTOM.ico" class="avatar" alt="Avatar Image">
      <h1>Registrarme</h1>
      <form action="signup.php" method="POST">
      <input name="email" type="text" placeholder="Enter your email">
      <input name="password" type="password" placeholder="Enter your Password">
      <input name="confirm_password" type="password" placeholder="Confirm Password">
      <input type="submit" value="Registrarme">
    </form>

        <?php if (!empty($message)): ?>
          <p> <?= $message ?> </p>
        <?php endif; ?>

        <a href="login.php">¿Ya tienes una cuenta?</a><br>
        <a href="index.php">Volver</a>
      </form>
    </div>
  </body>
</html>
