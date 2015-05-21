<?php  


    $getPId = $_GET['pId'];


    //collect all informaion from database
    $qry = mysql_fetch_object( mysql_query("SELECT * FROM product WHERE pID = '$getPId' ") );

    $existingPName = $qry->pName;

    
    if ( @$_POST['submit'] ) {
        
       
         //collecting userinfo
        
        $pName = formItemValidation($_POST['pName']);
        $pBarCode = formItemValidation($_POST['pBarCode']);
        $pQuantity = formItemValidation($_POST['pQuantity']);
         $pBuyingPrice = formItemValidation($_POST['pBuyingPrice']);
          $pSellingPrice = formItemValidation($_POST['pSellingPrice']);

        
        if ( $existingPName != $pName ) {
            
            if ( !checkUniqueUsername( $pName ) ) {


                $update = "UPDATE product SET pName = '".$pName."' , pBarCode = '".$pBarCode."', pQuantity = '".$pQuantity."' , pBuyingPrice = '".$pBuyingPrice."', pSellingPrice = '".$pSellingPrice."' WHERE pId = '".$getPId."' ";

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
            
      
              
                $update = "UPDATE product SET pBarCode = '".$pBarCode."' WHERE pId = '".$getPId."' ";

                $qry = mysql_query($update) or die(mysql_error());


                if ( $qry ) {

                    $insertSuccess = 1;

                } else{

                    $insertError = 1;
                }
            }  
            
            //current time now
              
                $update = "UPDATE product SET pQuantity = '".$pQuantity."' WHERE pId = '".$getPId."' ";

                $qry = mysql_query($update) or die(mysql_error());


                if ( $qry ) {

                    $insertSuccess = 1;

                } else{

                    $insertError = 1;
                }
                //current time now
              
                $update = "UPDATE product SET pBuyingPrice = '".$pBuyingPrice."' WHERE pId = '".$getPId."' ";

                $qry = mysql_query($update) or die(mysql_error());


                if ( $qry ) {

                    $insertSuccess = 1;

                } else{

                    $insertError = 1;
                }
                 //current time now
              
                $update = "UPDATE product SET pSellingPrice = '".$pSellingPrice."' WHERE pId = '".$getPId."' ";

                $qry = mysql_query($update) or die(mysql_error());


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
                    <h1 class="page-header">Edit Product</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Product
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <?php if(isset($insertSuccess)) : ?>
                                <div class="alert alert-success">Product has Updated Successfully</div>
                            <?php 
                                    redirectTo('products.php', 2);

                                    endif; ?>

                            <?php if(isset($insertError)) : ?>
                                <div class="alert alert-danger">Opps! Something Wrong. Try again</div>
                            <?php endif; ?>

                            <?php if(isset($uniquenessError)) : ?>
                                <div class="alert alert-danger">Opps! This product name is already used. Try another one.</div>
                            <?php endif; ?>
                              
                            <form role="form" method="POST" action="">
                                <div class="form-group">
                                    <label>Product name</label>
                                    <input class="form-control" name="pName" required="required" type="text" value="<?php echo $qry->pName; ?>">
                                </div>

                                

                                <div class="form-group">
                                    <label>Bar Code</label>
                                    <input class="form-control" name="pBarCode" required="required" type="text" value="<?php echo $qry->pBarCode; ?>">
                                </div>

                                 <div class="form-group">
                                    <label>Quantity</label>
                                    <input class="form-control" name="pQuantity" required="required" type="text" value="<?php echo $qry->pQuantity; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Buying Price</label>
                                    <input class="form-control" name="pBuyingPrice" required="required" type="text" value="<?php echo $qry->pBuyingPrice; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Selling Price</label>
                                    <input class="form-control" name="pSellingPrice" required="required" type="text" value="<?php echo $qry->pSellingPrice; ?>">
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