<?php include 'header.php';
  require 'config.php';

  $UniversityIDs = [''];
  $query1= "SELECT * FROM `university`";
  $res1 = $con->query($query1);
  if ($res1->num_rows > 0) {
      while($row1 = $res1->fetch_assoc()) {
        $UniversityIDs[$row1["UniversityID"]] = $row1["Universityname"];
      }
  }

// if(isset($_POST['addvedio']))
// {
//     $id=$_POST['id'];
//     $course_id=$_POST['course_id'];
//     $uni_id=$_POST['uni_id'];
//     $video_id=$_POST['video_id'];
//     $video_title=$_POST['video_title'];
//     $video_dec=$_POST['video_dec'];
//     $upload_video=$_POST['upload_video'];





//     $query = "INSERT INTO `vedio` (`courseid`,`UniversityId`,`vedioid`,`vediotittle`,`vediodescription`,`vedio`,`id`)
//      VALUES ('$course_id','$uni_id','$video_id','$video_title','$video_dec','$upload_video',NULL)";
//     $query_run = mysqli_query($con, $query);
    
//     if($query_run)
//     {
//         echo '<script> alert("Data Saved"); </script>';
//         header('Location: add_video.php');
//     }
//     else
//     {
//         echo '<script> alert("Data Not Saved"); </script>';
//     }
// }



?>

<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin Dashboard</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>

   <!-- Modal - EDIT COURSE-->


   <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="formModal"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="formModal">Update Video</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <form action="update_video.php" autocomplete="off" method="POST">
                       
                  
                            
                            <input type="hidden" class="form-control" id="id" name="id">
                          
                          <div class="form-group">
                        <label>Course Id</label>
                        <input type="text" class="form-control" id="course_id" name="course_id" >
                    </div>
                    <div class="form-group">
                        <label>University</label>
                        <select  style="padding:5px" id="uni_id" name="uni_id" class="form-control">
                                    <?php
                                        foreach($UniversityIDs as $key => $UniversityID) { ?>
                                    <option value="<?php echo $key ?>"><?php echo $UniversityID ?></option>
                                    <?php }
                                    ?>

                                </select>
                      </div>
                          <div class="form-group">
                            <label>Video Id</label>
                            <input type="text" class="form-control" id="video_id" name="video_id">
                          </div> 
                          <div class="form-group">
                            <label>Video Title</label>
                            <input type="text" class="form-control" id="video_title" name="video_title">
                          </div>
                           <div class="form-group">
                            <label>Video Description</label>
                            <input type="text" class="form-control" id="video_dec" name="video_dec">
                          </div> 
                          <div class="form-group">
                            <label>Upload Video</label>
                            <input type="file" class="form-control" id="upload_video" name="upload_video">
                          </div>
                        </div>
                      
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect" value="Submit" id="editvedio" name="editvedio" >Update</button>
                        </div>
              
                      </form> 
                    </div>
                  </div>
                </div>
              </div>

        <!-- Main Content -->
        <div class="main-content">
     
        <section class="section">
      <div class="section-body">
        <div class="row">
          
          <div class="col-12 col-md-10 col-lg-12">
            <div class="text-right" style="padding-bottom: 20px;">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Video</button>
            </div>
           <div class="card">
          

            <div class="card-header" style="text-align: center;">
              <h4 style="text-align: center;">Videos</h4>
            </div>
            <?php
              

                $query = "SELECT * FROM vedio";
                $query_run = mysqli_query($con, $query);
            ?>
            <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Course Id</th>
                  <th scope="col">University Id</th>
                  <th scope="col">Video Id</th>
                  <th scope="col">Video Title</th>
                  <th scope="col">Video Description</th>
                  <th scope="col">Video</th>
                  <th scope="col">Edit/Delete</th>
                </tr>
              </thead>
              <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
                      ?>
                    <tbody>
                            <tr>
                            <td> <?php echo $row['id']; ?> </td>
                                <td> <?php echo $row['courseid']; ?> </td>
                                <td> <?php echo $row['UniversityId']; ?> </td>
                                <td> <?php echo $row['vedioid']; ?> </td>
                                <td> <?php echo $row['vediotittle']; ?> </td>
                                <td> <?php echo $row['vediodescription']; ?> </td>
                                <td> <?php echo $row['vedio']; ?> </td>
                        
                                <td>
                          
             
                  <td> <button type="button" class="btn btn-success" data-toggle="modal"  data-target="#editmodal"><i class="fa fa-edit"></i></button>
                       <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
                
              </tbody>
              <?php           
                    }
                }
                else 
                {
                    echo "No Record Found";
                }
            ?>
            </table>
          </div>
        </div>
            </div>
          </section>     
                    
        <!-- Modal with form -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Add Videos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="card-body">
                <form action="insertvedio.php" autocomplete="off" method="POST" enctype="multipart/form-data">
                        <div class="card-header">
                          <h4>Add Video</h4>
                        </div>
                        <div class="card-body">
                        <div class="form-group">
                      
                            <input type="hidden" class="form-control" id="id" name="id">
                          </div>
                          <div class="form-group">
                        <label>Course Id</label>
                        <input type="text" class="form-control" id="course_id" name="course_id">
                    </div>
                          <div class="form-group">
                            <label>University Id</label>
                       
                         
                            <input type="text" class="form-control"  id="uni_id" name="uni_id"  >
                          </div>
                          <div class="form-group">
                            <label>Video Id</label>
                            <input type="text" class="form-control" id="video_id" name="video_id">
                          </div> 
                          <div class="form-group">
                            <label>Video Title</label>
                            <input type="text" class="form-control" id="video_title" name="video_title">
                          </div> <div class="form-group">
                            <label>Video Description</label>
                            <input type="text" class="form-control" id="video_dec" name="video_dec" >
                          </div> 
                          <div class="form-group">
                            <label>Upload Video</label>
                            <input type="file" class="form-control" id="upload_video" name="upload_video">
                          </div>
                        </div>
                        <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect" value="Submit" id="addvedio" name="addvedio">Submit</button>
   
                        </div>
                      </form> 
            </div>
          </div>
        </div>
      </div>

        

            <!-- DELETE MODAL  -->
            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>

                          <form>

                              <div class="modal-body">

                                  <input type="hidden" name="delete_id" id="delete_id">

                                  <h4> Do you want to Delete this Data?</h4>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                                  <button type="submit" name="deletedata" id ="deletedata" class="btn btn-primary"> Yes </button>
                              </div>
                          </form>

                      </div>
                  </div>
              </div>
        
          
          
          <footer class="main-footer">
            <div class="footer-left">
              <a href="http://Hwhelp.me">HWHELP</a></a>
            </div>
            <div class="footer-right">
            </div>
          </footer>
        </div>
        </div>
        <!-- General JS Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
        <script src="assets/js/app.min.js"></script>
        <!-- JS Libraies -->
        <!-- Page Specific JS File -->
        <!-- Template JS File -->
        <script src="assets/js/scripts.js"></script>
        <!-- Custom JS File -->
        <script src="assets/js/custom.js"></script>
        </body>
        
        
<!-- <script>
      $(document).ready(function () {
          $('.editvedio').on('click', function () {
           

$('#editmodal').modal('show');

      


         
        });
        });
    </script> -->
 <script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>
        </html>