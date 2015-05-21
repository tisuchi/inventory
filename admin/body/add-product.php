<?php  

    
    if ( @$_POST['submit'] ) {
        
       
         //collecting userinfo
        
        $pName = formItemValidation($_POST['pName']);
        $pBarCode =  formItemValidation($_POST['pBarCode'] );
        $pBuyingPrice = formItemValidation($_POST['pBuyingPrice']);
        $pSellingPrice = formItemValidation($_POST['pSellingPrice']);
        $pQuantity = formItemValidation($_POST['pQuantity']);
        $cId = $_POST['cId'];
     
          
                
                //current time now
                $nowTime = date("Y-m-d H:i:s");

                //need to insert data
                $myNewId = generateId();

                //logged in user ID
                $loggedInUser = $_SESSION['uId'];

                $qry = mysql_query("INSERT INTO product VALUES(
                                        '',
                                        '".$cId."',
                                        '".$pBarCode."',
                                        '".$pName."',
                                        '".$pBuyingPrice."',
                                        '".$pSellingPrice."',
                                        '".$pQuantity."',
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
                    <h1 class="page-header">Add a Product</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add a New Product
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <?php if(isset($insertSuccess)) : ?>
                                <div class="alert alert-success">Product Added Successfully</div>
                            <?php 
                                    redirectTo('products.php', 2);

                                    endif; ?>

                            <?php if(isset($insertError)) : ?>
                                <div class="alert alert-danger">Opps! Something Wrong. Try again</div>
                            <?php endif; ?>

                            
                              
                            <form role="form" method="POST" action="">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input class="form-control" name="pName" required="required" type="text" value="<?php echo @$_POST['pName'] ?>">
                                </div>

                                 <div class="form-group">
                                    <label>Choose a Category</label>
                                    <select class="form-control" name="cId">
                                    <?php  

                                        $qry = getAllCategories();
                                        while($row = mysql_fetch_object( $qry )){
                                    ?>

                                        <option value="<?php echo $row->cId; ?>"> <?php echo $row->cName; ?> </option>

                                    <?php } ?>
                                    </select>
                                </div>

                                 <div class="form-group">
                                    <label>Product Barcode</label>
                                    <input class="form-control" name="pBarCode" required="required" type="text" value="<?php echo @$_POST['pBarCode'] ?>">
                                </div>

                                 <div class="form-group">
                                    <label>Product Buying Price</label>
                                    <input class="form-control" name="pBuyingPrice" required="required" type="text" value="<?php echo @$_POST['pBuyingPrice'] ?>">
                                </div>

                                 <div class="form-group">
                                    <label>Product Selling Price</label>
                                    <input class="form-control" name="pSellingPrice" required="required" type="text" value="<?php echo @$_POST['pSellingPrice'] ?>">
                                </div>

                                 <div class="form-group">
                                    <label>Product Quantity</label>
                                    <input class="form-control" name="pQuantity" required="required" type="text" value="<?php echo @$_POST['pQuantity'] ?>">
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