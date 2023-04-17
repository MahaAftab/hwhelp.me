<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Add Univeristy</title>
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
?>

      </div>






   <!-- Main Content -->
       <div class="main-content">
       

        
             
              <!-- Modal - ADD UNIVERSITY-->

              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="formModal">Add University</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <form action="insert_uni.php" autocomplete="off" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id" id="id">
                        <div class="form-group">
                          <label>Univeristy Id</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter University Id" id="uni_id" name="uni_id">
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Name</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Univerity Name" id="uni_name" name="uni_name">
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Unidetails</label>
                            <input type="text" class="form-control" placeholder="Enter Univerity Details" id="uni_details" name="uni_details" >
                        </div>
                        <div class="form-group">
                          <label>thumbnailimg</label>
                            <input type="file" class="form-control" placeholder="Thumbnail-img" id="uni_img" name="uni_img" >
                        </div>
                        <div class="form-group">
                          <label>Main page img</label>
                            <input type="file" class="form-control" placeholder="Main page img(optional)" id="main_img" name="main_img" >
                        </div>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect" value="Submit" id="addButton" name="addButton">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
              <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>

                          <form action="del_uni.php" method="POST">

                              <div class="modal-body">

                                  <input type="hidden" name="delete_id" id="delete_id">

                                  <h4> Do you want to Delete this Data?</h4>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                                  <button type="submit" name="deletedata" class="btn btn-primary"> Yes </button>
                              </div>
                          </form>

                      </div>
                  </div>
              </div>
           
          <section class="section">
          <div class="section-body">
            <div class="row">
              
              <div class="col-12 col-md-10 col-lg-12">
                <div class="text-right" style="padding-bottom: 20px;">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add University</button>
                </div>
               <div class="card">
              

                <div class="card-header" style="text-align: center;">
                  <h4 style="text-align: center;">University</h4>
                </div>

                <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'hwhelp');

                $query = "SELECT * FROM university";
                $query_run = mysqli_query($connection, $query);
            ?>

                <table class="table table-striped" id="uni_tbl">
                  <thead>
                    <tr>
                      <!-- <th scope="col">#</th> -->
                      <th scope="col">Id</th>
                      <th scope="col">University Id</th>
                      <th scope="col">University Name</th>
                      <th scope="col">University details</th>
                      <th scope="col">Thumbnail img</th>
                      <th scope="col">Main page img</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
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
                                <td> <?php echo $row['UniversityID']; ?> </td>
                                <td> <?php echo $row['Universityname']; ?> </td>
                                <td> <?php echo $row['Universitydetail']; ?> </td>
                                <td> <?php echo $row['Universityimg']; ?> </td>
                                <td> <?php echo $row['Universitymainimg']; ?> </td>
                                <td>
                                <a href="edituni2.php?editid=<?php echo htmlentities ($row['id']);?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                     
                                    
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

              <a href="edituni2.php?editid=<?php echo htmlentities ($row['id']);?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                     
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="http://Hwhelp.me">HWHELP
          </a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>

  <!-- <script src="assets/js/page/admin_js_files/add_uni.js"></script> -->
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
 
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    


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


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->
</html>


