@extends("layouts.admin")

@section("page_title")
    Invoices Index
@endsection

@section("extra_css")
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection

@section("main_content")
    <div class="row mb-6">
        {{ $invoices->links() }}
    </div>
    <div class="row mb-6">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Sum Amount</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($invoices as $index => $invoice)
                <tr>
                    <th scope="row">{{$index+1}}</th>
                    <td>{{$invoice->user->first_name}}</td>
                    <td>{{$invoice->user->last_name}}</td>
                    <td>{{$invoice->sum}}</td>
                    <td>{{$invoice->created_at->format("Y-m-d H:i:s")}}</td>
                    <td>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-sm btn-success" href="{{route("admin.invoice.show", $invoice)}}">show</a>
                            </div>
                            <div class="col">
                                <form action="{{route("admin.invoice.destroy", $invoice)}}" method="POST">
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
        {{ $invoices->links() }}
    </div>
@endsection