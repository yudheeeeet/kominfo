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
                <h1 class="mt-4">Rekapan Akun Zoom</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Akun Zoom</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Daftar Akun Zoom
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
                                        <th>Nama Room</th>
                                        <th>Link Room</th>
                                        <th>Meet ID</th>
                                        <th>Passcode</th>
                                        <th>Mulai Langganan</th>
                                        <th>Akhir Langganan</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($room as $item)
                                    <tr>
                                        <td>{{$item->room_name}}</td>
                                        <td>{{$item->link}}</td>
                                        <td>{{$item->Meeting_ID}}</td>
                                        <td>{{$item->Passcode}}</td>
                                        <td>{{$item->mulai_penyewaan}}</td>
                                        <td>{{$item->akhir_penyewaan}}</td>
                                        <td>{{$item->status}}</td>
                                        <td>
                                            <a class="btn btn-warning" href="{{url('/editRoom', $item->id)}}">Edit</a>
                                            <br>
                                            <br>
                                            <button type="button" data-toggle="modal" onclick="hapusRoom({{$item->id}})" data-target="#hapus_room_modal" class="btn btn-danger">Hapus</button>
                                        </td>
                                    </tr>                                        
                                    @endforeach 
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_data_room">
                                Tambah Room Meet Baru
                            </button>
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
    function hapusRoom(id) {
        var action = "{{url('hapus-room')}}/" + id;
        $('#hapus-room').attr('action', action);
    }
</script>

@endsection
@section('modal')
<div class="modal fade" id="tambah_data_room" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambahkan Room Baru!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action = "{{url('tambah-data-room')}}" method = "POST">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama Room:</label>
                        <input type="text" name="room_name" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Link:</label>
                        <input type="text" name="link" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Meet ID:</label>
                        <input type="text" name="Meeting_ID" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Passcode:</label>
                        <input type="text" name="Passcode" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Awal Penyewaan:</label>
                        <input type="date" name="mulai_penyewaan" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Akhir Penyewaan:</label>
                        <input type="date" name="akhir_penyewaan" class="form-control" id="recipient-name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus_room_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin menghapus data ini ?
                <div class="modal-footer">
                    <form id="hapus-room" method="POST">
                        @csrf
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ya, saya yakin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection