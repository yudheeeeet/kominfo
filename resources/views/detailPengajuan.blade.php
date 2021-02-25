@extends('layouts.master')
@section('content')
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
                    <a class="nav-link" href="charts.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Rekap Data
                    </a>
                    <a class="nav-link" href="tables.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Tables
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
                <h1 class="mt-4">Detail Lengkap Pengajuan</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Detail Pengajuan</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="mb-0">Acara :</p>
                        <p class="mb-0">{{$pengajuan->acara}}</p>
                        <br>
                        <p class="mb-0">Durasi :</p>
                        <p class="mb-0">{{$pengajuan->durasi}}</p>
                        <br>
                        <p class="mb-0">Permohonan Mulai Peminjaman :</p>
                        <p class="mb-0">{{$pengajuan->mulai}}</p>
                        <br>
                        <p class="mb-0">Permohonan Akhir Peminjaman :</p>
                        <p class="mb-0">{{$pengajuan->akhir}}</p>
                        <br>
                        <p class="mb-0">Nomer yang Dicantumkan :</p>
                        <p class="mb-0">{{$pengajuan->cp}}</p>
                        <br>
                    </div>
                </div>
                <br>
                <div class="card mb-4">
                    <div class="card-body">
                        @foreach($feedback as $item)    
                        <p class="mb-0">Ruang Yang Dipinjamkan :  {{$item->room}}</p>
                        <br>
                        <p class="mb-0">Feedback Admin :          {{$item->feedback}}</p>
                        <br>
                    </div>
                    @endforeach
                </div>
            </div>
            <h2>Tambah Balasan Anda</h2>
            <br>
            <form action="{{url('tambah-feedback', $pengajuan->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-10 mb-3">
                        <label for="ruang">Ruang Dipinjamkan</label>
                        <select class="wide w-100" name="room" id="ruang">
                            <option data-display="Select">Tidak tersedia.</option>
                            @foreach ($room as $item)
                            <option value="{{$item->id}}" data-display="Select">{{$item->room_name}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback"> Pilih salah satu room yang tersedia</div>
                    </div>           
                </div>
                
                
                <textarea class="form-control" name="feedback" id="feedback" placeholder="berikan feedback anda" rows="4" data-error="Write your message" required></textarea>
                <div class="help-block with-errors"></div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
            <div style="height: 100vh"></div>
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
    @endsection