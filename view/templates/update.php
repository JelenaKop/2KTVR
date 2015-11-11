<?php ob_start();?>
<?php $script="<script src=2KTVR_Jelena/view/js/admin.js></script";?>
<h1>Администрирование странички</h1>
	
<h1>форма обновления</h1>

<form action='/2KTVR_Jelena/index.php/change' method="POST" name="add_form">
	<table>
		<tr>
			<td>Автор :</td>
			<td><input type="text" name="add_autor" value="<?php echo @$edit_row['autor'];?>"></td>
		</tr>
		<tr>
			<td>Дата :</td>
			<td><input type="text" name="add_date"  value="<?php echo @$edit_row['date']; ?>"></td>
		</tr>
		<tr>
			<td>Заголовок :</td>
			<td><input type="text" name="add_title" value="<?php echo @$edit_row['title']; ?>"></td>
		</tr>
		<tr>
			<td>Текст :</td>
			<td><input type="text" name="add_content" value="<?php echo @$edit_row['content'];?>"></td>
		</tr>
		<tr>
			<td><input type= "reset" name="reset"value= "Очистить:"></td>
			<td><input type="submit" name="submit" value="Добавить :" ></td>
			<td><input type="submit" name="submit_change" value="Добавить с изменениями  :" onclick="update($_REQUEST['id'])"></td>
		</tr>
	</table>
</form>
<h1>список постов</h1>
	<ul>

	<?php foreach ($posts as $post):?>

		<li>
		<a href="/2KTVR_Jelena/index.php/delete?id=<?php echo $post['id'];?>">Удалить</a>
		<a href="/2KTVR_Jelena/index.php/show?id=<?php echo $post['id'];?>"></a>
		<a href="/2KTVR_Jelena/index.php/edit?id=<?php echo $post['id'];?>">Редактировать</a>

		<?php echo $post['id'].".".$post['title'];?></a>
		 	
		</li>

	<?php endforeach;?>
</ul>

<?php $content = ob_get_clean();?>
<?php include 'update.php';?>