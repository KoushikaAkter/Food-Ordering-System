
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login V19</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="images/icons/favicon.ico" />

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v19/vendor/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v19/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v19/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v19/vendor/animate/animate.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v19/vendor/css-hamburgers/hamburgers.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v19/vendor/animsition/css/animsition.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v19/vendor/select2/select2.min.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v19/vendor/daterangepicker/daterangepicker.css">

<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v19/css/util.css">
<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v19/css/main.css">

<meta name="robots" content="noindex, follow">
</head>
<body>
<div class="limiter">
<div class="container-login100">
<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
<form class="login100-form validate-form" action="{{route('admin.do.login')}}" method="post">
	@csrf
<span class="login100-form-title p-b-33">
Account Login
</span>
<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
<input class="input100" type="text" name="email" placeholder="Email">
<span class="focus-input100-1"></span>
<span class="focus-input100-2"></span>
</div>
<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
<input class="input100" type="password" name="password" placeholder="Password">
<span class="focus-input100-1"></span>
<span class="focus-input100-2"></span>
</div>
<div class="container-login100-form-btn m-t-20">
<button type="submit" class="login100-form-btn">
Sign in
</button>
</div>


<script src="https://colorlib.com/etc/lf/Login_v19/vendor/jquery/jquery-3.2.1.min.js"></script>

<script src="https://colorlib.com/etc/lf/Login_v19/vendor/animsition/js/animsition.min.js"></script>

<script src="https://colorlib.com/etc/lf/Login_v19/vendor/bootstrap/js/popper.js"></script>
<script src="https://colorlib.com/etc/lf/Login_v19/vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="https://colorlib.com/etc/lf/Login_v19/vendor/select2/select2.min.js"></script>

<script src="https://colorlib.com/etc/lf/Login_v19/vendor/daterangepicker/moment.min.js"></script>
<script src="https://colorlib.com/etc/lf/Login_v19/vendor/daterangepicker/daterangepicker.js"></script>

<script src="https://colorlib.com/etc/lf/Login_v19/vendor/countdowntime/countdowntime.js"></script>

<script src="https://colorlib.com/etc/lf/Login_v19/vendor/countdowntime/countdowntime.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vedd3670a3b1c4e178fdfb0cc912d969e1713874337387" integrity="sha512-EzCudv2gYygrCcVhu65FkAxclf3mYM6BCwiGUm6BEuLzSb5ulVhgokzCZED7yMIkzYVg65mxfIBNdNra5ZFNyQ==" data-cf-beacon='{"rayId":"8841de36efd43c64","version":"2024.4.1","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>
</body>
</html>
