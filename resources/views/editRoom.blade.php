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
                    <h1 class="mt-4">Data Zoom Meeting</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{url('/admin')}}">Menu Utama</a></li>
                        <li class="breadcrumb-item active">Edit Data Meeting</li>
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
                            <form method="post" action="{{url('update-room/'. $room->id)}}">
                                {{ csrf_field() }}
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Nama Room</label>
                                    <input type="text" name="room_name" class="form-control" id="exampleFormControlInput1" value="{{ $room->room_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Link</label>
                                    <input type="text" name="link" class="form-control" id="exampleFormControlInput1" value="{{ $room->link }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Meet ID</label>
                                    <input type="text" name="Meeting_ID" class="form-control" id="exampleFormControlInput1" value="{{ $room->Meeting_ID }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Passcode</label>
                                    <input type="text" name="Passcode" class="form-control" id="exampleFormControlInput1" value="{{ $room->Passcode }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Mulai Peminjaman</label>
                                    <input type="text" name="mulai_peminjaman" class="form-control" id="exampleFormControlInput1" value="{{ $room->mulai_peminjaman }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Akhir Peminjaman</label>
                                    <input type="text" name="akhir_peminjaman" class="form-control" id="exampleFormControlInput1" value="{{ $room->akhir_peminjaman }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Durasi Peminjaman</label>
                                    <input type="text" name="durasi_peminjaman" class="form-control" id="exampleFormControlInput1" value="{{ $room->durasi_peminjaman }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Awal Penyewaan</label>
                                    <input type="date" name="mulai_penyewaan" class="form-control" id="exampleFormControlInput1" value="{{ $room->mulai_penyewaan }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Akhir Penyewaan</label>
                                    <input type="date" name="akhir_penyewaan" class="form-control" id="exampleFormControlInput1" value="{{ $room->akhir_penyewaan }}">
                                </div>
                                <div class="form-group">
                                    <label>Status Room</label>
                                    <select class="form-control" name="status">
                                      <option>{{$room->status}}</option>
                                      <option value="Tersedia">Tersedia</option>
                                      <option value="Dipinjam">Dipinjam</option>
                                    </select>
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