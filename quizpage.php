
    <?php
require('include/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Quiz </title>
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
  <?php
require('include/Header.php');
?><!-- End Header -->

  <main id="main">
  
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">
      <?php
                            
                           
                            $table_name = "courses";

$courseid = $_GET["courseid"];
$mysqli = new mysqli('localhost','root','','hwhelp');
                            // Create a query to retrieve the course name
                            $query = "SELECT coursename FROM $table_name WHERE courseid = '$courseid'";
                            
                            // Execute the query and fetch the course name
                            $result = $mysqli->query($query);
                            $row = $result->fetch_assoc();
                            $coursename = $row["coursename"];
                          
                            
                        
                            
                
                            ?>
        <div class="d-flex justify-content-between align-items-center">
          <h2><b><?php echo $coursename?></h5></b></h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li><a href="qatar-uni.html">uni</a> </li>
            <li><?php echo $coursename?></li>
          </ol>
        </div>
      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
        <div class="row">
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
          </div>
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

    
        
                       
                       
                       

         <?php
$course_id = $_GET["courseid"];

// Fetch quizzes from database whose courseid is same as $course_id
$sql = "SELECT * FROM quiz WHERE courseid = '$course_id'";
$result = mysqli_query($con, $sql);

// Display quizzes as hyperlinks with their quiz title and course name
while ($row = mysqli_fetch_assoc($result)) {
    $quizId = $row['quizId'];
    $quiztittle = $row['quiztittle'];
   
    $url = "quizopen.php?quizId=" . $quizId;

    // Display course name and quiz title as headers
   

    // Display quiz hyperlink with download icon
    echo '<div class="chapter" style="margin-top: 0;">';?>
    <div class="row">
      <div class="col-sm-9">
        <?php
      echo '<h4>' . $quiztittle . '</h4>';?>
      </div>
      <div class="col-sm-3">
    
                     <?php
         echo '<a href="' . $url . '"><td>explore now</td></a>';?> <i class="fa-solid fa-forward" style="color: #000000; float: right; font-size: x-large" >></i></div>
      
    </div>
    <?php
   
   
   
    echo '</div>';
}

// Close the database connection
mysqli_close($con);
?>





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
</html>
