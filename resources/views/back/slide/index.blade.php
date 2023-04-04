@extends('layouts.default')
@section('content')

<div class="card-body">

    @if(Session::has('success'))
    <div class="alert alert-primary">
        {{Session('success')}}
    </div>
    @endif
    <div class="table-responsive">
        <table id="basic-datatables" class="display table table-striped table-hover" >
            <a href="{{route('slide.create')}}" class="btn btn-secondary btn-round">Add Customer</a>
            <thead>


                <tr>
                    <th>N0</th>
                    <th>judul</th>
                    <th>slug</th>
                    <th>kategori</th>

                    <th>action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N0</th>
                    <th>Nama</th>
                    <th>slug</th>
                    <th>kategori</th>

                    <th>action</th>


                </tr>
            </tfoot>
            <tbody>
                @php
                $no = 1;
                @endphp

                @foreach($slide as $item)


                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->judul_slide}}</td>

                    <td>{{$item->link}}</td>


                    <td><img width="150px" src="{{asset('artikel/'.$item->gambar_slide)}}"></td>
                    <td>
                        @if($item->is_active == 1)
                            Active
                        @else
                            draft
                        @endif

                    </td>

                    <td><a href="{{route('slide.edit', $item->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>edit</a>
                            <form action="slide/{{$item->id}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-xs">delete</button>
                                </form>
                    </td>
                </tr>
                @endforeach



            <tr>
                <td colspan="6" class="text-center">
                      @if($slide->count() > 0)
                    @else
                    Data masih kosong
                </td>
            </tr>
            @endif
        </tbody>
        </table>
@endsection
