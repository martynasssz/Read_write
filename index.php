<?php 
if (isset($_POST['submit'])&&!empty($_POST['user_name'])&&!empty($_POST['text'])) {
	/*print_r($_POST);*/
	$myfile = fopen("logs.txt", "a") or die("Unable to open file!");
	fwrite($myfile, $_POST['user_name'].'#@'.$_POST['text']."\n");

						// echo $_POST['user_name'] . ;
						// echo "Šiandien labai graži diena.";
						// echo "Šiandien labai " . $dienos_tipas . " diena.";
						// echo $kada . " labai " . $dienos_tipas . " diena.";
}
$myfile = fopen("logs.txt", "r") or die("Unable to open file!");
/*echo fgets($myfile);*/
/*echo fread($myfile,filesize("logs.txt"));*/
$duomenys = [];
while(!feof($myfile)) {
	$row = fgets($myfile);
	$duomenys[] = explode("#@", $row);
}
fclose($myfile);

?>

<!DOCTYPE html>
<html>
<head>
	<title> Read_Write</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<body>
	<div class="container">
		<h1 class="bg-info text-white text-center p-5"> C H A T </h1>	
		<div class="row p-1 header mb-1">
			<form action="index.php" method="post" >
				<label for="User">User name</label>
				<input type="text" name="user_name"> 
				<div class="form-group">
					<label for="exampleFormControlTextarea1">Your text</label>
					<textarea class="form-control" rows="3" name="text"></textarea>
				</div>
				<button type="submit" class="btn btn-info" value="submit" name="submit">Submit </button> 
			</form>
		</div>
		<div class="row">
					
			<?php
				foreach ($duomenys as $numeris) {
				echo "<div class='col-md-12'>";
				echo "<b>Vartotojo vardas:</b> <br>".$numeris[0]." <br>";
				echo "</div>";
				echo "<div class='col-md-12'>";
				echo "<b>Tekstas</b> "."<br>".$numeris[1]." <br>";
				echo "</div>";
			}
			?>
		</div>
	</div>
</body>
</html>

