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
                    <h1>Ristorante</h1>

                    <div class="d-lg-none">
                        <p>
                            Gestisci i tuoi ristoranti su dispositivi con schermo di larghezza maggiore di 992px.
                        </p>
                    </div>

                    <div id="errors-root" class="d-none d-lg-block">
                        <form v-cloak name="testform" id="restaurant-form" action="{{route('admin.restaurants.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Nome Ristorante</label>
                                <input type="text" name="name" class="form-control" placeholder="Inserisci il nome" value="{{old('name')}}" required>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Indirizzo</label>
                                <input name="address" type="text" class="form-control" placeholder="Inserisci indirizzo" required value="{{old('address')}}">
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>P. Iva</label>
                                <input name="piva" type="text" class="form-control" placeholder="Inserisci la partita iva" required value="{{old('piva')}}">
                                @error('piva')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input name="img_file" type="file" class="form-control-file">
                                @error('img_file')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <p>Seleziona la categoria:</p>
                                @foreach ($categories as $category)
                                    <div class="form-check">
                                        <input name="categories[]" class="form-check-input" type="checkbox" value="{{ $category->id }}"
                                        {{ in_array($category->id, old('categories', [])) ? 'checked=checked' : '' }}>
                                        <label class="form-check-label">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                @endforeach
                                @error('categories')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- Messaggi di errore validazione front end --}}
                            <div class="errors-list mt-4 mb-4" v-if="errors.length">
                                <p class="alert alert-danger m-0" v-for="error in errors">@{{error}}</p>
                            </div>

                            <div class="d-inline-block">
                                <a href="{{route('admin.restaurants.index') }}" class="btn btn-primary-alt">
                                    🠔 Torna indietro
                                </a>
                            </div>
                            <div class="form-group d-inline-block">
                                <button type="submit" class="btn btn-primary-brand" @click="validateForm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg> Crea nuovo ristorante
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/validation.js') }}" defer></script>
@endsection
