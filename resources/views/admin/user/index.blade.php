@extends("layouts.admin")

@section("page_title")
    Users Index
@endsection

@section("extra_css")
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection

@section("main_content")
    <div class="row mb-6">
        <a class="btn btn-success" href="{{route("admin.user.create")}}">Add new user</a>
    </div>

    <div class="row mb-6">
        {{ $users->links() }}
    </div>
    <div class="row mb-6">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">User Type</th>
                <th scope="col">Joined At</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $index => $user)
                <tr>
                    <th scope="row">{{$index+1}}</th>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->user_type}}</td>
                    <td>{{$user->created_at->format("Y-m-d H:i:s")}}</td>
                    <td>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-sm btn-warning" href="{{route("admin.user.edit", $user)}}">edit</a>
                            </div>
                            <div class="col">
                                <form action="{{route("admin.user.destroy", $user)}}" method="POST">
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
        {{ $users->links() }}
    </div>
@endsection