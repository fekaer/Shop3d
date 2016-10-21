<?php

if (isset($_SESSION['username'])) {
	//echo $_SESSION['username'];
	?>
	<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php" style="font-size:26pt;font-color:White">Shop3D</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
				<form class="navbar-form navbar-right" method='post' action='index.php' >
					<div class="form-group">
						<a href="deconnexion.php" class="btn btn-danger">Sign out</a>
						<a href="client.php" class="btn btn-default"><?php echo $_SESSION['username']; ?></a>
					</div>
				</form>
				</div><!--/.navbar-collapse -->
			</div>
	    </nav>

	<?php
}
else {
	?>
	<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php" style="font-size:26pt;font-color:White">Shop3D</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<form class="navbar-form navbar-right" method='post' action='index.php' >
						<div class="form-group">
							<input name="username_" type="text" placeholder="Username" class="form-control">
						</div>
						<div class="form-group">
							<input name="password" type="password" placeholder="Password" class="form-control">
						</div>
						<button type="submit" class="btn btn-primary">Log in</button>
						<a href="creer_compt.php" class="btn btn-default">Sign in</a>

						<div style="color:#FF0000; float: right; margin-left: 30px;" >
							<?php echo $error;  ?>
						</div>

					</form>
				</div><!--/.navbar-collapse -->
			</div>
	    </nav>

	<?php
}

?>
