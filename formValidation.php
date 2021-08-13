<?php
//define value variables and set to empty values
$base = $topic = $coreConcept =  "";

// define Error variables and set to empty values
$baseErr = $topicErr = $coreConceptErr = "";

$isValid = false;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$isValid = true;

		$base = clean_input($_POST["base"]);
		if (empty($base)) {
			$baseErr = "Base is required!";
			$isValid = false;
		} elseif (check_length($base,  6, 50)){
		        $baseErr = "The base must be between 6 and 50 characters!";
		        $isValid = false;
		}
        $topic = clean_input($_POST["topic"]);
        if (empty($topic)) {
            $topicErr = "Topic is required!";
            $isValid = false;
        } elseif (check_length($topic,  6, 50)) {
            $topicErr = "The topic must be between 6 and 50 characters!";
            $isValid = false;
        }

        $coreConcept = clean_input($_POST["coreConcept"]);
        if (empty($coreConcept)) {
            $coreConceptErr = "Core Concept is required!";
            $isValid = false;
        } elseif (check_length($coreConcept,  6, 50)) {
            $coreConceptErr = "The Core Concept must be between 6 and 50 characters!";
            $isValid = false;
        }
	}

	function check_length($data, $min, $max){
	    $length = strlen($data);
	    return ($length > $max || $length < $min);
	    }

	function clean_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
