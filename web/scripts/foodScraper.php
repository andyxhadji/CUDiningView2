<?php

	function mergeArrays($idarr, $imgarr, $typearr){
		$newarr=Array();
		$valid=false;
		for($i=0; $i<sizeof($typearr); $i++)
			$idarr[$i]['typearr']=$typearr[$i];
		foreach($idarr as $idobj){
			$valid=false;
			foreach($imgarr as $imgobj){
				if($idobj['id']==$imgobj['id']){
					$newarr[$idobj['id']]['img']=$imgobj['img'];
					$newarr[$idobj['id']]['id']=$idobj['id'];
					$newarr[$idobj['id']]['typearr']=$idobj['typearr'];
					$valid=true;
				}
			}
			if(!$valid){
				$newarr[$idobj['id']]['img']='http://cudiningview.com/images/no-available-image.png';
				$newarr[$idobj['id']]['id']=$idobj['id'];
				$newarr[$idobj['id']]['typearr']=$idobj['typearr'];
			}

		}
		return $newarr;
	}
	function appendNutrition($food){
		$json=file_get_contents('http://dining.columbia.edu/ajax/node/load/' . $food['id']);
		$html=new simple_html_dom();
		$html->load(json_decode($json)->meal);
		//print_r(json_decode($json)->meal);
		$temphtml=$html->find('td[class=meal-item-servingsize]');
		$food['servingsize']=$temphtml[0]->innertext;
		$temphtml=$html->find('*[data-val-calories]');
		$food['calories']=$temphtml[0]->innertext;
		$temphtml=$html->find('*[data-val-totalfat]');
		$food['totalFat']=$temphtml[0]->innertext;
		$temphtml=$html->find('*[data-val-cholesterol]');
		$food['cholesterol']=$temphtml[0]->innertext;
		$temphtml=$html->find('*[data-val-saturatedfat]');
		$food['saturatedFat']=$temphtml[0]->innertext;
		$temphtml=$html->find('*[data-val-protein]');
		$food['protein']=$temphtml[0]->innertext;
		$temphtml=$html->find('*[data-val-totalcarbohydrates]');
		$food['carbohydrate']=$temphtml[0]->innertext;
		$temphtml=$html->find('*[data-val-dietaryfiber]');
		$food['fiber']=$temphtml[0]->innertext;
		$temphtml=$html->find('*[data-val-sodium]');
		$food['sodium']=$temphtml[0]->innertext;
		$temphtml=$html->find('div[class=meal-title]');
		$food['name']=str_replace("'", "", $temphtml[0]->innertext);
		return $food;
	}

	include('simple_html_dom.php');
	$ferhtml=new simple_html_dom();
	$ferhtml->load_file('http://www.dining.columbia.edu/menus');
	$jjshtml=new simple_html_dom();
	$jjshtml->load_file('http://www.dining.columbia.edu/menus/66');
	$jonhtml=new simple_html_dom();
	$jonhtml->load_file('http://www.dining.columbia.edu/menus/67');


	//fer
	$ferarr=Array();
	$i=0;
	foreach($ferhtml->find('div[class=views-field-title] span span') as $span){
		$ferarr[$i++]['id']=str_replace(')', '', substr($span->onclick,12));
	}
	$ferimgarr=Array();
	$i=0;
	foreach($ferhtml->find('div[class=field-content]') as $img){
		$temphtml=$img->find('a');
		$ferimgarr[$i]['id']=substr($temphtml[0]->rel,8);
		$temphtml=$img->find('img');
		$ferimgarr[$i++]['img']=$temphtml[0]->src;
	}
	$fertypearr=Array();
	$i=0;
	foreach($ferhtml->find('div[class=views-field-tid] span') as $item){
		$fertypearr[$i]=Array();
		$fertypearr[$i]['v']=0;
		$fertypearr[$i]['vn']=0;
		$fertypearr[$i]['gf']=0;
		$fertypearr[$i]['l']=0;
		foreach($item->find('div') as $type){
			if($type->plaintext=="Vegetarian")
				$fertypearr[$i]['v']=1;
			elseif($type->plaintext=="Vegan")
				$fertypearr[$i]['vn']=1;
			elseif($type->plaintext=="Gluten Free")
				$fertypearr[$i]['gf']=1;
			elseif($type->plaintext=="Local")
				$fertypearr[$i]['l']=1;
		}
		$i++;
	}
	$ferarr=mergeArrays($ferarr, $ferimgarr, $fertypearr);
	foreach($ferarr as &$food){
		$food=appendNutrition($food);
	}

	//jjs
	$jjsarr=Array();
	$i=0;
	foreach($jjshtml->find('div[class=views-field-title] span span') as $span){
		$jjsarr[$i++]['id']=str_replace(')', '', substr($span->onclick,12));
	}
	$jjsimgarr=Array();
	$i=0;
	foreach($jjshtml->find('div[class=field-content]') as $img){
		$temphtml=$img->find('a');
		$jjsimgarr[$i]['id']=substr($temphtml[0]->rel,8);
		$temphtml=$img->find('img');
		$jjsimgarr[$i++]['img']=$temphtml[0]->src;
	}
	$jjstypearr=Array();
	$i=0;
	foreach($jjshtml->find('div[class=views-field-tid] span') as $item){
		$jjstypearr[$i]=Array();
		$jjstypearr[$i]['v']=0;
		$jjstypearr[$i]['vn']=0;
		$jjstypearr[$i]['gf']=0;
		$jjstypearr[$i]['l']=0;
		foreach($item->find('div') as $type){
			if($type->plaintext=="Vegetarian")
				$jjstypearr[$i]['v']=1;
			elseif($type->plaintext=="Vegan")
				$jjstypearr[$i]['vn']=1;
			elseif($type->plaintext=="Gluten Free")
				$jjstypearr[$i]['gf']=1;
			elseif($type->plaintext=="Local")
				$jjstypearr[$i]['l']=1;
		}
		$i++;
	}
	$jjsarr=mergeArrays($jjsarr, $jjsimgarr, $jjstypearr);
	foreach($jjsarr as &$food){
		$food=appendNutrition($food);
	}


	//jon
	$jonarr=Array();
	$i=0;
	foreach($jonhtml->find('div[class=views-field-title] span span') as $span){
		$jonarr[$i++]['id']=str_replace(')', '', substr($span->onclick,12));
	}
	$jonimgarr=Array();
	$i=0;
	foreach($jonhtml->find('div[class=field-content]') as $img){
		$temphtml=$img->find('a');
		$jonimgarr[$i]['id']=substr($temphtml[0]->rel,8);
		$temphtml=$img->find('img');
		$jonimgarr[$i++]['img']=$temphtml[0]->src;
	}
	$jontypearr=Array();
	$i=0;
	foreach($jonhtml->find('div[class=views-field-tid] span') as $item){
		$jontypearr[$i]=Array();
		$jontypearr[$i]['v']=0;
		$jontypearr[$i]['vn']=0;
		$jontypearr[$i]['gf']=0;
		$jontypearr[$i]['l']=0;
		foreach($item->find('div') as $type){
			if($type->plaintext=="Vegetarian")
				$jontypearr[$i]['v']=1;
			elseif($type->plaintext=="Vegan")
				$jontypearr[$i]['vn']=1;
			elseif($type->plaintext=="Gluten Free")
				$jontypearr[$i]['gf']=1;
			elseif($type->plaintext=="Local")
				$jontypearr[$i]['l']=1;
		}
		$i++;
	}
	$jonarr=mergeArrays($jonarr, $jonimgarr, $jontypearr);
	foreach($jonarr as &$food){
		$food=appendNutrition($food);
	}


	//print_r($ferarr);
	print_r(sizeof($jonarr));
	//print_r($jjsarr);

    $con = mysqli_connect("localhost","cudining_root","Gallonofphp1!");
    if (!$con)
            die('Could not connect: ' . mysql_error());
    mysqli_select_db($con,"cudining_cudv");
    ini_set('mysql.connect_timeout', 500);

    $query="SELECT FOOD_ID FROM nutrition;";
    $foodIds=mysqli_query($con, $query);

    $query="UPDATE nutrition SET CURRENT=0,JAY=0,JJP=0,FER=0;";
    mysqli_query($con, $query);
    
    $foodIdsArr=Array();
    $i=0;
    while($row = mysqli_fetch_assoc($foodIds)){
    	$foodIdsArr[$i++]=$row;
    }
    $foodIds=$foodIdsArr;
    //print_r($foodIds);

    $matched=false;
    foreach($ferarr as $food){
    	$matched=false;
    	foreach($foodIds as $foodId){
    		if($food['id']==$foodId['FOOD_ID']){
    			$query="UPDATE nutrition SET CURRENT=1,Dish='".$food['name']."',JAY=0,JJP=0,FER=1,ServingSize='".$food['servingsize'].
	    			"',Calories=".$food['calories'].",TotalFat=".$food['totalFat'].",Cholesterol=".$food['cholesterol'].",SaturatedFat=".$food['saturatedFat'].
	    			",Protein=".$food['protein'].",Carbohydrate=".$food['carbohydrate'].",Fiber=".$food['fiber'].",Sodium=".$food['sodium'].",Url='".
	    			$food['img']."',V=".$food['typearr']['v'].",VN=".$food['typearr']['vn'].",GF=".$food['typearr']['gf'].
	    			",L=".$food['typearr']['l']." WHERE FOOD_ID=".$food['id'].";";
	    		//print_r("UPDATE");
	    		//print_r($query);
    			$matched=true;
    		}
    	}
    	if(!$matched){
    		$query="INSERT INTO nutrition (FOOD_ID, CURRENT, Dish, JAY, JJP, FER, ServingSize,
    			Calories, TotalFat, Cholesterol, SaturatedFat, Protein, Carbohydrate, Fiber, Sodium,
    			Url, V, VN, GF, L) VALUES (".$food['id'].",1,'".$food['name']."',0,0,1,'".$food['servingsize'].
    			"',".$food['calories'].",".$food['totalFat'].",".$food['cholesterol'].",".$food['saturatedFat'].
    			",".$food['protein'].",".$food['carbohydrate'].",".$food['fiber'].",".$food['sodium'].",'".
    			$food['img']."',".$food['typearr']['v'].",".$food['typearr']['vn'].",".$food['typearr']['gf'].
    			",".$food['typearr']['l'].");";
			//print_r("INSERT");
		}
		print_r($query);
		mysqli_query($con, $query);
    }

    foreach($jjsarr as $food){
    	$matched=false;
    	foreach($foodIds as $foodId){
    		//print_r("food'id'=" . $food['id'] . ", foodId=".$foodId);
    		//echo PHP_EOL;
    		if($food['id']==$foodId['FOOD_ID']){
    			$query="UPDATE nutrition SET CURRENT=1,Dish='".$food['name']."',JAY=0,JJP=1,FER=0,ServingSize='".$food['servingsize'].
	    			"',Calories=".$food['calories'].",TotalFat=".$food['totalFat'].",Cholesterol=".$food['cholesterol'].",SaturatedFat=".$food['saturatedFat'].
	    			",Protein=".$food['protein'].",Carbohydrate=".$food['carbohydrate'].",Fiber=".$food['fiber'].",Sodium=".$food['sodium'].",Url='".
	    			$food['img']."',V=".$food['typearr']['v'].",VN=".$food['typearr']['vn'].",GF=".$food['typearr']['gf'].
	    			",L=".$food['typearr']['l']." WHERE FOOD_ID=".$food['id'].";";
    			$matched=true;
    		}
    	}
    	if(!$matched)
    		$query="INSERT INTO nutrition (FOOD_ID, CURRENT, Dish, JAY, JJP, FER, ServingSize,
    			Calories, TotalFat, Cholesterol, SaturatedFat, Protein, Carbohydrate, Fiber, Sodium,
    			Url, V, VN, GF, L) VALUES (".$food['id'].",1,'".$food['name']."',0,1,0,'".$food['servingsize'].
    			"',".$food['calories'].",".$food['totalFat'].",".$food['cholesterol'].",".$food['saturatedFat'].
    			",".$food['protein'].",".$food['carbohydrate'].",".$food['fiber'].",".$food['sodium'].",'".
    			$food['img']."',".$food['typearr']['v'].",".$food['typearr']['vn'].",".$food['typearr']['gf'].
    			",".$food['typearr']['l'].");";
		//print_r($query);
		mysqli_query($con, $query);
    }

    foreach($jonarr as $food){
    	$matched=false;
    	foreach($foodIds as $foodId){
    		if($food['id']==$foodId['FOOD_ID']){
    			$query="UPDATE nutrition SET CURRENT=1,Dish='".$food['name']."',JAY=1,JJP=0,FER=0,ServingSize='".$food['servingsize'].
	    			"',Calories=".$food['calories'].",TotalFat=".$food['totalFat'].",Cholesterol=".$food['cholesterol'].",SaturatedFat=".$food['saturatedFat'].
	    			",Protein=".$food['protein'].",Carbohydrate=".$food['carbohydrate'].",Fiber=".$food['fiber'].",Sodium=".$food['sodium'].",Url='".
	    			$food['img']."',V=".$food['typearr']['v'].",VN=".$food['typearr']['vn'].",GF=".$food['typearr']['gf'].
	    			",L=".$food['typearr']['l']." WHERE FOOD_ID=".$food['id'].";";
    			$matched=true;
    		}
    	}
    	if(!$matched)
    		$query="INSERT INTO nutrition (FOOD_ID, CURRENT, Dish, JAY, JJP, FER, ServingSize,
    			Calories, TotalFat, Cholesterol, SaturatedFat, Protein, Carbohydrate, Fiber, Sodium,
    			Url, V, VN, GF, L) VALUES (".$food['id'].",1,'".$food['name']."',1,0,0,'".$food['servingsize'].
    			"',".$food['calories'].",".$food['totalFat'].",".$food['cholesterol'].",".$food['saturatedFat'].
    			",".$food['protein'].",".$food['carbohydrate'].",".$food['fiber'].",".$food['sodium'].",'".
    			$food['img']."',".$food['typearr']['v'].",".$food['typearr']['vn'].",".$food['typearr']['gf'].
    			",".$food['typearr']['l'].");";;
		mysqli_query($con, $query);
    }

?>
