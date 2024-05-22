@extends('frontend.master')

@section('content')

<div class="container" style="margin-top: 150px;">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-4">
                        <div class="d-flex justify-content-start">
                            <div class="image-container">
                                <i class="fas fa-user-circle fa-5x"></i> <!-- User icon -->
                            </div>

                            <div class="userData ml-3">
                                <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);">User: {{auth()->user()->name}}</a></h2>
                            </div>
                        </div>
                    </div>
                    <!-- User Information Display -->
                    <form action="{{route('update.profile',$customer->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-sm-3 col-md-2 col-5">
                                <label style="font-weight:bold;">Full Name</label>
                            </div>
                            <div class="col-md-8 col-6">
                                <input type="text" value="{{$customer->name}}"  placeholder="Enter name" name="name"> 
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3 col-md-2 col-5">
                                <label style="font-weight:bold;">Email</label>
                            </div>
                            <div class="col-md-8 col-6">
                            <input type="text" value="{{$customer->email}}"  placeholder="Enter email" name="email"> 
                                
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3 col-md-2 col-5">
                                <label style="font-weight:bold;">Contact Info</label>
                            </div>
                            <div class="col-md-8 col-6">
                            <input type="text" value="{{$customer->phone}}"  placeholder="Enter phone" name="phone"> 
                                
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3 col-md-2 col-5">
                                <label style="font-weight:bold;">Address</label>
                            </div>
                            <div class="col-md-8 col-6">
                            <input type="text" value="{{$customer->address}}"  placeholder="Enter address" name="address"> 
                                
                            </div>
                        </div>
                        </hr>
                    <button class="btn btn-info">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection