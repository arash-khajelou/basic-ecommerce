<div class="col-3" style="padding: 30px" >
    <div class="row">
        <img class="img-thumbnail img-fluid" src="{{$product->image_src}}" alt="{{$product->title}}">
    </div>
    <div class="row">
        <h4><a href="{{route("public.product.show", $product)}}">{{$product->title}}</a></h4>
    </div>
    <div class="row">
        <h6>${{number_format($product->price)}}</h6>
    </div>
    <div class="row">
        @if(is_product_in_cart($product))
            <a href="{{route("cart.remove-product", $product)}}" class="btn btn-warning">Remove from cart</a>
        @else
            <a href="{{route("cart.add-product", $product)}}" class="btn btn-dark">Add to cart</a>
        @endif
    </div>
</div>