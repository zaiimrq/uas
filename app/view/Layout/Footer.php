<?php

use Tugas\core\Flasher;
use Tugas\core\Route; ?>



<script src="<?= BASEURL ?>/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASEURL ?>/assets/js/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- DataTables JavaScript -->
<script src="<?= BASEURL ?>/assets/js/dataTable.min.js"></script>
<script src="<?= BASEURL ?>/assets/js/sweetalert2.all.min.js"></script>


<?php if (Route::is("/dashboard")) : ?>
   <script>
      $(document).ready(function() {
         $('#tbldns').DataTable();
      });
   </script>
<?php endif; ?>
<?php if (Route::is("/dashboard/lihat")) : ?>
   <?php Flasher::flash() ?? false ?>

   <script>
      $(function() {
         $(".btnupdate").click(function() {
            const npm = $(this).data('npm')
            const mk = $(this).data('mk')
            const url = "<?= BASEURL ?>/dashboard/lihat/update?npm=" + npm + "&mk=" + mk

            fetch(url)
               .then(res => res.json())
               .then(data => {
                  $('#updatemodal').click()

                  $(".modal-body form").attr("action", url)
                  $("input#kode_mk").val(data.kode_mk)
                  $("input#nama_mk").val(data.nama_mk)
                  $("input#sks").val(data.sks)
                  $("select.option-modal").val(data.nilai)
               })
         })
      })
   </script>

   <script>
      $(function() {
         $("a.btndelete").click(function() {
            const npm = $(this).data('npm')
            const mk = $(this).data('mk')

            Swal.fire({
               title: "Apakah anda yakin?",
               text: "Anda akan menghapus data ini!",
               icon: "warning",
               showCancelButton: false,
               confirmButtonColor: "#3085d6",
               cancelButtonColor: "#d33",
               confirmButtonText: "Ya Hapus"
            }).then((result) => {
               if (result.isConfirmed) {

                  let url = "<?= BASEURL ?>/dashboard/lihat/delete?npm=" + npm + "&mk=" + mk

                  fetch(url)
                     .then(res => {
                        if (res.ok) {
                           Swal.fire({
                              title: "Berhasil!",
                              text: "Data telah dihapus.",
                              icon: "success"
                           }).then((result) => {
                              if (result.isConfirmed) {
                                 location.reload()
                              }
                           })
                        }
                     })
               }
            });
         })
      })
   </script>
<?php endif; ?>
</body>

</html>