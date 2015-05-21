<?php  


    $getUId = $_GET['uId'];


    //collect all informaion from database
    $qry = mysql_fetch_object( mysql_query("SELECT * FROM category WHERE cID = '{$getCId}' ") );
    $update = "UPDATE users SET uFlag = '".1."' WHERE uId = '".$getUId."' ";

                $qry = mysql_query($update) or die(mysql_error());
    ?>