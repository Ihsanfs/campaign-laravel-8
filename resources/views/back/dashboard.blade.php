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


    <div class="row">
        <div class="col-md-4 mt-4">
            <div class="card card-dark bg-info-gradient">
                <div class="card-body pb-0">
                    <div class="h1 fw-bold float-right"></div>
                    <h2 class="mb-2">{{$even}}</h2>
                    <p>Total Campaign</p>
                    <div class="pull-in sparkline-fix chart-as-background">
                        <div id="lineChart2"><canvas width="327" height="70" style="display: inline-block; width: 327px; height: 70px; vertical-align: top;"></canvas></div>
                    </div>
                </div>


            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card card-dark bg-secondary-gradient">
                <div class="card-body pb-0">
                    <div class="h1 fw-bold float-right"></div>
                    <h2 class="mb-2">{{$donasi}}</h2>
                    <p>Total Donasi</p>
                    <div class="pull-in sparkline-fix chart-as-background">
                        <div id="lineChart2"><canvas width="327" height="70" style="display: inline-block; width: 327px; height: 70px; vertical-align: top;"></canvas></div>
                    </div>
                </div>

            </div>
        </div>


    </div>
@endsection
