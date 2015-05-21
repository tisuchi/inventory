<?php include('header.php'); ?>


<?php if(checkActiveSession() OR !checkClark() ) { ?>

<?php include('leftmenu.php'); ?>

<?php include('body/all-users.php'); ?>


<?php include('footer.php'); ?>


<?php } else { 

    redirectTo('../index.php', 0);
}
?>
