@extends('layouts.default')
@section('content')
@include('sweetalert::alert')

@if(Session::has('sweet_alert.alert'))
    <script>
        Toast.fire({
            icon: 'success',
            title: 'Session::get('sweet_alert.alert')'
        })
    </script>
@elseif(Session::has('sweet_alert.alert'))
    <script>
        Toast.fire({
            icon: 'error',
            title: 'Session::get('sweet_alert.alert')'
        })
    </script>
    @endif

<div class="card-body">

    {{-- @if(Session::has('success'))
    <div class="alert alert-primary">
        {{Session('success')}}
    </div>
    @endif --}}
    <div class="table-responsive">
        <table id="basic-datatables" class="display table table-striped table-hover" >
            <a href="{{route('campaign.create')}}" class="btn btn-secondary btn-round">Add campaign</a>

            <thead>
                <tr>
                    <th>N0</th>
                    <th>judul</th>
                    <th>slug</th>
                    <th>gambar</th>
                    <th>isi</th>
                    <th>dana masuk</th>
                    {{-- <th>gambar</th> --}}
                    <th>Donatur</th>

                    <th>target</th>

                    <th>action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N0</th>
                    <th>judul</th>
                    <th>slug</th>
                    <th>gambar</th>
                    <th>isi</th>
                    <th>dana masuk</th>
                    <th>Donatur</th>
                    <th>target</th>


                    <th>action</th>


                </tr>
            </tfoot>
            <tbody>
                @php
                $no = 1;
                @endphp

                @foreach($even as $item)


                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->title}}</td>
                    {{-- <td><img width="150px" src="{{asset('artikel/'.$item->gambar_artikel)}}"></td> --}}
                    {{-- <td>{{$item->slug}}</td> --}}
                    <td>{{$item->author}}</td>

                    <td><img width="150px" src="{{asset('artikel/'.$item->thumbnail)}}"></td>
                    <td>{!!$item->body!!}</td>
                    <td>{{number_format($item->raised, 0, '.',',')}}</td>
                    {{-- <td>{{$item->thumbnail}}</td> --}}
                    <td>{{
                        $item->donasi()
                            ->where('campaign_id', $item->id)
                            ->where('is_active', '1')
                            ->count('id')
                    }} orang</td>
                    <td >{{$item->deadline}}</td>






                    <td><a href="{{route('campaign.edit', $item->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>edit</a>
                            <form action="campaign/{{$item->id}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-xs">delete</button>
                                </form>
                    </td>
                </tr>
                @endforeach



            <tr>
                <td colspan="6" class="text-center">
                      @if($even->count() > 0)
                    @else
                    Data masih kosong
                </td>
            </tr>
            @endif
        </tbody>
        </table>

        {{-- <script>
            CountDownTimer('{{$item->created_at}}', 'countdown');
            function CountDownTimer(dt, id)
            {
                var end = new Date('{{$item->deadline}}');
                var _second = 1000;
                var _minute = _second * 60;
                var _hour = _minute * 60;
                var _day = _hour * 24;
                var timer;
                function showRemaining() {
                    var now = new Date();
                    var distance = end - now;
                    if (distance < 0) {

                        clearInterval(timer);
                        document.getElementById(id).innerHTML = '<b>Donasi SUDAH BERAKHIR</b> ';
                        return;
                    }
                    var days = Math.floor(distance / _day);
                    var hours = Math.floor((distance % _day) / _hour);
                    var minutes = Math.floor((distance % _hour) / _minute);
                    var seconds = Math.floor((distance % _minute) / _second);

                    document.getElementById(id).innerHTML = days + 'hari ';
                    document.getElementById(id).innerHTML += hours + 'jam ';
                    document.getElementById(id).innerHTML += minutes + 'menit ';
                    document.getElementById(id).innerHTML += seconds + 'detik';
                    document.getElementById(id).innerHTML +='<h2>Donasi Sedang Berlangsung</h2>';
                }
                timer = setInterval(showRemaining, 1000);
            }
        </script> --}}
@endsection
