<?= $this->extend('template/index')    ?>


<?= $this->section('content') ;?>
                <div class="card-style ">
                  <h6 class="mb-10" id="root" >Data User</h6>
                  <a class="main-btn primary-btn btn-hover text-white btn-sm mb-20 rounded-md fw-bold " href="/user/new" role="button">Create New User + </a>
                  <div class="table-responsive">
                    <table class="table-wrapper  table-hover  users">
                    <thead >
                            <tr class="" style="">
                                <th scope="" >NO</th>
                                <th scope="" >AKSI</th>
                                <th scope="" >JENIS KERUSAKAN</th>
                                <th scope="" >JENIS PENANGANAN</th>
                                <th scope="" >NAMA STAFF</th>
                                <th scope="" >GAMBAR SEBELUM PERBAIKAN</th>
                                <th scope="" >GAMBAR SESUDAH PERBAIKAN</th>
                                <th scope="" >DATE & TIME</th>
                            </tr>

                        </thead>
                      <tbody>
                        <?php 
                        $no =1;
                        
                        foreach ($dataMaintenance as $res) :
                     
                            ?>
                            
                        <tr>
                        <td scope="min-width">
                        <?= $no++; ?>
                
                        </td>
                        <td scope="min-width">
                           <?= $res["action"]; ?>
                        </td>
                        <td scope="min-width">
                        <?= $res["jenis_kerusakan"]; ?>
                        </td>
                       
                        <td scope="min-width">
                           <?= $res["jenis_penanganan"]; ?>
                        </td>
                        <td scope="min-width">
                           <?= $res["created_at"]; ?>
                        </td>
                     
                        <td scope="col">
                        <div class="d-flex">
                            <div class="action">
                                <button class="btn btn-md text-primary">
                                <a href="/maintenance/<?= $res['id'] ?>/edit" >
                                    <i class="fa fa-wrench"></i>
                                </a>
                                </button>
                            </div>                         
                                <form action="/maintenance/<?= $res['id']; ?>" method="POST" class="d-inline deleteuser">
                                <input type="hidden" name="_method" value="DELETE">
                                    <div class="action">
                                        <button type="submit" class="btn btn-sm text-danger">
                                            <i class="lni lni-trash-can"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                    </table>

                    <!-- end table -->
                  </div>
                </div>
                <!-- end card -->
              <!-- end col -->
            <script>
 document.addEventListener('DOMContentLoaded', function () {
                let table = new DataTable('.users');
            });

  $('.deleteuser').submit(function(e){
          e.preventDefault();
          var id =  $(this).data('id');
        
          Swal.fire({
          title: 'Apakah Anda Yakin ?',
          text: "Anda tidak bisa Mengulangi data ini lagi !",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Hapus Data',
          closeOnConfirm: false,

          closeOnCancel: false
          }).then((result) => {
          if (result.isConfirmed) {
              $.ajax({
                  type: 'DELETE',
                  url: $(this).attr('action'),
                  data: {id:id},
                  success: function() {
                  Swal.fire({
                  icon: 'success',
                  title: 'Data User Berhasil Dihapus !',
                  showConfirmButton: false
                    });                                               
                    setTimeout(function(){// wait for 1 secs(2)
                          window.location = '/user'// then reload the page.(3)
                      }, 1000); 
                  }
              });
              
          }else{
              Swal.fire(
              'Cancelled',
              '',
              'error'
              )
          }
          })
      })
</script>
                
    
<?= $this->endSection() ;?>