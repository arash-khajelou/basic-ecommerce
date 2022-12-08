@extends("layouts.admin")

@section("page_title")
    Product Index
@endsection

@section("extra_css")
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection

@section("main_content")
    <div class="row mb-6">
        <a class="btn btn-success" href="{{route("admin.product.create")}}">Add new product</a>
    </div>

    <div class="row mb-6">
        {{ $products->links() }}
    </div>
    <div class="row mb-6">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Is Available</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $index => $product)
                <tr>
                    <th scope="row">{{$index+1}}</th>
                    <td>{{$product->title}}</td>
                    <td>${{number_format($product->price)}}</td>
                    <td>{{$product->count}}</td>
                    <td>{{$product->is_available ? "Available" : "Not available"}}</td>
                    <td>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-sm btn-warning"
                                   href="{{route("admin.product.edit", $product)}}">edit</a>
                            </div>
                            <div class="col">
                                <form action="{{route("admin.product.destroy", $product)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field("DELETE")}}
                                    <button type="submit" class="btn btn-sm btn-danger">delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        {{ $products->links() }}
    </div>
@endsection