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

    {{-- @if(Session::has('success'))
    <div class="alert alert-primary">
        {{Session('success')}}
    </div>
    @endif --}}
    <div class="table-responsive">
        <table id="basic-datatables" class="display table table-striped table-hover" >
            <a href="{{route('donasi.create')}}" class="btn btn-secondary btn-round">Add donasi</a>
            <thead>
                <tr>
                    <th>N0</th>
                    <th>Nama</th>
                    <th>alamat</th>
                    <th>bukti pembayaran</th>
                    <th>nomor telepon</th>
                    <th>pembayaran</th>
                    <th>jumlah</th>
                    <th>status</th>
                    <th>campaign nama</th>



                    <th>approve/disapprove</th>
                    <th>action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>N0</th>
                    <th>Nama</th>
                    <th>alamat</th>
                    <th>bukti pembayaran</th>

                    <th>nomor telepon</th>
                    <th>pembayaran</th>
                    <th>jumlah</th>
                    <th>status</th>
                    <th>campaign nama</th>

                    <th>approve/disapprove</th>

                    <th>action</th>


                </tr>
            </tfoot>
            <tbody>
                @php
                $no = 1;
                @endphp

                @foreach($donasi as $item)


                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->nama}}</td>

                    <td>{{$item->address}}</td>
                    {{-- <td>{{$item->gambar}}</td> --}}
                    <td><img width="150px" src="{{asset('artikel/'.$item->gambar)}}"></td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->pembayaran}}</td>
                    <td>{{$item->jumlah}}</td>


                    <td>@if($item->is_active)
                        <span class="badge badge-primary">sudah bayar</span>
                    @else
                        <span class="badge badge-danger">belum bayar</span>
                    @endif
                    </td>
                    <td>
                    @if(isset($item->campaign->title))
                    {{$item->campaign->title}}
                    @else
                    <p>campaign kosong</p>
                    @endif
                    </td>

                    {{-- <button id="decrease-button" {{ $item->amount === 0 ? 'disabled' : '' }}>Kurangi Donasi</button> --}}
                    <td>
                        {{-- <button id="decrease-button" {{  $item->is_active === 0 ? 'disabled' : '' }}>Kurangi Donasi</button> --}}
                        <a href="data/{{$item->id}}"  id="button-off" class="btn btn-success btn-xs {{ $item->is_active === 1 ? 'disabled' : '' }}">approve</a>
                        <a href="data/update/{{$item->id}}" id="decrease-button" class="btn btn-danger btn-xs  {{ $item->is_active === 0 ? 'disabled' : '' }}">not approve</a>
                    </td>

                    <td>

                        <a href="{{route('donasi.edit', $item->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>edit</a>
                            <form action="donasi/{{$item->id}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-xs">delete</button>
                                </form>
                    </td>



                </tr>
                @endforeach



            <tr>
                <td colspan="6" class="text-center">
                      @if($donasi->count() > 0)
                    @else
                    Data masih kosong
                </td>
            </tr>
            @endif
        </tbody>
        </table>


          <script>
            @foreach( $donasi as $item)
            const decreaseButton = document.querySelector('#decrease-button');
            const donationAmount = {{ $item->is_active }};
            if (donationAmount === 0) {
                // decreaseButton.disabled = true;
                decreaseButton.classList.add('disabled');
        decreaseButton.removeAttribute('href');

            }
            @endforeach
        </script>
         <script>
            @foreach( $donasi as $item)
            const button-off = document.querySelector('#button-off');
            const donation = {{ $item->is_active }};
            if (donation === 1) {
                // decreaseButton.disabled = true;
                button-off.classList.add('disabled');
                button-off.removeAttribute('href');

            }
            @endforeach
        </script>
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
