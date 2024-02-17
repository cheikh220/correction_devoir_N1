<?php
require('../../actions/docteurs/editDocteursAction.php');
$service = true;
include_once "../../header.php";
require('../../Database/services_db.php');

$services = getAllServices();
/*$serv = getServiceOnedocteur($_GET['id']);*/
?>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Modifier Docteurs</h1>
        <?php if (isset($docteur)) : ?>
            <form class="row g-3" method="POST">
                <?php
                if (isset($errorMessage)) {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?= $errorMessage; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }
                ?>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Nom</label>
                    <input type="text" class="form-control" name="nom" value="<?= $nom; ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Prenom</label>
                    <input type="text" class="form-control" name="prenom" value="<?= $prenom; ?>">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Email</label>
                    <input type="Email" class="form-control" name="email" value="<?= $Email; ?>">
                </div>
                <div class="col-12">
                    <label for="inputAddress2" class="form-label">Addresse</label>
                    <input type="text" class="form-control" name="adresse" value="<?= $adresse; ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Telephone</label>
                    <input type="phone" class="form-control" name="tel" value="<?= $tel; ?>">
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Service</label>
                    <select id="inputState" class="form-select" name="service_id">
                        <option value="<?= $service_id; ?>" selected><?= $libelle; ?></option>
                        <?php while ($service = $services->fetch(PDO::FETCH_OBJ)) : ?>
                            <?php if( $libelle != $service->libelle ):?>
                            <option value="<?= $service->id ?>"><?= $service->libelle ?></option>
                            <?php endif?>
                        <?php endwhile ?>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="envoyer">Modifier</button>
                </div>
            </form>
        <?php endif ?>
    </div>
</main>

<?php
include_once "../../footer.php";
?>