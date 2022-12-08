@extends("layouts.public")

@section("page_title")
    {{$product->title}}
@endsection

@section("main_content")
    <h1>{{$product->title}}</h1>
    <hr>
@endsection