@extends("layouts.public")

@section("page_title")
    Invoice checkout
@endsection

@section("main_content")

    <ul>
        @foreach($invoice->rows as $invoice_row)
            <li>
                {{$invoice_row->product->title}} / {{$invoice_row->product_count}} x {{number_format($invoice_row->product_price)}}
            </li>
        @endforeach

    </ul>
    <hr>
    <h3>the sum value is: {{number_format($invoice->sum)}}</h3>
    <form action="/pay">
        <button class="btn btn-success">Pay</button>
    </form>

@endsection