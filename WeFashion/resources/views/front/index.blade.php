@extends('layouts.master')
@section('barmenu')
    @include('partials.menu')
@endsection

@section('content')
    {{--<p class="lead text-muted" style="margin-left:7rem;margin-top:3px;margin-bottom: 3px;">Tous les produits</p>--}}
    <h1 class="jumbotron-heading" style="text-align: center;">Tous les produits</h1>

    {{--$products->links()--}}
    <div class="album py-5 bg-light">
        <div class="container">
        <span> {{ $numberProducts }} resultats</span>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            @foreach($products as $product)
                <div class="col">
                    <div class="card mb-4 box-shadow">
                        <a href="{{ route('showProduct',$product->id) }}"><img class="card-img-top"  width="100%" height="400" src="{{asset('images/'.$product->picture->link)}}" alt="{{$product->picture->title}}"  /></a>
                        <div class="card-body">
                            <p class="card-text">{{$product->name}} <br>{{ \Illuminate\Support\Str::limit($product->description,150)}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price"> {{ number_format ($product->price,2)}} € </span>
                                <a href="{{ route('showProduct',$product->id) }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @include('partials.pagination')
        </div>
    </div>

@endsection

