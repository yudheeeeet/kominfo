<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login Form</title>
    <link href="{{asset('asset/css/styles.css')}}" rel="stylesheet" />
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
                                    <form action = "{{route('login')}}"
                                    method="POST">
                                    
                                    @csrf
                                    
                                    @if ($errors->any())
                                    <div class="alert alert-warning">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
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
                                        <button class="btn btn-primary" type="submit">
                                            Login
                                        </button>
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
                    <div class="text-muted">Copyright &copy; Your Website 2020</div>
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
<script src="{{asset('asset/https://code.jquery.com/jquery-3.5.1.slim.min.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('asset/https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('asset/js/scripts.js')}}"></script>
</body>
</html>
