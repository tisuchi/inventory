<?php include('header.php'); ?>


<?php if(checkActiveSession()) { ?>

<?php include('leftmenu.php'); ?>

<?php include('body/add-product.php'); ?>


<?php include('footer.php'); ?>


<?php } else { 

    redirectTo('../index.php', 0);
}
?>
