<?php 

include('header.php');


if ( logOut() == 4 ) {
	
	redirectTo('../index.php', 3);

	echo '<div class="alert alert-success">Logout Successfully</a>.
                            </div>';

}