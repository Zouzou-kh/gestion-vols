<?php require_once '../includes/header.php';?>
<?php
if (isset($_SESSION['username']) && $_SESSION['role'] == 0) {
    $id = $_SESSION['id'];
    if (isset($_POST['submit'])) {
        if (isset($_POST)
            && !empty($Lieu_depart = $_POST['Lieu_depart'])
            && !empty($Lieu_arriver = $_POST['Lieu_arriver'])
            && !empty($Date_aller = $_POST['Date_aller'])
            && !empty($Date_retour = $_POST['Date_retour'])
            && !empty($Genre = $_POST['Id_genre'])
            && !empty($Classe = $_POST['Id_classe'])
            // requette
        ) {
            $sql = 'INSERT INTO reservation (Date_aller, Date_retour, Lieu_depart, Lieu_arriver, Id_classe, Id_genre,id_user)
    VALUES (?,?,?,?,?,?,?)';
            $stmt = $connexion->prepare($sql)
                              ->execute([$Date_aller, $Date_retour, $Lieu_depart, $Lieu_arriver, $Classe, $Genre, $id]);
            $message = '<div class="alert alert-success">
        Resercation faite avec succés !
        </div> ';
        } else {
            $message = '<div class="alert alert-danger">
        Rservation  pas complete !
        </div> ';

        }
    }
} else {
    header('location:login.php');

}
?>
        <div class=" d-flex justify-content-center mt-5">
          <div
            class="card tab-pane fade show active"
            style="width: 30rem"
            id="nav-allerretour"
            role="tabpanel"
            aria-labelledby="nav-allerretour-tab"
          >
            <div class="card-header">
              <h2 class="text-center">Reservation</h2>
            </div>
            <div class="card-body">
              <?php if (!empty($message)): ?>
                <?=$message?>
              <?php endif;?>
              <form action="" method="POST">
                <div class="row mt-2">
                  <div class="col-md-6">
                    <label for="">De(ville ou pays)</label>
                    <input
                      type="text"
                      name="Lieu_depart"

                      class="form-control" required
                    />
                  </div>
                  <div class="col-md-6">
                    <label for="">A(ville ou pays)</label>
                    <input
                      type="text"
                      name="Lieu_arriver"

                      class="form-control" required
                    />
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-6">
                    <label for="">Date depart</label>
                    <input
                      type="date"
                      name="Date_aller"

                      class="form-control" required
                    />
                  </div>
                  <div class="col-md-6">
                    <label for="">Date Retour</label>
                    <input
                      type="date"
                      name="Date_retour"

                      class="form-control" required
                    />
                  </div>
                </div>
                <div class="row mt-2">
                <div class="col-md-6">
                    <label for="">Genre</label>
                    <select name="Id_genre"  class="form-control" required>
                      <option value="1">Homme</option>
                      <option value="2">Femme</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="">Classe</label>
                    <select name="Id_classe"  class="form-control" required>
                      <option value="1">business</option>
                      <option value="2">Economique</option>
                      <option value="3">Simple</option>
                    </select>
                  </div>
                </div>
                <div class="submit text-center mt-3">
                  <input
                    type="submit"
                    name="submit"
                    value="Reserver"
                    class="btn btn-primary"
                  />
                </div>
              </form>
            </div>
          </div>
        </div>
    <?php require_once '../includes/footer.php';?>
