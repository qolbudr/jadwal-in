@extends('master')

@section('title', 'SIJaru - Dashboard')

@section('sidebar')
@include('sidebar')
@endsection

@section('content')
<style>
    @keyframes marquee {
        0% {
            top: 50em
        }

        100% {
            top: -40em
        }
    }
</style>

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>Dashboard</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <div class="row my-1 align-items-center">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-2 d-flex justify-content-start ">
                                        <div class="avatar avatar-xl">
                                            <img src="./assets/compiled/jpg/1.jpg" alt="Face 1">
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-10 text-start">
                                        <div class="name mt-2">
                                            <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                                            <h6 class="text-muted">{{ Auth::user()->nip }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 mt-1">
                                        <h6 class="text-muted font-semibold">Data Dosen</h6>
                                        <h6 class="font-extrabold mb-0">{{ $userCount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Data Ruangan</h6>
                                        <h6 class="font-extrabold mb-0">{{ $roomCount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card" unstyle="height: 67vh;">
                            <div class="card-header">
                                <h4>Jadwal Hari Ini</h4>
                                <div class="box-filter row">
                                    <div class="form-group col-12 col-md-4">
                                        <label class="mb-2">Pilih Gedung</label>
                                        <select class="form-control" onchange="getSchedule()" name="building" required>
                                            @foreach($allBuilding as $building)
                                            <option value="{{ $building }}">{{ $building }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" unstyle="position: relative; overflow:hidden">
                                <div id="schedule-place" class="row align-items-stretch" unstyle="top: 5em; position: relative; box-sizing: border-box; animation: marquee 25s linear infinite;">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@section('page-script')
<script>
    const baseURL = `{{ URL::to('') }}`

    const getSchedule = async () => {
        const building = document.querySelector('[name=building]').value
        const dataRoom = await fetch(`${baseURL}/ruangan/get?gedung=${building}`)
        const dataSchedule = await fetch(`${baseURL}/jadwal/get?gedung=${building}`)

        let responseRoom = await dataRoom.json()
        let responseSchedule = await dataSchedule.json()

        const finalResponse = [];

        responseRoom.forEach((room) => {
            responseSchedule.forEach((schedule) => {
                if (room.name == schedule.room_name) {
                    if(schedule.active == true) {
                        finalResponse.push(schedule)
                    } else {
                        finalResponse.push({
                            room_name: room.name,
                            begin: schedule.begin,
                            end: schedule.end,
                        })
                    }
                }
            })
        })

        responseRoom.forEach((room) => {
            if (finalResponse.filter((item) => item.room_name == room.name).length == 0) {
                finalResponse.push({
                    room_name: room.name
                })
            }
        })

        const sortedArray = finalResponse.sort((a, b) => a.room_name.localeCompare(b.room_name))

        let html = ``

        if (sortedArray.length > 0) {
            sortedArray.forEach((item) => {
                const now = new Date()
                const nowTime = now.toTimeString().split(' ')[0]
                const nowDate = new Date('01/01/1999 ' + nowTime)
                const begin = new Date('01/01/1999 ' + item.begin)
                const end = new Date('01/01/1999 ' + item.end)

                html += `
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="alert ${item.subject_name == null ? 'alert-info' : begin <= nowDate && nowDate <= end ? 'alert-success' : 'alert-secondary'}" style="height: 93%;">
                        <h3>${item.room_name}</h3>
                        ${ item.subject_name == null ?  
                            `<h5>Ruangan hari ini kosong</h5>
                            ${item.begin != null ? `<h5 class="my-2" style="font-weight: normal">${item.begin} - ${item.end}</h5>` : `<h5 class="mt-2" style="font-weight: normal">&nbsp;</h5>`}
                            <h5 class="mt-2" style="font-weight: normal">&nbsp;</h5>
                            ` :
                            `<h5>${item.subject_name}</h5>
                            <h5 class="my-2" style="font-weight: normal">${item.begin} - ${item.end}</h5>
                            <h5 class="mt-2" style="font-weight: normal">${item.user_name}</h5>
                            `
                        }
                    </div>
                </div>
            `
            })
        } else {
            html += `
            <div class="w-100 d-flex align-items-center justify-content-center" style="height: 60vh">
                <h5>Belum ada jadwal hari ini</h5>
            </div>
            `
        }

        document.querySelector('#schedule-place').innerHTML = html;
    }

    getSchedule();
</script>
@endsection