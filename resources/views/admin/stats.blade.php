@extends('layouts.dashboard')

@section('script')
<script src="{{ asset('js/stats.js') }}" defer></script>

@endsection

@section('content')
    <div id="app" class="container">
        <div class="row">
            {{-- aside nav bar --}}
            <div class="d-none d-lg-block col-lg-4">
                @include('partials.dashboard.nav-aside')
            </div>

            <div class="col-12 col-lg-8">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="title my-2">
                    <h5>
                        Statistiche ordini
                    </h5>

                    <div class="d-lg-none">
                        <p>
                            Gestisci i tuoi ristoranti su dispositivi con schermo di larghezza maggiore di 992px.
                        </p>
                    </div>

                    <div class="d-none d-lg-block">
                        <input type="hidden" id="user-id" value="{{Auth::User()->id}}" />
                        <div class="row mt-3">
                            <div class="col-6">
                                <canvas id="myChart" width="600" height="600"></canvas>
                            </div>
                            <div class="col-6">
                                <canvas id="myNewChart" width="600" height="600"></canvas>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
