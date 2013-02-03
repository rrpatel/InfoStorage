<?php
	$objLinks = array( 	'Access to Health Services' => 'access_to_hs.txt',
				'Adolescent Health' => 'adolescent_health.txt',
				'Arthritis, Osteoporosis, and Chronic Back Conditions' => 'arthritis.txt',
				'Chronic Kidney Disease' => 'kidney_disease.txt',
				'Dementias, Including Alzheimer\'s Disease' => 'dementias.txt',
				'Diabetes' => 'diabetes.txt',
				'Early and Middle Childhood' => 'early_childhood.txt',
				'Family Planning' => 'family_planning.txt',
				'Food Safety' => 'food_safety.txt',
				'Genomics' => 'genomics.txt',
				'Health Communication and Health IT' => 'health.txt',
				'Healthcare-Associated Infections' => 'healthcare_infections.txt',
				'Medical Product Safety' => 'medical_product_safety.txt',
				'Mental Health and Mental Disorders' => 'mental_health.txt',
				'Nutrition and Weight Status' => 'nutrition.txt',
				'Oral Health' => 'oral_health.txt',
				'Physical Activity' => 'physical_activity.txt',
				'Preparedness' => 'preparedness.txt',
				'Sleep Health' => 'sleep_health.txt',
				'Substance Abuse' => 'substance_abuse.txt',
				'Tobacco Use' => 'tobacco_use.txt',
				'Vision' => 'vision.txt'
  			   );
	
	foreach($objLinks as $key => $item) {
		if($key == 'Genomics')
			$fileName = $item;
  		//echo $item.' is begin with ('.$key.')';
	}

	
	$subObjs = array();
	$filePath = $fileName;
	echo "$filePath<br>";
	$fp = fopen($filePath,'rb');
	$i  = 0;
	while ( ($line = fgets($fp)) !== false) {
  	echo "$line<br>";
	$subObjs[i] = $line;
	$i += 1;
	}

?>