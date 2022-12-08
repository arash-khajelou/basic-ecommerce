@extends("layouts.public")

@section("extra_css")
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection

@section("page_title")
    List of products
@endsection

@section("main_content")
    @foreach($products->chunk(4) as $row)
        <div class="row">
            @foreach($row as $product)
                @include("public._product", compact("product"))
            @endforeach
        </div>
    @endforeach

    <div class="row">
        {{ $products->links() }}
    </div>
@endsection