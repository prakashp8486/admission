<?php
session_start();

if (!isset($_SESSION['username']))
{
    $error=''; // Variable To Store Error Message
    if (isset($_POST['submit']))
      {
        if (empty($_POST['username']) || empty($_POST['password']))
          {
            $error = "Username or Password is invalid";
          }
        else
          {
            $username=$_REQUEST['username'];
            $password=$_REQUEST['password'];
            $_SESSION['username']=$username;
            $_SESSION['password']=$password;

            $conn=mysqli_connect("localhost","root","","student");

            $username = stripslashes($username);
            $password = stripslashes($password);
            $username = mysqli_real_escape_string($conn,$username);
            $password = mysqli_real_escape_string($conn,$password);

            $query="select * from login where password='$password' AND username='$username'";

            $run = mysqli_query($conn,$query); // select query

            $data =mysqli_num_rows($run);// fetch data
            if ($data == 1)
              {
                  $_SESSION['login_user']=$username; // Initializing Session
                  header("location:index.php"); // Redirecting To Other Page
              }
            else
              {
                  $error = "Username or Password is invalid";
              }
          }
        }
      }
      else {
        header("location:login.php");
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
  <div class="content-area">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <!-- ===============================================
          **** A COMPLETE VALIDATE FORM WITH PHP ****
          ================================================ -->

          <!-- ==============  PHP begin  =================-->

          <div class="form-area">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="section-title">
                    <h3>Admin Login</h3>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <form action="" method="post">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form form-group">
                              <h5><label for="sname">User Name</label>
                                <span class="error"></span></h5>
                                <p><input  class="form-control"  type="text" name="username" value="" required placeholder="username"></p>

                                <h5><label for="password">Password</label><span class="error">
                                </span></h5>
                                <p><input class="form-control" type="password" name="password" value="" required placeholder="*********"></p>

                                <input type="submit" name="submit" value="Login" class="btn btn-secondary text-left">
                                <a href="forgot.php" class="text-right ml-5 PassAnchor">Forgot Password ?</a>
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
                  <li><a href="show.php">students</a></li>
                  <li><a href="search.php">Search</a> </li>
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
