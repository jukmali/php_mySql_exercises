<?php 
		
		$asterisksPerRow = $_POST['asterisksRow'];
		$rows = $_POST['rows'];
		
		echo ("Printing asterisks in rows:");
		echo "<br>";

		for ($i = 1; $i <= $rows; $i++) {
    		for ($j = 1; $j <=$asterisksPerRow; $j++){
    			echo "*";
    		}
    		echo "<br>";
		} 	
		
?>
