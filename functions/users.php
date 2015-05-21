<?php 



function getAllUser()
{
	return mysql_query("SELECT * FROM users WHERE softDelete = 0");
}


function getLoggedInUserName()
{

	return $_SESSION['username'];
}





function getLoggedInUserID()
{

	return $_SESSION['uId'];
}



function getUsernameByUserId($value)
{

	$qry = mysql_fetch_object( mysql_query( "SELECT uName from users WHERE uId = '".$value."' " ) );

	return $qry->uName;
}




function getAllAdmin(){
	return mysql_query("SELECT * FROM users WHERE uType = 'admin'");
	
}



function checkAdmin()
{
	if ( $_SESSION['uType'] == 'admin' ) {
		return 1;
	}

	return 0;
}


function checkManager()
{
	if ( $_SESSION['uType'] == 'manager' ) {
		return 1;
	}

	return 0;
}



function checkClark()
{
	if ( $_SESSION['uType'] == 'clark' ) {
		return 1;
	}

	return 0;
}






function checkAddedUserByLoggedInUser()
{

	$loggedInUser = $_SESSION['uId'];



	$qry = mysql_query("SELECT * FROM users WHERE uAddedBy='".$loggedInUser."' AND uType='admin' ");

	if ( mysql_affected_rows() ) {
		
		$cnt = 0;

		while ( $row = mysql_fetch_object( $qry ) ) {
			//$cnt = $cnt + 1;

			//$cnt++;

			$cnt = $cnt + 1;


		}


		if ( $cnt >= 2 ) {
			
			$notAllowed = 1;
			return $notAllowed;	

		}

		//return $cnt;
	}


	$allowed = 0;
	return $allowed;
	
}


