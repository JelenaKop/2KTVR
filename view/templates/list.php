<?php

ob_start();
?>
<h1>список постов</h1>
	<ul>
	<?php foreach ($posts as $post):?>

		<li>
			<a href="/2KTVR_Jelena/index.php/show?id=<?php echo $post['id'];?>">
		 	<?php echo $post['id'].".".$post['title'];?>
		 	</a>
		</li>

	<?php endforeach?>
</ul>
<?php
$content = ob_get_clean();?>

<?php include_once ('layout.php');?>
