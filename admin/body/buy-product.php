<?php  

    
    if ( @$_POST['submit'] ) {
        
       
         //collecting userinfo
        
        $pId = formItemValidation($_POST['pId']);
        $cName = formItemValidation($_POST['cName']);
        $cContactNumber =  formItemValidation($_POST['cContactNumber'] );
        $cAddress = formItemValidation($_POST['cAddress']);
        $pQuantity = formItemValidation($_POST['pQuantity']);
        
        

     
          
                
                //current time now
                $nowTime = date("Y-m-d H:i:s");


                //geenrate invoice number
                $invNum = generateInvoiceId(8);


                //logged in user ID
                $loggedInUser = $_SESSION['cId'];

                $qry = mysql_query("INSERT INTO customer VALUES(
                                        '',
                                        '".$invNum."',
                                        '".$cName."',
                                        '".$cContactNumber."',
                                        '".$cAddress."',
                                        '".$pId."',
                                        '".$pQuantity."',
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
                    <h1 class="page-header">Buy Product</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Buy a New Product
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <?php if(isset($insertSuccess)) : ?>
                                <div class="alert alert-success">Product has bought Successfully</div>
                            <?php 
                                    redirectTo('customers.php', 2);

                                    endif; ?>

                            <?php if(isset($insertError)) : ?>
                                <div class="alert alert-danger">Opps! Something Wrong. Try again</div>
                            <?php endif; ?>

                            
                              
                            <form role="form" method="POST" action="">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="cName" required="required" type="text" value="<?php echo @$_POST['cName'] ?>">
                                </div>

                                 <div class="form-group">
                                    <label>Contact Number</label>
                                    <input class="form-control" name="cContactNumber" required="required" type="text" value="<?php echo @$_POST['cContactNumber'] ?>">
                                
                                </div>

                                 <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" name="cAddress" required="required" type="text" value="<?php echo @$_POST['cAddress'] ?>">
                                </div>

                                 <div class="form-group">
                                    <label>Choose a Category</label>
                                    <select class="form-control" name="pId">
                                    <?php  

                                        $qry = getAllProducts();
                                        while($row = mysql_fetch_object( $qry )){
                                    ?>

                                        <option value="<?php echo $row->pId; ?>"> <?php echo $row->pName; ?> </option>

                                    <?php } ?>
                                    </select>
                                </div>

                                 

                                  <div class="form-group">
                                    <label>Quantity</label>
                                    <input class="form-control" name="pQuantity" required="required" type="text" value="<?php echo @$_POST['pQuantity'] ?>">
                                </div>

                                 

                                 

                               
                               

                                <input type="submit" value="Buy Now" class="btn btn-info btn-large" name="submit" />


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