
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<?
require_once($_SERVER['DOCUMENT_ROOT']."/function.php");
if(!empty($_FILES)) {
	$dir = $_SERVER['DOCUMENT_ROOT'].'/'.$_FILES['inputfile']['name'];
	if(move_uploaded_file($_FILES['inputfile']['tmp_name'], $dir)) {
		$filename = $_FILES['inputfile']['name'];
		$handle = fopen($_SERVER['DOCUMENT_ROOT']."/".$filename, "r");
		$iter = 0;
		$missIter = [1,2];
		while ($data = fgetcsv($handle, 1000, ",")) {
			++$iter;
			if(in_array($iter, $missIter)) continue;
			list($name, $status, $comment) = explode(";", iconv("CP1251","UTF-8",$data[0]));
			$table[] = [
				'name' => $name,
				'status' => $status,
				'comment' => $comment
			];
		}
		p($table);
		?>
		<form action="">
			<h2>предпросмотр и редакция</h2>
			имя<input type="text">
			статус<input type="text">
			коммент<input type="text">
			<input type="submit" value="записать в БД">	
		</form>
		<!-- TODO: доделать данную форму, в ней должны быть все данные -->
		<?	
	}
	else {
		echo "файл не был загружен";
	}
}
else {
	?>
	<h1>Загрузка новой таблицы</h1>
	<form enctype="multipart/form-data" method="post">
		<label for="inputfile">Выберите файл</label>
		<input type="file" id="inputfile" name="inputfile">
		<input type="submit" value="загрузить файл">
	</form>
	<?
}
?>
</body>
</html>