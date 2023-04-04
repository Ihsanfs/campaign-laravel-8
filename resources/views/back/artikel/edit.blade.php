@extends('layouts.default')
@section('content')

<div class="card-body">
    <div class="row">

        <div class="col-md-6 col-lg-6">
            <form action="{{route('artikel.update',$artikel->id)}}" method="POST" enctype="multipart/form-data">

                @method ('PUT')
                @csrf
            <div class="form-group">
                <label>judul</label>
                <input type="text" name="judul" value="{{$artikel->judul}}" class="form-control" placeholder="Enter judul">
            </div>

            <div class="form-group">
                <label>isi</label>
                <input type="text" name="body" value="{{$artikel->body}}" class="form-control" placeholder="Enter kategori">
            </div>
            <div class="form-group">
                <label>Kategori</label>

                <select name="kategori_id" id=""  class="form-control">
                    @foreach ($kategori_all as $item)
                    @if($item->id == $artikel->kategori_id)
                    <option value="{{$item->id}}" selected='selected'>{{$item->nama_kategori}}</option>
                    @else
                    <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                    @endif
                    @endforeach

                </select>



            </div>

            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar_artikel"  class="form-control" >


            </div>
            <div class="form-group">
                <label>Gambar sekarang</label>
            <img width="150px" src="{{asset('artikel/'.$artikel->gambar_artikel)}}">
        </div>
        <br>
            <div class="form-group">
                <label>status</label>
                <select name="is_active" id="">
                    <option value="1" {{$artikel->is_active == '1' ? 'selected' : ''}} >publish</option>
                    <option value="0"  {{$artikel->is_active == '0' ? 'selected' : ''}} >draft</option>


                </select>

            </div>


            <button type="submit" class="btn btn-primary">Send message</button>

        </form>
            </div>
@endsection
