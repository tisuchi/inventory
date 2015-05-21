<?php include('header.php'); ?>


<?php if(checkActiveSession() OR checkAdmin() ) { ?>


<?php include('leftmenu.php'); ?>

<?php include('body/notification.php'); ?>


<?php include('footer.php'); ?>


<?php } else { 

    redirectTo('../index.php', 0);
}
?>
