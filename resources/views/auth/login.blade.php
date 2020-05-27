<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Login | RisingTideAfrica</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Mactavis" name="author">
    <link rel="shortcut icon" href="http://lexa-v.laravel.themesbrand.com/assets/images/favicon.ico">


    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/css/metismenu.css" rel="stylesheet" type="text/css">
    <link href="/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        .jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}
    </style>
</head>
<body>

<div id="wrapper">

    <div class="wrapper-page">

        @if(session()->has('success'))
            <div class="alert alert-primary">
                {{ session()->get('success') }}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">

                <h3 class="text-center m-0">
                    <a href="#" class="logo logo-admin">
                        <img src="/favicon.png" alt="logo">
                    </a>
                </h3>

                <div class="p-3">
                    <h4 class="text-muted font-18 m-b-5 text-center">Welcome Back !</h4>
                    <p class="text-muted text-center">Sign in to continue to RisingTideAfrica.</p>

                    <form class="form-horizontal m-t-30" action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" required name="email" class="form-control" id="email" placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" required name="password" class="form-control" id="password" placeholder="Enter password">
                        </div>

                        <div class="form-group row m-t-20">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox">
                                    <input name="remember" type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>

                        <div class="form-group m-t-10 mb-0 row">
                            <div class="col-12 m-t-20">
                                <a href="/admin/forgot-password" class="text-muted">
                                    <i class="fa fa-lock"></i> Forgot your password?</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>

</div>

<script src="/js/jquery_003.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/metisMenu.js"></script>
<script src="/js/jquery.js"></script>
<script src="/js/waves.js"></script>

<script src="/js/jquery_002.js"></script>
<script src="/js/app.js"></script>



</body>
</html>
