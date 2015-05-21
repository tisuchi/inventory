<?php 

    //autoload
    include('autoloadfunctions.php');



?>







<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>

                    </div>
                    <div class="panel-body">


                        <?php 
                        if($_POST) :

                            //received data from user
                            $username = $_POST['username'];
                            $password = $_POST['password'];


                           if( loginDataReceive($username, $password) == 1){

                            redirectTo('admin/dashboard.php', 0);

                            //inserting user information
            
            
                            $nowTime = date("Y-m-d H:i:s");
                            $q  = mysql_query("INSERT INTO logintime VALUES(
                                                    '',
                                                    '". $_SESSION['uId'] ."',
                                                    '$nowTime'
                                            )") or die(mysql_error());


                        ?>
                            <div class="alert alert-success">Login Successfully</a>.
                            </div>
                        <?php
                           }

                        ?>


                        <?php  

                           if( loginDataReceive($username, $password) == 2){
                        ?>
                            <div class="alert alert-danger">Wrong Username or Password</a>.
                            </div>
                        <?php
                           }

                        ?>

                        <?php  

                           if( loginDataReceive($username, $password) == 3){
                        ?>
                            <div class="alert alert-danger">Any filed cannot be empty!</a>.
                            </div>
                        <?php
                           }


                        endif;

                        ?>






                        <form role="form" method="POST" action="">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" name="password">
                                </div>
                             
                                <!-- Change this to a button or input when using this as a form -->

                                 <input type="submit" value="Login Now" class="btn btn-lg btn-success btn-block" name="submit" />

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
