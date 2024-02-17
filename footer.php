
<footer class="footer mt-auto py-3 bg-body-tertiary">
  <div class="container">
    <span class="text-body-secondary">Droit D'auteur L2-IAGE-NR</span>
  </div>
</footer>
<!-- <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/DataTables/datatables.min.js"></script>
<script>
    $(document).ready( function () {
      $('#myDataTable').DataTable({
        "oLanguage":{
          "sSearch":"Rechercher",
          "sLengthMenu": "Afficher _MENU_Lignes page",
          "sInfo":"Affichage de _START_ a _END_ sur _TOTAL_ enregistrement",
          "oPaginate":{
            "sNext":"Suivant",
            "sPrevious":"Precedent",
          }
        }
      });
  } );
</script>
    </body>
</html>