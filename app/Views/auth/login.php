<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('/css/style.css')?>">
    <link rel="stylesheet" href="/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Style -->

    <title>Login NS2 | Anemometer</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('/images/anemometer2.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <div class="text-center">
            <img src="/images/Nuansa-logo-warna.png" class="img-fluid" alt="Responsive image" srcset="" width="">
            <!-- <div class="alert alert-primary" role="alert"> -->
            <?php
    if(session()->getFlashData('pending')){
    ?>
        <div class="alert alert-danger" role="alert">
        <?= session()->getFlashData('pending') ?>
      </div>
    <?php
    }
    ?>
          <!-- </div> -->
            <p>This is an IoT Product Nuansa Inti Persada named NS2 Anemometer V1</p>
            </div>
            <form action="<?= base_url('/authlogin'); ?>" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="Your username" name="username" id="username" value=<?php echo 'a'; ?> > 
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Your Password" name="password" id="password">
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked" name="rememberme" />
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
              </div>
            <div class="d-grip gap-2">

              <button type="submit" class="btn btn-md btn-primary btnlogin">Login</button>
            </div>

            </form>
            <div class="text-center">

              <p class="fw-normal mt-3"><i class="fa fa-copyright" aria-hidden="true"></i> Nuansa Inti Persada <?php echo date('Y')?></p>
            </div>

          </div>
        </div>
      </div>
    </div>

    
  </div>
    <script>
      $('.btnlogin').submit(function(e){
        e.preventDefault();
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
          })
      })
      // $('.btnlogin').submit(function(e){
      //     e.preventDefault();
      //     // var id =  $(this).data('id');
      //     Swal.fire({
      //     title: 'Apakah Anda Yakin ?',
      //     text: "Anda tidak bisa Mengulangi data ini lagi !",
      //     icon: 'warning',
      //     showCancelButton: true,
      //     confirmButtonColor: '#3085d6',
      //     cancelButtonColor: '#d33',
      //     confirmButtonText: 'Hapus Data',
      //     closeOnConfirm: false,

      //     closeOnCancel: false
      //     }).then((result) => {
      //     if (result.isConfirmed) {
      //         $.ajax({
      //             type: 'POST',
      //             url: $(this).attr('action'),
      //             data: $(this).serialize(),
      //             success: function() {
      //             Swal.fire({
      //             icon: 'success',
      //             title: 'Data User Berhasil Dihapus !',
      //             showConfirmButton: false
      //               });                                               
      //               setTimeout(function(){// wait for 1 secs(2)
      //                     location.reload(); // then reload the page.(3)
      //                 }, 1000); 
      //             }
      //         });
              
      //     }else{
      //         Swal.fire(
      //         'Cancelled',
      //         '',
      //         'error'
      //         )
      //     }
      //     })
      // })
    </script>
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/auth.js"></script>
  </body>
</html>