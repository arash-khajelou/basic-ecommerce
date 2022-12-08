@extends("layouts.admin")

@section("page_title")
    Create new user
@endsection

@section("main_content")
    <form action="{{route("admin.user.store")}}" method="POST">
        {{csrf_field()}}
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{old("first_name")}}">
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{old("last_name")}}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="{{old("email")}}">
        </div>

        <div class="mb-3">
            <div class="form-check form-switch">
                <input class="form-check-input" name="is_admin" value="1" type="checkbox" role="switch" id="is_admin"
                        {{old("is_admin", false) ? "checked" : ""}}>
                <label class="form-check-label" for="is_admin">Is your user admin?</label>
            </div>
        </div>

        <div class="mb-3">
            <div class="form-check form-switch">
                <input class="form-check-input" name="is_customer" value="1" type="checkbox" role="switch"
                       id="is_customer"
                        {{old("is_customer", false) ? "checked" : ""}}>
                <label class="form-check-label" for="is_customer">Is your user customer?</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="{{old("password")}}">
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Password confirmation</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                   value="{{old("password_confirmation")}}">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection