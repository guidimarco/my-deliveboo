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
                        I miei piatti
                    </h1>

                    <div class="d-lg-none">
                        <p>
                            Gestisci i tuoi ristoranti su dispositivi con schermo di larghezza maggiore di 992px.
                        </p>
                    </div>

                    <div class="d-none d-lg-block">
                        <!-- btn aggiungi 1 piatto -->
                        <div class="my-3">
                            <a href="{{ route('admin.dishes.create') }}" class="d-block btn btn-primary-brand">
                                Aggiungi un piatto <i class="fas fa-plus"></i>
                            </a>
                        </div>

                        <!-- tabella piatti -->
                        <table class="table table-sm table-bordered table-hover text-center ">
                            <!-- intestazione -->
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="name">Nome</th>
                                    <th scope="col">Ristorante</th>
                                    <th scope="col">Pr. unitario</th>
                                    <th scope="col" class="btn-column">Azioni</th>
                                </tr>
                            </thead>

                            <!-- righe -->
                            <tbody>
                                @foreach ($restaurants as $restaurant)
                                    @foreach ($restaurant->dishes as $dish)
                                        <tr>
                                            <td  class="align-middle">{{ $dish->name }}</td>
                                            <td  class="align-middle">{{ $dish->restaurant->id }} - {{ $dish->restaurant->name }}</td>
                                            <td  class="align-middle">{{ $dish->unit_price }} €</td>
                                            <td>
                                                <a href="{{ route('admin.dishes.show', ['dish' => $dish->slug]) }}" class="btn btn-primary-alt">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.dishes.edit', ['dish' => $dish->slug]) }}" class="btn btn-primary-brand">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.dishes.destroy', ['dish' => $dish->id]) }}" method="post" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" name="button" class="btn btn-danger">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
