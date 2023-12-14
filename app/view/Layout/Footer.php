<?php

use Tugas\core\Route; ?>



<script src="<?= BASEURL ?>/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASEURL ?>/assets/js/jquery.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?= BASEURL ?>/assets/js/dataTable.min.js"></script>


<?php if (Route::is("/dashboard")) : ?>
   <script>
      $(document).ready(function() {
         $('#tbldns').DataTable();
      });
   </script>
<?php endif; ?>
</body>

</html>