@extends('layouts.dashboard')

@section('script')
    <script src="{{ asset('js/orders.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">
        <div id="app" class="row table-container">

            <input id="user-id" type="text" value="{{ Auth::user()->id }}" hidden>

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
                        Tutti gli ordini
                    </h4>

                    <div class="d-lg-none">
                        <p>
                            Gestisci i tuoi ristoranti su dispositivi con schermo di larghezza maggiore di 992px.
                        </p>
                    </div>

                    <div class="d-none d-lg-block">
                        <!-- select Ristoranti dell'utente -->
                        <h5>Filtra i tuoi ristoranti</h5>
                        <select name="restaurant_id" @change="filterOrders($event)">
                            <option value="">Tutti i ristoranti</option>
                            <option :value="restaurant.id" v-for="restaurant in restaurants">
                                @{{restaurant.id}} - @{{restaurant.name}}
                            </option>
                        </select>

                        <!-- tabella piatti -->
                        <h5>I tuoi ordini</h5>
                        <table class="table table-sm table-bordered table-hover text-center">
                            <!-- intestazione -->
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Ristorante</th>
                                    <th scope="col">Totale</th>
                                    <th scope="col">Modifica</th>
                                </tr>
                            </thead>

                            <!-- righe -->
                            <tbody>
                                <tr v-for="order in orders" v-if="selectedRestaurantId == 0 || selectedRestaurantId == order.restaurant_id">
                                    <th scope="row"  class="align-middle">@{{ order.id }}</th>
                                    <td  class="align-middle">@{{ order.created_at }}</td>
                                    <td  class="align-middle">@{{ order.restaurant_id }} - @{{ order.restaurant_name }}</td>
                                    <td  class="align-middle">@{{ order.amount }} €</td>
                                    <td>
                                        <a :href="'http://localhost:8000/admin/orders/' + order.id" class="btn btn-primary-brand">
                                            Dettagli
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
