<?php  
session_start();
if ( @$_POST['dId'] ) {

	mysql_connect("localhost", "root", "");
	mysql_select_db("inventory");
    
    $dId = $_POST['dId'];
    $qry = mysql_query("UPDATE users SET softDelete = 1 WHERE uId = '".$dId."' ") or die(mysql_error());


    if ( $qry ) {
        
        //fetching data from database
        $abc = mysql_fetch_object(mysql_query("SELECT * FROM users WHERE uId = ".$dId." "));


        //logged in user ID
        $loggedInUser = $_SESSION['uId'];

        //current time now
        $nowTime = date("Y-m-d H:i:s");


        $message = "A user <b>{$abc->uName} </b> ({$abc->uId}) has been deleted. Do you want to really delete? ";

        mysql_query( "INSERT INTO notification VALUES(
                                '',
                                'admin',
                                '".$loggedInUser."',
                                '".$abc->uId."',
                                '".$message."',
                                '".$nowTime."',
                                '1'                        
            )" ) or die(mysql_error());


    }
}

?>