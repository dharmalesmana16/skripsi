@extends('template.index')
@section('content')
<div class="viewmodal" style="display: none;"></div>

<div class="card-style ">
<h6 class="mb-10" id="root" >Data Device</h6>

    <a class="main-btn primary-btn btn-hover rounded-md createdevice btn-sm mb-20 fw-bold" href="/devices/new" role="button">Create New Data +</a>


        <div class="table-responsive ">
                    <table class="table-wrapper table-hover  devices">
                        <thead >
                            <tr class="" style="">
                                <th scope="" >NO</th>
                                <th scope="" >DEVICE NAME</th>
                                <th scope="" >BRAND</th>
                                <th scope="" >CONNECTIVITY</th>
                                <th scope="" >IP ADD</th>
                                <th scope="" >COORDINATE</th>
                                <th scope="" >STATUS</th>
                                <th scope="" >ACTION</th>
                            </tr>

                        </thead>
                        <tbody>
                        <?php
                        $no_device =1;
                        ?>
                        <?php foreach ($devices as $dataDevices) :
                              $status = $dataDevices['status'];
                              $datastatus = ['Active','Pending','Not Active'];
                              $datastatusindic = ['active-btn','warning-btn','danger-btn'];
                              if($status == "ACTIVE"){
                                  $status_indic = $datastatusindic[0];
                              }else{
                                    $status_indic = $datastatusindic[2];

                              }
                            ?>
                        <tr>
                        <td scope="col">
                        {{ $no_device++ }}

                        </td>
                        <td scope="col">
                           {{ $dataDevices["nama_device"] }}
                        </td>
                        <td scope="col">
                        {{ $dataDevices["brand_device"] }}
                        </td>


                        <td scope="col">
                            {{ $dataDevices["ipaddress"] }}
                        </td>
                        <td scope="col">
                            {{  $dataDevices["latitude"].",".$dataDevices["longitude"] }}
                        </td>
                        <td scope="min-width">
                            <span class="status-btn fw-bold {{ $status_indic }} ">{{ $status }}  </span>

                        </td>

                        <td scope="col">
                        <div class="d-flex">
                            <div class="action">
                                <button class="btn text-primary">
                                <a href="/devices/{{ $dataDevices['id'] }} /edit" >
                                    <i class="fa fa-wrench"></i>
                                </a>
                                </button>
                            </div>
                            <form action="/devices/show/{{ $dataDevices['meta']  }}" method="GET" class="d-inline btnshow">
                                <!-- <input type="hidden" name="_method" value="DELETE" > -->
                                <div class="actionshow">
                                    <button type="submit" class="btn text-success">
                                        <i class="lni lni-eye"></i>
                                    </button>
                                </div>
                            </form>
                            <form action="/devices/{{ $dataDevices['id'] }}" method="POST" class="d-inline deletedevice">
                            <input type="hidden" name="_method" value="DELETE" >
                                <div class="action">
                                    <button type="submit" class="btn text-danger">
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
                        <div class="text-end">

                        </div>

                </div>

    </div>

            <script>

 document.addEventListener('DOMContentLoaded', function () {
                let table = new DataTable('.devices');
            });
            $('.createdevice').click(function(){
                window.location = '/devices/new'
            })

        $('.btnshow').submit(function(e){
            e.preventDefault();
            var ids = $(this).data('meta')
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: {id:ids},
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    $('.viewmodal').html(response.data).show();
                    $('#device_detail').modal('show');
                },
                error: function(xhr,ajaxOptions,thrownError){
                    alert(xhr.status + xhr.responseText + thrownError);
                }
            });
        })
  $('.deletedevice').submit(function(e){
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
                  beforeSend: function() {
                    Swal.fire({
                title: 'Please Wait !',
                // html: '',// add html attribute if you want or remove
                allowOutsideClick: false,
                showCancelButton: false,
                showConfirmButton: false,

                onBeforeOpen: () => {
                    Swal.showLoading()
                },
            });                },
                  success: function() {
                  Swal.fire({
                  icon: 'success',
                  title: 'Remove Device is Successfully !',
                  showConfirmButton: false
                    });
                    setTimeout(function(){// wait for 1 secs(2)
                          location.reload(); // then reload the page.(3)
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


@endsection()
