<?php 


function formItemValidation( $input )
{
	return filter_var($input, FILTER_SANITIZE_STRING);

}



//check uniqueness
function checkUniqueUsername($matchingValue)
{

	$qry = mysql_query("SELECT * FROM users WHERE uName = '".$matchingValue."' ");

	if ( mysql_affected_rows() ) {
		//already used
		return 1;
	}

	//still available
	return 0;
}





//generate a unique id
function generateId()
{
	$qry = mysql_fetch_object( mysql_query("SELECT * FROM users ORDER BY id DESC LIMIT 1") );

	$newId = $qry->uId + 1;

	return $newId;
}