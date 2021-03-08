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
                        I miei Ristoranti
                    </h1>
                </div>

                <div class="d-lg-none">
                    <p>
                        Gestisci i tuoi ristoranti su dispositivi con schermo di larghezza maggiore di 992px.
                    </p>
                </div>

                <div class="d-none d-lg-block">
                    {{-- Bottone per creare un nuovo ristorante --}}
                    <div>
                        <a class="d-block btn btn-primary-brand my-4" href="{{ route('admin.restaurants.create') }}">Crea nuovo ristorante <i class="fas fa-plus"></i></a>
                    </div>

                    @if(count($restaurants) > 0)
                        @foreach ($restaurants as $restaurant)
                            <div class="card restaurant-dashboard-card w-100 justify-content-between my-2">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $restaurant->id }} - {{ $restaurant->name }}</h5>
                                    <p class="card-text">Indirizzo: {{ $restaurant->address }}</p>
                                    <p class="card-text">P. IVA: {{ $restaurant->piva }}</p>
                                    <a class="btn btn-primary-alt  d-md-inline-block" href="{{ route('admin.restaurants.edit', ['restaurant' => $restaurant->slug]) }}">
                                        Modifica
                                    </a>
                                </div>

                                <!-- img di copertirna -->
                                <div class="restaurant-img-container">
                                    @if($restaurant->img_cover)
                                        <img class="restaurant-img" src="{{ asset("storage/uploads/restaurants/".$restaurant->img_cover) }}" alt="">
                                    @else
                                        <img class="restaurant-img" src="{{ asset("/images/img-not-found.png") }}" alt="">
                                    @endif
                                </div>

                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
