<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<?require_once($_SERVER['DOCUMENT_ROOT']."/function.php");?>
<?
if(!file_exists($_SERVER['DOCUMENT_ROOT']."/excel_1.csv")) 
	header("Location: /loaded.php");
	
// TODO: изучить сниппет
// $row = 1;
// if (($handle = fopen($_SERVER['DOCUMENT_ROOT']."/excel.csv", "r")) !== FALSE) {
//     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//         $num = count($data);
//         echo "<p> $num полей в строке $row: <br /></p>\n";
//         $row++;
//         for ($c=0; $c < $num; $c++) {
//             echo iconv("CP1251","UTF-8",$data[$c]) . "<br />\n";
//         }
//     }
//     fclose($handle);
// }

// $handle = fopen($_SERVER['DOCUMENT_ROOT']."/excel_1.csv", "r");
// while ($data = fgetcsv($handle, 1000, ",")) {
// 	$table[] = iconv("CP1251","UTF-8",$data[0]);
// 	unset($table[0],$table[1]);
// }
// p($table);


?>
<form action="">
	<h2>предпросмотр и редакция</h2>
	<input type="text">имя
	<input type="text">статус
	<input type="text">коммент
	<input type="submit" value="записать в БД">	
</form>
<!-- TODO: создать БД для этих данных -->
</body>
</html>
