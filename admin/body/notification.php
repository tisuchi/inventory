        <?php  

            if ( isset($_GET['confId'] ) AND isset($_GET['delCon'] )) {
                
                if($_GET['delCon']){

                    $qry = mysql_query("DELETE FROM users WHERE uId = ".$_GET['confId']." ");

                    if ( $qry) {
                        $deleteUpdate = 1;
                    }
                }

                if($_GET['confId']){

                    $qry = mysql_query("UPDATE users SET uFlag = 1 WHERE uId = ".$_GET['confId']." ");

                    if ( $qry) {
                        $notiUpdate = 1;
                    }
                }

               


            }


        ?>




       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Notifications</h1>

                    <?php if(isset($notiUpdate)) : ?>
                        <div class="alert alert-success">User has approved.</div>
                    <?php endif; ?>

                    <?php if(isset($deleteUpdate)) : ?>
                        <div class="alert alert-danger">User has been deeltd successfully.</div>
                    <?php endif; ?>
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
                                            <th>From</th>
                                            <th>About</th>
                                            <th>Created on</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  

                                        $qry = mysql_query("SELECT u.* , n.* FROM users u, notification n WHERE u.uid=n.newUserId");

                                        $i = 1;

                                        while($data = mysql_fetch_object( $qry )){
                                    ?>

                                        <tr class="odd gradeX">
                                            <td> <?php echo $i; ?> </td>
                                            <td> <?php echo getUsernameByUserId($data->nFromWhom);  ?> </td>
                                            <td class="center"> <?php echo $data->nMessage; ?> </td>
                                            
                                            <td class="center"> <?php 
                                                   
                           

                                            $databaseDate = new Carbon\Carbon( $data->nDate );

                                            //echo $databaseDate->diffForHumans();

                                            echo $databaseDate->diffForHumans();


                                                ?> 
                                            </td>
                                            <td> 
                                                <a href="javascript:updateStatus(<?php echo $data->newUserId .', '. $data->delete; ?>)">Approved</a> | <a href="#">Reject</a> </th>
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



        <script type="text/javascript">
            function updateStatus(id, delC)
            {
                if (confirm("Do you really want to confirm this user?")) 
                {
                    window.location.href='notifications.php?confId='+id+'&delCon='+delC;

                };
            }

        </script>