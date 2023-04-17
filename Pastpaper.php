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
            $query = "SELECT coursename,universityname FROM $table_name WHERE courseid = '$course_id'";
            
            // Execute the query and fetch the course name
            $result = $mysqli->query($query);
            $row = $result->fetch_assoc();
            $course_name = $row["coursename"];
            $uni_name = $row["universityname"];
          
            
        
            

            ?>
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><b><?php echo $course_name?></h5></b></h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li><?php echo $uni_name?></li>
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
          

            <?php
    $course_id = $_GET["courseid"];
   // Define the number of records per page
$records_per_page = 4;
// Determine the current page number based on the "page" parameter in the URL
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
// Calculate the offset for the SQL query based on the current page and number of records per page
$offset = ($current_page - 1) * $records_per_page;



    // Select all records from the homework table
    $sql = "SELECT * FROM pastexam WHERE courseid = '$course_id' LIMIT $records_per_page OFFSET $offset";
    $result = mysqli_query($con, $sql);
    
    // Loop through each record and generate a hyperlink with the homework ID
    while ($row = mysqli_fetch_assoc($result)) {
        $examid= $row['examid'];
        $examtittle = $row['examtittle'];
        
        $examquesimg = $row['examquesimg'];
               $url = "examdownload?examid=" . $examid;
        
   
        ?>
    <div class="row chapter" style="margin: 5px !important;">
        <div class="col-sm-2">
            <?php echo '<h6> <b> ' . $examtittle . ' </b></h6>'; ?>
        </div>
        <div class="col-sm-7">
            <?php echo '<h6> <b> ' . $examquesimg . ' </b></h6>'; ?>
        </div>
        <div class="col-sm-3">
            <?php echo '<td><a href="examdownload.php?examdimg=' . $row["examdimg"] . '"> <h6> <b> View and download </b></h6></a> <td>'; ?>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
    <br>
        
        <br>

    
        
  
        <?php
    }
// Calculate the total number of pages based on the number of records and records per page
$total_pages = ceil(mysqli_num_rows(mysqli_query($con, "SELECT * FROM pastexam WHERE courseid = '$course_id'")) / $records_per_page);
// Generate pagination links based on the total number of pages and current page
if ($total_pages > 1) {
    echo '<nav aria-label="Page navigation example">';
    echo '<ul class="pagination justify-content-center">';
    if ($current_page == 1) {
        echo '<li class="page-item disabled">';
        echo '<a class="page-link" href="#" tabindex="-1">Previous</a>';
        echo '</li>';
    } else {
        echo '<li class="page-item">';
        echo '<a class="page-link" href="?courseid=' . $course_id . '&page=' . ($current_page - 1) . '">Previous</a>';
        echo '</li>';
    }
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $current_page) {
            echo '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
        } else {
            echo '<li class="page-item"><a class="page-link" href="?courseid=' . $course_id . '&page=' . $i . '">' . $i . '</a></li>';
        }
    }
   

    echo '</div>';
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

 

 
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>
