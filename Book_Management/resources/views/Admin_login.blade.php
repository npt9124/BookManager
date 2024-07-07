
<!DOCTYPE html>

<head>
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href={{asset('GD/css/bootstrap.min.css')}} >
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href={{asset('GD/css/style.css')}} rel='stylesheet' type='text/css' />
    <link href={{asset('GD/css/style-responsive.css')}} rel="stylesheet"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href={{asset('GD/css/font.css')}} type="text/css"/>
    <link href={{asset('GD/css/font-awesome.css')}} rel="stylesheet">
    <!-- //font-awesome icons -->
    <script src={{asset('GD/js/jquery2.0.3.min.j')}}></script>

</head>
<body style="background-image: url({{asset('GD/images/bgmeo1.jpg')}}) ">

<div class="log-w3" style="margin-bottom: 200px" >

    <div class="w3layouts-main" style="background-image: url({{asset('GD/images/login1.jpg')}}); ">

        <h2>Sign In Now</h2>
        <?php
        $message = Session::get('message');
        if($message){
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',null);
        }
        ?>
        @if(Session::has('message'))
            <span class="text-alert alert-pink">{{ Session::get('message') }}</span>
            {{ Session::forget('message') }}
        @endif
        <form action={{URL::to('/dashboard')}} method="post" >
            {{ csrf_field() }}
            <input type="text" class="ggg" name="email" placeholder="Email" required="">
            <input type="password" class="ggg" name="password" placeholder="password" required="">
            <div class="form-group">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember" style="color:white">Remember me</label>
                <input type="hidden" id="remember_input" name="remember_input" value="0">
            </div>
            <h6><a href="#">Forgot Password?</a></h6>
            <div class="clearfix"></div>
            <input type="submit" value="Sign In" name="login">
        </form>
        <p>Don't Have an Account ?<a href="{{URL::to('/admin-register')}}">Create an account</a></p>

    </div>
</div>
<script src="public/GD/js/bootstrap.js"></script>
<script src="public/GD/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="public/GD/js/scripts.js"></script>
<script src="public/GD/js/jquery.slimscroll.js"></script>
<script src="public/GD/js/jquery.nicescroll.js"></script>
<script src="public/GD/js/jquery.scrollTo.js"></script>
</body>
</html>
