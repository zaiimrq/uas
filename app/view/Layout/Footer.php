<?php

use Tugas\core\Route; ?>



<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
<script src="<?= BASEURL ?>/assets/js/bootstrap.bundle.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
<script src="<?= BASEURL ?>/assets/js/jquery.min.js"></script>

<!-- DataTables JavaScript -->
<!-- <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script> -->
<script src="<?= BASEURL ?>/assets/js/dataTable.min.js"></script>


<?php if (Route::is("/dashboard")) : ?>
   <script>
      $(document).ready(function() {
         $('#tbldns').DataTable();
      });
   </script>
<?php endif; ?>
<?php if (Route::is('/dashboard/input')) : ?>

   <script>
      $(function() {
         let nilai = $()

         console.log(nilai);
      })
   </script>
<?php endif; ?>
</body>

</html>