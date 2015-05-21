       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">All Users Records</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#sl</th>
                                            <th>Username </th>
                                            <th>Date</th>
                                            <th>In Time</th>
                                            <th>Out Time</th>
                                            <th>Total Hours</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  

                                        $qry = getOperativeLogData();

                                        $i = 1;


                                        while($data = mysql_fetch_object( $qry )){
                                    ?>

                                        <tr class="odd gradeX">
                                            <td> <?php echo $i; ?> </td>
                                            <td> <?php echo getUsernameByUserId($data->uId); ?> </td>
                                            <td> <?php 
                                            	$todayDate = new Carbon\Carbon( $data->loginTime );
                                            	echo($todayDate->toFormattedDateString());  

                                             ?> </td>
                                            <td class="center"> 

                                            	<?php 

	                                            	$inTime = new Carbon\Carbon( $data->loginTime );
	                                            	echo($inTime->toTimeString());  

	                                             ?> 

                                            </td>
                                            <td class="center"> 

                                            	<?php 

	                                            	$outTime = new Carbon\Carbon( $data->logoutTime );
	                                            	echo($outTime->toTimeString());  

	                                             ?> 

                                            </td>
                                            <td class="center"> <?php 
                                                   
                                                $total = $inTime->diffInMinutes($outTime);

                                                echo $total;




                                                ?> 
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