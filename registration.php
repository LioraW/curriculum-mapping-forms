<!DOCTYPE html>
<!--Registration Page-->
<?php include 'connectionInfo.php'; ?>

<html lang="en">
<head>
  <title>All About Me - Registration</title>

  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="./js/formValidation.js"></script>

</head>
<body>

<?php include 'formValidation.php'; ?>

<div class="header">
  <img src="./img/slightly-smiling-face.png"
       alt="smile"
       id="logo"/>
  <h1> All About Me</h1>
</div>

<div class="container-fluid">
  <div class="row content">
    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 sidenav text-center">
      <p><a href="index.html">Home</a></p>
      <p><a href="registration.php">Registration</a></p>
      <p><a href="animations.html">Animations</a></p>
    </div>

    <form method="post" novalidate onsubmit="return checkForSuccess();"
          action="<?php include 'insertValidData.php'; echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="row content">
          <h3 class="main-content">Registration:</h3>
          <div class="col-xs-12 col-sm-12 col-md-6">

            <div class="form-group" id="usernameDiv">
              <label for="username">Username:</label>
              <i class="fa fa-check fa-md hide"></i>
              <input id="username" name="username" class="form-control"
                     type="text" required
                     onblur="checkLengths(6,50,this,'usernameDiv', 'usernameError');"
                      value="<?php echo $username;?>"/>
              <span id="usernameError" class="help-block hide">
                The username must be between 6 and 50 characters!
              </span>
              <span class="error"><?php echo $usernameErr; ?></span>
            </div>

            <div class="form-group" id="passwordDiv">
              <label for="password">Password:</label>
              <i class="fa fa-check fa-md hide"></i>
              <input id="password" name="password" class="form-control"
                     type="password" required
                     onblur="checkLengths(8,50,this,'passwordDiv','passLengthErr');
                              checkPassword();
                              matchPasswords();"
                     value="<?php echo $password; ?>">
              <span id="passwordError" class="help-block hide">
                Your password must have 1 capital, 1 lowercase, 1 digit, and 1 special character.
              </span>
              <span id="passLengthErr" class="help-block hide">
                Password must be between 8 and 50 characters.
              </span>
              <span class="error"><?php echo $passwordErr; ?></span>
              <span class="error"><?php echo $passLengthErr; ?></span>
            </div>

            <div class="form-group" id="repeatPasswordDiv">
              <label for="repeatPassword">Repeat Password:</label>
              <i class="fa fa-check fa-md hide"></i>
              <input id="repeatPassword" name="repeatPassword" class="form-control"
                     type="password" required
                     onblur="checkLengths(8,50,this,'repeatPasswordDiv','passVerLengthErr');
                             matchPasswords();"
                      value="<?php echo $repeatPassword; ?>">
              <span id="passVerificationError" class="help-block hide">
                Your passwords do not match!
              </span>
              <span id="passVerLengthErr" class="help-block hide">
                Password must be between 8 and 50 characters.
              </span>
              <span class="error"><?php echo $passVerificationErr; ?></span>
              <span class="error"><?php echo $passVerLengthErr; ?></span>
            </div>

            <div class="form-group" id="firstNameDiv">
              <label for="firstname">First Name:</label>
              <i class="fa fa-check fa-md hide"></i>
              <input id="firstname" name="firstname" class="form-control"
                     type="text" required
                     onblur="checkLengths(-1,50,this,'firstNameDiv','firstNameErr');"
                    value="<?php echo $firstname; ?>">
              <span id="firstNameErr" class="help-block hide">Max 50 characters!</span>
              <span class="error"><?php echo $firstnameErr; ?></span>
            </div>

            <div class="form-group" id="lastNameDiv">
              <label for="lastname">Last Name:</label>
              <i class="fa fa-check fa-md hide"></i>
              <input id="lastname" name="lastname" class="form-control"
                     type="text" required
                     onblur="checkLengths(-1,50,this,'lastNameDiv','lastNameErr');"
                      value="<?php echo $lastname; ?>">
              <span id="lastNameErr" class="help-block hide">Max 50 characters!</span>
              <span class="error"><?php echo $lastnameErr; ?></span>
            </div>

            <div class="form-group" id="address1Div">
              <label for="address1">Address Line 1:</label>
              <i class="fa fa-check fa-md hide"></i>
              <input id="address1" name="address1" class="form-control"
                     type="text" required
                     onblur="checkLengths(-1,100,this,'address1Div','address1Err');"
              value="<?php echo $address1; ?>">
              <span id="address1Err" class="help-block hide">Max 100 characters!</span>
              <span class="error"><?php echo $address1Err; ?></span>
            </div>

            <div class="form-group" id="address2Div">
              <label for="address2">Address Line 2:</label>
              <i class="fa fa-check fa-md hide"></i>
              <input id="address2" name="address2" class="form-control"
                     type="text"
                     onblur="checkLengths(-1,100,this,'address2Div','address2Err');"
              value="<?php echo $address2; ?>">
              <span id="address2Err" class="help-block hide">Max 100 characters!</span>
              <span class="error"><?php echo $address2Err; ?></span>
            </div>

            <div class="form-group" id="cityDiv">
              <label for="city">City:</label>
              <i class="fa fa-check fa-md hide"></i>
              <input id="city" name="city" class="form-control"
                     type="text" required
                     onblur="checkLengths(-1,50,this,'cityDiv','cityErr');"
                      value="<?php echo $city; ?>">
              <span id="cityErr" class="help-block hide">Max 50 characters!</span>
              <span class="error"><?php echo $cityErr; ?></span>
            </div>

          </div>

          <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group" id="stateDiv">
              <label for="state">State:</label>
              <i class="fa fa-check fa-md hide"></i>
              <select id="state" name="state" class="form-control" required
                      onblur="checkLengths(-1,52,this,'stateDiv','');">
                <option value="" <?php if ($state == ""){echo 'selected="selected"';}?> hidden="hidden" disabled="disabled">
                  --Please Select--
                </option>
                <option value="AL"<?php if ($state == "AL"){echo 'selected="selected"';}?>>Alabama</option>
                <option value="AK"<?php if ($state == "AK"){echo 'selected="selected"';}?>>Alaska</option>
                <option value="AZ"<?php if ($state == "AZ"){echo 'selected="selected"';}?>>Arizona</option>
                <option value="AR"<?php if ($state == "AR"){echo 'selected="selected"';}?>>Arkansas</option>
                <option value="CA"<?php if ($state == "CA"){echo 'selected="selected"';}?>>California</option>
                <option value="CO"<?php if ($state == "CO"){echo 'selected="selected"';}?>>Colorado</option>
                <option value="CT"<?php if ($state == "CT"){echo 'selected="selected"';}?>>Connecticut</option>
                <option value="DE"<?php if ($state == "DE"){echo 'selected="selected"';}?>>Delaware</option>
                <option value="DC"<?php if ($state == "DC"){echo 'selected="selected"';}?>>District Of Columbia</option>
                <option value="FL"<?php if ($state == "FL"){echo 'selected="selected"';}?>>Florida</option>
                <option value="GA"<?php if ($state == "GA"){echo 'selected="selected"';}?>>Georgia</option>
                <option value="HI"<?php if ($state == "HI"){echo 'selected="selected"';}?>>Hawaii</option>
                <option value="ID"<?php if ($state == "ID"){echo 'selected="selected"';}?>>Idaho</option>
                <option value="IL"<?php if ($state == "IL"){echo 'selected="selected"';}?>>Illinois</option>
                <option value="IN"<?php if ($state == "IN"){echo 'selected="selected"';}?>>Indiana</option>
                <option value="IA"<?php if ($state == "IA"){echo 'selected="selected"';}?>>Iowa</option>
                <option value="KS"<?php if ($state == "KS"){echo 'selected="selected"';}?>>Kansas</option>
                <option value="KY"<?php if ($state == "KY"){echo 'selected="selected"';}?>>Kentucky</option>
                <option value="LA"<?php if ($state == "LA"){echo 'selected="selected"';}?>>Louisiana</option>
                <option value="ME"<?php if ($state == "ME"){echo 'selected="selected"';}?>>Maine</option>
                <option value="MD"<?php if ($state == "MD"){echo 'selected="selected"';}?>>Maryland</option>
                <option value="MA"<?php if ($state == "MA"){echo 'selected="selected"';}?>>Massachusetts</option>
                <option value="MI"<?php if ($state == "MI"){echo 'selected="selected"';}?>>Michigan</option>
                <option value="MN"<?php if ($state == "MN"){echo 'selected="selected"';}?>>Minnesota</option>
                <option value="MS"<?php if ($state == "MS"){echo 'selected="selected"';}?>>Mississippi</option>
                <option value="MO"<?php if ($state == "MO"){echo 'selected="selected"';}?>>Missouri</option>
                <option value="MT"<?php if ($state == "MT"){echo 'selected="selected"';}?>>Montana</option>
                <option value="NE"<?php if ($state == "NE"){echo 'selected="selected"';}?>>Nebraska</option>
                <option value="NV"<?php if ($state == "NV"){echo 'selected="selected"';}?>>Nevada</option>
                <option value="NH"<?php if ($state == "NH"){echo 'selected="selected"';}?>>New Hampshire</option>
                <option value="NJ"<?php if ($state == "NJ"){echo 'selected="selected"';}?>>New Jersey</option>
                <option value="NM"<?php if ($state == "NM"){echo 'selected="selected"';}?>>New Mexico</option>
                <option value="NY"<?php if ($state == "NY"){echo 'selected="selected"';}?>>New York</option>
                <option value="NC"<?php if ($state == "NC"){echo 'selected="selected"';}?>>North Carolina</option>
                <option value="ND"<?php if ($state == "ND"){echo 'selected="selected"';}?>>North Dakota</option>
                <option value="OH"<?php if ($state == "OH"){echo 'selected="selected"';}?>>Ohio</option>
                <option value="OK"<?php if ($state == "OK"){echo 'selected="selected"';}?>>Oklahoma</option>
                <option value="OR"<?php if ($state == "OR"){echo 'selected="selected"';}?>>Oregon</option>
                <option value="PA"<?php if ($state == "PA"){echo 'selected="selected"';}?>>Pennsylvania</option>
                <option value="RI"<?php if ($state == "RI"){echo 'selected="selected"';}?>>Rhode Island</option>
                <option value="SC"<?php if ($state == "SC"){echo 'selected="selected"';}?>>South Carolina</option>
                <option value="SD"<?php if ($state == "SD"){echo 'selected="selected"';}?>>South Dakota</option>
                <option value="TN"<?php if ($state == "TN"){echo 'selected="selected"';}?>>Tennessee</option>
                <option value="TX"<?php if ($state == "TX"){echo 'selected="selected"';}?>>Texas</option>
                <option value="UT"<?php if ($state == "UT"){echo 'selected="selected"';}?>>Utah</option>
                <option value="VT"<?php if ($state == "VT"){echo 'selected="selected"';}?>>Vermont</option>
                <option value="VA"<?php if ($state == "VA"){echo 'selected="selected"';}?>>Virginia</option>
                <option value="WA"<?php if ($state == "WA"){echo 'selected="selected"';}?>>Washington</option>
                <option value="WV"<?php if ($state == "WV"){echo 'selected="selected"';}?>>West Virginia</option>
                <option value="WI"<?php if ($state == "WI"){echo 'selected="selected"';}?>>Wisconsin</option>
                <option value="WY"<?php if ($state == "WY"){echo 'selected="selected"';}?>>Wyoming</option>
              </select>
              <span class="error"><?php echo $stateErr ?></span>
            </div>

            <div class="form-group" id="zipDiv">
              <label for="zip">Zip Code:</label>
              <i class="fa fa-check fa-md hide"></i>
              <input id="zip" name="zip" class="form-control"
                     type="text" required placeholder="xxxxx or xxxxx-xxxx"
                     onblur="checkLengths(5,10,this,'zipDiv','zipErr');
                     adjustZip();"
                      value="<?php echo $zip; ?>">
              <span id="zipErr" class="help-block hide">Invalid zip code!</span>
              <span class="error"><?php echo $zipErr; ?></span>
            </div>

            <div class="form-group" id="phoneDiv">
              <label for="phone">Phone Number:</label>
              <i class="fa fa-check fa-md hide"></i>
              <input id="phone" name="phone" class="form-control"
                     type="text" required placeholder="xxx-xxx-xxxx"
                     onblur="checkLengths(-1,12,this,'phoneDiv','phoneLengthErr');
                              adjustPhone();"
                      value="<?php echo $phone; ?>">
              <span id="phoneLengthErr" class="help-block hide">Max 12 characters!</span>
              <span id="phoneErr" class="help-block hide">Invalid phone number!</span>
              <span class="help-block"><?php echo $phoneLengthErr; ?></span>
              <span class="error"><?php echo $phoneErr; ?></span>
            </div>

            <div class="form-group" id="emailDiv">
              <label for="email">Email:</label>
              <i class="fa fa-check fa-md hide"></i>
              <input id="email" name="email" class="form-control"
                     type="email" required placeholder="x@x.x"
                     onblur="checkEmail();"
                      value="<?php echo $email; ?>">
              <span id="emailVerError" class="help-block hide">Invalid Email!</span>
              <span class="error"><?php echo $emailVerErr; ?></span>
            </div>

            <div class="form-group" id="genderDiv">
              <label>Gender:</label>
              <i class="fa fa-check fa-md hide"></i><br>
              <input type="radio" id="female" name="gender" value="female" required maxlength="50"
                     onclick="indicateSuccess('','genderDiv');"
                  <?php if ($gender=="female"){echo "checked";}?>>
              <label for="female">Female</label><br>
              <input type="radio" id="male" name="gender" value="male" required maxlength="50"
                     onclick="indicateSuccess('','genderDiv');"
                  <?php if ($gender=="male"){echo "checked";}?>>
              <label for="male">Male</label><br>
              <span class="error"><?php echo $genderErr;?></span>

            </div>

            <div class="form-group" id="marriageStatusDiv">
              <label>Martial Status:</label>
              <i class="fa fa-check fa-md hide"></i><br>
              <input type="radio" id="married" name="marriageStatus" value="married" required maxlength="50"
                     onclick="indicateSuccess('','marriageStatusDiv');"
                  <?php if ($marriageStatus=="married"){echo "checked";}?>>
              <label for="married">Married</label><br>
              <input type="radio" id="divorced" name="marriageStatus" value="divorced" required maxlength="50"
                     onclick="indicateSuccess('','marriageStatusDiv');"
                  <?php if ($marriageStatus=="divorced"){echo "checked";}?>>
              <label for="divorced">Divorced</label><br>
              <input type="radio" id="single" name="marriageStatus" value="single" required maxlength="50"
                     onclick="indicateSuccess('','marriageStatusDiv');"
                  <?php if ($marriageStatus=="single"){echo "checked";}?>>
              <label for="single">Single</label><br>
              <span class="error"><?php echo $marriageStatusErr;?></span>
            </div>

            <div class="form-group" id="DOBDiv">
              <label for="DOB">Date of Birth:</label>
              <i class="fa fa-check fa-md hide"></i>
              <input id="DOB" name="DOB" class="form-control"
                     type="date" required
                     oninput="indicateSuccess('','DOBDiv');"
                      value="<?php echo $DOB ?>">
              <span class="error"><?php echo $DOBErr ?></span>
            </div>

            <div class="form-group">
              <input type="submit" value="Submit" id="submitBtn" >
              <input type="reset" value="Reset" onclick="resetForm();">
              <span id="submitErr" class="help-block hide">
                There is still a field that has an error. Please correct it and try again.
              </span>
            </div>

          </div>
        </div>
      </div>
    </form>
<!--      --><?php
//      include 'insertValidData.php';
//      ?>
  </div>
</div>
<div id="footer">
  <div class="container-fluid text-center">
    <div class="row footer">
      <div class="col-xs-12 col-sm-4 col-md-4">
        <p>
          <a href="https://cross-currents.com/"
             target="_blank"
             title="Go to Cross-Currents">
            Cross-Currents
          </a>
        </p>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4">
        <p>
          <a href="http://kavanot.bililite.com"
             target="_blank"
             title="Go to Kavanot">
            Kavanot
          </a>
        </p>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4">
        <p>
          <a href="https://en.wikipedia.org/wiki/Main_Page"
             target="_blank"
             title="Go to Wikipedia">
            Wikipedia
          </a>
        </p>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4">
        <p>
          <a href="https://www.amazon.com/"
             target="_blank"
             title="Go to Amazon">
            Amazon
          </a>
        </p>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4">
        <p>
          <a href="https://stackoverflow.com/"
             target="_blank"
             title="Go to Stack Overflow">
            Stack Overflow
          </a>
        </p>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4">
        <p>
          <a href="https://halachipedia.com/index.php?title=Main_Page"
             target="_blank"
             title="Go to Halachapedia">
            Halachapeidia
          </a>
        </p>
      </div>
    </div>
  </div>
</div>
</body>

