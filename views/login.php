<?php
session_start();
require_once '../database/DB.php';
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        echo 'erruer de connexion';
    } else {
        $_SESSION['username'] = $_POST['username'];
        $username             = $_POST['username'];
        $password             = sha1($_POST['password']);
        $sql                  = 'SELECT * FROM user WHERE username=? AND password=?';
        $stmt                 = $connexion->prepare($sql);
        $stmt->execute([$username, $password]);
        if ($user = $stmt->fetch()) {
            $_SESSION['is_connected'] = true;
            header('Location:admin_dash.php');
        } else {
            echo 'Error de Connexion';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/bootstrap-min.css" />
    <link rel="stylesheet" href="../css/all.css" />
    <link rel="stylesheet" href="../css/solid.min.css" />
    <link rel="stylesheet" href="../css/all.min.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="container mt-5">
      <div>
        <a href="index.php" class="btn btn-info"><i class="fas fa-angle-left"></i>Retour</a>
      </div>
      <div class="text-center mt-5 mb-5">
        <h1 class="">S'identifier</h1>
      </div>
      <div class="card mx-auto" style="width: 20rem">
        <div class="card-header">
          <div class="title">
            <h3>Login</h3>
          </div>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="col-md">
              <label for="">Username</label>
              <input type="text" name="username" id="" class="form-control" />
            </div>
            <div class="col">
              <label for="">Password</label>
              <input type="password" name="password" id="" class="form-control" />
            </div>
            <div class="text-center m-3">
              <input
                type="submit"
                value="Valider"
                name="submit"
                class="btn btn-success"
              />
            </div>
          </form>
        </div>
        <span>vous n'avez pas de compte?<a href="#">s'identifier</a></span>
      </div>
    </div>
  </body>
  <script src="./js/bootstrap.js"></script>
  <script src="./js/bootstrap-min.js"></script>
  <script src="../js/all.js"></script>
  <script src="../js/all.min.js"></script>
  <script src="../js/solid.js"></script>
  <script src="../js/solid.min.js"></script>
</html>
