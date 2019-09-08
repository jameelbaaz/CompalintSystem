@extends('layouts.app')

@section('content')
         <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                <div class="" style="width: 500px">
                    {!! $chart->container() !!}
                </div>
                </div>
            </div>
@endsection
@section('scripts')
{!! $chart->script() !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>


@endsection