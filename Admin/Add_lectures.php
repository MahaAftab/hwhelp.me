
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
  <div class="loader"></div>
  <?php include 'header.php';
  require 'config.php';?>

      </div>
      

     
  <div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          
          <div class="col-12 col-md-10 col-lg-12">
            <div class="text-right" style="padding-bottom: 20px;">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Lecture</button>
            </div>
           <div class="card">
          

            <div class="card-header" style="text-align: center;">
              <h4 style="text-align: center;">Lectures</h4>
            </div>
            
            <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'hwhelp');

                $query = "SELECT * FROM lecture ";
                $query_run = mysqli_query($connection, $query);
            ?>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Course Id</th>
                  <th scope="col">University Id</th>
                  <th scope="col">Lecture Image</th>
                  <th scope="col">Lecture Id</th>
                  <th scope="col">Lecture Documents</th>
                  <th scope="col">Lecture Title</th>
                  <th scope="col">Lecture Description</th>
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
                                <td> <?php echo $row['UniversityID']; ?> </td>
                                <td> <?php echo $row['lecdimg']; ?> </td>
                                <td> <?php echo $row['lecId']; ?> </td>
                                <td> <?php echo $row['lecdocuments']; ?> </td>
                                <td> <?php echo $row['lectittle']; ?> </td>
                                <td> <?php echo $row['lecdescription']; ?> </td>
                               
                                <td>
                          
                                <a href="editlec.php?editidlec=<?php echo htmlentities ($row['id']);?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                             </td>
                                <td>
                                    <button type="button" class="btn btn-danger deletebtn"> <i class="fa fa-trash"></i> </button>
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
                  <h5 class="modal-title" id="formModal">Add Lecture</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">
                  <form action="insert_lec.php" autocomplete="off" method="POST"enctype="multipart/form-data">
                    <div class="form-group">
                     
                        <input type="hidden" class="form-control" id="id" name="id">
                      </div>
                    <div class="form-group">
                        <label>Course Id</label>
                        <input type="text" class="form-control" required="" id="course_id" name="course_id">
                      </div>
                  <div class="form-group">
                    <label>University Id</label>
                    <input type="text" class="form-control" required="" id="uni_id" name="uni_id">
                  </div>
                  <div class="form-group">
                    <label>Upload Lecture Image</label>
                    <input type="file" class="form-control" required="" id="upload_lec_img" name="upload_lec_img">
                  </div>
                  <div class="form-group">
                    <label>Lecture Id</label>
                    <input type="text" class="form-control" required="" id="lec_id" name="lec_id">
                  </div>
                  <div class="form-group">
                    <label>Upload Lecture Documents</label>
                    <input type="file" class="form-control" required="" id="upload_doc" name="upload_doc">
                  </div>
                  <div class="form-group">
                    <label>Lecture Title</label>
                    <input type="text" class="form-control" required="" id="lec_title" name="lec_title">
                  </div>
                  <div class="form-group">
                    <label>Lecture Description</label>
                    <input type="text" class="form-control" required="" id="lec_desc" name="lec_desc">
                  </div>

                    <button type="submit" class="btn btn-primary m-t-15 waves-effect" value="Submit" id="addBtn" name="addBtn" >Add</button>
                  </form>
                </div>
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

                          
                          <form action="include/del-lec.php" method="POST">

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
        
          
        </div>
            </div>
        </div>
      </div>
    </section>

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
<script src="assets/js/app.min.js"></script>
<!-- JS Libraies -->
<!-- Page Specific JS File -->
<!-- Template JS File -->
<script src="assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="assets/js/custom.js"></script>
</body>


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