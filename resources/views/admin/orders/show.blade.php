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
                    <h4>
                        Dettagli ordine
                    </h4>

                    <div class="d-lg-none">
                        <p>
                            Gestisci i tuoi ristoranti su dispositivi con schermo di larghezza maggiore di 992px.
                        </p>
                    </div>

                    <div class="d-none d-lg-block">
                        <!-- tabella piatti -->
                        <h5>I tuoi ordini</h5>
                        <table class="table table-sm table-bordered table-hover text-center">
                            <!-- intestazione -->
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Nome piatto</th>
                                    <th scope="col">Prezzo</th>
                                    <th scope="col">Quantità</th>
                                </tr>
                            </thead>

                            <!-- righe -->
                            <tbody>
                                @foreach ($orderDetails->order_items as $item)
                                    <tr>
                                        <th scope="row"  class="align-middle">{{ $item->id }}</th>
                                        <td  class="align-middle">{{ $item->dish_name }}</td>
                                        <td  class="align-middle">{{ $item->unit_price }}€</td>
                                        <td  class="align-middle">{{ $item->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div>
                            <a href="{{ route('admin.orders') }}" class="btn btn-primary-brand">
                                🠔 Indietro
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
