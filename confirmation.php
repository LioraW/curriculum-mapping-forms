<!DOCTYPE html>
<!--Confirmation Page-->
<?php include 'connectionInfo.php'; ?>

<html lang="en">
<head>
  <title>Confirmation Page</title>

  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
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
      <?php include 'selectUserData.php'; ?>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      <h3 class="main-content">Thank You for Registering!</h3>
      <div class="row content">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <?php
                $tabs = "&emsp;&emsp;&emsp;&emsp;";
                echo "<h4><b>Username:</b> $username</h4></br>";
                echo "<h4><b>Password:</b> $password</h4></br>";
                echo "<h4><b>First Name:</b> $firstname</h4></br>";
                echo "<h4><b>Last Name:</b> $lastname</h4></br>";
                echo "<h4><b>Address:</b> $address1</h4>";
                if ($address2) {echo "<h4>$tabs $address2</h4>";}
                echo "<h4>$tabs $city, $state</h4>";
                echo "<h4>$tabs $zip</h4>";
            ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <?php
                echo "<h4><b>Phone Number:</b> $phone</h4></br>";
                echo "<h4><b>Email:</b> $email</h4></br>";
                echo "<h4><b>Gender:</b> $gender</h4></br>";
                echo "<h4><b>Marriage Status:</b> $marriageStatus</h4></br>";
                echo "<h4><b>Date of Birth:</b> $DOB</h4></br>";
            ?>
        </div>
      </div>
    </div>
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
</html>
