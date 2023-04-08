<?php
require 'config.php';
  $UniversityIDs = [''];
  $query1= "SELECT * FROM `university`";
  $res1 = $con->query($query1);
  if ($res1->num_rows > 0) {
      while($row1 = $res1->fetch_assoc()) {
        $UniversityIDs[$row1["UniversityID"]] = $row1["Universityname"];
      }
  }

  

  
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
<?php include 'header.php';?>


   

  <div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          
          <div class="col-12 col-md-10 col-lg-12">
            <div class="text-right" style="padding-bottom: 20px;">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Quiz</button>
            </div>
           <div class="card">
          

            <div class="card-header" style="text-align: center;">
              <h4 style="text-align: center;">View Quizes</h4>
            </div>
       

            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">CourseId</th>
                  <th scope="col">UniveristyId</th>
                  <th scope="col">Quiz Id</th>
                  <th scope="col">Tittle</th>
                  <th scope="col">Quiz Image</th>
                <th scope="col">Question</th>
                  <th scope="col">Answer</th>
                  <th scope="col">Translation</th>
                
                  <th scope="col">Edit</th>
                  
                  
                </tr>
              </thead>
             
                    <tbody>
                    <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'hwhelp');

                
                $ret=mysqli_query($con,"select * from quiz");
            
                $row=mysqli_num_rows($ret);
                if($row>0){
                while ($row=mysqli_fetch_array($ret)) {
                
              
            ?>
                            <tr>
                                
                                <td> <?php echo $row['id']; ?> </td>
                                <td> <?php echo $row['courseid']; ?> </td>
                                <td> <?php echo $row['UniversityID']; ?> </td>
                                <td> <?php echo $row['quizId']; ?> </td>
                                <td> <?php echo $row['quiztittle']; ?> </td>
                                <td> <?php echo $row['quizdimg']; ?> </td>
                              <td> <?php echo $row['quizquestion']; ?> </td>
                                <td> <?php echo $row['quizanswer']; ?> </td>
                                <td> <?php echo $row['quiztranslation']; ?> </td>
                                
                                <td>
                          
                                <a href="edit.php?editid=<?php echo htmlentities ($row['id']);?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                             </td>
                                <td>
                                    <button type="button" class="btn btn-danger deletebtn"> <i class="fa fa-trash"></i> </button>
                                </td>
                            </tr>
                        </tbody>

                  <?php 
} } else {?>
              
              <tr>
    <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
</tr>
<?php } ?>  
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
                  <h5 class="modal-title" id="formModal">Add Quiz</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <form action="insert quiz.php" autocomplete="off" method="POST" enctype="multipart/form-data">
                 
                    
                    <input type="hidden" name="id" id="id">
                           <div class="form-group">
                        <label>Course Id</label>
                        <input type="text" class="form-control"required="" id="course_id" name="course_id">
                    </div>
                      <div class="form-group">
                        <label>University Id</label>
                        <select  style="padding:5px" id="uni_id" name="uni_id" class="form-control">
                                    <?php
                                        foreach($UniversityIDs as $key => $UniversityID) { ?>
                                    <option value="<?php echo $key ?>"><?php echo $UniversityID ?></option>
                                    <?php }
                                    ?>

                                </select>
                      </div>
                     
                      <div class="form-group">
                        <label>Quiz Id</label>
                        <input type="text" class="form-control" required="" id="quiz_id" name="quiz_id">
                      </div> 
                      <div class="form-group">
                        <label>Quiz Title</label>
                        <input type="text" class="form-control" required="" id="quiz_title" name="quiz_title">
                      </div>
                      <div class="form-group">
                        <label>Upload Quiz Image</label>
                        <input type="file" class="form-control" id="upload_quiz_img" name="upload_quiz_img">


                        
                      </div> 
                    
                      <div class="form-group">
                        <label>Quiz Question</label>
                        <input type="file" class="form-control" required="" id="quiz_ques" name="quiz_ques">
                      </div>
                     
                      <div class="form-group">
                        <label>Quiz Answer</label>
                        <input type="file" class="form-control" required="" id="quiz_ans" name="quiz_ans">
                      </div>
                      <div class="form-group">
                        <label>Quiz Translation</label>
                        <input type="text" class="form-control" required="" id="quiz_tran" name="quiz_tran">
                      </div>
                     
                    
                   
              
                <button type="submit" class="btn btn-primary m-t-15 waves-effect" value="Submit" id="addquiz" name="addquiz">Submit</button>
   
              
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

                          <form action="include/del-quiz.php" method="POST">

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
    </section>

     
                </div>
              </div>
            </section>
           
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
        </body>
        
        


      </html>