@extends("layouts.admin")

@section('content')


<div class="row">

@include('partials.menuadmin')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Informations du produit</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="{{ route('products.create') }}">
                    <button class="btn btn-sm btn-outline-secondary">
                        <span data-feather="calendar"></span>
                        Nouveau Produit
                    </button></a>
                </div>
            </div>
    <div class="row justify-content-between">
        <div class="col-6">
            <div class="card mb-4 box-shadow">
                <img  src="{{asset('images/'.$product->picture->link)}}" alt="{{$product->picture->title}}">
            </div>
        </div>
        <div class="col-6">
            <h1 class="jumbotron-heading">{{$product->name}}</h1>
            <h5>  {{ number_format ($product->price,2)}} €</h5>
            <p class="lead text-muted">{{$product->description}}</p>

            <p><strong>Référence produit : </strong>{{ $product->reference }} </p>
            <hr>
            <label for="size"> taille</label>

            Taille(s) :<br>

            @foreach ($sizes as $size)
            <label><input type="checkbox" name="sizes[]" value="{{$size->id}}" {{in_array($size->id, old('sizes', $checkedSizes))? 'checked':'' }} >  {{$size->name}}</label><br>
            @endforeach
            {{-- <select class="custom-select my-4">
                @foreach ($sizes as $size)
                <option value="{{ $size->id }}">{{ $size->name }}</option>
                @endforeach
            </select> --}}

        </div>
    </div>
</div>
</div>


@endsection

