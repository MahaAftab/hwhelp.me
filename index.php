<?php
require('include/config.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Hwhelp - Homepage</title>
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
    <div class="banner" id="banner">
      Welcome to our platform - your one-stop resource for high-quality online
      education!
    <span class="close" onclick="closeBanner()">x</span>
    </div>
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
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#about">About Us</a></li>
            <li><a class="nav-link scrollto" href="#services">Services</a></li>
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
     
        </nav>
        <!-- .navbar -->
      </div>
    </header>
    <!-- End Header -->
    <form class="d-flex pl-10" style="padding-left:30%; padding-right:25%; padding-top: 20px; padding-bottom:20px;">
            <input
              class="form-control mr-2"
              type="search"
              class="search"
              placeholder="Search"
              aria-label="Search"
              style="width: 60%; font-size:1.2em"

            />
            <button class="btn btn-outline-success" type="submit">
              Search
            </button>
          </form>
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
   
      <div class="container">
        <div class="row gy-4">
          <div
            class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center"
          >
            <h1>Unlock your academic potential.</h1>
            <h2>
              Access a wide range of educational resources like lectures,
              videos, PDF files, projects, homework, quizzes, past papers, and
              labs, all in one place.
            </h2>
            <div>
              <a href="#about" class="btn-get-started scrollto">Get Started</a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img">
            <!-- <img src="assets/img/hwhelp/DALL·E 2023-01-29 14.11.14.png" class="img-fluid animated" alt=""> -->

            <img src="assets/img/about-img.svg" class="img-fluid" alt="" />
          </div>
        </div>
      </div>
    </section>
    <!-- End Hero -->
 
    <main id="main">
      <!-- Add carousel markup to body section
      <div class="section-title" style="padding-top: 60px">
        <h1 class="uni pb-3">Explore top Universities</h1>
        <div class="line"></div>
      </div>
      <div
        id="university-carousel"
        class="carousel slide pb-5"
        data-ride="carousel"
      >
        <div class="carousel-inner">
          <div class="carousel-item active"> -->
          <div class="row">
  <?php
    $query = "SELECT * FROM `university`";
    $res = $con->query($query);
    if ($res->num_rows > 0) {
      while($row = $res->fetch_assoc()) {
        $Universityimg = $row['Universityimg'];
  ?>
        <div class="col-md-3">
          <div class="card">
            
            
          <img class="card-img-top" src="Admin\img\uni\<?php echo $Universityimg; ?>" alt="University 5" />

           
            <div class="card-body">
              <h4 class="card-title"><a href="Uni-page.php?UniversityID=<?php echo $row['UniversityID']; ?>"><?php echo $row['Universityname']; ?></a></h4>
            </div>
           
          </div>
        </div>
  <?php
      }
    } else {
      echo "not found";
    }
  ?>
</div>

             
            
              <!-- </div> --> 
              
              <!-- <div class="col-md-3">
                <a href="qatar-uni.html">
                  <div class="card">
                    <img
                      class="card-img-top"
                      src="assets/img/hwhelp/qatar-uni.jpg"
                      alt="University 2"
                    />
                    <div class="card-body">
                      <h4 class="card-title"> <a href="Courses.php?UniversityID='.$row["UniversityID"].' " >'.$row["Universityname"].'</a></td>
                                            </h4>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-md-3">
                <a href="qatar-uni.html">
                  <div class="card">
                    <img
                      class="card-img-top"
                      src="assets/img/hwhelp/harvard-uni.jpeg"
                      alt="University 3"
                    />
                    <div class="card-body">
                      <h4 class="card-title">Harvard University</h4>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-md-3">
                <a href="lqatar-uni.html">
                  <div class="card">
                    <img
                      class="card-img-top"
                      src="assets/img/hwhelp/uni-of-michign.jfif"
                      alt="University 4"
                    />
                    <div class="card-body">
                      <h4 class="card-title">University of Michigan</h4>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-3">
                <a href="qatar-uni.html">
                  <div class="card">
                    <img
                      class="card-img-top"
                      src="assets/img/hwhelp/oxford-uni.webp"
                      alt="University 5"
                    />
                    <div class="card-body">
                      <h4 class="card-title">University of Oxford</h4>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-md-3">
                <a href="qatar-uni.html">
                  <div class="card">
                    <img
                      class="card-img-top"
                      src="assets/img/hwhelp/cambridge-uni.webp"
                      alt="University 6"
                    />
                    <div class="card-body">
                      <h4 class="card-title">University of Cambridge</h4>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-md-3">
                <a href="qatar-uni.html">
                  <div class="card">
                    <img
                      class="card-img-top"
                      src="assets/img/hwhelp/stanford-uni.webp"
                      alt="University 7"
                    />
                    <div class="card-body">
                      <h4 class="card-title">Stanford University</h4>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-md-3">
                <a href="qatar-uni.html">
                  <div class="card">
                    <img
                      class="card-img-top"
                      src="assets/img/hwhelp/tokyo-uni.jfif"
                      alt="University 8"
                    />
                    <div class="card-body">
                      <h4 class="card-title">University of Tokyo</h4>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div> -->
        <!-- Add carousel controls -->
        <!-- <a
          class="carousel-control-prev"
          href="#university-carousel"
          role="button"
          data-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a
          class="carousel-control-next"
          href="#university-carousel"
          role="button"
          data-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div> -->

      <section class="price_plan_area section_padding_130_80" id="pricing">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-lg-6">
              <!-- Section Heading-->
              <div
                class="section-heading text-center wow fadeInUp"
                data-wow-delay="0.2s"
                style="
                  visibility: visible;
                  animation-delay: 0.2s;
                  animation-name: fadeInUp;
                "
              >
                <h1
                  style="
                    font-weight: bold;
                    padding-bottom: 15px;
                    padding-top: 0;
                  "
                >
                  Choose Your Pricing Plan
                </h1>
                <div class="line"></div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center" data-aos="fade-up">
            <!-- Single Price Plan Area-->
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
              <div
                class="single_price_plan wow fadeInUp"
                data-wow-delay="0.2s"
                style="
                  visibility: visible;
                  animation-delay: 0.2s;
                  animation-name: fadeInUp;
                "
              >
                <div class="title">
                  <h3>Start Up</h3>
                  <p>Start a trial</p>
                  <div class="line"></div>
                </div>
                <div class="price">
                  <h4>$0</h4>
                </div>
                <div class="description">
                  <p><i class="lni lni-checkmark-circle"></i>Duration: 7days</p>
                  <p><i class="lni lni-checkmark-circle"></i>10 Features</p>
                  <p><i class="lni lni-close"></i>No Hidden Fees</p>
                  <p><i class="lni lni-close"></i>100+ Video Tuts</p>
                  <p><i class="lni lni-close"></i>No Tools</p>
                </div>
                <div class="button">
                  <a class="btn btn-success btn-2" href="#">Get Started</a>
                </div>
              </div>
            </div>
            <!-- Single Price Plan Area-->
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
              <div
                class="single_price_plan active wow fadeInUp"
                data-wow-delay="0.2s"
                style="
                  visibility: visible;
                  animation-delay: 0.2s;
                  animation-name: fadeInUp;
                "
              >
                <!-- Side Shape-->
                <div class="side-shape">
                  <img
                    src="https://bootdey.com/img/popular-pricing.png"
                    alt=""
                  />
                </div>
                <div class="title">
                  <span>Popular</span>
                  <h3>Small Business</h3>
                  <p>For Small Business Team</p>
                  <div class="line"></div>
                </div>
                <div class="price">
                  <h4>$9.99</h4>
                </div>
                <div class="description">
                  <p>
                    <i class="lni lni-checkmark-circle"></i>Duration: 3 Month
                  </p>
                  <p><i class="lni lni-checkmark-circle"></i>50 Features</p>
                  <p><i class="lni lni-checkmark-circle"></i>No Hidden Fees</p>
                  <p><i class="lni lni-checkmark-circle"></i>150+ Video Tuts</p>
                  <p><i class="lni lni-close"></i>5 Tools</p>
                </div>
                <div class="button">
                  <a
                    class="btn"
                    href="#"
                    style="background-color: #ee7843; color: white"
                    >Get Started</a
                  >
                </div>
              </div>
            </div>
            <!-- Single Price Plan Area-->
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
              <div
                class="single_price_plan wow fadeInUp"
                data-wow-delay="0.2s"
                style="
                  visibility: visible;
                  animation-delay: 0.2s;
                  animation-name: fadeInUp;
                "
              >
                <div class="title">
                  <h3>Enterprise</h3>
                  <p>Unlimited Possibilities</p>
                  <div class="line"></div>
                </div>
                <div class="price">
                  <h4>$49.99</h4>
                </div>
                <div class="description">
                  <p>
                    <i class="lni lni-checkmark-circle"></i>Duration: 1 year
                  </p>
                  <p>
                    <i class="lni lni-checkmark-circle"></i>Unlimited Features
                  </p>
                  <p><i class="lni lni-checkmark-circle"></i>No Hidden Fees</p>
                  <p>
                    <i class="lni lni-checkmark-circle"></i>Unlimited Video Tuts
                  </p>
                  <p><i class="lni lni-checkmark-circle"></i>Unlimited Tools</p>
                </div>
                <div class="button">
                  <a class="btn btn-warning" href="#">Get Started</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <!-- ======= F.A.Q Section ======= -->
      
      <section id="faq" class="faq section-bg">
        <div class="container">
          <div class="section-title">
            <h2>F.A.Q</h2>
            <p>Frequently Asked Questions</p>
          </div>

          <ul class="faq-list" data-aos="fade-up" data-aos-delay="100">
            <li>
              <div
                data-bs-toggle="collapse"
                class="collapsed question"
                href="#faq1"
              >
                How much does it cost to subscribe to a course?<i
                  class="bi bi-chevron-down icon-show"
                ></i
                ><i class="bi bi-chevron-up icon-close"></i>
              </div>
              <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                <p>
                  The cost of subscribing to a course varies depending on the
                  course and the university offering it. You can find pricing
                  information on each course's page.
                </p>
              </div>
            </li>

            <li>
              <div
                data-bs-toggle="collapse"
                href="#faq2"
                class="collapsed question"
              >
                How long do I have access to the course materials?<i
                  class="bi bi-chevron-down icon-show"
                ></i
                ><i class="bi bi-chevron-up icon-close"></i>
              </div>
              <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Once you've subscribed to a course, you'll have unlimited
                  access to the course materials for as long as the course is
                  offered on the platform.
                </p>
              </div>
            </li>

            <li>
              <div
                data-bs-toggle="collapse"
                href="#faq3"
                class="collapsed question"
              >
                Can I access the course materials offline?<i
                  class="bi bi-chevron-down icon-show"
                ></i
                ><i class="bi bi-chevron-up icon-close"></i>
              </div>
              <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  No, the course materials are only accessible through the
                  website while you're logged into your account.
                </p>
              </div>
            </li>

            <li>
              <div
                data-bs-toggle="collapse"
                href="#faq4"
                class="collapsed question"
              >
                How do I hire a tutor?<i
                  class="bi bi-chevron-down icon-show"
                ></i
                ><i class="bi bi-chevron-up icon-close"></i>
              </div>
              <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  To hire a tutor, click on the "Tutor Portal" button and browse
                  our list of available tutors. You can filter tutors by
                  subject, rating, and price, and read reviews from other users
                  before making a selection. Once you've found a tutor you're
                  interested in working with, click on their profile and follow
                  the prompts to schedule a session.
                </p>
              </div>
            </li>

            <li>
              <div
                data-bs-toggle="collapse"
                href="#faq5"
                class="collapsed question"
              >
                What if I have technical difficulties with the website?<i
                  class="bi bi-chevron-down icon-show"
                ></i
                ><i class="bi bi-chevron-up icon-close"></i>
              </div>
              <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                <p>
                  If you're experiencing technical difficulties with the
                  website, please contact our support team for assistance. We'll
                  do our best to resolve the issue as quickly as possible.
                </p>
              </div>
            </li>

            <li>
              <div
                data-bs-toggle="collapse"
                href="#faq6"
                class="collapsed question"
              >
                How do I cancel my subscription?<i
                  class="bi bi-chevron-down icon-show"
                ></i
                ><i class="bi bi-chevron-up icon-close"></i>
              </div>
              <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                <p>
                  To cancel your subscription, go to your account settings and
                  click on the "Subscription" tab. From there, you can select
                  the course you want to cancel and follow the prompts to
                  confirm the cancellation.
                </p>
              </div>
            </li>
          </ul>
        </div>
      </section>
      <!-- End F.A.Q Section -->

      <!-- ======= Team Section ======= -->
      <section id="team" class="team">
        <div class="container">
          <div class="section-title">
            <h2>Team of Tutors</h2>
            <p>Our team of tutors is always here to help</p>
          </div>

          <div class="row">
            <div
              class="col-xl-3 col-lg-4 col-md-6"
              data-aos="zoom-in"
              data-aos-delay="100"
            >
              <div class="member">
                <img
                  src="assets/img/team/team-1.jpg"
                  class="img-fluid"
                  alt=""
                />
                <div class="member-info">
                  <div class="member-info-content">
                    <h4>Walter White</h4>
                    <span>Cyber Security Expert</span>
                  </div>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div
              class="col-xl-3 col-lg-4 col-md-6"
              data-aos="zoom-in"
              data-aos-delay="200"
            >
              <div class="member">
                <img
                  src="assets/img/team/team-2.jpg"
                  class="img-fluid"
                  alt=""
                />
                <div class="member-info">
                  <div class="member-info-content">
                    <h4>Sarah Jhonson</h4>
                    <span>Data Science Specialist</span>
                  </div>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div
              class="col-xl-3 col-lg-4 col-md-6"
              data-aos="zoom-in"
              data-aos-delay="300"
            >
              <div class="member">
                <img
                  src="assets/img/team/team-3.jpg"
                  class="img-fluid"
                  alt=""
                />
                <div class="member-info">
                  <div class="member-info-content">
                    <h4>William Anderson</h4>
                    <span>English Language Expert</span>
                  </div>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div
              class="col-xl-3 col-lg-4 col-md-6"
              data-aos="zoom-in"
              data-aos-delay="400"
            >
              <div class="member">
                <img
                  src="assets/img/team/team-4.jpg"
                  class="img-fluid"
                  alt=""
                />
                <div class="member-info">
                  <div class="member-info-content">
                    <h4>Amanda Jepson</h4>
                    <span>Data Structures Expert</span>
                  </div>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Team Section -->

      <!-- ======= Clients Section ======= -->
      <section id="clients" class="clients section-bg">
        <div class="container">
          <div class="section-title">
            <h2>Clients</h2>
            <p>They trusted us</p>
          </div>

          <div
            class="clients-slider swiper"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <div class="swiper-wrapper align-items-center">
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-1.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-2.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-3.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-4.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-5.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-6.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-7.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-8.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </section>
      <!-- End Clients Section -->

      <!-- ======= Contact Us Section ======= -->
      <section id="contact" class="contact">
        <div class="container">
          <div class="section-title">
            <h2>Contact Us</h2>
            <!-- <p>Contact us the get started</p> -->
          </div>

          <div class="row">
            <div
              class="col-lg-5 d-flex align-items-stretch"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <div class="info">
                <div class="address">
                  <!-- <i class="bi bi-geo-alt"></i> -->
                  <!-- <h4>Location:</h4>
                  <p>A108 Sample Street, New York, NY 535022</p> -->
                </div>

                <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>info@example.com</p>
                </div>

                <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p>+1 2223 4458 7892</p>
                </div>

                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                  frameborder="0"
                  style="border: 0; width: 100%; height: 290px"
                  allowfullscreen
                ></iframe>
              </div>
            </div>

            <div
              class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <form
                action="forms/contact.php"
                method="post"
                role="form"
                class="php-email-form"
              >
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="name">Your Name</label>
                    <input
                      type="text"
                      name="name"
                      class="form-control"
                      id="name"
                      placeholder="Your Name"
                      required
                    />
                  </div>
                  <div class="form-group col-md-6 mt-3 mt-md-0">
                    <label for="name">Your Email</label>
                    <input
                      type="email"
                      class="form-control"
                      name="email"
                      id="email"
                      placeholder="Your Email"
                      required
                    />
                  </div>
                </div>
                <div class="form-group mt-3">
                  <label for="name">Subject</label>
                  <input
                    type="text"
                    class="form-control"
                    name="subject"
                    id="subject"
                    placeholder="Subject"
                    required
                  />
                </div>
                <div class="form-group mt-3">
                  <label for="name">Message</label>
                  <textarea
                    class="form-control"
                    name="message"
                    rows="10"
                    required
                  ></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">
                    Your message has been sent. Thank you!
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit">Send Message</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- End Contact Us Section -->
    </main>
    <!-- End #main -->

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

<!-- <li class="dropdown">
              <a href="#"
                ><span>Drop Down</span> <i class="bi bi-chevron-down"></i
              ></a>
              <ul>
                <li><a href="#">Drop Down 1</a></li>
                <li class="dropdown">
                  <a href="#"
                    ><span>Deep Drop Down</span>
                    <i class="bi bi-chevron-right"></i
                  ></a>
                  <ul>
                    <li><a href="#">Deep Drop Down 1</a></li>
                    <li><a href="#">Deep Drop Down 2</a></li>
                    <li><a href="#">Deep Drop Down 3</a></li>
                    <li><a href="#">Deep Drop Down 4</a></li>
                    <li><a href="#">Deep Drop Down 5</a></li>
                  </ul>
                </li>
                <li><a href="#">Drop Down 2</a></li>
                <li><a href="#">Drop Down 3</a></li>
                <li><a href="#">Drop Down 4</a></li>
              </ul>
            </li> -->
