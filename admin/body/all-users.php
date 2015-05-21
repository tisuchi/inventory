       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">All Users</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables

                            <a href="add-user.php" class="btn btn-info pull-right">Add New User</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#sl</th>
                                            <th>User Name</th>
                                            <th>User Type </th>
                                            <th>Status</th>
                                            <th>Added By</th>
                                            <th>Joined</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  

                                        $qry = getAllUser();

                                        $i = 1;

                                        while($data = mysql_fetch_object( $qry )){
                                    ?>

                                        <tr class="odd gradeX">
                                            <td> <?php echo $i; ?> </td>
                                            <td> <a href="edit-user.php?uId=<?php echo $data->uId; ?> "><?php echo $data->uName; ?></a> </td>
                                            <td> <?php echo $data->uType; ?> </td>
                                            <td class="center"> <?php echo ($data->uFlag ? '<span class="label label-success">Active</span>' :  '<span class="label label-warning">InActive</span>' );  ?> </td>
                                            <td class="center"> <?php echo getUsernameByUserId($data->uAddedBy); ?> </td>
                                            <td class="center"> <?php 
                                           
                                                


                                            $databaseDate = new Carbon\Carbon( $data->uEntryDate );

                                            //echo $databaseDate->diffForHumans();

                                            echo $databaseDate->diffForHumans();


                                                ?> 
                                            </td>

                                           <td class="center" data-cId="<?php echo $data->uId; ?>"> <button class="del-cata btn btn-danger" data-did="<?php echo $data->uId; ?>">delete</button>  </td>


                                        </tr>
                                        
                                    <?php $i++; } ?>
                                    </tbody>
                                </table>

                                


                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h1>Do you Want to Delete this user?</h1>
                                        </div>
                                        <div class="modal-footer">
                                           <!-- <button id="del-confirm"></button> -->
                                            <input id="del-confirm" type="button" name="yes" value="Yes" class="btn btn-primary" />
                                            <input type="button" name="no" value="No" class="btn btn-danger" />
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                             <script type="text/javascript">
                                $(function(){
                                    $(".del-cata").click(function(){
                                        //alert($(this).data("did"));
                                        var row = $(this);
                                        var id = $(this).data("did");
                                        if(confirm("Are you sure?")){
                                            $.ajax({
                                                url: "body/delete-users.php",
                                                type: "post",
                                                data: {dId:id}
                                            }).done(function(msg){
                                                row.closest("tr").remove();

                                            });
                                        }
                                    });
                                });

                                </script>  
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