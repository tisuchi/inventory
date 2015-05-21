<?php 



function getAllProducts()
{
	return mysql_query("SELECT * FROM product");
}




function getProductNameById($id){

	return mysql_fetch_object(mysql_query("SELECT * FROM product WHERE pId = '$id' "));

}




function generateInvoiceId($length=16){

	$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";//length:36
    $final_rand='';
    for($i=0;$i<$length; $i++)
    {
        $final_rand .= $chars[ rand(0,strlen($chars)-1)];
 
    }
    return $final_rand;
	
}

