<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Shop | @yield("page_title")</title>

    @yield("extra_css")
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">My Shop!</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route("public.index")}}">{{__("Home page")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("public.product.index")}}">{{__("Products")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("public.contacts")}}">{{__("Contact Us")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("cart.index")}}">
                        <span class="badge text-bg-secondary">{{get_cart_count()}}</span>
                        {{__("Your cart")}}
                    </a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<div class="container">
    @if($errors->any())
        <div class="offset-3 col-6">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <div>
                        {{$error}}
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    <div class="main-container">
        @yield("main_content")
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>