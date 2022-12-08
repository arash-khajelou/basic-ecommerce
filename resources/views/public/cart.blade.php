@extends("layouts.public")

@section("page_title")
    Cart page
@endsection

@section("main_content")
    <h1>This is your cart</h1>
    <hr>
    @foreach($cart_rows as $index => $cart_row)
        <div class="row" style="margin-bottom: 15px">
            <div class="col-1">{{$index+1}}</div>
            <div class="col-3">{{$cart_row->product->title}}</div>
            <div class="col-2">
                <div class="row"> single price: ${{number_format($cart_row->product->price)}}</div>
                <div class="row"> count: {{$cart_row->count}}</div>
                <div class="row"> sum price: ${{number_format($cart_row->product->price * $cart_row->count)}}</div>
            </div>
            <div class="col-2">
                <form action="{{route("cart.update-product", $cart_row->product)}}" method="POST">
                    {{csrf_field()}}
                    {{method_field("PATCH")}}
                    <div class="row">
                        <div class="mb-3">
                            <label for="count" class="form-label">Count</label>
                            <input type="number" class="form-control" id="count" name="count"
                                   value="{{$cart_row->count}}">
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-sm btn-dark">update count</button>
                    </div>
                </form>
            </div>
            <div class="col-4">
                <a href="{{route("cart.remove-product", $cart_row->product)}}" class="btn btn-sm btn-danger">Delete from cart</a>
            </div>
            <hr style="margin-top: 15px">
        </div>
    @endforeach
@endsection