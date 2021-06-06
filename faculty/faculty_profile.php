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
    <!-- custom css -->
    <link rel="stylesheet" href="../css/sidenav.css"/>
    <link rel="stylesheet" href="../css/style.css"/>
  </head>
  <body>

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
      <a href="faculty_index.php" onclick="makeActive(this)" class="active"><i class="fa fa-tachometer"></i><span>Dashboard</span></a>
      <a href="faculty_profile.php" onclick="makeActive(this)" class="active-link"><i class="fa fa-user"></i><span>Profile</span></a>
      <a href="faculty_assign.php" onclick="makeActive(this)" class="active"><i class="fa fa-book"></i><span>Create Assignment</span></a>
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
    <a href="faculty_index.php" onclick="makeActive(this)" class="active"><i class="fa fa-tachometer"></i><span>Dashboard</span></a>
    <a href="faculty_profile.php" onclick="makeActive(this)" class="active-link"><i class="fa fa-user"></i><span>Profile</span></a>
    <a href="faculty_assign.php" onclick="makeActive(this)" class="active"><i class="fa fa-book"></i><span>Create Assignment</span></a>
    <a href="faculty_upload.php" onclick="makeActive(this)" class="active"><i class="fa fa-folder"></i><span>Upload Content</span></a>
    <a href="../webteam.html" onclick="makeActive(this)" class="active"><i class="fa fa-users"></i><span>Webteam</span></a>
  </div>
  <!--sidebar end-->
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 border shadow p-1 bg-dark">
              <h4 class="mx-1 text-white"><i class="fa fa-user"></i><span class="px-3">Profile</span></h4>
            </div>
          </div>
          <div class="row pt-4">
            <div class="col-12 shadow  d-flex flex-row justify-content-center">
                <img src="../fimage/<?php echo $image; ?>" class="profile_image" alt="" style="width:20%;" class="profile-img shadow">
            </div>
          </div>
          <div class="row pt-3 mt-3 profile-details shadow" style="height:280px;">
              <div class="col-12 border-bottom pt-2 bg-dark text-white">
                <span class="mx-3"><b>Name &nbsp&nbsp&nbsp:</b> <span class="profile-name ml-4"><?php echo $user_data['f_name'];?></span></span>
              </div>
              <div class="col-12 border-bottom pt-2">
                <span class="mx-3"><b>ID&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</b>
                  <span class="profile-id ml-4"><?php echo $user_data['f_id'];?></span></span>
              </div>
              <div class="col-12 border-bottom pt-2 bg-dark text-white">
                  <span class="mx-3"><b>Branch&nbsp:</b> <span class="profile-branch ml-4"><?php echo $user_data['f_branch'];?></span></span>
              </div>
              <div class="col-12 border-bottom pt-2">
                                  <span class=""><b>Designation&nbsp;:</b>
                                    <span class="profile-year ml-4"><?php echo $user_data['f_pos'];?></span></span>
              </div>
              <div class="col-12 border-bottom pt-2 bg-dark text-white">
                <span class="mx-3"><b>E-mail&nbsp&nbsp&nbsp:</b>
                  <span class="profile-year ml-4"><?php echo $user_data['f_mail'];?></span></span>
              </div>
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
  </body>
</html>
