<?php
require_once '../database/DB.php';
$message = '';
if (isset($_POST['submit'])) {
    if (isset($_POST) &&
        !empty($_POST['Username']) && !empty($_POST['Password'])
        && !empty($_POST['Nom']) && !empty($_POST['Prenom'])
        && !empty($_POST['Adresse']) && !empty($_POST['Tel'])
    ) {
        $nom      = $_POST['Nom'];
        $prenom   = $_POST['Prenom'];
        $adresse  = $_POST['Adresse'];
        $tel      = $_POST['Tel'];
        $username = $_POST['Username'];
        $password = sha1($_POST['Password']);
        $sql      = 'INSERT INTO user (Username,Password,Nom,Prenom,Adresse,Tel) VALUES (?,?,?,?,?,?)';
        $stmt     = $connexion->prepare($sql)
                              ->execute([$username, $password, $nom, $prenom, $adresse, $tel]);
        $message = '<div class="alert alert-success">
        Enregistere avec success !
        </div> ';
    } else {
        $message =
            '<div class="alert alert-danger">
        Enregisterement Echouee veuillez réessayer !
        </div> ';
    }
}

?>
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
    <div class="container mt-2">
      <div>
        <a href="index.php" class="btn btn-info"
          ><i class="fas fa-angle-left"></i>Retour</a
        >
      </div>
      <div class="text-center mt-3 mb-2">
        <h1 class="">S'inscription</h1>
      </div>
      <div class="card mx-auto" style="width: 30rem">
        <div class="card-header">
          <div class="title">
            <h3>Register</h3>
          </div>
        </div>
        <?php if (!empty($message)): ?>
          <?=$message?>
        <?php endif;?>
        <div class="card-body">
          <form action="" method="post" class="mt-2 mb-2">
            <div class="row">
              <div class="col-md-6">
                <label for="">Nom</label>
                <input
                  type="text"
                  name="Nom"
                  class="form-control"
                  placeholder="votre Nom"
                  required
                />
              </div>
              <div class="col-md-6">
                <label for="">Prenom</label>
                <input
                  type="text"
                  name="Prenom"
                  class="form-control"
                  placeholder="votre Prenom"
                  required
                />
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="">Adresse</label>
                <input
                  type="text"
                  name="Adresse"
                  class="form-control"
                  placeholder="votre Adresse"
                  required
                />
              </div>
              <div class="col-md-6">
                <label for="">Telephone</label>
                <input
                  type="number"
                  name="Tel"
                  class="form-control"
                  placeholder="votre Numero Telephone"
                  required
                />
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="">Username</label>
                <input
                  type="text"
                  name="Username"
                  class="form-control"
                  placeholder="votre Pseudo" required
                />
              </div>
              <div class="col-md-6">
                <label for="">password</label>
                <input
                  type="password"
                  name="Password"
                  class="form-control"
                  placeholder="votre Mot de passe"
                  required
                />
              </div>
            </div>
            <div class="text-center m-3">
              <input
                type="submit"
                value="Valider"
                name="submit"
                class="btn btn-success btn-lg"
              />
            </div>
          </form>
        </div>
        <div class="d-flex justify-content-center mt-2 mb-3">
          <span
            >vous avez deja un compte ?
            <a href="login.php" style="text-decoration: none">
              Se connecter
            </a>
            </span>
        </div>
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
