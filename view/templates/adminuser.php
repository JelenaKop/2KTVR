<?php ob_start();?>
<script src=/2KTVR_Jelena/view/js/admin.js></script>

<h1>Администрирование странички</h1>
	<h1>Пользовательская форма</h1>
<form action='/2KTVR_Jelena/index.php/adduser' method="POST" name="add_form">
	<table>
		<tr>
			<td>Коод :</td>
			<td><input type="text" name="add_code" value="<?php echo @$edit_row['code'];?>"></td>
		</tr>
		<tr>
			<td>Имя:</td>
			<td><input type="text" name="add_firstname"  value="<?php echo @$edit_row['firstname']; ?>"></td>
		</tr>
		<tr>
			<td>Фамилия :</td>
			<td><input type="text" name="add_lastname" value="<?php echo @$edit_row['lastname']; ?>"></td>
		</tr>

<!---<tr>
			<td>Текст :</td>
			<td><input type="text" name="add_content" value="<?php echo @$edit_row['content'];?>"></td>
		</tr>-->

		<tr>
			<td><input type= "reset" name="reset"value= "Очистить:"></td>
			<td><input type="submit" name="submit" value="Добавить :" ></td>
		</tr>
	</table>
</form>
<h1>список пользователей</h1>
	<ul>

	<?php foreach ($users as $user):?>

		<li>
		<a href="/2KTVR_Jelena/index.php/deleteuser?id=<?php echo $user['id'];?>">Удалить</a>
		<a href="/2KTVR_Jelena/index.php/showuser?id=<?php echo $user['id'];?>"><?php echo $user['id'].".".$user['title'];?></a>
		<a href="/2KTVR_Jelena/index.php/edituser?id=<?php echo $user['id'];?>">Редактировать</a>


		 	
		</li>

	<?php endforeach;?>
</ul>

<?php $content = ob_get_clean();?>
<?php include 'layout.php';?>