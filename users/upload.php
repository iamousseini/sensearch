
<?php 
if (isset($_POST['ok']) && !empty($_FILES['img'])) {
	echo $_FILES['img']['name'];
}

 ?>

<form method="post">
	<input type="file" name="img">
	<input type="submit" name="ok">
</form>

