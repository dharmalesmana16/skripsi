<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="/css/style.css">

    <title>Login #2</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('/images/lampu3.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <div class="text-center">

            
            <!-- <img src="/images/Nuansa-logo-warna.png" class="img-fluid" alt="Responsive image" srcset="" > -->
            </div>
            <form action="<?= base_url('/authregister'); ?>" method="post" enctype="multipart/form-data">
            <?php csrf_field() ?>
            <input type="hidden" name="role" value="-">
            <input type="hidden" name="foto" value="-">
              <div class="form-group ">
                <label for="username">Nama Depan</label>
                <input type="text" class="form-control" placeholder="First Name" name="nama_depan" id="nama_depan"  > 
              </div>
              <div class="form-group">
                <label for="nama_belakang">Nama Belakang</label>
                <input type="nama_belakang" class="form-control" placeholder="Last Name" name="nama_belakang" id="nama_belakang">
              </div>
              <div class="form-group ">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="Username" name="username" id="username"  > 
              </div>
              <div class="form-group ">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email" id="email">
              </div>
              <div class="form-group ">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" > 
              </div>
              <div class="form-group ">
                <label for="konfirmasi_password">Konfirmasi konfirmasi_password</label>
                <input type="password" class="form-control" placeholder="Confirm Password" name="konfirmasi_password" id="konfirmasi_password">
              </div>
              <div class="form-group ">
                <label for="nohp">Nomor Handphone</label>
                <input type="text" class="form-control" placeholder="Handphone" name="nohp" id="nohp"  > 
              </div>
           
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked" name="rememberme" />
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
              </div>

              <input type="submit" value="Sign Up" class="btn btn-block btn-primary">

            </form>
            <div class="text-center">

              <p class="fw-normal mt-3"><i class="fa fa-copyright" aria-hidden="true"></i> Nuansa Inti Persada <?php echo date('Y')?></p>
            </div>

          </div>
        </div>
      </div>
    </div>

    
  </div>
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
  </body>
</html>