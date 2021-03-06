<?php
require ("functions.php");
if (!isset($_SESSION["userId"])) {
	header("Location: esileht.php");
}

	$email = $_SESSION["userEmail"];
	$gameError = ""; 
	$amountError = "";
	$game = " ";
	$amount = " ";
	$selectionError = "";
	$selection = "";
	
if (isset ($_POST["Game"]))
		{
		if( empty ($_POST["Game"])){
			$gameError = "Field must be filled";}
		}
if (isset ($_POST["Amount"]))
		{
		if( empty ($_POST["Amount"])){
			$amountError = "Field must be filled";}
		}
if (isset ($_POST["Media"]))
			{
		if (empty ($_POST["Media"])){
			$selectionError = "Field must be filled";}	
			}		
	
		
if($gameError == ""  &&
	$amountError == ""	&&
	isset($_POST["Game"]) &&
	isset($_POST["Media"]) &&
	isset($_POST["Amount"]))
	{$game = $_POST["Game"];
		$amount = $_POST["Amount"];
			$selection = $_POST["Media"];
				if($selection == "Computer"){
					$data->dataentryComputer ($Helper->cleanInput($amount), $Helper->cleanInput($game), $Helper->cleanInput($email));}
									
				if($selection == "Console"){
					$data->dataentryConsole ($Helper->cleanInput($amout), $Helper->cleanInput($game), $Helper->cleanInput($email));}	
								
				if($selection == "Portable"){
					$data->dataentryPortable ($Helper->cleanInput($amount), $Helper->cleanInput($game), $Helper->cleanInput($email));}
									
				if($selection == "Board"){
					$data->dataentryBoard ($Helper->cleanInput($amount), $Helper->cleanInput($game), $Helper->cleanInput($email));}	
								
				if($selection == "Card"){
					$data->dataentryCard ($Helper->cleanInput($amount), $Helper->cleanInput($game), $Helper->cleanInput($email));}
					
					header("Location: data.php");}
	

 ?>

<?php require ("../header.php"); ?>
<link rel="stylesheet" type="text/css" href="style.css">

<div class="container">
	<div class="col-md-2">
		<?php
			if (isset($_SESSION["userId"])) {?>
				<div class="row">
					<button type="button" class="btn btn-block" style="background-color:black"><a href="?logout=1"><font style="color:white">Log out</font></a>
				</div>
				<br>
				<div class="row">
					<button type="button" class="btn btn-block" style="background-color:black; vertical-align: middle;"><a href="edit.php"><font style="color:white">Edit</font></a>
				</div>
				<br>
			<?php } ?>
		<form method="POST">
			<div class="row">
				<select name="Media" class="form-control"> <?php echo $selectionError ?>
					<option value="None">Choose your platform</option>
					<option value="Computer" >Computer</option>
					<option value="Console">Console</option>
					<option value="Portable">Portable</option>
					<option value="Board">Board</option>
					<option value="Card">Card</option>
				</select>
			</div>
			<div class="input-group input-group-sm">
				<div class="row">
					<input class="form-control" name="Game" placeholder="Game" type="text"> <?php echo $gameError ?>
				</div>
				<div class="row">
					<input class="form-control" name="Amount" placeholder="Amount" type="number"> <?php echo $amountError ?>
				</div>
				<br>
				<div class="row">
					<input class="btn btn-success btn-block" type="submit" value="Submit">
				</div>
			</div>
		</form>

		<br><br>

		
	</div>
	
	<div class="col col-xs-offset-3">

	<h1>Collection</h1>
	
	
<?php 
	
$view = $data->getAllDataComputer($email);

	$html = "<table class='table table-bordered'>";
	
		$html .= "<tr>";
			$html .= "<h3>Computer</h3>";
			$html .= "<th>Game</th>";
			$html .= "<th>Amount</th>";
		$html .= "</tr>";
		
		foreach ($view as $v) {
			
			$html .= "<tr>";
				$html .= "<td>".$v->game."</td>";
				$html .= "<td>".$v->amount."</td>";
			$html .= "</tr>";
		}
		
	$html .= "</table>";
	
	echo $html;
	
?>


<?php 
	
$view = $data->getAllDataConsole($email);

	$html = "<table class='table table-bordered'>";
	
		$html .= "<tr>";
			$html .= "<h3>Console</h3>";
			$html .= "<th>Game</th>";
			$html .= "<th>Amount</th>";
		$html .= "</tr>";
		
		foreach ($view as $v) {
			
			$html .= "<tr>";
				$html .= "<td>".$v->game."</td>";
				$html .= "<td>".$v->amount."</td>";
			$html .= "</tr>";
		}
		
	$html .= "</table>";
	
	echo $html;
	
?>

<?php 
	
$view = $data->getAllDataPortable($email);

	$html = "<table class='table table-bordered'>";
	
		$html .= "<tr>";
			$html .= "<h3>Portable</h3>";
			$html .= "<th>Game</th>";
			$html .= "<th>Amount</th>";
		$html .= "</tr>";
		
		foreach ($view as $v) {
			
			$html .= "<tr>";
				$html .= "<td>".$v->game."</td>";
				$html .= "<td>".$v->amount."</td>";
			$html .= "</tr>";
		}
		
	$html .= "</table>";
	
	echo $html;
	
?>
<?php 
	
$view = $data->getAllDataBoard($email);

	$html = "<table class='table table-bordered'>";
	
		$html .= "<tr>";
			$html .= "<h3>Board Games</h3>";
			$html .= "<th>Game</th>";
			$html .= "<th>Amount</th>";
		$html .= "</tr>";
		
		foreach ($view as $v) {
			
			$html .= "<tr>";
				$html .= "<td>".$v->game."</td>";
				$html .= "<td>".$v->amount."</td>";
			$html .= "</tr>";
		}
		
	$html .= "</table>";
	
	echo $html;
	
?>
<?php 
	
$view = $data->getAllDataCard($email);

	$html = "<table class='table table-bordered'>";
	
		$html .= "<tr>";
			$html .= "<h3>Card Games</h3>";
			$html .= "<th>Game</th>";
			$html .= "<th>Amount</th>";
		$html .= "</tr>";
		
		foreach ($view as $v) {
			
			$html .= "<tr>";
				$html .= "<td>".$v->game."</td>";
				$html .= "<td>".$v->amount."</td>";
			$html .= "</tr>";
		}
		
	$html .= "</table>";
	
	echo $html;
	
?>

	</div>
</div>
<?php require("../footer.php"); ?>