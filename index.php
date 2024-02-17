<?php
require("actions/index/rechercheDocteursAction.php");

$acceuil = true;
include_once "header.php";
?>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Bienvenue en L2 IAGE</h1>
        <form class="row g-3" method="post">
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">Service-Docteurs</label>
                <input type="text" class="form-control" id="inputPassword2" placeholder="Services" name="libelle">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3" name="recherche">Rechercher</button>
            </div>
        </form>

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

        <?php if (isset($resultat)) : ?>
            <?php while ($result = $resultat->fetch(PDO::FETCH_OBJ)) : ?>
                <div class="card" style="width: 25rem; display: inline-block; margin-left: 15px; margin-top: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">Information Docteur</h5>
                        <ul class="card-text">
                            <li><strong>nom:</strong> <?= $result->nom ?></li>
                            <li><strong>adresse:</strong> <?= $result->email ?></li>
                            <li><strong>service:</strong> <?= $result->libelle ?></li>
                        </ul>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#voirDetailModal<?= $result->id ?>">
                            Voir détails
                        </button>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="voirDetailModal<?= $result->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Details sur docteur</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <ul>
                                    <li><strong>nom:</strong> <?= $result->nom ?></li>
                                    <li><strong>prenom:</strong> <?= $result->prenom ?></li>
                                    <li><strong>email:</strong> <?= $result->email ?></li>
                                    <li><strong>adresse:</strong> <?= $result->adresse ?></li>
                                    <li><strong>telephone:</strong> <?= $result->tel ?></li>
                                    <li><strong>service:</strong> <?= $result->libelle ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</main>

<?php
include_once "footer.php";
?>
