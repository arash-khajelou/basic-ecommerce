@extends("layouts.public")

@section("page_title")
    Home page
@endsection

@section("main_content")
    <h1>Hi, welcome to my awesome shop!</h1>

    <h2>Here you can see the list of top products</h2>
    <br>
    <div class="row">
        @foreach($top_products as $product)
            @include("public._product", compact("product"))
        @endforeach
    </div>
@endsection