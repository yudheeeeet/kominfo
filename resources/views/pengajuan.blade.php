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

        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Rekapan Pengajuan Peminjaman</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Pengajuan</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Daftar Permintaan
                    </div>
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
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Instansi</th>
                                        <th>Acara</th>
                                        <th>Peserta</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                        <th>Persetujuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pengajuan as $item)
                                    <tr>
                                        <td>{{DB::table('users')->where('id', $item->user_id)->value('name')}}</td>
                                        <td>{{$item->acara}}</td>
                                        <td>{{$item->peserta}}</td>
                                        <td>{{$item->status}}</td>             
                                        <td>
                                            <a class="btn btn-primary" href="{{url('/detailPengajuan', $item->id)}}">Detail</a>
                                            <br>
                                            <br>
                                            <a class="btn btn-warning" href="{{url('/'.'storage/'.$item->lampiran)}}">Unduh</a>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-success" data-toggle="modal" 
                                            onclick="diterima({{$item->id}})" data-target="#modalDiterima">Diterima</button>
                                            <br>
                                            <br>
                                            <button type="submit" class="btn btn-danger" data-toggle="modal"
                                            onclick="ditolak({{$item->id}})" data-target="#modalDitolak">Ditolak</button>
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
@section('script')

<script>

    function diterima(id){
        var action = "{{url('/diterima')}}" +id
        $('#btnDiterima').attr('href', action);
    }

    function ditolak(id){
        var action = "{{url('/ditolak')}}" +id
        $('#btnDitolak').attr('href', action);
    }

</script>

@endsection
@section('modal')
<div class="modal fade" id="modalDiterima" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin untuk menyetujui pengajuan ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <a id="btnDiterima" type="button" class="btn btn-primary">Ya, Saya Yakin</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalDitolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin untuk menolak pengajuan ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <a id="btnDitolak" type="button" class="btn btn-primary">Ya, Saya Yakin</a>
            </div>
        </div>
    </div>
</div>
@endsection