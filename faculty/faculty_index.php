<?php
session_start();
include('../pages/connection.php');
if(isset($_SESSION['f_id']))
{
  $id=$_SESSION['f_id'];
  $query="select * from faculty where f_id ='$id' limit 1";
		$result=mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result)>0)
		{
			$user_data =mysqli_fetch_assoc($result);
      $image=$user_data['f_img'];
		}
  $query2="select * from dashboard ";
  $notifications=mysqli_query($conn,$query);

}
else {
  header("Location: ../faculty_login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="description" content="Student Assessment System">
    <meta name="keywords" content="StudentAssessmentSystem,SAS,rgukt,sasrgukt,iiit,iiitsklm">
    <meta name="author" content="KumarReddi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Assessment System</title>
    <link rel="icon" href="../images/rgukt.png">
    <!--BootStrap Links-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="../css/sidenav.css"/>
    <link rel="stylesheet" href="../css/style.css"/>
  </head>
  <body>
<div class="modal fade" id="viewData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">See Student Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action='session_assignment.php' method='POST'>
        <div class="modal-body">

            <div class="form-group">
                <input type='hidden' name='asid' id='asid' class='form-control' placeholder='Enter First Name'>
                <input type='hidden' name='asname' id='asname' class='form-control' placeholder='Enter First Name'>
            </div>
            <div class="form-group">
              <h4 class='text-center'>Do You want to see the details of <br> <p style='color: green;' class='text-center asname' id=''></p></h4>
            </div>

            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <button type="submit" name="yes" class="btn btn-primary">Yes</button>
        </div>
      </form>
    </div>
  </div>
</div>

  <input type="checkbox" id="check">
  <!--header area start-->
  <header>
    <label for="check" class="d-none">
      <i class="fa fa-bars" id="sidebar_btn"></i>
    </label>
    <div class="left_area">
      <img src="images/rgukt.png" alt="" class="main-logo">
      <h3><span>S</span>tudent <span>A</span>ssessment <span>S</span>ystem</h3>
    </div>
    <div class="right_area">
      <a href="faculty_logout.php" class="logout_btn">Logout</a>
    </div>
  </header>
  <!--header area end-->
  <!--mobile navigation bar start-->
  <div class="mobile_nav">
    <div class="nav_bar">
      <img src="../fimage/<?php echo $image; ?>"  class="mobile_profile_image" alt="">
      <i class="fa fa-bars nav_btn"></i>
    </div>
    <div class="mobile_nav_items">
      <a href="faculty_index.php" onclick="makeActive(this)" class="active-link"><i class="fa fa-tachometer"></i><span>Dashboard</span></a>
      <a href="faculty_profile.php" onclick="makeActive(this)" class="active"><i class="fa fa-user"></i><span>Profile</span></a>
      <a href="pages/Assignments/assignment.html" onclick="makeActive(this)" class="active"><i class="fa fa-book"></i><span>Assesments</span></a>
      <a href="faculty_upload.php" onclick="makeActive(this)" class="active"><i class="fa fa-folder"></i><span>Upload Content</span></a>
      <a href="../webteam.html" onclick="makeActive(this)" class="active"><i class="fa fa-users"></i><span>Webteam</span></a>
    </div>
  </div>
  <!--mobile navigation bar end-->
  <!--sidebar start-->
  <div class="sidebar">
    <div class="profile_info">
      <img src="../fimage/<?php echo $image; ?>" class="profile_image" alt="">
      <h4 class="text-center"><?php echo $user_data['f_name'];?></h4>
    </div>
    <a href="faculty_index.php" onclick="makeActive(this)" class="active-link"><i class="fa fa-tachometer"></i><span>Dashboard</span></a>
    <a href="faculty_profile.php" onclick="makeActive(this)" class="active"><i class="fa fa-user"></i><span>Profile</span></a>
    <a href="faculty_assign.php" onclick="makeActive(this)" class="active"><i class="fa fa-book"></i><span>Create Assignment</span></a>
    <a href="faculty_upload.php" onclick="makeActive(this)" class="active"><i class="fa fa-folder"></i><span>Upload Content</span></a>
    <a href="../webteam.html" onclick="makeActive(this)" class="active"><i class="fa fa-users"></i><span>Webteam</span></a>
  </div>
  <!--sidebar end-->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-12 shadow">
          <?php 
            $faculty_assignments="SELECT * FROM assignment where fac_id='$id'";
            $assign_result=mysqli_query($conn,$faculty_assignments);
          ?>
          <h4 class="text-center mt-3">
            No of Assignments Created :<span class='ml-3'><?php echo mysqli_num_rows($assign_result)?></span>
          </h4>
          <div class="card mb-5 mt-5">
            <div class="card-body h-100 overflow-auto">
              <table class="table  table-hover" id='assignment_data'>
                  <thead class='table-dark'>
                    <tr>
                      <th scope='col'>Assignment Id</th>
                      <th scope='col'>Assignment Name</th>
                      <th scope='col'>No of students Attempted</th>
                      <th scope='col'>View</th>
                    </tr>
                  </thead>
                  <tbody class='table-secondary'>
                    <?php 
                      foreach($assign_result as $row)
                      {
                        $aid=$row['as_id'];
                        $noof="SELECT * from student_assign where as_id='$aid' and is_answerd=1";
                        $no_of_students=mysqli_query($conn,$noof);
                        ?>
                        <tr class=''><td> <?php echo $row['as_id']?></td>
                        <td><?php echo $row['as_name']?></td>
                        <td><?php echo mysqli_num_rows($no_of_students);?></td>
                        <td><button class='btn btn-primary viewbtn'>View</button></td></tr>

                    <?php  
                      }
                    
                    ?>
                  </tbody>
              </table>
            </div>
          </div>

        </div>
        <?php
          if(isset($_SESSION['asid']))
          {
            $aid=$_SESSION['asid'];
            unset($_SESSION['asid']);
            $noof="SELECT * from student_assign where as_id='$aid' and is_answerd=1";
            $no_of_students=mysqli_query($conn,$noof);
            
            
            ?>
            <div class="col-12 mt-5 shadow">
              
              <h5 class='attempt text-center mt-2'> No of Students Attempted: <?php echo mysqli_num_rows($no_of_students);?></h5>
              <p style='font-weight:bold;'>Assignment Name: <?php echo $_SESSION['asname']?></p>
              <p style='font-weight:bold;'>Assignment Id:<?php echo $aid?></p>
               <div class="card mt-4 mb-2">
               <div class="card-body">
                  <table class='table table-dark table-hover mt-5 mb-3'>
                    <thead>
                      <th scope='col'>Student Id</th>
                      <th scope='col'>Student Name</th>
                      <th scope='col'>Class</th>
                      <th scope='col'>Student Score</th>
                      <th scope='col'>Attempted</th>
                    </thead>
                    <tbody>
                      <?php
                        $noof="SELECT * from student_assign where as_id='$aid'";
                        $no_of_students=mysqli_query($conn,$noof);
                        foreach($no_of_students as $row)
                        {
                          $sid=$row['s_id'];
                          $sdetails="SELECT * FROM STUDENTS WHERE s_id='$sid'";
                          $run=mysqli_fetch_assoc(mysqli_query($conn,$sdetails));?>
                          <tr>
                            <td><?php echo $sid?></td>
                            <td><?php echo $run['s_name']?></td>
                            <td><?php echo $run['s_class']?></td>
                            <td><?php echo $row['score']?></td>
                            <td>
                              <?php 
                                if($row['is_answerd']==1)
                                {
                                  echo 'Yes';
                                }
                                else{
                                  echo 'No';
                                }?>
                            </td>
                          </tr>

                      <?php  }
                      
                      ?>
                    </tbody>
                  </table>

               </div>
                   
                
                  
                
               </div>
           
            </div>

        <?php    
          }
        ?>
        
      </div>
    </div>
  
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });

    function makeActive(a)
    {
      items = document.querySelectorAll('.active-link');
      if(items.length)
      {
          items[0].className = 'active';
      }
      a.className = 'active-link';
    }
  </script>
  
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>    
    <script src='https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js'></script>
    <script>	
        $(document).ready(function() {
            $('.table').DataTable();
        } );
    </script>
    <script>
        $(document).ready(function(){

            $('.viewbtn').on('click', function()
            {
                $('#viewData').modal('show');
                $tr=$(this).closest('tr');
                var data=$tr.children('td').map(function(){
                    return $(this).text();
                }).get();
                $('#asid').val(data[0]);
                $('.asname').text(data[1]);
                $('#asname').val(data[1]);
                

            });


        });
    </script>

</body>

</html>
