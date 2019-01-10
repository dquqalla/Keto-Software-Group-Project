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

	$fatFrom10DaysAgo = "SELECT SUM(fat) AS total_fat FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -10 DAY AND `time` <  DATE(NOW()) + INTERVAL -9 DAY";
	$fatFrom10DaysAgoR = $link->query($fatFrom10DaysAgo);
	$fatFrom10DaysAgoRow = mysqli_fetch_assoc($fatFrom10DaysAgoR); 
	$fatFrom10DaysAgoTotal = $fatFrom10DaysAgoRow['total_fat'];

	if (!($fatFrom10DaysAgoTotal > 0)) { 
		$fatFrom10DaysAgoTotal = 0;
	}

	$fatFrom9DaysAgo = "SELECT SUM(fat) AS total_fat FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -9 DAY AND `time` <  DATE(NOW()) + INTERVAL -8 DAY";
	$fatFrom9DaysAgoR = $link->query($fatFrom9DaysAgo);
	$fatFrom9DaysAgoRow = mysqli_fetch_assoc($fatFrom9DaysAgoR); 
	$fatFrom9DaysAgoTotal = $fatFrom9DaysAgoRow['total_fat'];

	if (!($fatFrom9DaysAgoTotal > 0)) { 
		$fatFrom9DaysAgoTotal = 0;
	}

	$fatFrom8DaysAgo = "SELECT SUM(fat) AS total_fat FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -8 DAY AND `time` <  DATE(NOW()) + INTERVAL -7 DAY";
	$fatFrom8DaysAgoR = $link->query($fatFrom8DaysAgo);
	$fatFrom8DaysAgoRow = mysqli_fetch_assoc($fatFrom8DaysAgoR); 
	$fatFrom8DaysAgoTotal = $fatFrom8DaysAgoRow['total_fat'];

	if (!($fatFrom8DaysAgoTotal > 0)) { 
		$fatFrom8DaysAgoTotal = 0;
	}

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

	$carbsFrom8DaysAgo = "SELECT SUM(carbs) AS total_carbs FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -8 DAY AND `time` <  DATE(NOW()) + INTERVAL -7 DAY";
	$carbsFrom8DaysAgoR = $link->query($carbsFrom8DaysAgo);
	$carbsFrom8DaysAgoRow = mysqli_fetch_assoc($carbsFrom8DaysAgoR); 
	$carbsFrom8DaysAgoTotal = $carbsFrom8DaysAgoRow['total_carbs'];

	if (!($carbsFrom8DaysAgoTotal > 0)) { 
		$carbsFrom8DaysAgoTotal = 0;
	}

	$carbsFrom9DaysAgo = "SELECT SUM(carbs) AS total_carbs FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -9 DAY AND `time` <  DATE(NOW()) + INTERVAL -8 DAY";
	$carbsFrom9DaysAgoR = $link->query($carbsFrom9DaysAgo);
	$carbsFrom9DaysAgoRow = mysqli_fetch_assoc($carbsFrom9DaysAgoR); 
	$carbsFrom9DaysAgoTotal = $carbsFrom9DaysAgoRow['total_carbs'];

	if (!($carbsFrom9DaysAgoTotal > 0)) { 
		$carbsFrom9DaysAgoTotal = 0;
	}

	$carbsFrom10DaysAgo = "SELECT SUM(carbs) AS total_carbs FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -10 DAY AND `time` <  DATE(NOW()) + INTERVAL -9 DAY";
	$carbsFrom10DaysAgoR = $link->query($carbsFrom10DaysAgo);
	$carbsFrom10DaysAgoRow = mysqli_fetch_assoc($carbsFrom10DaysAgoR); 
	$carbsFrom10DaysAgoTotal = $carbsFrom10DaysAgoRow['total_carbs'];

	if (!($carbsFrom10DaysAgoTotal > 0)) { 
		$carbsFrom10DaysAgoTotal = 0;
	}

	$proFrom1DaysAgo = "SELECT SUM(protein) AS total_pro FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -1 DAY AND `time` <  DATE(NOW()) + INTERVAL 0 DAY";
	$proFrom1DaysAgoR = $link->query($proFrom1DaysAgo);
	$proFrom1DaysAgoRow = mysqli_fetch_assoc($proFrom1DaysAgoR); 
	$proFrom1DaysAgoTotal = $proFrom1DaysAgoRow['total_pro'];

	if (!($proFrom1DaysAgoTotal > 0)) { 
		$proFrom1DaysAgoTotal = 0;
	}

	$proFrom2DaysAgo = "SELECT SUM(protein) AS total_pro FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -2 DAY AND `time` <  DATE(NOW()) + INTERVAL -1 DAY";
	$proFrom2DaysAgoR = $link->query($proFrom2DaysAgo);
	$proFrom2DaysAgoRow = mysqli_fetch_assoc($proFrom2DaysAgoR); 
	$proFrom2DaysAgoTotal = $proFrom2DaysAgoRow['total_pro'];

	if (!($proFrom2DaysAgoTotal > 0)) { 
		$proFrom2DaysAgoTotal = 0;
	}

	$proFrom3DaysAgo = "SELECT SUM(protein) AS total_pro FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -3 DAY AND `time` <  DATE(NOW()) + INTERVAL -2 DAY";
	$proFrom3DaysAgoR = $link->query($proFrom3DaysAgo);
	$proFrom3DaysAgoRow = mysqli_fetch_assoc($proFrom3DaysAgoR); 
	$proFrom3DaysAgoTotal = $proFrom3DaysAgoRow['total_pro'];

	if (!($proFrom3DaysAgoTotal > 0)) { 
		$proFrom3DaysAgoTotal = 0;
	}

	$proFrom4DaysAgo = "SELECT SUM(protein) AS total_pro FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -4 DAY AND `time` <  DATE(NOW()) + INTERVAL -3 DAY";
	$proFrom4DaysAgoR = $link->query($proFrom4DaysAgo);
	$proFrom4DaysAgoRow = mysqli_fetch_assoc($proFrom4DaysAgoR); 
	$proFrom4DaysAgoTotal = $proFrom4DaysAgoRow['total_pro'];

	if (!($proFrom4DaysAgoTotal > 0)) { 
		$proFrom4DaysAgoTotal = 0;
	}

	$proFrom5DaysAgo = "SELECT SUM(protein) AS total_pro FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -5 DAY AND `time` <  DATE(NOW()) + INTERVAL -4 DAY";
	$proFrom5DaysAgoR = $link->query($proFrom5DaysAgo);
	$proFrom5DaysAgoRow = mysqli_fetch_assoc($proFrom5DaysAgoR); 
	$proFrom5DaysAgoTotal = $proFrom5DaysAgoRow['total_pro'];

	if (!($proFrom5DaysAgoTotal > 0)) { 
		$proFrom5DaysAgoTotal = 0;
	}

	$proFrom6DaysAgo = "SELECT SUM(protein) AS total_pro FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -6 DAY AND `time` <  DATE(NOW()) + INTERVAL -5 DAY";
	$proFrom6DaysAgoR = $link->query($proFrom6DaysAgo);
	$proFrom6DaysAgoRow = mysqli_fetch_assoc($proFrom6DaysAgoR); 
	$proFrom6DaysAgoTotal = $proFrom6DaysAgoRow['total_pro'];

	if (!($proFrom6DaysAgoTotal > 0)) { 
		$proFrom6DaysAgoTotal = 0;
	}

	$proFrom7DaysAgo = "SELECT SUM(protein) AS total_pro FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -7 DAY AND `time` <  DATE(NOW()) + INTERVAL -6 DAY";
	$proFrom7DaysAgoR = $link->query($proFrom7DaysAgo);
	$proFrom7DaysAgoRow = mysqli_fetch_assoc($proFrom7DaysAgoR); 
	$proFrom7DaysAgoTotal = $proFrom7DaysAgoRow['total_pro'];

	if (!($proFrom7DaysAgoTotal > 0)) { 
		$proFrom7DaysAgoTotal = 0;
	}

	$proFrom8DaysAgo = "SELECT SUM(protein) AS total_pro FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -8 DAY AND `time` <  DATE(NOW()) + INTERVAL -7 DAY";
	$proFrom8DaysAgoR = $link->query($proFrom8DaysAgo);
	$proFrom8DaysAgoRow = mysqli_fetch_assoc($proFrom8DaysAgoR); 
	$proFrom8DaysAgoTotal = $proFrom8DaysAgoRow['total_pro'];

	if (!($proFrom8DaysAgoTotal > 0)) { 
		$proFrom8DaysAgoTotal = 0;
	}

	$proFrom9DaysAgo = "SELECT SUM(protein) AS total_pro FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -9 DAY AND `time` <  DATE(NOW()) + INTERVAL -8 DAY";
	$proFrom9DaysAgoR = $link->query($proFrom9DaysAgo);
	$proFrom9DaysAgoRow = mysqli_fetch_assoc($proFrom9DaysAgoR); 
	$proFrom9DaysAgoTotal = $proFrom9DaysAgoRow['total_pro'];

	if (!($proFrom9DaysAgoTotal > 0)) { 
		$proFrom9DaysAgoTotal = 0;
	}

	$proFrom10DaysAgo = "SELECT SUM(protein) AS total_pro FROM userFood WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -10 DAY AND `time` <  DATE(NOW()) + INTERVAL -9 DAY";
	$proFrom10DaysAgoR = $link->query($proFrom10DaysAgo);
	$proFrom10DaysAgoRow = mysqli_fetch_assoc($proFrom10DaysAgoR); 
	$proFrom10DaysAgoTotal = $proFrom10DaysAgoRow['total_pro'];

	if (!($proFrom10DaysAgoTotal > 0)) { 
		$proFrom10DaysAgoTotal = 0;
	}

	//Water queries start here
	$waterFrom7DaysAgo = "SELECT SUM(waterAmount) AS total_water FROM userWater WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -7 DAY AND `time` <  DATE(NOW()) + INTERVAL -6 DAY";
	$waterFrom7DaysAgoR = $link->query($waterFrom7DaysAgo);
	$waterFrom7DaysAgoRow = mysqli_fetch_assoc($waterFrom7DaysAgoR); 
	$waterFrom7DaysAgoTotal = $waterFrom7DaysAgoRow['total_water'];

	if (!($waterFrom7DaysAgoTotal > 0)) { 
		$waterFrom7DaysAgoTotal = 0;
	}

	$waterFrom6DaysAgo = "SELECT SUM(waterAmount) AS total_water FROM userWater WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -6 DAY AND `time` <  DATE(NOW()) + INTERVAL -5 DAY";
	$waterFrom6DaysAgoR = $link->query($waterFrom6DaysAgo);
	$waterFrom6DaysAgoRow = mysqli_fetch_assoc($waterFrom6DaysAgoR); 
	$waterFrom6DaysAgoTotal = $waterFrom6DaysAgoRow['total_water'];

	if (!($waterFrom6DaysAgoTotal > 0)) { 
		$waterFrom6DaysAgoTotal = 0;
	}

	$waterFrom5DaysAgo = "SELECT SUM(waterAmount) AS total_water FROM userWater WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -5 DAY AND `time` <  DATE(NOW()) + INTERVAL -4 DAY";
	$waterFrom5DaysAgoR = $link->query($waterFrom5DaysAgo);
	$waterFrom5DaysAgoRow = mysqli_fetch_assoc($waterFrom5DaysAgoR); 
	$waterFrom5DaysAgoTotal = $waterFrom5DaysAgoRow['total_water'];

	if (!($waterFrom5DaysAgoTotal > 0)) { 
		$waterFrom5DaysAgoTotal = 0;
	}

	$waterFrom4DaysAgo = "SELECT SUM(waterAmount) AS total_water FROM userWater WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -4 DAY AND `time` <  DATE(NOW()) + INTERVAL -3 DAY";
	$waterFrom4DaysAgoR = $link->query($waterFrom4DaysAgo);
	$waterFrom4DaysAgoRow = mysqli_fetch_assoc($waterFrom4DaysAgoR); 
	$waterFrom4DaysAgoTotal = $waterFrom4DaysAgoRow['total_water'];

	if (!($waterFrom4DaysAgoTotal > 0)) { 
		$waterFrom4DaysAgoTotal = 0;
	}

	$waterFrom3DaysAgo = "SELECT SUM(waterAmount) AS total_water FROM userWater WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -3 DAY AND `time` <  DATE(NOW()) + INTERVAL -2 DAY";
	$waterFrom3DaysAgoR = $link->query($waterFrom3DaysAgo);
	$waterFrom3DaysAgoRow = mysqli_fetch_assoc($waterFrom3DaysAgoR); 
	$waterFrom3DaysAgoTotal = $waterFrom3DaysAgoRow['total_water'];

	if (!($waterFrom3DaysAgoTotal > 0)) { 
		$waterFrom3DaysAgoTotal = 0;
	}

	$waterFrom2DaysAgo = "SELECT SUM(waterAmount) AS total_water FROM userWater WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -2 DAY AND `time` <  DATE(NOW()) + INTERVAL -1 DAY";
	$waterFrom2DaysAgoR = $link->query($waterFrom2DaysAgo);
	$waterFrom2DaysAgoRow = mysqli_fetch_assoc($waterFrom2DaysAgoR); 
	$waterFrom2DaysAgoTotal = $waterFrom2DaysAgoRow['total_water'];

	if (!($waterFrom2DaysAgoTotal > 0)) { 
		$waterFrom2DaysAgoTotal = 0;
	}

	$waterFrom1DaysAgo = "SELECT SUM(waterAmount) AS total_water FROM userWater WHERE userID = $id AND `time` >= DATE(NOW()) + INTERVAL -1 DAY AND `time` <  DATE(NOW()) + INTERVAL 0 DAY";
	$waterFrom1DaysAgoR = $link->query($waterFrom1DaysAgo);
	$waterFrom1DaysAgoRow = mysqli_fetch_assoc($waterFrom1DaysAgoR); 
	$waterFrom1DaysAgoTotal = $waterFrom1DaysAgoRow['total_water'];

	if (!($waterFrom1DaysAgoTotal > 0)) { 
		$waterFrom1DaysAgoTotal = 0;
	}

	// function processWater($query) {
	// 	$waterFromDaysAgoRow = mysqli_fetch_assoc($query); 
	// 	$waterFromDaysAgoTotal = $waterFromDaysAgoRow['total_water'];

	// 	if (!($waterFromDaysAgoTotal > 0)) { 
	// 		$waterFromDaysAgoTotal = 0;
	// 	}
	// }

	$firstLastWeight = "SELECT weight FROM userWeight WHERE userID = $id ORDER BY timee DESC LIMIT 7";
	$firstLastWeightR = $link->query($firstLastWeight);
	if ($firstLastWeightR->num_rows > 0) {
		 while($arr = $firstLastWeightR->fetch_assoc()) {
	        $arrayTest[] = $arr['weight'];
	    }

	    if(array_key_exists(0, $arrayTest)) {
			$firstLastWeight = $arrayTest[0];
	    }

	    if(array_key_exists(1, $arrayTest)) {
			$secondLastWeight = $arrayTest[1];
	    }
	    if(array_key_exists(2, $arrayTest)) {
	    	$thirdLastWeight = $arrayTest[2];
	    }
	    if(array_key_exists(3, $arrayTest)) {
	    	$fourthLastWeight = $arrayTest[3];
	    }
	    if(array_key_exists(4, $arrayTest)) {
	    	$fifthLastWeight = $arrayTest[4];
	    }
	    if(array_key_exists(5, $arrayTest)) {
	    	$sixthLastWeight = $arrayTest[5];
	    }
	    if(array_key_exists(6, $arrayTest)) {
	    	$seventhLastWeight = $arrayTest[6];
	    }

	}
	// echo $firstLastWeight;
	// echo $secondLastWeight;
	// echo $thirdLastWeight;
	// echo $fourthLastWeight;
	// echo $fifthLastWeight;
	// echo $sixthLastWeight;
	// echo $seventhLastWeight;

	$firstLastWeightTime = "SELECT timee FROM userWeight WHERE userID = $id ORDER BY timee DESC LIMIT 7";
	$firstLastWeightTimeR = $link->query($firstLastWeightTime);
	if ($firstLastWeightTimeR->num_rows > 0) {
		 while($arr2 = $firstLastWeightTimeR->fetch_assoc()) {
	        $arrayTest2[] = $arr2['timee'];
	    }

	    if(array_key_exists(0, $arrayTest)) {
			$firstLastTime = $arrayTest2[0];
	    }

	    if(array_key_exists(1, $arrayTest)) {
	    	$secondLastTime = $arrayTest2[1];
	    }

	    if(array_key_exists(2, $arrayTest)) {
	    	$thirdLastTime = $arrayTest2[2];
	    }

	    if(array_key_exists(3, $arrayTest)) {
	    	$fourthLastTime = $arrayTest2[3];
	    }

	    if(array_key_exists(4, $arrayTest)) {
	    	$fifthLastTime = $arrayTest2[4];
	    }

	    if(array_key_exists(5, $arrayTest)) {
	    	$sixthLastTime = $arrayTest2[5];
	    }

	    if(array_key_exists(6, $arrayTest)) {
	    	$seventhLastTime = $arrayTest2[6];
	    }
	}

	// $firstLastTimeR = strtotime($firstLastTime); echo date('d/m', $firstLastTimeR);
	// $secondLastTimeR = strtotime($secondLastTime); echo date('d/m', $secondLastTimeR);
	// $thirdLastTimeR = strtotime($thirdLastTime); echo date('d/m', $thirdLastTimeR);
	// $fourthLastTimeR = strtotime($fourthLastTime); echo date('d/m', $fourthLastTimeR);
	// $fifthLastTimeR = strtotime($fifthLastTime); echo date('d/m', $fifthLastTimeR);
	// $sixthLastTimeR = strtotime($sixthLastTime); echo date('d/m', $sixthLastTimeR);
	// $seventhLastTimeR = strtotime($seventhLastTime); echo date('d/m', $seventhLastTimeR);
	?>