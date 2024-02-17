<?php
require("../../actions/voitures/createvoituresAction.php");
$docteur = true;
include_once '../../header.php';
require('../../Database/marques_db.php');
require('../../Database/types_db.php');

$marques = getAllMarques();
$types = getAllTypes();
?>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Nouveau voitures</h1>
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
                <label for="inputEmail4" class="form-label">designation</label>
                <input type="text" class="form-control" name="designation">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">annee</label>
                <input type="text" class="form-control" name="annee">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">numero chassis</label>
                <input type="number" class="form-control" name="chassis">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Kilometrage</label>
                <input type="number" class="form-control" name="kilometrage">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Marque</label>
                <select id="inputState" class="form-select" name="marque_id">
                    <option value="0" selected>Selectionner...</option>
                    <?php while ($marque = $marques->fetch(PDO::FETCH_OBJ)) : ?>
                        <option value="<?= $marque->id ?>"><?= $marque->designation ?></option>
                    <?php endwhile ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Type</label>
                <select id="inputState" class="form-select" name="type_id">
                    <option value="0" selected>Selectionner...</option>
                    <?php while ($type = $types->fetch(PDO::FETCH_OBJ)) : ?>
                        <option value="<?= $type->id ?>"><?= $type->designation ?></option>
                    <?php endwhile ?>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="envoyer">Creer</button>
            </div>
        </form>
    </div>
</main>

<?php
include_once "../../footer.php";
?>