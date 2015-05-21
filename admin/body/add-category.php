<?php  

    
    if ( @$_POST['submit'] ) {
        
       
         //collecting userinfo
        
        $cName = formItemValidation($_POST['cName']);
       
              
                //current time now
                $nowTime = date("Y-m-d H:i:s");

                //logged in user ID
                $loggedInUser = $_SESSION['uId'];


                $qry = mysql_query("INSERT INTO category VALUES(
                                        '',
                                        '".$cName."',
                                        '".$loggedInUser."',
                                        '".$nowTime."'
                    )") or die(mysql_error());


                if ( $qry ) {
                    
                    $insertSuccess = 1;

                } else{

                    $insertError = 1;
                }



    }





?>






       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add a Category</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add a New Category
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <?php if(isset($insertSuccess)) : ?>
                                <div class="alert alert-success">Category Added Successfully</div>
                            <?php 
                                    redirectTo('categories.php', 2);

                            endif; ?>

                            <?php if(isset($insertError)) : ?>
                                <div class="alert alert-danger">Opps! Something Wrong. Try again</div>
                            <?php endif; ?>

                           
                              
                            <form role="form" method="POST" action="">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input class="form-control" name="cName" required="required" type="text" value="<?php echo @$_POST['cName'] ?>">
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