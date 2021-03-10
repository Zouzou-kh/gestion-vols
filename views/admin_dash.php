<?php
session_start();
if (isset($_SESSION['username'])) {
    require_once '../includes/header.php';
    $sql = 'SELECT Id_r,Nom,Prenom, Username, Date_aller, Date_retour ,Lieu_depart, Lieu_arriver, libelle_c, libelle_g FROM reservation r
        INNER JOIN classe c ON r.Id_classe = c.Id
        INNER JOIN genre g ON r.Id_genre = g.Id
        INNER JOIN user u ON r.id_user = u.Id';
    $query = $connexion->prepare($sql);
    $query->execute();
    $reservation = $query->fetchAll(PDO::FETCH_OBJ);
} else {
    header('location:login.php');
}
?>
<!-- Model  -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Justifications</h5>
        <!-- <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color:dimgrey; color:white;" >X</button> -->
      </div>
      <div class="modal-body">
            <form action="" method="get">
                <div class="col mb-5 text-center">
                    <label for="" ></label>
                    <input type="text" name="justify" class="form-control" style="width:100%; height:70px;" placeholder="ecrire ici ...."/>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="btn btn-danger btn-close mr-3" data-bs-dismiss="modal" aria-label="Close">X</button>
                    <button type="submit" class="btn btn-primary" >Envoyer</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>
<!-- Fin Modal  -->
<div class="container-fluids mt-5">
    <div class="card m-3">
        <div class="card-header">
            <h2 class="text-center">Les Reservations</h2>
        </div>
        <div class="card-body">
            <table class="table">
            <thead>
                <tr>
                <th scope="col">Id_reservation</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Username</th>
                <th scope="col">Lieu_depart</th>
                <th scope="col">Lieu_arriver</th>
                <th scope="col">Date_aller</th>
                <th scope="col">Date_retour</th>
                <th scope="col">Genre</th>
                <th scope="col">Classe</th>
                <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                <?php foreach ($reservation as $reserver): ?>
                <th scope="row"><?=$reserver->Id_r?></th>
                <td><?=$reserver->Nom?></td>
                <td><?=$reserver->Prenom?></td>
                <td><?=$reserver->Username?></td>
                <td><?=$reserver->Lieu_depart?></td>
                <td><?=$reserver->Lieu_arriver?></td>
                <td><?=$reserver->Date_aller?></td>
                <td><?=$reserver->Date_retour?></td>
                <td><?=$reserver->libelle_g?></td>
                <td><?=$reserver->libelle_c?></td>
                <td>
                <form action="" method="GET">
                  <a href="<?=$reserver->Id_r?>" type="submit" name="submit" value="Accepter" class="btn btn-success btn-sm">Accepter</a>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Anuuler
                  </button>
                </form>
                </td>
                </tr>
                <?php endforeach;?>
            </tbody>
            </table>
        </div>
    </div>
</div>



<?php require_once '../includes/footer.php';?>
