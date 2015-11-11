<?php ob_start();?>
<p>информация о нашей фирме</p>
<?php $content = ob_get_clean();?>

<?php include_once ('view/templates/layout.php');?>
