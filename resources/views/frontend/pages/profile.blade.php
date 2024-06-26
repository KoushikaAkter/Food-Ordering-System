@extends('frontend.master')

@section('content')
<div class="container" style="margin-top: 150px;">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-4">
                        <h1 class="ml-5"><Strong>Profile</Strong></h1>
                        <div class="d-flex justify-content-start">
                            <div class="image-container">
                                @if(auth()->user()->image)
                                    <img src="{{url('/uploads/customer' , $user->image) }}" alt="User Image" class="img-fluid rounded-circle" width="150">
                                @else
                                    <i class="fas fa-user-circle fa-5x"></i> <!-- User icon -->
                                @endif
                            </div>
                            <div class="userData ml-3">
                                <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold">
                                    <a href=""></a>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- User Information Display -->
                    
                    <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label style="font-weight:bold;">Full Name</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ auth()->user()->name }}
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label style="font-weight:bold;">Email</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ auth()->user()->email }}
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label style="font-weight:bold;">Contact Info</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ auth()->user()->phone }}
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label style="font-weight:bold;">Address</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ auth()->user()->address }}
                        </div>
                    </div>
                    </hr>
                    <br>
                    <a href="{{ route('edit.profile', auth()->user()->id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Serial</th>
            <th scope="col">Order Number</th>
            <th scope="col">Total Price</th>
            <th scope="col">Transaction ID</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Payment Status</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $key => $data)
        <tr>
            <th scope="row">{{ $key + 1 }}</th>
            <th scope="row">Order-{{ $data->id }}</th>
            <td>{{ $data->total_price }}</td>
           
            <td>{{ $data->transaction_id }}</td>
            <td>{{ $data->payment_method }}</td>
            <td>{{ $data->payment_status }}</td>
            <td>{{ $data->created_at }}</td>
            <td>
                <a class="btn btn-success" href="{{route('profile.view.order', $data->id)}}">View Order</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
