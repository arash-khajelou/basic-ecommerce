@extends("layouts.admin")

@section("page_title")
    Create new product
@endsection

@section("main_content")
    <form action="{{route("admin.product.store")}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old("title")}}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{old("price")}}">
        </div>
        <div class="mb-3">
            <label for="count" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="count" name="count" value="{{old("count")}}">
        </div>

        <div class="mb-3">
            <div class="form-check form-switch">
                <input class="form-check-input" name="is_available" value="1" type="checkbox" role="switch"
                       id="is_available"
                        {{old("is_available", false) ? "checked" : ""}}>
                <label class="form-check-label" for="is_available">Is your product available?</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="color_id" class="form-label">Color</label>
            <select class="form-control" id="color_id" name="color_id">
                @foreach($colors as $color)
                    <option value="{{$color->id}}">
                        {{$color->title}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Product photo</label>
            <input type="file" class="form-control" id="image" name="image" value="{{old("image")}}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{old("description")}}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection