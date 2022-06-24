@extends('main')

@section( 'content')
    <div class="album py-5 bg-light">
        <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($products as $product)
                <div class="col">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top"  width="100%" height="400" src="{{asset('images/'.$product->picture->link)}}" alt="{{$product->picture->title}}"  />
                        {{--<img src="{{asset('images/'.$book->picture->link)}}" alt="{{$book->picture->title}}">--}}

                        <div class="card-body">
                            <p class="card-text">{{$product->name}} <br>{{$product->description}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price"> {{ number_format ($product->price,2)}} € </span>
                                <a href="{{ route('voir_produit',$product->id) }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
        </div>
    </div>
@endsection


