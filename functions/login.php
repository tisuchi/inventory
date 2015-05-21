<?php 




function loginDataReceive($username, $password){

	if ( checkFormValidation($username) AND checkFormValidation($password) ) {
		
		$myUsername = $username;
		$myPassword = md5($password);


		$qry = mysql_query("SELECT * FROM users WHERE (uName = '". $myUsername."' AND uPassword='". $myPassword ."') AND uFlag = '1'  ");

		if ( mysql_affected_rows() ) {
			
			

			//fetching data from db
			$myData = mysql_fetch_object( $qry );

			$_SESSION['username']	= $username;
			$_SESSION['uType']		= $myData->uType;
			$_SESSION['uId']		= $myData->uId;


			return 1;
			

		} else{
			
			return 2;

		}


	} else{

		return 3;
	}


}




function checkFormValidation($value){

	if ( !empty($value) ) {
		return 1;
	}

	return 0;
}






function logOut(){

	
	if ( isset( $_SESSION['username'] ) ) {
		
		$nowTime = date("Y-m-d H:i:s");
        $insert  = mysql_query("INSERT INTO logouttime VALUES(
                                '',
                                '". $_SESSION['uId'] ."',
                                '$nowTime'
                        )") or die(mysql_error());



		if ( $insert ) {

			session_destroy();

			return 4;	//successfully logout
			
		}

		return 5;	//Not success
	}


}


