@extends('backend.master')

@section('content')

<style>
    .report-container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
        color: #333;
    }

    .card {
        border: none;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #007bff;
        color: #fff;
        border-radius: 10px 10px 0 0;
        padding: 15px;
    }

    .card-body {
        padding: 20px;
    }

    .card-body p {
        font-size: 1.1em;
        color: #333;
    }

    .btn-primary {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .no-data {
        text-align: center;
        font-size: 1.2em;
        color: #777;
    }
</style>

<div class="report-container">
    <h1>Monthly Report</h1>

    @if($topFood)
    <div class="card">
        <div class="card-header">
            <h2>Top Selling Food of the Month</h2>
        </div>
        <div class="card-body">
            <p><strong>Food Name:</strong> {{ $topFood->name }}</p>
            <p><strong>Total Quantity Sold:</strong> {{ $topFood->total_quantity }}</p>
        </div>
    </div>
    <!-- Print Button -->
    <button onclick="printReport()" class="btn btn-primary mt-3">Print Report</button>
    @else
    <p class="no-data">No sales data available for this month.</p>
    @endif
</div>

<script>
    function printReport() {
        window.print();
    }
</script>



<div>
<form action="{{route('report.list')}}" method="get" class="w-full">
    <div class="px-4" id="hub_div">
        <label for="from" class="block mt-3 mb-1 text-sm font-medium text-gray-900 dark:text-gray">From:</label>
        <div class="relative max-w-sm">
            <div class="absolute inset-y-0 start-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </div>
            <input name="from_date" value="{{ request()->query('from_date') ?? now()->subDays(90)->format('d/m/Y') }}"  datepicker-format="dd/mm/yyyy" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Select date" autocomplete="off">
        </div>

    </div>
    <div class="px-4" id="hub_div">
        <label for="to" class="block mt-3 mb-1 text-sm font-medium text-gray-900 dark:text-gray">To:</label>
        <div class="relative max-w-sm">
            <div class="absolute inset-y-0 start-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </div>
            <input name="to_date" value="{{ request()->query('to_date') ?? now()->format('d/m/Y') }}"  datepicker-format="dd/mm/yyyy" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Select date" autocomplete="off">
        </div>
    </div>

    <div class="mt-1.5">
        <button type="submit" class="btn btn-success">
            Submit
        </button>
        @if (request()->query('from_date') ||
        request()->query('to_date'))
        <a href="{{ route('order.list', ['status' => request()->query('status')]) }}" class="btn btn-danger">
            Reset
        </a>
        @endif

    </div>
</form>


    <h1> Order Report- found ({{ $list->count() }}) data</h1>
    <button onclick="printOrderReport()" class="btn btn-primary mt-3">Print </button>

    <table class="table">
        <thead>

            <tr>
                <th scope="col">ID</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Date</th>

                <th scope="col">Total Price</th>
                <th scope="col">Transaction ID</th>
                <th scope="col">Payment Method</th>
                <th scope="col">Payment Status</th>
            </tr>
        </thead>
        <tbody>
            @if($list->count()>0)
            @foreach($list as $key=>$order)
          
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{$order->customer->name}}</td>
                <td>{{ $order->created_at }}</td>
                <td>BDT.{{ $order->total_price }} </td>
                <td>{{ $order->transaction_id }}</td>
                <td>{{ $order->payment_method }}</td>
                <td>{{ $order->payment_status }}</td>
            </tr>
          
            @endforeach

            @else

        <p>No data found in this date range</p>
            @endif

        </tbody>
    </table>
</div>
<script>
    function printOrderReport() {
        window.print();
    }
</script>



@endsection