<?php include('header.php'); ?>


<?php if(checkActiveSession()) { ?>

<?php include('leftmenu.php'); ?>

<?php include('body/all-category.php'); ?>


<?php include('footer.php'); ?>


<?php } else { 

    redirectTo('../index.php', 0);
}
?>
