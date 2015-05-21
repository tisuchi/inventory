<?php include('header.php'); ?>


<?php if(checkActiveSession() OR checkClark() ) { ?>

<?php include('leftmenu.php'); ?>

<?php include('body/add-user.php'); ?>


<?php include('footer.php'); ?>


<?php } else { 

    redirectTo('../index.php', 0);
}
?>
