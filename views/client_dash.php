<?php
session_start();
if (isset($_SESSION['username'])) {
    $id = $_SESSION['id'];
    require_once '../includes/header.php';

    $sql = 'SELECT Id_r,Nom,Prenom, Username, Date_aller, Date_retour ,Lieu_depart, Lieu_arriver, libelle_c, libelle_g FROM reservation r
        INNER JOIN classe c ON r.Id_classe = c.Id
        INNER JOIN genre g ON r.Id_genre = g.Id
        INNER JOIN user u ON r.Id_user = u.Id WHERE r.id_user = ?';
    $query = $connexion->prepare($sql);
    $query->execute([$id]);
    $reservation = $query->fetchAll(PDO::FETCH_OBJ);
} else {
    header('location:login.php');
}
?>

<div class="container-fluids mt-5">
    <div class="card m-3">
        <div class="card-header">
            <h2 class="text-center">Mes Reservation</h2>
        </div>
        <div class="card-body">
            <table class="table">
            <thead>
                <tr>
                <th scope="col">Id_reservation</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Email</th>
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
                  <a href="<?=$reserver->Id_r?>" type="submit" name="submit" value="Rejeter" class="btn btn-danger btn-sm">Annuler</a>
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
