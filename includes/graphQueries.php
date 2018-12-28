	<?php
	//1 days ago
	//$sqlqu = "SELECT SUM(fat) AS total_fat FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -1 DAY AND `time` <  DATE(NOW()) + INTERVAL 0 DAY";
	//2 days ago
	//$sqlqu = "SELECT SUM(fat) AS total_fat FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -2 DAY AND `time` <  DATE(NOW()) + INTERVAL -1 DAY";
	//3 days ago
	//$sqlqu = "SELECT SUM(fat) AS total_fat FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -3 DAY AND `time` <  DATE(NOW()) + INTERVAL -2 DAY";
	//4 days ago
	//$sqlqu = "SELECT SUM(fat) AS total_fat FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -4 DAY AND `time` <  DATE(NOW()) + INTERVAL -3 DAY";
	//5 days ago
	//$sqlqu = "SELECT SUM(fat) AS total_fat FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -5 DAY AND `time` <  DATE(NOW()) + INTERVAL -4 DAY";
	//6 days ago
	//$sqlqu = "SELECT SUM(fat) AS total_fat FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -6 DAY AND `time` <  DATE(NOW()) + INTERVAL -5 DAY";
	//7 days ago
	//$sqlqu = "SELECT SUM(fat) AS total_fat FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -7 DAY AND `time` <  DATE(NOW()) + INTERVAL -6 DAY";

	$fatFrom7DaysAgo = "SELECT SUM(fat) AS total_fat FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -7 DAY AND `time` <  DATE(NOW()) + INTERVAL -6 DAY";
	$fatFrom7DaysAgoR = $link->query($fatFrom7DaysAgo);
	$fatFrom7DaysAgoRow = mysqli_fetch_assoc($fatFrom7DaysAgoR); 
	$fatFrom7DaysAgoTotal = $fatFrom7DaysAgoRow['total_fat'];

	if (!($fatFrom7DaysAgoTotal > 0)) { 
		$fatFrom7DaysAgoTotal = 0;
	}

	$fatFrom6DaysAgo = "SELECT SUM(fat) AS total_fat FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -6 DAY AND `time` <  DATE(NOW()) + INTERVAL -5 DAY";
	$fatFrom6DaysAgoR = $link->query($fatFrom6DaysAgo);
	$fatFrom6DaysAgoRow = mysqli_fetch_assoc($fatFrom6DaysAgoR); 
	$fatFrom6DaysAgoTotal = $fatFrom6DaysAgoRow['total_fat'];

	if (!($fatFrom6DaysAgoTotal > 0)) { 
		$fatFrom6DaysAgoTotal = 0;
	}

	$fatFrom5DaysAgo = "SELECT SUM(fat) AS total_fat FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -5 DAY AND `time` <  DATE(NOW()) + INTERVAL -4 DAY";
	$fatFrom5DaysAgoR = $link->query($fatFrom5DaysAgo);
	$fatFrom5DaysAgoRow = mysqli_fetch_assoc($fatFrom5DaysAgoR); 
	$fatFrom5DaysAgoTotal = $fatFrom5DaysAgoRow['total_fat'];

	if (!($fatFrom5DaysAgoTotal > 0)) { 
		$fatFrom5DaysAgoTotal = 0;
	}

	$fatFrom4DaysAgo = "SELECT SUM(fat) AS total_fat FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -4 DAY AND `time` <  DATE(NOW()) + INTERVAL -3 DAY";
	$fatFrom4DaysAgoR = $link->query($fatFrom4DaysAgo);
	$fatFrom4DaysAgoRow = mysqli_fetch_assoc($fatFrom4DaysAgoR); 
	$fatFrom4DaysAgoTotal = $fatFrom4DaysAgoRow['total_fat'];

	if (!($fatFrom4DaysAgoTotal > 0)) { 
		$fatFrom4DaysAgoTotal = 0;
	}


	$fatFrom3DaysAgo = "SELECT SUM(fat) AS total_fat FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -3 DAY AND `time` <  DATE(NOW()) + INTERVAL -2 DAY";
	$fatFrom3DaysAgoR = $link->query($fatFrom3DaysAgo);
	$fatFrom3DaysAgoRow = mysqli_fetch_assoc($fatFrom3DaysAgoR); 
	$fatFrom3DaysAgoTotal = $fatFrom3DaysAgoRow['total_fat'];

	if (!($fatFrom3DaysAgoTotal > 0)) { 
		$fatFrom3DaysAgoTotal = 0;
	}


	$fatFrom2DaysAgo = "SELECT SUM(fat) AS total_fat FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -2 DAY AND `time` <  DATE(NOW()) + INTERVAL -1 DAY";
	$fatFrom2DaysAgoR = $link->query($fatFrom2DaysAgo);
	$fatFrom2DaysAgoRow = mysqli_fetch_assoc($fatFrom2DaysAgoR); 
	$fatFrom2DaysAgoTotal = $fatFrom2DaysAgoRow['total_fat'];

	if (!($fatFrom2DaysAgoTotal > 0)) { 
		$fatFrom2DaysAgoTotal = 0;
	}


	$fatFrom1DaysAgo = "SELECT SUM(fat) AS total_fat FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -1 DAY AND `time` <  DATE(NOW()) + INTERVAL 0 DAY";
	$fatFrom1DaysAgoR = $link->query($fatFrom1DaysAgo);
	$fatFrom1DaysAgoRow = mysqli_fetch_assoc($fatFrom1DaysAgoR); 
	$fatFrom1DaysAgoTotal = $fatFrom1DaysAgoRow['total_fat'];

	if (!($fatFrom1DaysAgoTotal > 0)) { 
		$fatFrom1DaysAgoTotal = 0;
	}


	$carbsFrom1DaysAgo = "SELECT SUM(carbs) AS total_carbs FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -1 DAY AND `time` <  DATE(NOW()) + INTERVAL 0 DAY";
	$carbsFrom1DaysAgoR = $link->query($carbsFrom1DaysAgo);
	$carbsFrom1DaysAgoRow = mysqli_fetch_assoc($carbsFrom1DaysAgoR); 
	$carbsFrom1DaysAgoTotal = $carbsFrom1DaysAgoRow['total_carbs'];

	if (!($carbsFrom1DaysAgoTotal > 0)) { 
		$carbsFrom1DaysAgoTotal = 0;
	}

	$carbsFrom2DaysAgo = "SELECT SUM(carbs) AS total_carbs FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -2 DAY AND `time` <  DATE(NOW()) + INTERVAL -1 DAY";
	$carbsFrom2DaysAgoR = $link->query($carbsFrom2DaysAgo);
	$carbsFrom2DaysAgoRow = mysqli_fetch_assoc($carbsFrom2DaysAgoR); 
	$carbsFrom2DaysAgoTotal = $carbsFrom2DaysAgoRow['total_carbs'];

	if (!($carbsFrom2DaysAgoTotal > 0)) { 
		$carbsFrom2DaysAgoTotal = 0;
	}

	$carbsFrom3DaysAgo = "SELECT SUM(carbs) AS total_carbs FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -3 DAY AND `time` <  DATE(NOW()) + INTERVAL -2 DAY";
	$carbsFrom3DaysAgoR = $link->query($carbsFrom3DaysAgo);
	$carbsFrom3DaysAgoRow = mysqli_fetch_assoc($carbsFrom3DaysAgoR); 
	$carbsFrom3DaysAgoTotal = $carbsFrom3DaysAgoRow['total_carbs'];

	if (!($carbsFrom3DaysAgoTotal > 0)) { 
		$carbsFrom3DaysAgoTotal = 0;
	}

	$carbsFrom4DaysAgo = "SELECT SUM(carbs) AS total_carbs FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -4 DAY AND `time` <  DATE(NOW()) + INTERVAL -3 DAY";
	$carbsFrom4DaysAgoR = $link->query($carbsFrom4DaysAgo);
	$carbsFrom4DaysAgoRow = mysqli_fetch_assoc($carbsFrom4DaysAgoR); 
	$carbsFrom4DaysAgoTotal = $carbsFrom4DaysAgoRow['total_carbs'];

	if (!($carbsFrom4DaysAgoTotal > 0)) { 
		$carbsFrom4DaysAgoTotal = 0;
	}

	$carbsFrom5DaysAgo = "SELECT SUM(carbs) AS total_carbs FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -5 DAY AND `time` <  DATE(NOW()) + INTERVAL -4 DAY";
	$carbsFrom5DaysAgoR = $link->query($carbsFrom5DaysAgo);
	$carbsFrom5DaysAgoRow = mysqli_fetch_assoc($carbsFrom5DaysAgoR); 
	$carbsFrom5DaysAgoTotal = $carbsFrom5DaysAgoRow['total_carbs'];

	if (!($carbsFrom5DaysAgoTotal > 0)) { 
		$carbsFrom5DaysAgoTotal = 0;
	}

	$carbsFrom6DaysAgo = "SELECT SUM(carbs) AS total_carbs FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -6 DAY AND `time` <  DATE(NOW()) + INTERVAL -5 DAY";
	$carbsFrom6DaysAgoR = $link->query($carbsFrom6DaysAgo);
	$carbsFrom6DaysAgoRow = mysqli_fetch_assoc($carbsFrom6DaysAgoR); 
	$carbsFrom6DaysAgoTotal = $carbsFrom6DaysAgoRow['total_carbs'];

	if (!($carbsFrom6DaysAgoTotal > 0)) { 
		$carbsFrom6DaysAgoTotal = 0;
	}

	$carbsFrom7DaysAgo = "SELECT SUM(carbs) AS total_carbs FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -7 DAY AND `time` <  DATE(NOW()) + INTERVAL -6 DAY";
	$carbsFrom7DaysAgoR = $link->query($carbsFrom7DaysAgo);
	$carbsFrom7DaysAgoRow = mysqli_fetch_assoc($carbsFrom7DaysAgoR); 
	$carbsFrom7DaysAgoTotal = $carbsFrom7DaysAgoRow['total_carbs'];

	if (!($carbsFrom7DaysAgoTotal > 0)) { 
		$carbsFrom7DaysAgoTotal = 0;
	}
	?>