<html>
<head>
	<title>Dining Data</title>
	<script>
	<?php
	



		
			

		




 
  //DEBUGGING
 
  //$matches[0] now contains the complete A tags; ex: <a href="link">text</a>
  //$matches[1] now contains only the HREFs in the A tags; ex: link
 
  header("Content-type: text/plain"); //Set the content type to plain text so the print below is easy to read!
  
	//Crawl the webpage the gather the 	 foods.
	//Returns an array of food information. Each food information elements contains the name of the food,its id, and any food categories it is contained within.
    function populate_food_array($site){
	

		$stripped_file = strip_tags($site, "<span>");
		preg_match_all("/<span(?:[^>]*)\"([^\"]*)\"(?:[^>]*)>(?:[^<]*)<\/span>/is", $stripped_file, $matches);
	//	print_r($original_file);
		print_r($matches);	
		
		
		$food_array = array();
		for($k = 0;$k<6;$k++){
				$food_array[$k] = array();	
		}
		$food_info_index = 0;
		
		$isV = 0;
		$isVN = 0;
		$isGF = 0;
		$isL = 0;
		$hadFoodItem = 0;//Food item was found in previous iteration
	
		for($i = 0;$i < sizeof($matches[0]);$i++){
			
			

			if(strstr(substr($matches[0][$i],0,50),"Vegan")!=false){
				print_r("Vegan is true\n");
				$isVN = true;
			}
			
			if(strstr(substr($matches[0][$i],0,50),"Local")!=false){
				print_r("Local is true\n");
				$isL = true;
			}
			
			
			if(strstr(substr($matches[0][$i],0,50),"Vegetarian")!=false){
				print_r("Vegetarian is true\n");
				$isV = true;
			}
			
			if(strstr(substr($matches[0][$i],0,50),"Gluten Free")!=false){	
				print_r("Gluten Free is true\n");
				$isGF = true;	
			}
			
			if($hadFoodItem){
				if($isV == true) $food_array[2][$food_info_index-1] = 1;
				else $food_array[2][$food_info_index-1] = 0;
				
				if($isVN == true) $food_array[3][$food_info_index-1] = 1;
				else $food_array[3][$food_info_index-1] = 0;
				
				if($isGF == true) $food_array[4][$food_info_index-1] = 1;
				else $food_array[4][$food_info_index-1] = 0;
				
				if($isL == true) $food_array[5][$food_info_index-1] = 1;
				else $food_array[5][$food_info_index-1] = 0;
				$hadFoodItem = false;
				
			}
			
			
			if(substr($matches[0][$i],0,84)=="<span class=\"field-content\"><span class=\"meal-title-calculator\" onclick=\"refreshMenu"){
				$sub1 = substr($matches[0][$i],85,-7);
				$index = strpos($sub1, ')' );
				$food_id = substr($sub1, 0, $index);
				$food_name = substr($sub1, $index+3);
				$food_array[0][$food_info_index] = $food_name;
				$food_array[1][$food_info_index] = $food_id;


				
				$food_info_index++;
				
				$isGF = false;
				$isVN = false;
				$isL = false;
				$isV = false;
				$hadFoodItem = true;
			}	
		}
	

	return($food_array);
	}
	function populate_img_array($site){
		

		$stripped_file = strip_tags($site, "<span><img>");
		preg_match_all("/<img [^>]*src=\"?([^ \">]+)\"?/i", $stripped_file, $images);
		print_r($images);
		
		$image_array = array();
		//$image_array_index = 0;

		for($i = 0;$i < sizeof($images); $i+=2){
			for($j = 0;$j< sizeof($images[$i]); $j++){
				
				print_r("HTML: \n\n" . $images[$i] . "\n\n\n");
				$img = substr($images[$i][$j], 10, -1);
				if(substr($img, 0, 75)=="http://dining.columbia.edu/files/dining/imagecache/food_thumb/meals-images/"){
					print_r("pushing:" . $img . "\n");
					array_push($image_array, $img);
				}
				else{
					print_r("check:" . substr($img, 0, 75) . "\n");
				}
				
			}
		}
		
		return $image_array;
		
	}	
	
	function myStrstrTrue($haystack,$needle){  //strstr() 3rd parameter is php5.3<=  so i wrote this
		$haystack = (string)$haystack;
		$haystack = explode($needle,$haystack); //remove text after end tag and tag
		$haystack =  (string)$haystack[0];
		return $haystack;
	}
	
	//Order of nutrition information for each element: Serving Size, Calories, Total Fat, Saturated Fat, Cholesterol, Protein, Carbohydrates, Fiber, Sodium
	function parse_nutrition($food_array){
		
		$nutrition_array = array();
		
		//Create an array in which each element represents one food item, and each food item contains nutrition information
		for($j = 0;$j<sizeof($food_array[1]);$j++){
			$nutrition_array[$j] = array();
		}
		
		for($i = 0;$i < sizeof($food_array[1]);$i++){
			
			print_r("Loading web page for id " . $food_array[1][$i]);
			$nutrition_file = file_get_contents("http://dining.columbia.edu/ajax/node/load/" . $food_array[1][$i]);
			//print_r("NUTRITION FILE:\n");
			//print_r($nutrition_file . "\n\n\n");
			
			
			$needle = "servingsize";
			$serving_size_index = strpos($nutrition_file, "servingsize");
			$serving_size_end= strpos($nutrition_file, "data-val-calories");//, $serving_size_index);
			$s1 = substr($nutrition_file, $serving_size_index+19);
			$serving_size = myStrstrTrue($s1, "\u003c\/td\u003e\u003ctd");
			$nutrition_array[$i][0] = $serving_size;
			
			$calories1 = strstr($nutrition_file, "data-val-calories=\\");
			$calories2 = myStrstrTrue($calories1, "\\\" class");
			$calories = substr($calories2, 20);
			$nutrition_array[$i][1] = $calories;
			
			$fat1 = strstr($nutrition_file, "data-val-totalfat=\\");
			$fat2 = myStrstrTrue($fat1, "\\\" class");
			$fat = substr($fat2, 20);
			$nutrition_array[$i][2] = $fat;
			
			$satfat1 = strstr($nutrition_file, "data-val-saturatedfat=\\");
			$satfat2= myStrstrTrue($satfat1, "\\\" class");
			$satfat = substr($satfat2, 24);
			$nutrition_array[$i][3] = $satfat;
			
			$chol1 = strstr($nutrition_file, "data-val-cholesterol=\\");
			$chol2= myStrstrTrue($chol1, "\\\" class");
			$chol = substr($chol2, 23);
			$nutrition_array[$i][4] = $chol;
			
			$protein1 = strstr($nutrition_file, "data-val-protein=\\");
			$protein2= myStrStrTrue($protein1, "\\\" class");
			$protein = substr($protein2, 19);
			$nutrition_array[$i][5] = $protein;
			
			$carb1 = strstr($nutrition_file, "data-val-totalcarbohydrates=\\");
			$carb2= myStrstrTrue($carb1, "\\\" class");
			$carb = substr($carb2, 30);
			$nutrition_array[$i][6] = $carb;
			
			
			$fiber1 = strstr($nutrition_file, "data-val-dietaryfiber=\\");
			$fiber2= myStrstrTrue($fiber1, "\\\" class");
			$fiber = substr($fiber2, 24);
			$nutrition_array[$i][7] = $fiber;
			
			$sodium1 = strstr($nutrition_file, "data-val-sodium=\\");
			$sodium2= myStrstrTrue($sodium1, "\\\" class");
			$sodium = substr($sodium2, 18);
			$nutrition_array[$i][8] = $sodium;
			
		}
		
		return $nutrition_array;
		
	}
	
	
	
	//Update the SQL table with the current food information
	function update_SQL_table($food_array, $image_array, $nutrition_array){
		
		$con = mysql_connect("localhost","cudining_root","Gallonofphp1!");
		
		if (!$con)
			die('Could not connect: ' . mysql_error());

		mysql_select_db("cudining_cudv", $con);
		//$food_id_list= "UPDATE nutrition SET CURRENT = 1 WHERE FOOD_ID IN (";
		
		ini_set('mysql.connect_timeout', 500); 

		


	//	$default_nutrition_update = "UPDATE nutrition SET Url = \"\", ServingSize = \"\", Calories = 0, TotalFat = 0, Carbohydrate = 0, Fiber = 0, Sodium = 0, SaturatedFat = 0, Cholesterol = 0, Protein = 0";
	//	print_r($default_nutrition_update . "\n");
	//	mysql_query($default_nutrition_update); //Set no foods to current
			
		for($i = 0;$i<sizeof($food_array);$i++){
			
			/*if(sizeof($food_array[$i][1]) == 0){//Do not update items if the dining hall is closed
				print_r("The dining hall has no food items.\n");
				break;
			}*/
				
			
	
			$hallname = "FER";

			
			$default_update = "UPDATE nutrition SET " . $hallname . " = 0";// WHERE " . $hallname . "= 1";
			print_r($default_update . "\n");
			mysql_query($default_update); //Set no foods to current
				
			for($j = 0;$j<sizeof($food_array[$i][1]);$j++){
				$food_id =  $food_array[$i][1][$j];
				
				//print_r("food_array[" . $i . "][1][" . $j . "]:" . $food_id . "\n");
				//print_r(sizeof($food_array[$i][1]));
				$image = $image_array[$i][$j];
				//print_r("sizeof" + sizeof($food_array)-1);
				//print_r("sizeof[]" + sizeof($food_array[$i][1])-1);
				$updateHall = "UPDATE nutrition SET " . $hallname . " = 1, Url = \"" . $image . "\", ServingSize = \"" . $nutrition_array[$i][$j][0] . "\", Calories = " . $nutrition_array[$i][$j][1] . 
				", TotalFat = " . $nutrition_array[$i][$j][2] . ", SaturatedFat = " . $nutrition_array[$i][$j][3] . ", Cholesterol = " . $nutrition_array[$i][$j][4] . ", Protein = " .
				$nutrition_array[$i][$j][5] . ", Carbohydrate = " . $nutrition_array[$i][$j][6] . ", Fiber = " . $nutrition_array[$i][$j][7] . ", Sodium = " . $nutrition_array[$i][$j][8] . ", V = "
				. $food_array[$i][2][$j] . ", VN = " . $food_array[$i][3][$j] . ", GF = " . $food_array[$i][4][$j] . ", L = " . $food_array[$i][5][$j] . " WHERE FOOD_ID = " . $food_id;
				print_r($updateHall . "\n");	
				mysql_query($updateHall);
				print_r("ERROR:" . mysql_error() . "\n");
				//if($i!=(sizeof($food_array)-1)||$j!=(sizeof($food_array[$i][1])-1)) //If the food item is not the last, add a comma
				//	$food_id .= ",";
			
				//$food_id_list .= $food_id;
			}
		}
		

		//$food_id_list .= ")";
		//print_r("SQL Statement:" . $food_id_list);
		//mysql_query($food_id_list); //Set the foods on the dining website to current

	}
	
	ignore_user_abort(true);
	set_time_limit (0);
	
	$original_file = file_get_contents("http://www.dining.columbia.edu/menus");
	
	$food_arrays = array();
	
	array_push($food_arrays, populate_food_array($original_file));

	$image_arrays = array();
	
	array_push($image_arrays, populate_img_array($original_file));
	
	$nutrition_arrays = array();
	
	array_push($nutrition_arrays, parse_nutrition($food_arrays[0]));

	
	print_r("PRINTING FOOD ARRAYS\n\n");
	print_r($food_arrays);
	print_r($image_arrays);
	print_r($nutrition_arrays);
	

	update_SQL_table($food_arrays, $image_arrays, $nutrition_arrays);


		?>

	
	</script>
</head>

</html>