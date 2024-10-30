
@extends('customer.layouts.shop')

@section('categories_list')

@foreach ( $categories as $category)

<li class="pb-3">
    <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
        {{$category->category_name}}
        <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
    </a>
    <ul class="collapse show list-unstyled pl-3">
        @foreach ($category->subcategories as $subcategory)
        <li>
            <a class="text-decoration-none" href="{{ route('product.productperCategory', ['subcategory' => $subcategory->id]) }}">
                {{ $subcategory->name }}
            </a>
        </li>
        
        @endforeach
    </ul>
</li>

@endforeach

@section('product_list')
<div class="row">
    @foreach ($products as $product)
    <div class="col-md-4">
        <div class=" card mb-4 product-wap rounded-0">
           
            <div class="card rounded-0">
                <img class="card-img rounded-0 img-fluid" src="{{ asset('storage/' . $product->image) }}" alt="{{$product->name}}">
                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                    <ul class="list-unstyled">
                        <li><a class="btn btn-success text-white" href="shop-single.html"><i class="far fa-heart"></i></a></li>
                        <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="far fa-eye"></i></a></li>
                        <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="fas fa-cart-plus"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <a href="shop-single.html" class="h3 text-decoration-none">{{$product->name}}</a>
                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                    <li>{{$product->subcategories->name}}</li>
                    
                    <li class="pt-2">
                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                    </li>
                </ul>
                <ul class="list-unstyled  mb-1">
                    <li>{{$product->store->name}}</li>
                </ul>
                <p class="text-center mb-0">$ . {{$product->price}}</p>
            </div>
           
           
        </div>
    </div>
    @endforeach
</div>

    


@endsection

@endsection