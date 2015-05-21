<?php  


    $getCId = $_GET['cId'];


    //collect all informaion from database
    $qry = mysql_fetch_object( mysql_query("SELECT * FROM category WHERE cID = '{$getCId}' ") );

    $existingCName = $qry->cName;

    
    if ( @$_POST['submit'] ) {
        
       
         //collecting categoryinfo
        
        $cName = formItemValidation($_POST['cName']);
       

        
        if ( $existingCName != $cName ) {
            
            if ( /*!checkUniqueCategoryname( $cName )*/true ) {


                $update = "UPDATE category SET cName = '".$cName."' WHERE cId = '".$getCId."' ";

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
              
                $update = "UPDATE category SET uType = '".$cType."' WHERE cId = '".$getCId."' ";

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
                    <h1 class="page-header">Edit Category</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Category
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <?php if(isset($insertSuccess)) : ?>
                                <div class="alert alert-success">Category has Updated Successfully</div>
                            <?php 
                                    redirectTo('categories.php', 2);

                                    endif; ?>

                            <?php if(isset($insertError)) : ?>
                                <div class="alert alert-danger">Opps! Something Wrong. Try again</div>
                            <?php endif; ?>

                            <?php if(isset($uniquenessError)) : ?>
                                <div class="alert alert-danger">Opps! This category is already used. Try another one.</div>
                            <?php endif; ?>
                              
                            <form role="form" method="POST" action="">
                                <div class="form-group">
                                    <label>Categoryname</label>
                                    <input class="form-control" name="cName" required="required" type="text" value="<?php echo $qry->cName; ?>">
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