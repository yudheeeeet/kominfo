<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Form</title>
    <link href="{{asset('asset/css/styles.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="{{asset('asset/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js')}}" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                <div class="card-body">
                                    <form action="{{url('/login')}}" method="post">
                                        @csrf

                                        @if (session('message'))
                                        <div class="alert alert-danger" role="alert">
                                            {{session('message')}}
                                          </div>
                                       
                                     @endif

                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control py-4 @error('email') is-invalid @enderror"
                                            id="inputEmailAddress" name="email" type="email"
                                            placeholder="Enter email address" />
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                        <div class="form-group" data-validate = "Please enter password">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control py-4" id="inputPassword" name="password" type="password"
                                            placeholder="Enter password" />

                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit">Login</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Kominfo &copy; Kabupaten Malang</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{asset('asset/https://code.jquery.com/jquery-3.5.1.slim.min.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('asset/https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('asset/js/scripts.js')}}"></script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
</body>
</html>
