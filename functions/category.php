<?php 



function getAllCategories()
{
	return mysql_query("SELECT * FROM category");
}
