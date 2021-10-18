<?php
session_start();
if (isset($_SESSION['username']))
{
    $conn=mysqli_connect("localhost","root","","student");

    $query="select * from admission ";

    $run=mysqli_query($conn,$query);
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
  <div class="row">
    <div class="col-md-11">
      <div class="section-title">
        <h3>Student Details</h3>
      </div>



      <div class="">
        <table>
          <tr>
            <th align="center">Id</th><th align="center">Student Name</th><th align="center">Class</th>
            <th align="center">Guardian Name</th><th align="center">Contact Number</th><th align="center">Gender</th>
            <th align="center">Email id</th><th align="center">Blood Group</th><th align="center">Address</th>
            <th align="center">Division</th><th align="center">Shift</th><th align="center">Action</th>
          </tr>
          <?php
          while ($result=mysqli_fetch_array($run))
          {
            ?>
            <tr>
                 <td><?php echo $result['id']; ?></td>
                 <td><?php echo $result['sname'];?></td>
                 <td><?php echo $result['class']; ?></td>
                 <td><?php echo $result['gname'];?></td>
                 <td><?php echo $result['contact']; ?></td>
                 <td><?php echo $result['gender']; ?></td>
                 <td><?php echo $result['email'];?></td>
                 <td><?php echo $result['bloodg']; ?></td>
                 <td><?php echo $result['address']; ?></td>
                 <td><?php echo $result['division'];?></td>
                 <td><?php echo $result['shift']; ?></td>
                 <td>
                   <a class="action-e" href="update.php?id=<?php echo $result['id']; ?>"><i class="fa fa-wrench" title="Update"></i></a>
                   <a class="action-d" href="delete.php?id=<?php echo $result['id'] ?>" onclick="return confirm('Are you sure?')"><i class="fa fa-trash" title="Delete"></i></a>
                 </td>
               </tr>
            <?php
          }
          ?>
          <tr>

          </tr>
        </table>
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
