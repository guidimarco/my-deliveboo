@extends('layouts.dashboard')

@section('content')
    <div class="container">
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
                    <h1>
                        Benvenuto {{ Auth::user()->name }}
                    </h1>

                    <div class="d-lg-none">
                        <p>
                            Gestisci i tuoi ristoranti su dispositivi con schermo di larghezza maggiore di 992px.
                        </p>
                    </div>

                    <ul>
                        <li class="d-block">
                            #{{ Auth::user()->id }} {{ Auth::user()->name }}
                        </li>
                        <li class="d-block">
                            Creato il: {{ date_format(Auth::user()->created_at, 'D d/m/Y') }}
                        </li>
                        <li class="d-block">
                            E-mail: {{ Auth::user()->email }}
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endsection
