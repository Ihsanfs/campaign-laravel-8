@extends('layouts.default')
@section('content')

<div class="card-body">
    <div class="row">

        <div class="col-md-6 col-lg-6">
            <form action="{{route('playlist.update',$playlist->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
            <div class="form-group">
                <label>judul</label>
                <input type="text" name="judul_playlist" value="{{$playlist->judul_playlist}}" class="form-control" placeholder="Enter judul">
            </div>

            <div class="form-group">
                <label>isi</label>
               <textarea name="deskripsi" id="editor1"  cols="30" rows="10">{{$playlist->deskripsi}}</textarea>
            </div>


            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar_playlist"  class="form-control" >
            </div>

            <div class="form-group">
                <label>Gambar sekarang</label>
            <img width="150px" src="{{asset('artikel/'.$playlist->gambar_playlist)}}">
        </div>

        <div class="form-group">
            <label>status</label>
            <select name="is_active" id="">
                <option value="1" {{$playlist->is_active == '1' ? 'selected' : ''}} >publish</option>
                <option value="0"  {{$playlist->is_active == '0' ? 'selected' : ''}} >draft</option>


            </select>

        </div>

            <button type="submit" class="btn btn-primary">Send message</button>

        </form>
            </div>

@endsection
