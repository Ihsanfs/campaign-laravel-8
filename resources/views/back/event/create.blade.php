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
  text: 'Campaign Gagal, harap perhatikan kembail data anda',
})
    </script>
@endif
<div class="card-body">
    <div class="row">

        <div class="col-md-6 col-lg-6">
            <form action="{{route('campaign.store')}}" method="POST" enctype="multipart/form-data">
                @method('post')
                @csrf
            <div class="form-group">
                <label>judul</label>
                <input type="text" name="title"  class="form-control" placeholder="Enter judul">
            </div>

            <div class="form-group">
                <label>author</label>
               <input type="text" name="author" class="form-control"  placeholder="enter link">
            </div>
            {{-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> --}}
            <div class="form-group">
                <label>isi</label>
               <textarea name="body" id="editor1" cols="30" rows="10"></textarea>
            </div>
            <script>
                CKEDITOR.replace( 'editor1' );
                config.sourceAreaTabSize = 8;
            </script>
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="thumbnail"  >
            </div>



            <div class="form-group">
                <label>di butuhkan</label>
               <input type="number" name="goals" class="form-control"  placeholder="enter link">
            </div>

            <div class="form-group">
                <label>status</label>
                <select name="status" id="" class="form-control">
                    <option value="1">publish</option>
                    <option value="0">no publish</option>
                </select>

            </div>

            <div class="form-group">
                <label for="deadline"> deadline</label>
                <input type="date" name="deadline" >
            </div>


            <button type="submit" class="btn btn-primary">Send message</button>

        </form>
            </div>

@endsection

{{-- <script  type="text/javascript" src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script> --}}




