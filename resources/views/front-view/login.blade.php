@extends('layouts.master')

@section('content')
<link href="../css/form-elements.css" rel="stylesheet">
<link href="../css/login-styles.css" rel="stylesheet">
<!-- Page Content -->
<section id="feature" class="section-padding wow fadeInUp delay-05s">
        <div class="col-md-12 text-center">
               <h2 class="service-title pad-bt15">Log-In</h2>
               <hr class="bottom-line">
        </div>
        <div class="container-fluid cards-row">
    <div class="container">
        <div class="row">
            <div class="col-sm-5" id="login-form">

                <div class="form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Login to our site</h3>
                            <p>Enter username and password to log on:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <!-- action="loginConfirm.php" -->
                        <form role="form" name="login-form" method="post" class="login-form">
                            <div class="form-group">
                                <label class="sr-only" for="form-username">Username</label>
                                <input type="text" name="username" placeholder="Username" class="login-username form-control" id="form-username">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-password">Password</label>
                                <input type="password" name="password" placeholder="Password" class="login-password form-control" id="form-password">
                            </div>
                            <button type="submit" name ="submit"class="btn">Sign in!</button>
                            <!--alert-success-->
                            <br /><br />
                            <div id="login-btn" class="alert" role="alert">

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section><!-- /.container -->
@endsection
