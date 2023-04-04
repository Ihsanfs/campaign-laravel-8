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
    <div class="row">

        <div class="col-md-6 col-lg-6">
            <form action="{{route('donasi.update', $donasi->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
            <div class="form-group">
                <label>judul</label>
                <input type="text" name="nama" value="{{$donasi->nama}}" class="form-control" placeholder="Enter judul">
            </div>

            <div class="form-group">
                <label>isi</label>
               <input type="text" name="address" value="{{$donasi->address}}" class="form-control"  placeholder="enter link">
            </div>

            <div class="form-group">
                <label>phone</label>
               <input type="number" name="phone" value="{{$donasi->phone}}" class="form-control"  placeholder="enter link">
            </div>


            <div class="form-group">
                <label>pembayaran</label>
               <input type="text" name="pembayaran" value="{{$donasi->pembayaran}}" class="form-control"  placeholder="enter link">
            </div>


            <div class="form-group">
                <label>jumlah</label>
               <input type="number" name="jumlah" value="{{$donasi->jumlah}}" class="form-control"  placeholder="enter link">
            </div>

            <div class="form-group">
                <label>status</label>
                <select name="is_active" id="" class="form-control">
                    <option value="1" {{$donasi->status == 'paid' ? 'selected' : ''}} >sudah di bayar</option>
                    <option value= "0" {{$donasi->status == 'proses' ? 'selected' : ''}} >belum di bayar</option>
                </select>

            </div>

            <div class="form-group">
                <label>Gambar</label>
                <input type="file"  name="gambar"  >
            </div>

            <div class="form-group">
                <label>Gambar sekarang</label>
            <img width="150px" src="{{asset('artikel/'.$donasi->gambar)}}">
        </div>

            <div class="form-group">
                <label>campaign</label>
                <select name="campaign_id" id="" class="form-control">

                    @foreach ($campaign_all as $item)
                    @if($item->id == $donasi->campaign_id)
                    <option value="{{$item->id}}" selected='selected'>{{$item->title}}</option>
                    @else
                    <option value="{{$item->id}}">{{$item->title}}</option>
                    @endif
                    @endforeach


h

                </select>



            </div>

            <button type="submit" class="btn btn-primary">Send message</button>

        </form>
            </div>

@endsection
