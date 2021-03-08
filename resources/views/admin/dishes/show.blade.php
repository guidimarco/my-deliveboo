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


                    <div class="d-lg-none">
                        <p>
                            Gestisci i tuoi ristoranti su dispositivi con schermo di larghezza maggiore di 992px.
                        </p>
                    </div>

                    <div class="d-none d-lg-block">
                        <div class="dish-infos">
                            <h4>{{$dish->name}}</h4>

                            <div class="d-flex justify-content-center dish-cover-container">
                                @if($dish->img_cover)
                                    <img class="" src="{{asset("storage/uploads/dishes/".$dish->img_cover)}}" alt="{{$dish->name}}">
                                @else
                                    <img class="" src="{{ asset("/images/img-not-found.png") }}" alt="img not found">
                                @endif
                            </div>

                            <ul>
                                <li class="d-block">Id piatto: {{$dish->id}}</li>
                                <li class="d-block">Nome ristorante: {{$dish->restaurant->name}}</li>
                                <li class="d-block">Nome: {{$dish->name}}</li>
                                <li class="d-block">Descrizione: {{$dish->description? $dish->description : "/" }}</li>
                                <li class="d-block">Ingredienti: {{$dish->ingredients}}</li>
                                <li class="d-block">Prezzo: {{$dish->unit_price}}€</li>
                                <li class="d-block">Nome: {{$dish->name}}</li>
                                <li class="d-block">Visibilità: {{$dish->visible == 0 ? "Non Visibile" : "Visibile"}}</li>
                            </ul>

                        </div>

                        <div class="mt-2">
                            <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary-alt">
                                🠔 Torna a tutti i piatti
                            </a>
                            <a href="{{ route('admin.dishes.edit', ['dish' => $dish->slug]) }}" class="btn btn-primary-brand">
                                Modifica questo piatto
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
