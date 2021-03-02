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
            
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Rekapan Data Pengguna</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Pengguna</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Data Pengguna
                    </div>
                    <br>
                    <form action="/akun" method="GET" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search for..." name="cari" aria-label="Search" aria-describedby="basic-addon2" />
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Instansi</th>
                                        <th>Jumlah Pengajuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($meet as $item)
                                    <tr>
                                        <td>{{$item->room_name}}</td>

                                        <td>
                                            {{$item->jumlah}} Kali Dipakai
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
@endsection