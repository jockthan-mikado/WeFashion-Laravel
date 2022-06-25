@extends('layouts.master')
@section('barmenu')
    @include('partials.menuadmin')
@endsection
@section('content')

<<div class="container">
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
@endsection

