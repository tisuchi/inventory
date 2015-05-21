<?php  

    
    if ( @$_POST['submit'] ) {
        
       
         //collecting userinfo
        
        $uName = formItemValidation($_POST['uName']);
        $uPassword =  formItemValidation($_POST['uPassword'] );
        $uPasswordAgain = formItemValidation($_POST['uPasswordAgain']);
        $uType = formItemValidation($_POST['uType']);

     
        if ( $uPassword == $uPasswordAgain ) {
            
            //check uniqueness
            if ( !checkUniqueUsername( $uName ) ) {

                        
                        //current time now
                        $nowTime = date("Y-m-d H:i:s");

                        //need to insert data
                        $myNewId = generateId();

                        //logged in user ID
                        $loggedInUser = $_SESSION['uId'];

                        $qry = mysql_query("INSERT INTO users VALUES(
                                                '',
                                                '".$myNewId."',
                                                '".$uName."',
                                                '".md5($uPassword)."',
                                                '".$uType."',
                                                0,
                                                0,
                                                '".$loggedInUser."',
                                                '".$nowTime."'
                            )") or die(mysql_error());


                        if ( $qry ) {

                            if (!checkAdmin()) {
                                
                                $message = "Added a new user <b>{$uName} </b> ({$myNewId}) has created. ";

                                mysql_query( "INSERT INTO notification VALUES(
                                                        '',
                                                        'admin',
                                                        '".$loggedInUser."',
                                                        '".$myNewId."',
                                                        '".$message."',
                                                        '".$nowTime."',
                                                        '0'        
                                    )" ) or die(mysql_error());
                                
                            }


                            $insertSuccess = 1;



                } else{

                    $insertError = 1;
                }



            } else{

               

                //set used variable
                $uniquenessError = 1;

            }

        } else{

            $passwordNotMatched = 1;
        }


        


    }





?>






       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add a User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add a New User
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <?php if(isset($insertSuccess)) : ?>
                                <div class="alert alert-success">User Added Successfully</div>
                            <?php 
                                    redirectTo('users.php', 2);

                                    endif; ?>

                            <?php if(isset($insertError)) : ?>
                                <div class="alert alert-danger">Opps! Something Wrong. Try again</div>
                            <?php endif; ?>

                            
                            <?php if(isset($insertError)) : ?>
                                <div class="alert alert-danger">Opps! Something Wrong. Try again</div>
                            <?php endif; ?>

                            <?php if(isset($uniquenessError)) : ?>
                                <div class="alert alert-danger">Opps! This username is already used. Try another one.</div>
                            <?php endif; ?>

                            <?php if(isset($passwordNotMatched)) : ?>
                                <div class="alert alert-danger">Sorry! Password did not Match. Try again.</div>
                            <?php endif; ?>
                              
                            <form role="form" method="POST" action="">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" name="uName" required="required" type="text" value="<?php echo @$_POST['uName'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" name="uPassword" required="required" type="password">
                                </div>

                                <div class="form-group">
                                    <label>Type Password Again </label>
                                    <input class="form-control" name="uPasswordAgain" required="required" type="password">
                                </div>

                                <div class="form-group">
                                    <label>Choose a User Group</label>
                                    <select class="form-control" name="uType">
                                        <option value="admin" selected="selected">Admin</option>
                                        <option value="manager">Manager</option>
                                        <option value="clark">Clarical Staff</option>
                                    </select>
                                </div>

                                <input type="submit" value="Add Now" class="btn btn-info btn-large" name="submit" />


                            </form>

 
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           

            <!-- /.row -->
        </div>