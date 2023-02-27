@extends('template.index')
@section('content')

<div class="card-style ">
    <h6 class="mb-10" id="root">Data Maintenance</h6>
    <a class="main-btn primary-btn btn-hover text-white btn-sm mb-20 rounded-md fw-bold " href="{{ url('/maintenance/new') }}"
        role="button">Create New Data Maintenance + </a>
    <div class="table-responsive">
        <table class="table-wrapper  table-hover  maintenances">
            <thead>
                <tr class="" style="">
                    <th scope="">NO</th>
                    <th scope="">JENIS PERBAIKAN</th>
                    <th scope="">ACTION</th>
                    <th scope="">KOMPONEN</th>
                    <th scope="">BIAYA KELUAR</th>
                    <th scope="">USER ACTION</th>
                    <th scope="">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        $no_device =1;
                        ?>
                <?php foreach ($maintenances as $dataMaintenances) :
                            // $indic1 = "active-btn";
                            // $indic2 = "warning-btn";
                            // $indic3 = "";

                            // if($status == "ACTIVE"){
                            //     $indic1 = "active-btn"
                            // }
                            ?>

                <tr>
                    <td scope="min-width">
                        <?= $no_device++; ?>

                    </td>
                    <td scope="min-width">
                        <?= $dataMaintenances["jenis_perbaikan"]; ?>
                    </td>
                    <td scope="min-width">
                        <?= $dataMaintenances["action"]; ?>
                    </td>
                    <td scope="min-width">
                        <?= $dataMaintenances["komponen"]; ?>
                    </td>
                    <td scope="min-width">
                        <?= $dataMaintenances["biaya_keluar"]; ?>
                    </td>
                    <td scope="min-width">
                        <?= $dataMaintenances["users"]; ?>
                    </td>


                    <td scope="col">
                        <div class="d-flex">
                            <div class="action">
                                <button class="btn btn-md text-primary">
                                    <a href="/maintenance/<?= $dataMaintenances['id'] ?>/edit">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                </button>
                            </div>
                            <form action="/maintenance/<?= $dataMaintenances['id']; ?>" method="POST" class="d-inline deleteuser">
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
        let table = new DataTable('.maintenances');
    });

    $('.deleteuser').submit(function (e) {
        e.preventDefault();
        var id = $(this).data('id');

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
                    data: {
                        id: id
                    },
                    success: function () {
                        Swal.fire({
                            icon: 'success',
                            title: 'Data User Berhasil Dihapus !',
                            showConfirmButton: false
                        });
                        setTimeout(function () { // wait for 1 secs(2)
                            window.location = '/user' // then reload the page.(3)
                        }, 1000);
                    }
                });

            } else {
                Swal.fire(
                    'Cancelled',
                    '',
                    'error'
                )
            }
        })
    })

</script>


@endsection
