<?php  

if ( @$_POST['dId'] ) {

	mysql_connect("localhost", "root", "");
	mysql_select_db("inventory");
    
    $dId = $_POST['dId'];
    $qry = mysql_query("DELETE FROM product WHERE pId = '".$dId."' ") or die(mysql_error());


    if ( $qry ) {
        
        //redirectTo('Categories.php', 0);

    }
}

?>