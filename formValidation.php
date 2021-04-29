<?php
//define value variables and set to empty values
$username = $password = $repeatPassword =  "";
$firstname = $lastname = $address1 = $address2 = $city = "";
$state = $zip = $phone = $email = "";
$gender = $marriageStatus = "";
$single = $DOB = "";

// define Error variables and set to empty values
$usernameErr = $passwordErr = $passLengthErr = "";
$passVerificationErr = $passVerLengthErr = $firstnameErr = $lastnameErr = $address1Err = "";
$address2Err = $cityErr = $zipErr = $stateErr = $phoneLengthErr = $phoneErr = "";
$emailVerErr = $genderErr = $marriageStatusErr = $DOBErr = $submitErr ="";

$isValid = false;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$isValid = true;

		$username = clean_input($_POST["username"]);
		if (empty($username)) {
			$usernameErr = "Username is required!";
			$isValid = false;
		} elseif (check_length($username,  6, 50)){
		        $usernameErr = "The username must be between 6 and 50 characters!";
		        $isValid = false;
		}

 		$password = clean_input($_POST["password"]);
         if (empty($password)) {
             $passwordErr = "Password is required!";
             $isValid = false;
         } elseif (check_length($password, 8, 50)){
             $passLengthErr = "Password must be between 8 and 50 characters.";
             $isValid = false;
         }elseif (!preg_match("/^(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,50}$/", $password)) {
                 $passwordErr = "Your password must have 1 capital, 1 lowercase, 1 digit, and 1 special character.";
                 $isValid = false;
         }

         $repeatPassword = clean_input($_POST["repeatPassword"]);
         if (empty($repeatPassword)) {
             $passVerificationErr = "Password verification is required!";
             $isValid = false;
         } elseif (check_length($repeatPassword, 8, 50)){
             $passVerLengthErr = "Password must be between 8 and 50 characters.";
             $isValid = false;
         } elseif ($repeatPassword != $password){
                 $passVerificationErr = "Passwords do not match!";
                 $isValid = false;
         }

         $firstname = clean_input($_POST["firstname"]);
         if (empty($firstname)) {
             $firstnameErr = "First name is required!";
             $isValid = false;
         } elseif (check_length($firstname, -1, 50)) {
              $firstnameErr = "Max 50 characters!";
              $isValid = false;
         }

         $lastname = clean_input($_POST["lastname"]);
         if (empty($lastname)) {
             $lastnameErr = "Last name is required!";
             $isValid = false;
         } elseif (check_length($lastname, -1, 50)) {
              $lastnameErr = "Max 50 characters!";
              $isValid = false;
         }

         $address1 = clean_input($_POST["address1"]);
         if (empty($address1)) {
             $address1Err = "Address is required!";
             $isValid = false;
         } elseif (check_length($address1, -1, 100)) {
              $address1Err = "Max 100 characters!";
              $isValid = false;
         }

         $address2 = clean_input($_POST["address2"]);
         if (check_length($address2, -1, 100)) {
              $address2Err = "Max 100 characters!";
              $isValid = false;
         }

         $city = clean_input($_POST["city"]);
        if (empty($city)) {
            $cityErr = "City is required!";
            $isValid = false;
        } elseif (check_length($city, -1, 50)) {
            $cityErr = "Max 50 characters!";
            $isValid = false;
        }

         if (isset($_POST["state"])) {
             $state = clean_input($_POST["state"]);
             if (check_length($address2, -1, 52)) {
                 $stateErr = "Max 52 characters!";
                 $isValid = false;
             }
         } else {
             $stateErr = "State is required!";
             $isValid = false;
         }

        $zip = clean_input($_POST["zip"]);
         if (empty($zip)) {
             $zipErr = "Zip is required!";
             $isValid = false;
         }elseif (preg_match("/^(\d{5})[-. ]*(\d{4})?$/", $zip)) {

             $zipArray = preg_split("^\s*(\d{5})[-. ]*(\d{4})?\s*$^", $zip,
                 -1,PREG_SPLIT_DELIM_CAPTURE);

             $zip = $zipArray[1];

             if ($zipArray[2]) {//check for optional second part
                 $zip = $zip . "-" . $zipArray[2];
             }
         } else {
             $zipErr = "Invalid zip code!";
             $isValid = false;
         }

         $phone = clean_input($_POST["phone"]);
         if (empty($phone)) {
             $phoneErr = "Phone is required!";
             $isValid = false;
         }elseif (!preg_match("^\s*[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})\s*^", $phone)) {
                 $phoneErr = "Invalid phone number!";
                 $isValid = false;
         } else {
             $phoneArray = preg_split("^\s*[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})\s*^",
                                        $phone,-1,PREG_SPLIT_DELIM_CAPTURE);
             $phone = $phoneArray[1] . "-" . $phoneArray[2] . "-" . $phoneArray[3];
         }

 		$email = clean_input($_POST["email"]);
 		if (empty($email)) {
 			$emailVerErr = "Email is required!";
 			$isValid = false;
 		} else {
 			// check if e-mail address is well-formed
 			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 				$emailVerErr = "Invalid email format!";
 				$isValid = false;
 			}
 		}

 		if (isset($_POST["gender"])) {
 			$gender = clean_input($_POST["gender"]);
 			if (empty($_POST["gender"])) {
 				$genderErr = "Gender is required!";
 				$isValid = false;
 			}
 		} else {
 			$genderErr = "Gender is required!";
 			$isValid = false;
 		}

 		if (isset($_POST["marriageStatus"])) {
         $marriageStatus = clean_input($_POST["marriageStatus"]);
         if (empty($_POST["marriageStatus"])) {
             $marriageStatusErr = "Marriage status is required!";
             $isValid = false;
             }
         } else {
             $marriageStatusErr = "Marriage status is required!";
             $isValid = false;
         }

         $DOB = clean_input($_POST["DOB"]);
         if (empty($DOB)) {
             $DOBErr = "Date of birth is required!";
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
