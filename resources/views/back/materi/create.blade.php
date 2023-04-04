@extends('layouts.default')
@section('content')

<div class="card-body">
    <div class="row">

        <div class="col-md-6 col-lg-6">
            <form action="{{route('materi.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label>judul</label>
                <input type="text" name="judul_materi"  class="form-control" placeholder="Enter judul">
            </div>

            <div class="form-group">
                <label>link video</label>
                <input type="text" name="link"  class="form-control" placeholder="Enter judul">
            </div>

            <div class="form-group">
                <label>isi</label>
               <textarea name="deskripsi" id="editor1" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group">
                <label>playlist</label>

                <select name="playlist_id" id="" class="form-control">
                    @foreach ($playlist as $item)
                    <option value="{{$item->id}}">{{$item->judul_playlist}}</option>
                    @endforeach

                </select>



            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar_materi"  class="form-control" >
            </div>


            <div class="form-group">
                <label>status</label>
                <select name="is_active" id="">
                    <option value="1">publish</option>
                    <option value="0">draft</option>


                </select>

            </div>


            <button type="submit" class="btn btn-primary">Send message</button>

        </form>
            </div>

@endsection
