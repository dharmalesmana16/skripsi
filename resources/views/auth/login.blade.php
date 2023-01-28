@extends('template.login')
@section('content')


<div class="p-2">
    <img src="/images/udayana.png" alt="" srcset="" class="img-fluid w-25">
</div>
<!-- <div class="alert alert-primary" role="alert"> -->

<!-- </div> -->
<h4 class="text-white font-weight-bold">Login Access <br> <span class="font-weight-normal"> Faculty Of Engineering, Electrical Engineering </span><br><span class="font-weight-normal"> Internet Of Things Smart Street Lamp</span></h4>
</div>
</div>
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
        <div class="login-wrap p-0">
            <div class="text-center">

                @if(session('error'))
                <div class="alert alert-danger">
                    <b>Opps!</b> {{session('error')}}
                </div>
                @endif
                @if(session('pending'))
                <div class="alert alert-warning">
                    <b>Opps!</b> {{session('pending')}}
                </div>
                @endif
            </div>

            <form action="{{ url('/signin')}}" method="post">
                @csrf
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
                        In</button>
                </div>
                <!-- <div class="form-group d-md-flex">
<div class="w-50">
    <label class="checkbox-wrap checkbox-primary">Remember Me
                  <input type="checkbox" checked>
                  <span class="checkmark"></span>
                </label>
            </div>

</div> -->
            </form>
            <div class="text-center">

                <p class="fw-normal mt-3"><i class="fa fa-copyright" aria-hidden="true"></i> Dharma Lesmana <?php echo date('Y') ?></p>
            </div>
        </div>
        @endsection
