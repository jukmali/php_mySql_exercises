<!DOCTYPE html>
<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['adding'])) { 
			$result = $_POST['valuex'] + $_POST['valuey'];
		}
		else if (isset($_POST['subtracting'])){ 
			$result = $_POST['valuex'] - $_POST['valuey'];
		}
		else { 
			$result = ''; 
		}
    }
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Simple Calculator</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <!-- Row 1 -->
                <div class="row">
                  <div class="col-xs-12"> <!-- One column occupying 12 columns -->
                    <h2> Simple Calculator </h2>
                  </div>
                </div>
                <!-- Row 2 -->
                <div class="row">
                  <div class="col-xs-6"> <!-- One column occupying 6 columns -->
                    Value for X:<br>
                    <input type="number" class="form-control" name="valuex" value="<?php echo !empty($result)?$_POST['valuex']:'';?>">
                  </div>
                  <div class="col-xs-6">
                    Value for Y:<br>
                    <input type="number" class="form-control" name="valuey" value="<?php echo !empty($result)?$_POST['valuey']:'';?>">
                  </div>
                </div>
                <!-- Row 3 -->
                <div class="row">
                  <div class="col-xs-12">
                    <br>
                    Result: <?php echo !empty($result)?$result:'';?>
                    <br><br>
                  </div>
                </div>
                <!-- Row 4 -->
                <div class="row">
                  <div class="col-xs-3">
                    <input type="submit" name="adding" class="btn btn-primary" value="X+Y">
                  </div>
                  <div class="col-xs-3">
                    <input type="submit" name="subtracting" class="btn btn-primary" value="X-Y">
                  </div>
                  <div class="col-xs-6">
                    <input type="submit" name="clearing" class="btn btn-warning" value="Clear">
                  </div>
                </div>
            </form> <!-- Closing the form -->
        </div> <!-- Closing the container -->
    </body>
</html>
