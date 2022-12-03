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
                                <th scope="" >FIRST NAME</th>
                                <th scope="" >LAST NAME</th>
                                <th scope="" >USERNAME</th>
                                <th scope="" >EMAIL</th>
                                <th scope="" >HANDPHONE</th>
                                <th scope="" >ROLE</th>
                                <th scope="" >STATUS</th>
                                <th scope="" >ACTION</th>
                            </tr>

                        </thead>
                      <tbody>
                        <?php
                        $no_device =1;
                        ?>
                        <?php foreach ($dataUser as $dataUsers) :
                            $status = $dataUsers['status'];
                            $role = $dataUsers['role'];
                            $datastatus = ['Active','Pending','Not Active'];
                            $datastatusindic = ['active-btn','warning-btn','danger-btn'];
                            $status_akhir = "-";
                            $status_indic = "";
                            if($status == ""){

                                $status_akhir = $datastatus[1];
                                $status_indic = $datastatusindic[1];
                            }else if ($status == $datastatus[2]){
                                $status_akhir = $datastatus[2];
                                $status_indic = $datastatusindic[2];

                            }
                            if($role != "-"){
                                $status_akhir = $datastatus[0];
                                $status_indic = $datastatusindic[0];
                            }
                            ?>
                            
                        <tr>
                        <td scope="min-width">
                        <?= $no_device++; ?>
                
                        </td>
                        <td scope="min-width">
                           <?= $dataUsers["nama_depan"]; ?>
                        </td>
                        <td scope="min-width">
                        <?= $dataUsers["nama_belakang"]; ?>
                        </td>
                        <td scope="min-width">
                           <?= $dataUsers["username"]; ?>
                        </td>
                        <td scope="min-width">
                           <?= $dataUsers["email"]; ?>
                        </td>
                        <td scope="min-width">
                           <?= $dataUsers["nohp"]; ?>
                        </td>
                        <td scope="min-width">
                           <?= $dataUsers["role"]; ?>
                        </td>
                        <td scope="min-width">
                            <span class="status-btn fw-bold <?= $status_indic?>"><?= $status_akhir ?></span>

                        </td>
                        <td scope="col">
                        <div class="d-flex">
                            <div class="action">
                                <button class="btn btn-md text-primary">
                                <a href="/user/<?= $dataUsers['id'] ?>/edit" >
                                    <i class="fa fa-wrench"></i>
                                </a>
                                </button>
                            </div>                         
                                <form action="/user/<?= $dataUsers['id']; ?>" method="POST" class="d-inline deleteuser">
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