<?php 
		
		$loops = $_POST['loops'];
		
		echo ("Printing an asterisk ".$loops." times");
		echo "<br>";

		while ($loops>0){
			echo "*";
			$loops--;
		}		
		
?>
