@extends('template.login')
@section('content')


<div class="p-2">
    <img src="/images/udayana.png" alt="" srcset="" class="img-fluid w-25">
</div>
<!-- <div class="alert alert-primary" role="alert"> -->

<!-- </div> -->
<h4 class="text-white font-weight-bold">Login Access <br> <span class="font-weight-normal">IoT Smart PJU</span></h4>
</div>
</div>
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
        <div class="login-wrap p-0">

            <form action="{{ url('/users/new')}}" method="post">
                @csrf
                <input type="hidden" name="mode" value="newfrRegister">

                <div class="form-group">

                    <input type="text" class="form-control" placeholder="First Name" name="first_name" required>
                </div>
                <div class="form-group">

                    <input type="text" class="form-control" placeholder="Last Name" name="last_name" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="E-Mail" name="email" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Handphone" name="handphone" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="username" required>
                </div>
                <div class="form-group">
                    <input id="password-field" type="password" class="form-control" placeholder="Password"
                        name="password" required>
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>

                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary submit px-3 font-weight-bolder">Sign
                        Up</button>
                </div>

            </form>
            <div class="text-center">

                <p class="fw-normal mt-3"><i class="fa fa-copyright" aria-hidden="true"></i> Dharma Lesmana <?php echo date('Y') ?></p>
            </div>
        </div>
        @endsection
