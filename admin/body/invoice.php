 <?php $cId = $_GET['cId']; ?>

 <?php 

    $qry = mysql_fetch_object(mysql_query("SELECT * FROM customer WHERE cId = ".$cId." "));
   
?>

       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Invoice no # <?php echo $qry->invId; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                               <div class="table-responsive">
                                <table class="table table-hover">
                                    
                                    <tbody>
                                        
                                        <tr>
                                            <td>Invoice Id</td>
                                            <td> <?php echo $qry->invId; ?> </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Customer Name</td>
                                            <td> <?php echo $qry->cName; ?> </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Customer Contact</td>
                                            <td> <?php echo $qry->cContactNumber; ?> </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Customer Address</td>
                                            <td> <?php echo $qry->cAddress; ?> </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Product Name</td>
                                            <td> <?php 
                                                    $pId= getProductNameById($qry->pId);

                                                    echo $pId->pName;



                                                ?> </td>
                                        </tr>

                                        <tr>
                                            <td>Unique Price</td>
                                            <td> <?php 
                                                    $pId= getProductNameById($qry->pId);

                                                    echo '$'.$pId->pSellingPrice;



                                                ?> </td>
                                        </tr>
                                        
                                        
                                        <tr>
                                            <td>Quantity</td>
                                            <td> <?php echo $qry->pQuantity; ?> </td>
                                        </tr>




                                        <tr>
                                            <td>Total Price</td>
                                            <td> <?php 
                                                    $pId= getProductNameById($qry->pId);
                                                    $pPrice = $pId->pSellingPrice;
                                                    $pQun = $qry->pQuantity;

                                                    echo '$'.$pPrice * $pQun;



                                                ?> </td>
                                        </tr>


                                        
                                        
                                        <tr>
                                            <td>Date of Purchase</td>
                                            <td> <?php 
                                                   
                           

                                            $databaseDate = new Carbon\Carbon( $qry->bDate );

                                            //echo $databaseDate->diffForHumans();

                                            echo $databaseDate->diffForHumans();


                                                ?>  </td>
                                        </tr>



                                       
                                       
                                    </tbody>
                                </table>
                            </div>

                                


                            
                            <!-- /.table-responsive -->
                            
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