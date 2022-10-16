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
    <link rel="stylesheet" href="/css/bootstrap.min.css" />

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="/js/sweetalert2/sweetalert2.all.min.js"></script>
    <!-- Style -->
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <title>Signin IoT Smart PJU</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('/images/anemometer2.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <div class="text-center">
            <!-- <div class="alert alert-primary" role="alert"> -->
        <?php
    if(session()->getFlashData('pending')){
    ?>
        <div class="alert alert-danger" role="alert">
        <?= session()->getFlashData('pending') ?>
        </div>
    <?php
    }elseif(session()->getFlashData('error')) {
    ?>
        <div class="alert alert-danger" role="alert">
          <?= session()->getFlashData('error') ?>
        </div>
    <?php
    }
    ?>
          <!-- </div> -->
            </div>
            <form action="<?= base_url('/authsignin'); ?>" id="auth" method="post">
            <?= csrf_field() ?>
                          <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="Your username" name="username" id="username" value=<?php echo 'a'; ?> > 
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Your Password" name="password" id="password">
              </div>
              
              <div class="d-flex justify-content-between ml-auto mb-5">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked" name="rememberme" />
                  <div class="control__indicator"></div>
                </label>
                      
                <a href="<?= base_url('/forgotpassword'); ?>" class="forgot-pass">Forgot Password</a>
              </div>
              <div class="d-grid gap-2 col-12 mx-auto">
            <button type="submit" class="btn btn-primary" type="button">Sign In</button>
          </div>

            </form>
            <div class="text-center">

              <p class="fw-normal mt-3">Developed By : Dharma Lesmana </p>
              <p class="fw-normal "><i class="fa fa-copyright" aria-hidden="true"></i> Smart PJU <?php echo date('Y')?></p>
            </div>

          </div>
        </div>
      </div>
    </div>

    
  </div>
    <script>
      // $(document).ready(function () {
      //   $('#auth').submit(function(e){
      //     e.preventDefault();
        
         
      //         $.ajax({
      //             type: 'POST',
      //             url: $(this).attr('action'),
      //             data: $("#auth").serialize(),
      //             beforeSend: function() {
      //               Swal.fire({
      //           title: 'Please Wait !',
      //           // html: '',// add html attribute if you want or remove
      //           allowOutsideClick: false,
      //           showCancelButton: false,
      //           showConfirmButton: false,
    
      //           onBeforeOpen: () => {
      //               Swal.showLoading()
      //           },
      //       });                
      //     },
      //             success: function(response) {
      //             Swal.fire({
      //             icon: 'success',
      //             title: response,
      //             showConfirmButton: false
      //               });                                               
      //               setTimeout(function(){// wait for 1 secs(2)
      //                 window.location = '/'; // then reload the page.(3)
      //               }, 3000); 
      //             }
             
              
         
      //     })
      // })
      // });
   
    </script>
    
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/auth.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  </body>
</html>