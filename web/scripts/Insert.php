<html>

<head>

	<title>Dining Data</title>

	<script>

	<?php

	







		

			



		









 

  //DEBUGGING

 

  //$matches[0] now contains the complete A tags; ex: <a href="link">text</a>

  //$matches[1] now contains only the HREFs in the A tags; ex: link

 

  header("Content-type: text/plain"); //Set the content type to plain text so the 
print below is easy to read!

	  

	//Crawl the webpage the gather the current food images.

	//Returns an array of food image links. 

	function populate_img_array($site){

		

		$original_file = file_get_contents($site);

		$stripped_file = strip_tags($original_file, "<span><img>");

		preg_match_all("/<img [^>]*src=\"?([^ \">]+)\"?/i", 
$stripped_file, $images);

	//	print_r($images);

		

		$image_array = array();

		//$image_array_index = 0;

		

		for($i = 0;$i < sizeof($images); $i+=2){

			for($j = 4;$j< sizeof($images[$i])-4; $j++){

			

				

				$img = substr($images[$i][$j], 10, -1);

				if(substr($img, 0, 
75)!=="http://dining.columbia.edu/files/dining/imagecache/food_thumb/meals-images/"){

					print_r("check:" . substr($img, 0, 75) . 
"\n");

				}

				else{

					print_r("pushing:" . $img . "\n");

					array_push($image_array, $img);

				}

				

			}

		}

		

		return $image_array;

		

	}

  

	//Crawl the webpage the gather the current foods.

	//Returns an array of food information. Each food information elements 
contains the name of the food and its id.

    function populate_food_array($site){

	

		$original_file = file_get_contents($site);

		$stripped_file = strip_tags($original_file, "<span><img>");

		
preg_match_all("/<span(?:[^>]*)\"([^\"]*)\"(?:[^>]*)>(?:[^<]*)<\/span>/is", 
$stripped_file, $matches);

		//print_r($stripped_file);

		//print_r($original_file);

		//print_r($matches);	

		

		

		$food_array = array();

		$food_array[0] = array();

		$food_array[1] = array();

		$food_info_index = 0;

	

	

		for($i = 0;$i < sizeof($matches[0]);$i++){



			if(substr($matches[0][$i],0,84)=="<span 
class=\"field-content\"><span class=\"meal-title-calculator\" 
onclick=\"refreshMenu"){

				$sub1 = substr($matches[0][$i],85,-7);

				$index = strpos($sub1, ')' );

				$food_id = substr($sub1, 0, $index);

				$food_name = substr($sub1, $index+3);

				$food_array[0][$food_info_index] = $food_name;

				$food_array[1][$food_info_index] = $food_id;

				$food_info_index++;

	

			}	

		}

	



	return($food_array);

	}

	

	function update_images($food_array, $image_array){

		

		for($hall = 0;$hall<sizeof($food_array);$hall++){

			for($item = 
0;$item<sizeof($food_array[$hall][0]);$item++){

				$food_id = $food_array[$hall][1][$item];

				$img = "\"" . $image_array[$hall][$item] . "\"";

				$update = "UPDATE nutrition SET Url = " . $img . " 
WHERE FOOD_ID = " . $food_id;

				print_r($update . "\n");

				$rt=mysql_query($update);

				print_r(mysql_error() . "\n");

				if($rt){echo " Command is successful \n";}

				else

				{echo " Command is not successful \n";}

			}

		}

	}

	

	

	

	//Insert the food ID's and food names into the SQL table

	function insert_SQL_table($food_array, $image_array){

		

		



		

		for($hall = 0;$hall<sizeof($food_array);$hall++){



			for($item = 
0;$item<sizeof($food_array[$hall][0]);$item++){

				

				$food_name = "\"" . $food_array[$hall][0][$item] . 
"\"";

				$food_id = $food_array[$hall][1][$item];

				$img = "\"" . $image_array[$hall][$item] . "\"";

				$values = $food_name . ", " . $food_id . ", " . 
$img;

				$insert = "INSERT IGNORE INTO nutrition (Dish, 
FOOD_ID, Url) VALUES (" . $values . ")";

				print_r($insert . "\n");

				

				

				

				

				$insertColumn = "CALL InsertColumn(" . $food_id . 
")"; //Add a column into the userprefs table for each new food item

				//print_r($insertColumn . "\n");

				

					

				$rt=mysql_query($insert);

				print_r(mysql_error() . "\n");

				if($rt){echo " Command is successful \n";}

				else

				{echo " Command is not successful \n";}

				

				//$rt=mysql_query($insertColumn);

				//print_r(mysql_error() . "\n");



				//if($rt){echo " Command is successful \n";}

				//else

				//{echo " Command is not successful \n";}



			}	

		}

	}

	

	

	/*function create_Column_Procedure(){

		

		$procQuery = "CREATE PROCEDURE insertColumn(foodID INT) ";

		$procQuery .= "BEGIN ";

		$procQuery .= "IF NOT EXISTS (SELECT foodID FROM userprefs) ";

		$procQuery .= "THEN ALTER TABLE userprefs ADD foodID; ";

		$procQuery .= "END IF; END;";

		print_r($procQuery . "\n");

		

		$rt = mysql_query($procQuery);

		print_r(mysql_error() . "\n");

		if($rt){echo " Command is successful \n";}

		else

		{echo " Command is not successful \n";}

		

	}*/

	

	$food_arrays = array();

	

	array_push($food_arrays, 
populate_food_array("http://www.dining.columbia.edu/menus"));

	array_push($food_arrays, 
populate_food_array("http://www.dining.columbia.edu/menus/66"));

	array_push($food_arrays, 
populate_food_array("http://www.dining.columbia.edu/menus/67"));

	

	$image_arrays = array();

	

	array_push($image_arrays, 
populate_img_array("http://www.dining.columbia.edu/menus"));

	array_push($image_arrays, 
populate_img_array("http://www.dining.columbia.edu/menus/66"));

	array_push($image_arrays, 
populate_img_array("http://www.dining.columbia.edu/menus/67"));

	

	print_r($food_arrays);

	print_r($image_arrays);

	

	$con = 
mysql_connect("localhost","cudining_root","Gallonofphp1!");	

	if (!$con)

		die('Could not connect: ' . mysql_error());



	mysql_select_db("CUDining", $con);

		

	

	//create_Column_Procedure();

	//insert_SQL_table($food_arrays, $image_arrays);

	update_images($food_arrays, $image_arrays);

	

	mysql_close($con);





		?>



	

	</script>

</head>



</html>
