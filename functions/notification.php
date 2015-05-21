<?php 


function getAllNotification()
{
	return mysql_query("SELECT * FROM notification ORDER BY nId DESC");
}