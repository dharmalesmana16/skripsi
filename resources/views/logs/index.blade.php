@extends('template.index')
@section('content')

<div class="card-style">
    <div class="left">
        <h6 class="text-medium mb-10 fw-bold">System Log</h6>
    </div>

    <div class="card-body">


        <div class="table-responsive bg-white">
            <table class="table table-hover table-white log ">
                <thead>
                    <tr class="" style="">
                        <th scope="">NO</th>
                        <th scope="">ACTION</th>
                        <th scope="">DATE & TIME</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no_device =1;
                        ?>
                    <?php foreach ($logs as $dataLogs) :
                            $datetime = new DateTime($dataLogs['created_at']);
                            $resultdate = $datetime->format('d M Y, H:i:s');

                            ?>
                    <tr class="">
                        <td scope="col">
                            <?= $no_device++; ?>

                        </td>
                        <td scope="col">
                            <?= $dataLogs["action"]; ?>
                        </td>
                        <td scope="col">
                            <?= $resultdate; ?>
                        </td>


                    </tr>
                    <?php endforeach ?>
                </tbody>

            </table>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let table = new DataTable('.log');
    });


    $('.deletedevice').submit(function (e) {
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
                            location.reload(); // then reload the page.(3)
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
