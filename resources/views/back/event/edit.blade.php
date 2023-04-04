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
            <form action="{{route('campaign.update',$even->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
            <div class="form-group">
                <label>judul</label>
                <input type="text" name="title" value="{{$even->title}}" class="form-control" placeholder="Enter judul">
            </div>

            <div class="form-group">
                <label>author</label>
               <input type="text" name="author" value="{{$even->author}}" class="form-control"  placeholder="enter link">
            </div>

            <div class="form-group">
                <label>isi</label>
               <textarea name="body" id="editor1"  cols="30" rows="10">{{$even->body}}</textarea>
            </div>

            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="thumbnail"  >
            </div>

            <div class="form-group">
                <label>goals</label>
                <input type="number" name="goals" value="{{$even->goals}}"  class="form-control">
            </div>

            <div class="form-group">
                <label>Gambar sekarang</label>
            <img width="150px" src="{{asset('artikel/'.$even->thumbnail)}}">
        </div>

        <div class="form-group">
            <label>status</label>
            <select name="status" id="" class="form-control">
                <option value="paid" {{$even->status == '1' ? 'selected' : ''}} >publish</option>
                <option value= "proses" {{$even->status == '0' ? 'selected' : ''}} >no publish</option>
            </select>

        </div>

            <div class="form-group">
                <label>deadline</label>
               <input type="date" name="deadline" class="form-control" value="{{$even->deadline}}" placeholder="enter link">
            </div>





            <button type="submit" class="btn btn-primary">Send message</button>

        </form>
            </div>

@endsection
