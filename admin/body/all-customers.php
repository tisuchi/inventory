       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">All Customers</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Customer's list
                          
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#sl</th>
                                           
                                            <th>Customer's Name</th>
                                            <th>Contact number</th>
                                            <th>Address</th>
                                            <th>Product</th>
                                            <th>No of Purchases</th>
                                            <th>Buying date</th>
                                            <th>Invoice</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  

                                        $qry = getAllCustomers();

                                        $i = 1;

                                        while($data = mysql_fetch_object( $qry )){
                                    ?>

                                        <tr class="odd gradeX">
                                            <td> <?php echo $i; ?> </td>
                                           
                                            <td> <?php echo $data->cName; ?> </td>
                                            <td> <?php echo $data->cContactNumber; ?> </td>
                                            <td> <?php echo $data->cAddress; ?> </td>
                                            <td> 
                                                <?php 
                                                    $product = getProductNameById($data->pId); 
                                                    echo $product->pName;

                                                ?> </td>

                                            <td> 
                                                <?php 
                                                   
                                                    echo  $data->pQuantity;

                                                ?> </td>
                                           
                                            <td class="center"> <?php 
                                                   
                           

                                            $databaseDate = new Carbon\Carbon( $data->bDate );

                                            //echo $databaseDate->diffForHumans();

                                            echo $databaseDate->diffForHumans();


                                                ?> 
                                            </td>

                                            <td class="center">
                                                <a href="invoice.php?cId=<?php echo $data->cId; ?>" class="btn btn-default">Get Invoice</a>
                                            </td>
                                        </tr>
                                        
                                    <?php $i++; } ?>
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
