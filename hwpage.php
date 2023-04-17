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


</head>

<body>

  <!-- ======= Header ======= -->
  <?php
require('include/Header.php');
?>
<!-- End Header -->

  <main id="main">
  <?php
                            
            $mysqli = new mysqli('localhost','root','','hwhelp');
            $table_name = "courses";
            $course_id = $_GET["courseid"];
            
            // Create a query to retrieve the course name
            $query = "SELECT coursename FROM $table_name WHERE courseid = '$course_id'";
            
            // Execute the query and fetch the course name
            $result = $mysqli->query($query);
            $row = $result->fetch_assoc();
            $course_name = $row["coursename"];
          
            
        
            

            ?>
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><b><?php echo $course_name?></h5></b></h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li><a href="qatar-uni.html">uni</a> </li>
            <li><?php echo $course_name?></li>
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
    // Create a database connection (you'll need to replace the database credentials and table name with your ow


    // Select all records from the homework table
    $sql = "SELECT * FROM homework WHERE courseid = '$course_id'";
    $result = mysqli_query($con, $sql);
    
    // Loop through each record and generate a hyperlink with the homework ID
    while ($row = mysqli_fetch_assoc($result)) {
        $homeworkId = $row['HomeworkId'];
        $hwtittle = $row['hwtittle'];
        $url = "homework.php?HomeworkId=" . $homeworkId;
        ?>
          <div class="chapter" style="margin-top: 0;"><td> <a href="<?php echo $url; ?>"><?php echo $hwtittle; ?></a></td><i class="bi bi-cloud-arrow-down-fill" style="color: #000000; float: right; font-size: x-large; text-align: end; " ></i></div>
            
        
        <br>
        <?php
    }

   
    // Close the database connection
    mysqli_close($con);
    ?>

        
            

          
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
</html>
