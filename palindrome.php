<?php require "includes/site_config.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
        <?php require "includes/header.php"; ?>
	</head>
	<body>
	    <?php require "includes/top_design.php"; ?>
<?php include("includes/nav.php");?>
		<div class="container">
  		<h2>Check Palindrome</h2>
        <div class="col-sm-12">
  				<div class="row">
  					<div class="col-sm-4">
  						<div class="form-group">
  							<label>Enter Text</label>
  							<input type="text" name="input_text" id="input_text" class="form-control">
  						</div>
  					</div>
  					<div class="col-sm-2">
  						<div class="form-group">
  							<label>&nbsp;</label>
  							<div>
                  <button onClick="Palindrome()" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Check</button>
                </div>
  						</div>
  					</div>
  				</div>
  			</div>
<div id="message"></div>
    </div>
    <?php include("includes/footer.php");?>
</body>
<script src="js/palindrome.js"></script>
</html>
