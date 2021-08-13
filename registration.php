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

            <div class="form-group" id="baseDiv">
              <label for="base">Base:</label>
              <i class="fa fa-check fa-md hide"></i>
              <select id="base" name="base" class="form-control" required
                      onblur="checkLengths(-1,52,this,'baseDiv','');">
                <option value="" <?php if ($base == ""){echo 'selected="selected"';}?> hidden="hidden" disabled="disabled">
                  --Please Select--
                </option>
                <option value="Calendar"<?php if ($base == "Calendar"){echo 'selected="selected"';}?>>Calendar</option>
                <option value="AlpehBet"<?php if ($base == "AlpehBet"){echo 'selected="selected"';}?>>AlephBet</option>
              </select>
              <span class="error"><?php echo $baseErr ?></span>
            </div>

            <div class="form-group" id="topicDiv">
              <label for="topic">Topic:</label>
              <i class="fa fa-check fa-md hide"></i>
              <select id="topic" name="topic" class="form-control" required
                      onblur="checkLengths(-1,52,this,'topicDiv','');">
                <option value="" <?php if ($topic == ""){echo 'selected="selected"';}?> hidden="hidden" disabled="disabled">
                  --Please Select--
                </option>
                <option value="Beginning of School"<?php if ($topic == "Beginning of School"){echo 'selected="selected"';}?>>Beginning of School</option>
                <option value="Yom Tov"<?php if ($topic == "Yom Tov"){echo 'selected="selected"';}?>>Yom Tov</option>
                <option value="Seasons"<?php if ($topic == "Seasons"){echo 'selected="selected"';}?>>Seasons</option>
                <option value="Parsha"<?php if ($topic == "Parsha"){echo 'selected="selected"';}?>>Parsha</option>
              </select>
              <span class="error"><?php echo $topicErr ?></span>
            </div>
            <div class="form-group" id="coreConceptDiv">
              <label for="coreConcept">Core Concept:</label>
              <i class="fa fa-check fa-md hide"></i>
              <select id="coreConcept" name="coreConcept" class="form-control" required
                      onblur="checkLengths(-1,52,this,'coreConceptDiv','');">
                <option value="" <?php if ($coreConcept == ""){echo 'selected="selected"';}?> hidden="hidden" disabled="disabled">
                  --Please Select--
                </option>
                <option value="Blowing Shofar"<?php if ($coreConcept == "Blowing Shofar"){echo 'selected="selected"';}?>>Blowing Shofar</option>
                <option value="Hashem Is King"<?php if ($coreConcept == "Hashem Is King"){echo 'selected="selected"';}?>>Hashem is King</option>
              </select>
              <span class="error"><?php echo $coreConceptErr ?></span>
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

