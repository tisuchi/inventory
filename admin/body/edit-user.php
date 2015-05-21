<?php  


    $getUId = $_GET['uId'];


    //collect all informaion from database
    $qry = mysql_fetch_object( mysql_query("SELECT * FROM users WHERE uID = '$getUId' ") );

    $existingUName = $qry->uName;

    
    if ( @$_POST['submit'] ) {
        
       
         //collecting userinfo
        
        $uName = formItemValidation($_POST['uName']);
        $uType = formItemValidation($_POST['uType']);

        
        if ( $existingUName != $uName ) {
            
            if ( !checkUniqueUsername( $uName ) ) {


                $update = "UPDATE users SET uName = '".$uName."' , uType = '".$uType."' WHERE uId = '".$getUId."' ";

                $qry = mysql_query($update) or die(mysql_error());


                if ( $qry ) {

                    $insertSuccess = 1;

                } else{

                    $insertError = 1;
                }



            } else{

               

                //set used variable
                $uniquenessError = 1;

            }







        } else{
            
            //current time now
              
                $update = "UPDATE users SET uType = '".$uType."' WHERE uId = '".$getUId."' ";

                $qry = mysql_query($update) or die(mysql_error());


                if ( $qry ) {

                    $insertSuccess = 1;

                } else{

                    $insertError = 1;
                }



        }



    }





?>






       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit User
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <?php if(isset($insertSuccess)) : ?>
                                <div class="alert alert-success">User Updated Successfully</div>
                            <?php 
                                    redirectTo('users.php', 2);

                                    endif; ?>

                            <?php if(isset($insertError)) : ?>
                                <div class="alert alert-danger">Opps! Something Wrong. Try again</div>
                            <?php endif; ?>

                            <?php if(isset($uniquenessError)) : ?>
                                <div class="alert alert-danger">Opps! This username is already used. Try another one.</div>
                            <?php endif; ?>
                              
                            <form role="form" method="POST" action="">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" name="uName" required="required" type="text" value="<?php echo $qry->uName; ?>">
                                </div>

                                

                                <div class="form-group">
                                    <label>Choose a User Group</label>
                                    <select class="form-control" name="uType">
                                        <option value="admin" selected="selected">Admin</option>
                                        <option value="manager">Manager</option>
                                        <option value="clark">Clarical Staff</option>
                                    </select>
                                </div>

                                <input type="submit" value="Update" class="btn btn-info btn-large" name="submit" />


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