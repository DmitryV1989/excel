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
	define("CONFIG", [
    "DB"=>[
    	"server"=>"localhost",
    	"user"=>"root",
    	"password"=>"",
    	"name"=>"Excel"
		]
	]);

	$sqlConnect = mysqli_connect(
	    CONFIG['DB']['server'],
	    CONFIG['DB']['user'],
	    CONFIG['DB']['password'],
	    CONFIG['DB']['name']
	);

	$handle = fopen($_SERVER['DOCUMENT_ROOT']."/excel_1.csv", "r");
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
	// p($_POST);
	?>
	<h2>Предпросмотр и редакция</h2>					
	<form method="post">
		<table>
			<? foreach ($table as $key=>$item): ?>
	    <tr>
	        <td>
	        	имя<input name="human[<?=$key?>][name]" value="<?=$item['name']?>">	
	        </td>
	        <td>
	        	статус<input name="human[<?=$key?>][status]" value="<?=$item['status']?>">
	        </td>
	        <td>
	        	коммент<input name="human[<?=$key?>][comment]" value="<?=$item['comment']?>">
	        </td>
	    </tr>
	    <? endforeach; ?>
	    <tr>
	        <td colspan="3">
	        	<input type="submit">
	        </td>
	    </tr>
		</table>
	</form>
	<?
	if(!empty($_POST)) {
		foreach($_POST['human'] as $value) {
			$sqlResult = mysqli_query($sqlConnect, "INSERT INTO `think_and_drink` VALUES (
				0,
				'".$value['name']."',
				'".$value['status']."',
				'".$value['comment']."',
				NOW()
				);");
			dump("запись ".$value['name']." внесена");
		}
	}

	?>
</body>
</html>
<!-- <form>
  <input name="array[]" value="1"/>
  <input name="array[]" value="2"/>
  <input name="array[]" value="3"/>
</form> -->
<!-- autocomplete -->