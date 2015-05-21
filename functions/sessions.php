<?php 


function checkActiveSession(){

	if ( isset( $_SESSION['username'] ) ) {
		
		return 1;
	}

	return 0;
}