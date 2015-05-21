<?php include('header.php'); ?>


<?php if(checkActiveSession() OR !checkClark() OR !checkManager() ) { ?>

<?php include('leftmenu.php'); ?>

<?php include('body/usertimelog.php'); ?>


<?php include('footer.php'); ?>


<?php } else { 

    redirectTo('../index.php', 0);
}
?>
