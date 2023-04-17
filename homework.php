<?php
require('include/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>College Algebra and Trignometry</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
    <link href="assets/img/hwhelp/image (2).png" rel="icon" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Ninestars
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo">
        <a href="index.html"
          ><img
            src="assets/img/hwhelp/image (2).png"
            alt=""
            class="img-fluid"
        /></a>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.html">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About Us</a></li>
          <li>
            <a class="nav-link scrollto active" href="index.html">Services</a>
          </li>
          <li>
            <a class="nav-link scrollto" href="#team">Ask from Experts</a>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li>
            <a class="nav-link scrollto" href="login.html" id="login"
              >Login</a
            >
          </li>
          <li>
            <a class="getstarted scrollto" href="signup.html">Signup</a>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">
      <?php
                            
                            $mysqli = new mysqli('localhost','root','','hwhelp');
                            $table_name = "homework";
                                            
                                              $HomeworkId = $_GET["HomeworkId"];
                            
                            // Create a query to retrieve the course name
                            $query = "SELECT homeworkdescription FROM $table_name WHERE HomeworkId = '$HomeworkId'";
                            
                            // Execute the query and fetch the course name
                            $result = $mysqli->query($query);
                            $row = $result->fetch_assoc();
                            $homeworkdescription = $row["homeworkdescription"];
                          
                            
                        
                            
                
                            ?>
        <div class="d-flex justify-content-between align-items-center">
          <h2><b><?php echo $homeworkdescription?></h5></b></h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li><a href="qatar-uni.html">uni</a> </li>
            <li><?php echo $homeworkdescription?></li>
          </ol>
        </div>
      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
        <!-- <div class="row">
          <div class="col-3 mb-4">
            <div class="card">
              <img class="card-img-top" src="assets/img/hwhelp/college-algebra.jpg" alt="Card image cap">
              <div class="card-body">
                <span><h4 class="card-title"><b>College Algebra & Trignometry</b></h4></span>
                <p>(1st Edition)</p>
                <p class="card-text"><b>Book</b> - Edition 1st Edition</p>
                <p class="card-text"><b>Author(s)</b> - Miller, Gerken</p>
                <p class="card-text"><b>ISBN</b> - 9780078035623</p>
                <p class="card-text"><b>Publisher</b> - McGraw Hill</p>
                <p class="card-text"><b>Subject</b> - Math</p>
              </div>
            </div>
          </div> -->
          <div class="col-9 mb-4">
            <!-- <div class="card">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img class="card-img" src="assets/img/hwhelp/business-legal.jpg" alt="Card image">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title"><b>Book 4</b></h5>
                    <p class="card-text">Description of Book 4</p>
                  </div>
                </div>
              </div>
            </div> -->
            <table class="table">
                            <!--                Table Head Starts-->

                            <thead style="font-size: 15px;background-color: #fef5f1;">
                                <tr>
                                   
                                    <th>University Name</th>
                                    <th>hwtittle</th>
                                    <th>homeworkdescription</th>
                                    <th>Download</th>
                                
                                    <th></th>
                                   
                                </tr>
                            </thead>

                            <!--                Table Head End-->


                            <!--                Table Body Starts-->

                            <tbody>

                                <!--            Table Row Starts-->

            <?php
                                            
                                            // Check if courseid parameter is set
                                            if (isset($_GET['HomeworkId'])) {
                                                // Sanitize the courseid input to prevent SQL injection
                                                $HomeworkId = mysqli_real_escape_string($con, $_GET['HomeworkId']);
                                              
                                                // Fetch content from database based on courseid
                                                $sql = "SELECT * FROM homework WHERE HomeworkId = $HomeworkId";
                                                $result = mysqli_query($con, $sql);
                                              
                                                // Check if record exists
                                                  
                                                if (!empty($result) && $result->num_rows > 0) {
                                                    $row = $result->fetch_assoc();
                                                 echo'  <td>'.$row["UniversityID"].'</td>
                                                 <td>'.$row["hwtittle"].'</td>
                                                 <td>'.$row["homeworkdescription"].'</td>   
                                                                                
                             <td><a href="download.php?Homeworkdocuments='. $row["Homeworkdocuments"] . '">'.$row['Homeworkdocuments'].'</a> <td>
                                                 ';
                                             
                                                 $videoid = 2;
                                                                                            
                                                 // Fetch the video file from the database
                                                 $sql2 = "SELECT Homeworkdocuments FROM homework  WHERE videoid = $videoid";
                                                 $result = mysqli_query($con, $sql2);
                                        
                                                
                                                 $Homeworkdocuments= $row['Homeworkdocuments'];
                                                
                                              
                                                 
                                                
                                                    
                                                } else {
                                                  // Record not found
                                                  echo "Record not found.";
                                                }
                                              } else {
                                                // courseid parameter not set
                                                echo "courseid parameter not set.";
                                              }
                                            // Close MySQL connection
                                              mysqli_close($con);
                                                                                 
                                                                                   
                                        
                                           
                                                                                           
                                                                                            ?>
                                                                                              </tbody>
                            <!--                Table Body End-->
                        </table>
                                                                                          
                                        
                                                 

        
            

          
      </div>
    </section>
    
  
  </main><!-- End #main -->





  <?php
require('include/footer.php');
?>

  <a
    href="#"
    class="back-to-top d-flex align-items-center justify-content-center"
    ><i class="bi bi-arrow-up-short"></i
  ></a>

 

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>