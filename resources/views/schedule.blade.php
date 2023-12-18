@extends('master')

@section('title', 'SIJaru - Data Jadwal')

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
                    <h3>Data Jadwal</h3>
                    <p class="text-subtitle text-muted">Kelola data jadwal</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ URL::to('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Jadwal</li>
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
                            Data Jadwal
                        </h5>
                        <h5 class="card-title">
                            <button data-bs-toggle="modal" data-bs-target="#modal-add-schedule" class="btn btn-primary">Tambah Data</button>
                        </h5>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Ruangan</th>
                                <th>Hari</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Matkul</th>
                                <th>Kelas</th>
                                <th>Dosen</th>
                                <th>Peserta</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schedule as $k => $data)
                                <tr>
                                    <td>{{ $k + 1 }}</td>
                                    <td>{{ $data->room_name }}</td>
                                    <td>{{ $data->day }}</td>
                                    <td>{{ $data->begin }}</td>
                                    <td>{{ $data->end }}</td>
                                    <td>{{ $data->subject_name }}</td>
                                    <td>{{ $data->prodi_name .' '. $data->class_name }}</td>
                                    <td>{{ $data->user_name }}</td>
                                    <td>{{ $data->student }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button data-id="{{ $data->schedule_id }}" class="btn btn-success me-2 btn-edit"><i class="bi bi-pencil"></i> Edit</button>
                                            <a href="{{ URL::to('jadwal/delete/'.$data->schedule_id) }}" class="btn btn-danger"><i class="bi bi-trash"></i> Hapus</a>
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

<div class="modal fade" id="modal-add-schedule" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data</h5>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ URL::to('jadwal/insert') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label>Ruangan</label>
                        <select name="id_room" placeholder="Masukkan ruangan" class="form-control" required>
                            @foreach($room as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hari</label>
                        <select name="day" class="form-control" placeholder="Masukkan hari" required>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jam Mulai</label>
                                <input class="form-control" placeholder="Masukkan jam mulai" type="time" name="begin" required>
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jam Selesai</label>
                                <input class="form-control" placeholder="Masukkan jam selesai" type="time" name="end" required>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group">
                        <label>Matkul</label>
                        <select name="id_subject" class="form-control" placeholder="Masukkan matkul" required>
                            @foreach($subject as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="id_class" class="form-control" placeholder="Masukkan kelas" required>
                            @foreach($classes as $item)
                                <option value="{{ $item->class_id }}">{{ $item->prodi_name .' '. $item->class_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Peserta</label>
                        <input class="form-control" placeholder="Masukkan jumlah peserta" type="number" name="student" required>
                    </div>
                    @if(Auth::user()->nip == '2201006136')
                    <div class="form-group">
                        <label>Dosen</label>
                        <select name="id_user" class="form-control" placeholder="Masukkan dosen" required>
                            @foreach($user as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @else
                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                    @endif
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

<div class="modal fade" id="modal-edit-schedule" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data</h5>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ URL::to('jadwal/edit') }}" method="post">
            <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label>Ruangan</label>
                        <select name="id_room" placeholder="Masukkan ruangan" class="form-control" required>
                            @foreach($room as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <input class="form-control" type="hidden" name="id">
                    </div>
                    <div class="form-group">
                        <label>Hari</label>
                        <select name="day" class="form-control" placeholder="Masukkan hari" required>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jam Mulai</label>
                                <input class="form-control" placeholder="Masukkan jam mulai" type="time" name="begin" required>
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jam Selesai</label>
                                <input class="form-control" placeholder="Masukkan jam selesai" type="time" name="end" required>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group">
                        <label>Matkul</label>
                        <select name="id_subject" class="form-control" placeholder="Masukkan matkul" required>
                            @foreach($subject as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="id_class" class="form-control" placeholder="Masukkan kelas" required>
                            @foreach($classes as $item)
                                <option value="{{ $item->class_id }}">{{ $item->prodi_name .' '. $item->class_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Peserta</label>
                        <input class="form-control" placeholder="Masukkan jumlah peserta" type="number" name="student" required>
                    </div>
                    @if(Auth::user()->nip == '2201006136')
                    <div class="form-group">
                        <label>Dosen</label>
                        <select name="id_user" class="form-control" placeholder="Masukkan dosen" required>
                            @foreach($user as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @else
                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                    @endif
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
        const id = e.target.getAttribute('data-id')
        const data = await fetch(`{{ URL::to('jadwal/fetch') }}/${id}`);
        const schedule = await data.json();
        document.querySelector(`#modal-edit-schedule [name=id]`).value = id
        document.querySelector(`#modal-edit-schedule [name=id_room]`).value = schedule.id_room
        document.querySelector(`#modal-edit-schedule [name=id_subject]`).value = schedule.id_subject
        document.querySelector(`#modal-edit-schedule [name=id_class]`).value = schedule.id_class
        document.querySelector(`#modal-edit-schedule [name=id_user]`).value = schedule.id_user
        document.querySelector(`#modal-edit-schedule [name=day]`).value = schedule.day
        document.querySelector(`#modal-edit-schedule [name=begin]`).value = schedule.begin
        document.querySelector(`#modal-edit-schedule [name=end]`).value = schedule.end
        document.querySelector(`#modal-edit-schedule [name=student]`).value = schedule.student
        if(schedule.begin) {
            var myModal = new bootstrap.Modal(document.getElementById('modal-edit-schedule'))
            myModal.show();
        }
    })
   
</script>
@endsection