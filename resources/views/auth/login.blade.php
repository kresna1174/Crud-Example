<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{!! asset('assets/vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{!! asset('assets/css/sb-admin-2.min.css') !!}" rel="stylesheet">

</head>


<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-12">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login!</h1>
                                    </div>
                                    {!! Form::open(['method' => 'post', 'route' => ['auth.login-post'], 'class' => 'user']) !!}
                                        <div class="form-group">
                                            {!! Form::text('username', null, ['class' => 'form-control form-control-user', 'required', 'placeholder' => 'Username']) !!}
                                        </div>
                                        <div class="form-group">
                                        {!! Form::password('password', ['class' => 'form-control form-control-user', 'required', 'placeholder' => 'Password']) !!}
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    {!! Form::close() !!}
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

   
    <!-- Bootstrap core JavaScript-->
    <script src="{!! asset('assets/vendor/jquery/jquery.min.js') !!}"></script>
    <script src="{!! asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    
    <!-- Core plugin JavaScript-->
    <script src="{!! asset('assets/vendor/jquery-easing/jquery.easing.min.js') !!}"></script>
    
    <!-- Custom scripts for all pages-->
    <script src="{!! asset('assets/js/sb-admin-2.min.js') !!}"></script>
    
    <!-- Page level plugins -->
    <script src="{!! asset('assets/vendor/chart.js/Chart.min.js') !!}"></script>
    
    <!-- Page level custom scripts -->
    <script src="{!! asset('assets/js/demo/chart-area-demo.js') !!}"></script>
    <script src="{!! asset('assets/js/demo/chart-pie-demo.js') !!}"></script>

</body>
</html>