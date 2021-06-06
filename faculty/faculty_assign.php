<html lang="en">
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
  header("Location: faculty_login.php");
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="icon" href="../images/rgukt.png">
    <!--BootStrap Links-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <!-- custom css -->
    <link rel="stylesheet" href="../css/sidenav.css"/>
    <link rel="stylesheet" href="../css/style.css"/>
    <link href="static/style.css" rel="stylesheet" type="text/css">
</head>
<body class>
    <!--Header-->
         <!--Header of the page-->
    <!-- <div class="header">
        <div class="container d-flex justify-content-center">
          <div class="logo">
            <div class="row pt-5">
              <div class="col">
                 <img class="mx-5"src="static/images/rgukt.png" alt="logo" align="left" class="title-logo" width="75">
                  <div class="h2">Rajiv Gandhi University of Knowledge Technologies-AP</div>
                  <div class="h5">Catering to the Educational Needs of Gifted Rural Youth of Andhra Pradesh</div>
                 <div class="h5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Established by the Govt. of Andhra Pradesh and recognized as per Section 2(f) of UGC Act, 1956)</div><BR>
        
              </div>
          </div>
        </div>
        </div>
      </div>
     
      <hr>
  
    <hr> -->

    <!--Modal #Number of Questions
    <div class="modal fade" id="questioncount" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        How many Questions in the test ?
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control px-5" id="count" placeholder="Enter the Question">
                    <label for="floatingInput">Enter the count here </label>
                  </div>
                  <div class="modal-footer">
                    <button class="quescount btn btn-outline-primary" onClick="setques()"  id="start" data-dismiss="modal">Done</button>
                  </div>
            </div>
        </div>

    </div>-->
    <input type="checkbox" id="check">
  <!--header area start-->
  <header>
    <label for="check" class="d-none">
      <i class="fa fa-bars" id="sidebar_btn"></i>
    </label>
    <div class="left_area">
      <img src="../images/rgukt.png" alt="" class="main-logo">
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
      <a href="faculty_index.php" onclick="makeActive(this)" class="active"><i class="fa fa-tachometer"></i><span>Dashboard</span></a>
      <a href="faculty_profile.php" onclick="makeActive(this)" class="active"><i class="fa fa-user"></i><span>Profile</span></a>
      <a href="faculty_assign.php" onclick="makeActive(this)" class="active-link"><i class="fa fa-book"></i><span>Assesments</span></a>
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
    <a href="faculty_index.php" onclick="makeActive(this)" class=""><i class="fa fa-tachometer"></i><span>Dashboard</span></a>
    <a href="faculty_profile.php" onclick="makeActive(this)" class="active"><i class="fa fa-user"></i><span>Profile</span></a>
    <a href="faculty_assign.php" onclick="makeActive(this)" class="active-link"><i class="fa fa-book"></i><span>Create Assignment</span></a>
    <a href="faculty_upload.php" onclick="makeActive(this)" class="active"><i class="fa fa-folder"></i><span>Upload Content</span></a>
    <a href="../webteam.html" onclick="makeActive(this)" class="active"><i class="fa fa-users"></i><span>Webteam</span></a>
  </div>
  <!--sidebar end-->
<div class='content'>
    <div class="container d-flex justify-content-center pt-2">
        <div class="display-6"><b>Assignment Upload</b></div>
    </div>
    <!--Count-->
    <div class="container-fluid" id="question_count">

        
        <div class="upload container p-5 ">
            <div class="row">
                <p class="text-warning">Try restarting the page to re-enter the count.</p>
                <p class="text-danger" id="required">You need to enter the count.</p>
                <p class="text-danger" id="required0">Don't be kidding, you need atleast one question !.</p>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border question px-5" id="inp" placeholder="Enter the Question">
                        <label for="floatingInput">Enter the Question Count</label>
                    </div>
                </div>
            </div>
           
        <div class="1"><a class="btn btn-primary float-end" id="count">Next</a></div>
            </div>
        </div>

    </div>

    
    <!--Questions-->
    <div class="container-fluid" id="question_set">
      <div class='upload container p-5'>
        <div class="row">
            
              <div class="display-6 text-center"><b>Questions</b></div>
            
            <form action='./uploadquestion.php' method='POST' class="upload container p-5 ">
                    <div class="form-floating mb-3">
                        <input type="text" name='assign_name' class="form-control border question px-5" required id="" placeholder="Enter the Assignment Name">
                        <label for="floatingInput">Enter the Assignment Name</label>
                    </div>
                <label for="year">Select Year</label><br>
                <select id="year" class="form-control" name="year">
                    <option value="PUC1">PUC1</option>
                    <option value="PUC2">PUC2</option>
                    <option value="E1">E1</option>
                    <option value="E2">E2</option>
                    <option value="E3">E3</option>
                    <option value="E4">E4</option>
                </select>
                <div id="questions">


                </div>

                <div class="1">
                <button type="submit" name='upload_questions' class=" btn btn-primary float-end">Submit</button></div>
            
            </form>
        </div>

      </div>
        
    </div>

    <!-- <footer class="footer page-footer font-small blue  py-5">
        <hr>
        <div class="container-fluid text-center ">
         
          <div class="footer-copyright text-center py-3">© 2021:
            <a href="https://rguktsklm.ac.in/">rguktsklm.ac.in</a>
          </div>
          
        <hr>
    </footer> -->
</div>
 <script src="static/upload.js"></script>
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
</body>
</html>