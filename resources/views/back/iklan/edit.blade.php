@extends('layouts.default')
@section('content')

<div class="card-body">
    <div class="row">

        <div class="col-md-6 col-lg-6">
            <form action="{{route('iklan.update',$iklan->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
            <div class="form-group">
                <label>judul</label>
                <input type="text" name="judul_iklan"  value= "{{$iklan->judul_iklan}}" class="form-control" placeholder="Enter judul">
            </div>

            <div class="form-group">
                <label>isi</label>
               <input type="text" name="link" class="form-control"   value ="{{$iklan->link}}" placeholder="enter link">
            </div>


            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar_iklan"  >
            </div>

            <div class="form-group">
                <label>Gambar sekarang</label>
            <img width="150px" src="{{asset('artikel/'.$iklan->gambar_iklan)}}">
        </div>

        <div class="form-group">
            <label>status</label>
            <select name="is_active" id="">
                <option value="1" {{$iklan->is_active == '1' ? 'selected' : ''}} >publish</option>
                <option value="0"  {{$iklan->is_active == '0' ? 'selected' : ''}} >draft</option>


            </select>

        </div>


            <button type="submit" class="btn btn-primary">Send message</button>

        </form>
            </div>

@endsection
