@extends('master')

@section('title', 'SIJaru - Data Kelas')

@section('sidebar')
@include('sidebar')
@endsection

@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
            
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Kelas</h3>
                    <p class="text-subtitle text-muted">Kelola data kelas</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kelas</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between flex-wrap">
                        <h5 class="card-title">
                            Data Kelas
                        </h5>
                        <h5 class="card-title">
                            <button data-bs-toggle="modal" data-bs-target="#modal-add-class" class="btn btn-primary">Tambah Data</button>
                        </h5>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Prodi</th>
                                <th>Nama Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($class as $k => $data)
                                <tr>
                                    <td>{{ $k + 1 }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->class_name }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button data-id="{{ $data->class_id }}" class="btn btn-success me-2 btn-edit"><i class="bi bi-pencil"></i> Edit</button>
                                            <a href="{{ URL::to('kelas/delete/'.$data->class_id) }}" class="btn btn-danger"><i class="bi bi-trash"></i> Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="modal fade" id="modal-add-class" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data</h5>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ URL::to('kelas/insert') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label>Prodi</label>
                        <select class="form-control" name="id_prodi" required>
                            @foreach($prodi as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="name" placeholder="Masukkan nama kelas" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit-class" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data</h5>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ URL::to('kelas/edit') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label>Prodi</label>
                        <select class="form-control" name="id_prodi" required>
                            @foreach($prodi as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <input class="form-control" type="hidden" name="id">
                        <input class="form-control" name="name" placeholder="Masukkan nama kelas" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('page-script')
<script>
    document.querySelector('#table1').addEventListener("click", async (e) => {
        e.preventDefault();
        const id = e.target.getAttribute('data-id')
        const data = await fetch(`{{ URL::to('kelas/fetch') }}/${id}`);
        const classes = await data.json();
        document.querySelector(`#modal-edit-class [name=id]`).value = id
        document.querySelector(`#modal-edit-class [name=name]`).value = classes.name
        document.querySelector(`#modal-edit-class [name=id_prodi]`).value = classes.id_prodi
        if(classes.name) {
            var myModal = new bootstrap.Modal(document.getElementById('modal-edit-class'))
            myModal.show();
        }
    })
</script>
@endsection