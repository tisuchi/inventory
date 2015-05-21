     
        if ( $existingUName != $uName ) {
            //check uniqueness
            if ( !checkUniqueUsername( $uName ) ) {


                
                //current time now
                $nowTime = date("Y-m-d H:i:s");

                $update = "UPDATE users SET uName = '$uName', uType = '$uType' WHERE uId = '$uId' ";

                $qry = mysql_query($update) or die(mysql_error());


                if ( $qry ) {

                    $insertSuccess = 1;

                } else{

                    $insertError = 1;
                }



            } else{

               

                //set used variable
                $uniquenessError = 1;

            }

 
        }
