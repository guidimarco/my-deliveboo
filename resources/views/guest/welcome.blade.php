@extends('layouts.app')
@section('page-title', 'Deliveboo - Consegna a domicilio')

@section('script')
    <script src="{{ asset('js/homepage.js') }}" defer></script>

    @if (session("success_message"))
        <script type="text/javascript">
            localStorage.clear();
        </script>
    @endif
@endsection

@section('content')
    <div id="welcome-blade">
        <!-- Jumbotron di benvenuto -->
        <section id="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-12 jumb text-wrap">
                        <h1>#aCasaTuaConDeliveboo!</h1>
                    </div>
                </div>
            </div>
            <div class="waves">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#eeeeee" fill-opacity="1" d="M0,192L48,170.7C96,149,192,107,288,96C384,85,480,107,576,117.3C672,128,768,128,864,122.7C960,117,1056,107,1152,112C1248,117,1344,139,1392,149.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
            </div>
        </section>
        <!-- Main App: Filtri per categorie e stampa ristoranti -->
        <div id="app" class="main" v-cloak>
            <div class="container" >
                <div class="row cat-row">

                    {{-- Messaggio di avvenuto ordine --}}
                    @if (session("success_message"))
                        <div class="alert alert-success w-100" role="alert">
                            <h4 class="alert-heading">Well done!</h4>
                            <p>{{session("success_message")}}</p>
                            <hr>
                            <p class="mb-0">Acquista ancora presso uno dei nostri ristoranti!</p>
                        </div>
                    @endif


                    <div class="col-12">
                        <h2>
                            La selezione di DeliveBoo
                        </h2>
                    </div>

                    <!-- Categorie -->
                    <div class="col-11 col-md-12" id="category-container">

                        <div class="category-container d-flex justify-content-between" id="cat">
                            {{-- Pulsanti categorie --}}
                            <div v-for="(category,index) in categories" class="mr-2 card-size p-1" :class="selectedCategories.includes(category.id)? 'selected' : ''" @click="selectedCategory(category.id)" :id="category.name">
                                <span>@{{category.name}}</span>
                            </div>
                        </div>

                        {{-- Freccia sinistra --}}
                        <div class="category-arrow left" @click="moveLeft">
                            <i class="fas fa-chevron-left"></i>
                        </div>

                        {{-- Freccia destra --}}
                        <div class="category-arrow right" @click="moveRight">
                            <i class="fas fa-chevron-right"></i>
                        </div>

                    </div><!-- Categorie -->
                </div><!-- Fine Row Categorie -->

                <!-- Bottone rimuovi i filtri -->
                <div class="btn btn-warning ml-1" @click="clearCategories()">
                    Rimuovi filtri
                </div>
            </div>

            <!-- Ristoranti -->
            <div class="container  mt-4" id="restaurant-container">
                <div class="row">

                    <div class="col-12">
                        <h2>
                            Ristoranti che consegnano nella tua città
                        </h2>
                    </div>

                    <!-- Container Ristoranti -->
                    <div class="d-flex flex-wrap flex-conditions mb-5">

                        <!-- Card del ristorante -->
                        <div v-for="(restaurant,index) in restaurants" class="card mb-3 restaurant-card bg-light" >

                            <a :href="'/show/'+restaurant.slug">
                                {{-- Cover image --}}
                                <div v-if="restaurant.img_cover"  class="cover-container">
                                    <img :src="url_base + restaurant.img_cover" :title="restaurant.id + ' - ' + restaurant.name" class="card-img-top " />
                                </div>
                                <div  v-else class="cover-container">
                                    <span>Immagine non presente</span>
                                </div>
                                {{-- Info ristorante --}}
                                <div class="card-body">
                                    <h3 class="card-title">@{{ restaurant.name }}</h3>
                                    <p class="card-text">
                                        <strong>Indirizzo:</strong> @{{ restaurant.address }}
                                    </p>
                                    {{-- <p class="card-text">
                                        <strong>P.IVA:</strong> @{{restaurant.piva }}
                                    </p> --}}
                                    <p class="card-text">
                                        <strong>Categorie:</strong> <span v-for="category in restaurant.categories" class="badge badge-info ml-1"> @{{category.name}}</span>
                                    </p>
                                </div>
                            </a>


                        </div><!-- END Card del ristorante -->
                    </div><!-- END Container Ristoranti -->
                </div>
            </div>
        </div><!-- END Main App -->
    </div>


@endsection
