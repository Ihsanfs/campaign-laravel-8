@extends('layouts.default')
@section('content')
@include('sweetalert::alert')
@include('layouts.ckeditor')
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


    @if (session('error'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: true,

        })
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Donasi Gagal, harap perhatikan kembail data anda',

  footer: '<a href="#">untuk menghubungi lebih lanjut konfirmasi donasi tersebut</a>'
})
    </script>
@endif
<div class="card-body">
    <div class="row">

        <div class="col-md-6 col-lg-6">
            <form action="{{route('donasi.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label>nama </label>
                <input type="text" name="nama"  class="form-control" placeholder="Enter judul">
            </div>

            <div class="form-group">
                <label>alamat</label>
               <input type="text" name="address" class="form-control"  placeholder="enter link">
            </div>

            <div class="form-group">
                <label>phone</label>
               <input type="number" name="phone" class="form-control"  placeholder="enter link">
            </div>


            <div class="form-group">
                <label>pembayaran</label>
               <input type="text" name="pembayaran" class="form-control"  placeholder="enter link">
            </div>


            <div class="form-group">
                <label>jumlah</label>
               <input type="number" name="jumlah" class="form-control"  placeholder="enter link">
            </div>
{{--
            <div class="form-group">
                <label>status</label>
                <select name="is_active" id="" class="form-control">
                    <option value="1">sudah di bayar</option>
                    <option value="0">belum di bayar</option>
                </select>

            </div> --}}

            <div class="form-group">
                <label>Gambar bukti tranfer</label>
                <input type="file" name="gambar"  >
            </div>

            <div class="form-group">
                <label>campaign</label>

                <select name="campaign_id" id="" class="form-control">
                    @foreach ($campaign_all as $item)
                    <option value="{{$item->id}}">{{$item->title}}</option>
                    @endforeach

                </select>



            </div>

            <button type="submit" class="btn btn-primary">Send message</button>

        </form>
            </div>

@endsection
