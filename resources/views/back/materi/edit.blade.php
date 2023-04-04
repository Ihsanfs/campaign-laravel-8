@extends('layouts.default')
@section('content')

<div class="card-body">
    <div class="row">

        <div class="col-md-6 col-lg-6">
            <form action="{{route('materi.update',$materi->id)}}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf

            <div class="form-group">
                <label>judul</label>
                <input type="text" name="judul_materi" value="{{$materi->judul_materi}}" class="form-control" placeholder="Enter judul">
            </div>

            <div class="form-group">
                <label>link video</label>
                <input type="text" name="link" value="{{$materi->link}}" class="form-control" placeholder="Enter judul">
            </div>

            <div class="form-group">
                <label>isi</label>
               <textarea name="deskripsi" id="editor1" cols="30" rows="10">{{$materi->deskripsi}}</textarea>
            </div>

            <div class="form-group">
                <label>Kategori</label>

                <select name="playlist_id" id="" class="form-control">
                    @foreach ($playlist as $item)
                    @if($item->id == $materi->playlist_id)
                    <option value="{{$item->id}}" selected='selected'>{{$item->judul_playlist}}</option>
                    @else
                    <option value="{{$item->id}}">{{$item->judul_playlist}}</option>
                    @endif
                    @endforeach


                </select>



            </div>

            <div class="form-group">
                <label>Gambar sekarang</label>
            <img width="150px" src="{{asset('artikel/'.$materi->gambar_materi)}}">
        </div>

        <div class="form-group">
            <label>status</label>
            <select name="is_active" id="">
                <option value="1" {{$materi->is_active == '1' ? 'selected' : ''}} >publish</option>
                <option value="0"  {{$materi->is_active == '0' ? 'selected' : ''}} >draft</option>


            </select>

        </div>
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar_materi"  class="form-control" >
            </div>





            <button type="submit" class="btn btn-primary">Send message</button>

        </form>
            </div>

@endsection
