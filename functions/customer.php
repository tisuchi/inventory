<?php 



function getAllCustomers()
{
	return mysql_query("SELECT * FROM customer");
}


