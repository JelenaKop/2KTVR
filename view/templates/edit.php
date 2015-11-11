<?php ob_start();?>

<h1>Администрирование странички</h1>
	
<h1>форма обновления</h1>

<form action='/2KTVR_Jelena/index.php/update' method="POST" name="add_form">
	<table>
		<tr>
			<td>Автор :</td>
			<td><input type="text" name="update_autor" value="<?php echo $edit_row['autor'];?>">
			<input type="hidden" name="update_id" value="<?php echo $edit_row['id'];?>>"</td>
		</tr>
		<tr>
			<td>Дата :</td>
			<td><input type="text" name="update_date"  value=<?php echo $edit_row['date']; ?>></td>
		</tr>
		<tr>
			<td>Заголовок :</td>
			<td><input type="text" name="update_title" value=<?php echo $edit_row['title']; ?>></td>
		</tr>
		<tr>
			<td>Текст :</td>
			<td><input type="text" name="update_content" value=<?php echo $edit_row['content'];?>></td>
		</tr>
		<tr>
			<td><input type= "reset" name="reset"value= "Очистить:"></td>
			<td><input type="submit" name="submit_change" value="Добавить с изменениями"></td>
		</tr>
	</table>
</form>
<h1>список постов</h1>
	<ul>
	<?php foreach ($posts as $post):?>
		<li>
			<a href="/2KTVR_Jelena/index.php/delete?id=<?php echo $post['id'];?>">Удалить</a>
			<a href="/2KTVR_Jelena/index.php/show?id=<?php echo $post['id'];?>"><?php echo $post['id'].".".$post['title'];?></a>
			<a href="/2KTVR_Jelena/index.php/edit?id=<?php echo $post['id'];?>">Редактировать</a>
		</li>
	<?php endforeach;?>
</ul>

<?php $content = ob_get_clean();?>
<?php include 'layout.php';?>