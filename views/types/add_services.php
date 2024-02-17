<?php
  require('../../actions/services/createActionService.php');
      $service = true;
    include_once "../../header.php"
?>

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Nouveau services</h1>
    <form class="row g-3" method="POST" >
      <?php
        if(isset($errorMessage)){
          ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <?= $errorMessage; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php
        }
      ?>
      <div class="col-md-6">
        <label  class="form-label">Libelle du service</label>
        <input type="text" class="form-control" name="libelle">
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