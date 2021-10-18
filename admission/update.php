
<?php
session_start();
if (isset($_SESSION['username']))
{
$conn=mysqli_connect("localhost","root","","student");

$id=$_GET['id'];

$query="select * from admission where id =$id";

$run=mysqli_query($conn,$query);

$result = mysqli_fetch_assoc($run);


if (isset ($_POST['submit']))
{

  $sname=mysqli_real_escape_string($conn, $_POST['sname']);
  $class=mysqli_real_escape_string($conn, $_POST['class']);
  $gname=mysqli_real_escape_string($conn, $_POST['gname']);
  $contact=mysqli_real_escape_string($conn, $_POST['contact']);
  $gender=mysqli_real_escape_string($conn, $_POST['gender']);
  $email=mysqli_real_escape_string($conn, $_POST['email']);
  $bloodg=mysqli_real_escape_string($conn, $_POST['bloodg']);
  $address=mysqli_real_escape_string($conn, $_POST['address']);
  $division=mysqli_real_escape_string($conn, $_POST['division']);
  $shift=mysqli_real_escape_string($conn, $_POST['shift']);

  //sname,  class,  gname,  contact,  gender, email,  bloodg, address,  division, shift
  if (empty($_POST["sname"])) {
    $nameErr = "Name is required";
  } else {

    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["sname"])) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["gname"])) {
    $nameErr = "Name is required";
  } else {

    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["gname"])) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {

    // check if e-mail address is well-formed
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["class"])) {
    $genderErr = "Gender is required";
  }

  if (empty($_POST["contact"])) {
    $nameErr = "Contact number is required";
  } else {
    if (!preg_match("/[1-9]{1}[0-9]{9}/",$_POST['contact'])) {
      $nameErr = "Only numbers are allowed";
    }
  }
  //sname,  class,  gname,  contact,  gender, email,  bloodg, address,  division, shift
  $query1 =("UPDATE admission set sname='$sname', gname='$gname',class='$class', contact='$contact',gender='$gender', email='$email',
  bloodg='$bloodg', address='$address',division='$division', shift='$shift' where id='$id'");

  $run1 = mysqli_query($conn,$query1); // select query

}
}
else {
    header("location:index.php");
}
?>

<!doctype html>
<html lang="en">

<head>
  <!--============================== Required meta tags ===========================-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--============================= Fonts =======================================-->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100i,300,300i,400,700" rel="stylesheet">

  <!--============================= CSS =======================================-->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/style.css">

  <script src="js/jquery-3.2.1.slim.min.js"></script>

  <title>Student Management</title>
  <link rel="shourtcut icon" type="image/png" href="img/favicon.png">
</head>

<body>
  <!--================= Header-area ======================-->
  <div class="header-area header-absoulate">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="logo">
            <a href="">
                          <a href="index.php"> <i class="fa fa-home"></i></a>
                          <a href="index.php"><span>PHP MYSQL <span id="na">CRUD</span></span></a>
            </a>
          </div>
        </div>
        <!--================== Main menu-area ====================-->
        <div class="col-md-8">
          <div class="main-menu">
            <ul>
                  <li><a href="index.php">home</a></li>
                  <li><a href="show.php">students</a></li>
                  <li><a href="search.php">search</a></li>
                  <li><a href="contactForm.php">contact us</a></li>
                  <li><a id="logout" href="Logout.php" onclick="return confirm('Are you sure?')">Log out</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-1 text-right">
          <span class="social-icon">
              <a href="https://github.com/prakashp8486"><i class="fa fa-github fa-lg" aria-hidden="true"></i></a>
              <a href="https://stackoverflow.com/users/16834798/learner"><i class="fa fa-stack-overflow"></i></a>
          </span>
        </div>
      </div>
    </div>
  </div>
  <!--======================= Slide-area =======================-->
  <div class="welcome-area">
    <div class="owl-carousel slider-content">
      <div class="single-slider-item slider-bg-1">
        <div class="slider-inner">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="slide-text">
                  <h2>We provide quality education</h2>
                  <p>Education is what remains after one has forgotten<br>
                    what one has learned in school.

                    <br><i>Albert Einstein</i>
                  </p>

                  <a href="" class="boxed-btn">learn more <i class="fa fa-long-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="single-slider-item slider-bg-2">
        <div class="slider-inner">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="slide-text">
                  <h2>We provide intencive care</h2>
                  <p>Education is the most powerful weapon<br>
                    which you can use to change the world.

                    <br><i>Nelson Mandela</i>
                  </p>

                  <a href="" class="boxed-btn">learn more <i class="fa fa-long-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--=========================== Content-area ============================-->

  <div class="form-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title">
            <h3>Update Student Details where id=<?php echo $result['id'].', Name: '.$result["sname"]; ?></h3>
          </div>

          <div class="row">
            <div class="col-md-12">
              <form action="" method="post">
                <div class="row">
                  <div class="col-md-6">
                    <div class="left-side-form">
                      <span class="error">* All fields are required.</span>
                      <h5><label for="sname">Student name</label>
                        <span class="error"></span></h5>
                        <p><input type="text" name="sname" value="<?php print $result['sname']; ?>" required></p>

                        <h5><label for="gname">gurdian name</label><span class="error">
                        </span></h5>
                        <p><input type="text" name="gname" value="<?php print $result['gname']; ?>" required></p>

                        <h5><label for="contact">contact</label><span class="error">
                        </span></h5>
                        <p><input type="text" name="contact" value="<?php print $result['contact']; ?>" required></p>

                        <h5><label for="email">email</label><span class="error">
                        </span></h5>
                        <p><input  type="text" name="email" value="<?php print $result['email']; ?>" required></p>

                        <h5><label for="address">address</label><span class="error">
                        </span></h5>
                        <p><textarea name="address"><?php print $result['address']; ?></textarea></p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="right-side-form">
                        <h5><label for="class">class</label><span class="error">
                        </span></h5>
                        <p><input type="text" name="class" value="<?php print $result['class']; ?>" required></p>

                        <h5><label for="shift">shift</label></h5>
                        <p><select name="shift" id="" required>
                          <option value="0">select</option>
                          <option value="1">morning</option>
                          <option value="2">evening</option>
                        </select><span class="error"><?php print $result['shift']; ?>
                        </span></p>


                        <h5><label for="gender">Gender</label></h5>
                        <input type="radio" name="gender" value="male" required><span>Male</span>
                        <input type="radio" name="gender" value="female" required><span>Female</span>
                        <input type="radio" name="gender" value="others" required><span>Others</span>
                        <span class="error">
                          <?php print $result['gender']; ?>
                        </span>

                        <h5><label for="blgroup">blood group</label><span class="error">
                        </span></h5>

                        <p><input type="text" name="bloodg" value="<?php print $result['bloodg']; ?>" required></p>

                        <h5><label for="division">division</label></h5>
                        <p><select name="division" id="" required>
                          <option value="0">N/A</option>
                          <option value="1">Science</option>
                          <option value="2">Commarce</option>
                          <option value="3">Arts</option>
                        </select><span class="error"><?php print $result['division']; ?>
                        </span></p>

                        <p><input type="submit" name="submit" value="Submit" onclick="myFunction();"></p>
                        <script>
                          function myFunction() {
                              alert("Details Updated!");
                              }
                        </script>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
</div>
<!--========================== Footer-area ===============================-->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="widget">
          <div class="logo">
            <a href="">
              <i class="fa fa-home"></i>
              <span>School</span>
            </a>
            <p> Education is what remains after one has forgotten <br>
              what one has learned in school.

              <br><i>Albert Einstein</i>
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="widget">
          <h3>Navigation</h3>
          <div class="footer-menu">
            <ul>
              <li><a href="index.php">home</a></li>
              <li><a href="insert.php">admission</a></li>
              <li><a href="show.php">students</a></li>
              <li><a href="contactForm.php">contact us</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <h3>Connect Me</h3>
        <span class="social-icon">
          <a href="https://github.com/prakashp8486"><i class="fa fa-github fa-lg" aria-hidden="true"></i></a>
          <a href="https://stackoverflow.com/users/16834798/learner"><i class="fa fa-stack-overflow"></i></a>
          <a href="https://www.facebook.com/prakash.pacharne.33/"><i class="fa fa-facebook"></i> </a>
        </span>
      </div>
      <p class="copy-right">Copyright &copy 2021: Prakash Pacharne</p>
    </div>
  </div>
</footer>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="js/popper-1.12.9.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>
