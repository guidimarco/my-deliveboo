@extends('layouts.app')
@section('page-title', 'Deliveboo - Consegna a domicilio')

@section('script')
    <script src="{{ asset('js/homepage.js') }}" defer></script>
@endsection

@section('content')
    <div id="welcome-blade">
        <!-- Jumbotron di benvenuto -->
        <section id="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>Benvenuto</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main App: Filtri per categorie e stampa ristoranti -->
        <div id="app">
            <div class="container mb-4 mt-4" >
                <div class="row cat-row mb-2">

                    <div class="col-12">
                        <h2>
                            La selezione di DeliveBoo
                        </h2>
                    </div>

                    <!-- Categorie -->
                    <div class="col-12" id="category-container">

                        <div class="category-container d-flex justify-content-between" id="cat">
                            {{-- Pulsanti categorie --}}
                            <div v-for="(category,index) in categories" class="mr-2 card-size p-4" :class="selectedCategories.includes(category.id)? 'selected' : ''" @click="selectedCategory(category.id)"  >
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
            <div class="container mb-4 mt-4" id="restaurant-container">
                <div class="row">

                    <div class="col-12">
                        <h2>
                            Ristoranti che consegnano nella tua città
                        </h2>
                    </div>

                    <!-- Container Ristoranti -->
                    <div class="d-flex flex-wrap justify-content-between col-lg-12">

                        <!-- Card del ristorante -->
                        <div v-for="(restaurant,index) in restaurants" class="card bg-light mb-3 restaurant-card" >

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
                                    <h5 class="card-title">@{{ restaurant.name }}</h5>
                                    <p class="card-text">
                                        <strong>Indirizzo:</strong> @{{ restaurant.address }}
                                    </p>
                                    <p class="card-text">
                                        <strong>P.IVA:</strong> @{{restaurant.piva }}
                                    </p>
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
