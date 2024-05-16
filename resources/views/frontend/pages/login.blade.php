@extends('frontend.master')
@section('content')
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://preview.colorlib.com/theme/bootstrap/login-form-11/css/style.css">
</head>
<body>
<section class="ftco-section">

</div>
<div class="row justify-content-center">
<div class="col-md-7 col-lg-5">
<div class="login-wrap p-4 p-md-5">
<div class="icon d-flex align-items-center justify-content-center">
<span class="fa fa-user-o"></span>
</div>
<h3 class="text-center mb-4">Sign In</h3>
<form action="{{route('login.success')}}" method="post" id="login-form">
 @csrf
<div class="form-group">
<input type="email" name="email" class="form-control rounded-left" placeholder="Username" required>
</div>
<div class="form-group d-flex">
<input type="password" name="password"class="form-control rounded-left" placeholder="Password" required>
</div>
<div class="form-group">
<button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
</div>
<div class="form-group d-md-flex">
<div class="w-50">
<label class="checkbox-wrap checkbox-primary">Remember Me
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</div>
<div class="w-50 text-md-right">
<a href="#">Forgot Password</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</section>
<script src="https://preview.colorlib.com/theme/bootstrap/login-form-11/js/jquery.min.js"></script>
<script src="https://preview.colorlib.com/theme/bootstrap/login-form-11/js/popper.js"></script>
<script src="js/https://preview.colorlib.com/theme/bootstrap/login-form-11/js/bootstrap.min.js"></script>
<script src="https://preview.colorlib.com/theme/bootstrap/login-form-11/js/main.js"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vedd3670a3b1c4e178fdfb0cc912d969e1713874337387" integrity="sha512-EzCudv2gYygrCcVhu65FkAxclf3mYM6BCwiGUm6BEuLzSb5ulVhgokzCZED7yMIkzYVg65mxfIBNdNra5ZFNyQ==" data-cf-beacon='{"rayId":"8842e6f80a8d8599","version":"2024.4.1","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>
</body>
</html>
@endsection