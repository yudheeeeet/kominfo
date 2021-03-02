@extends('layouts.master')
@section('content')
<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{url('/')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Utama</div>
                        
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Menu Utama
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="{{url('/akun')}}" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Data Pengguna
                                </a>
                                <a class="nav-link collapsed" href="{{url('/room')}}" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Pengelolaan Zoom
                                </a>
                                <a class="nav-link collapsed" href="{{url('/pengajuan')}}" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Permohonan Peminjaman
                                </a>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Adisional</div>
                        <a class="nav-link" href="/rekap">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Rekap Dinas
                        </a>
                        <a class="nav-link" href="/recap">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Rekap Meet
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Akun Pengguna</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{url('/admin')}}">Menu Utama</a></li>
                        <li class="breadcrumb-item active">Edit Akun Pengguna</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-warning">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @elseif(session('berhasil'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{{ session('berhasil') }}</li>
                                </ul>
                            </div>
                            @endif
                            <form method="post" action="{{url('update-user/'. $user->id)}}">
                                {{ csrf_field() }}
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Nama Instansi</label>
                                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">User Login</label>
                                    <input type="text" name="user_login" class="form-control" id="exampleFormControlInput1" value="{{ $user->user_login }}">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                    <div style="height: 100vh"></div>
                    {{-- <div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div> --}}
                </div>
            </main>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

@endsection