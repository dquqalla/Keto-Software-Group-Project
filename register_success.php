<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noarchive">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/reset.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,600i,700,700i,800" rel="stylesheet">
	<style>
	html, body {
		height: 95%;
		width: 100%;
		margin: 0;
	}
	body {
		display: flex;
		background-image: url("images/bg.png"), linear-gradient(90deg, #3682A7, #22B396);
		background-image: url("images/bg.png"), -webkit-linear-gradient(90deg, #3682A7, #22B396);
		background-image: url("images/bg.png"), -o-linear-gradient(90deg, #3682A7, #22B396);
		background-image: url("images/bg.png"), linear-gradient(90deg, #3682A7, #22B396);
	}	
	.mainContainerL {
		margin: auto;
	}
	.imageCon {
		text-align: center;
		padding-bottom: 34px;
	}
	.imageCon img {
		background: #fff;
	    border-radius: 100px;
	    padding: 20px;
	}
	.oCon {
		/*width: 428px;*/
		text-align: center;
	}
	.success, .successSub {
		font-family:'Open Sans',sans-serif;
		color: #fff;
	}
	.success {
		font-size: 24px;
		font-weight: 600;
	}
	.successSub {
		font-size: 17px;
		font-weight: 400;
		padding-top: 4px;
	}
	.oCon button {
		padding: 14px 25px;
		border-radius: 100px;
		color: #32BDA5;
		background-color: #fff;
		font-size: 14px;
		font-weight: 600;
		text-transform: uppercase;
		letter-spacing: 2px;
		cursor: pointer;
		webkit-transition:all .3s ease-in;
		-moz-transition:all .3s ease-in;
		-o-transition:all .3s ease-in;
		-ms-transition:all .3s ease-in;
		transition:all .3s ease-in;
		webkit-transition:all .3s ease-out;
		-moz-transition:all .3s ease-out;
		-o-transition:all .3s ease-out;
		-ms-transition:all .3s ease-out;
		transition:all .3s ease-out;
	}
	.oCon button:hover {
		background-color: #34495e;
		color: #fff;

	}
	.buttonContainer {
		padding-top: 20px;
	}
	@media only screen and (max-width: 440px) {
		.mainContainerL {
			width: 90%;
		}
		.oCon {
			width: 100%;
		}
		.imageCon {
			padding-top: 45px;
		}
	}
	</style>
</head>

<body>
	<div id="mainContainerL" class="mainContainerL animated zoomIn">
		<div class="imageCon">
			<img src="https://img.icons8.com/material-rounded/100/32BDA5/checkmark.png">
		</div>
		<div class="oCon">
			<p class="success">Registration successful!</p>
			<p class="successSub">You're on your way to becoming a better you.</p>
			<div class="buttonContainer">
				<form method="get" action="login.php">
					<button type="submit">Go to Dashboard</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>