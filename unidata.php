<?php
require('include/config.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Qatar University</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/hwhelp/image (2).png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://cdn.lineicons.com/3.0/lineicons.css" />

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link
      href="assets/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />
  </head>

  <body>
    <!-- ======= Header ======= -->

    <header id="header" class="d-flex align-items-center">
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
            <li><a class="nav-link scrollto" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#about">About Us</a></li>
            <li>
              <a class="nav-link scrollto active" href="#services">Services</a>
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
          <form class="d-flex pl-2">
            <input
              class="form-control mr-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-outline-success" type="submit">
              Search
            </button>
          </form>
        </nav>
        <!-- .navbar -->
      </div>
    </header>
 
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><b>Courses</b></h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Qatar University</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <main id="main" class="bg-orange">
  







              <br>
              <br>
    
      
      <div class="container">


      <div class="row row-cols-1 row-cols-md-3 g-4">
     

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
                                          
                                          
                                             <div class="col">
                                             
                                             <div class="card h-100" style="padding-top: 40px;padding-bottom: 40px;">                                              <!-- <img
                                              src="Admin\img\course\<?php echo $upload_img; ?>" 
                                                class="card-img-top card-img-bottom mx-auto"
                                                alt="Skyscrapers"
                                            /> -->

                                              <div class="card-body">
                                                
                                              <ul>
       
        
       </li> <a href="homelist.php?courseid=<?php echo $course_id; ?>" > Homework</a></li>

       <!-- Add more tabs as needed -->
   </ul>    
   <ul>
       
        
       </li> <a href="quizpg.php?courseid=<?php echo $course_id; ?>" > Quiz</a></li>

       <!-- Add more tabs as needed -->
   </ul>   

                                                
                                               <?php echo'
                                             ';
                                                ?>
                                                <p class="card-text">
                                                 
                                                <?php echo $course_name; ?>
                                                <td> <a href="homelist.php?courseid=<?php echo $course_id; ?>" > Homework</a></td>
                                                
                                                </p>
                                                </div>
                                              </div>
                                              </div> 
                                           <?php  
                                  
                        ?> 
                                                                      </div> 
</div>
<?php

?>


            
       
    </main>
   
  </body>
</html>