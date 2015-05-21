<?php 


function getAllFromUserLoginTime()
{
	return mysql_query("SELECT * FROM logintime ORDER BY id DESC");
}



function getAllFromUserLogoutTime()
{
	return mysql_query("SELECT * FROM logout ORDER BY id DESC");
}



function getOperativeLogData()
{
	return mysql_query("SELECT i.* , o.* FROM logintime i,logouttime o WHERE i.uId=o.uId");
}