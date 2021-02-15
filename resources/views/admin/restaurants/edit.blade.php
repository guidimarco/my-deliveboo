@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Ristorante</h1>
                <form action="#" method="post">
                    {{-- {{ route('admin.restaurants.update', ['restaurant' => $restaurant->id]) }} --}}
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Nome Ristorante</label>
                        <input type="text" name="name" class="form-control" placeholder="Inserisci il nome" value="{{old('name', $restaurant->name)}}" required>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Indirizzo</label>
                        <input name="address" type="text" class="form-control" placeholder="Inserisci indirizzo" required value="{{old('address',$restaurant->address )}}">
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>P. Iva</label>
                        <input name="piva" type="text" class="form-control" placeholder="Inserisci la partita iva" required value="{{old('piva', $restaurant->piva)}}">
                        @error('piva')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input name="img_cover" type="file" class="form-control-file">
                        @error('img_cover')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <p>Seleziona la categoria:</p>
                        @foreach ($categories as $category)
                            <div class="form-check">
                                @if($errors->any())
                                    <input name="categories[]" class="form-check-input" type="checkbox" value="{{ $category->id }}"
                                    {{ in_array($restaurant->id, old('restaurants', [])) ? 'checked=checked' : '' }}>
                                @else
                                    <input name="categories[]" class="form-check-input" type="checkbox" value="{{ $category->id }}"
                                    {{ $restaurant->categories->contains($category) ? 'checked=checked' : '' }}>
                                @endif
                                <label class="form-check-label">
                                    {{ $category->name }}
                                </label>
                            </div>
                        @endforeach
                        @error('categories')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg> Crea Ristorante
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
