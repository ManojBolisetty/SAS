<?php
session_start();
include('pages/connection.php');
if(isset($_SESSION['s_id']))
{
  $id=$_SESSION['s_id'];
  $query="select * from students where s_id ='$id' limit 1";
		$result=mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result)>0)
		{
			$user_data =mysqli_fetch_assoc($result);
      $image=$user_data['s_img'];
		}
  $query2="select * from dashboard ";
  $notifications=mysqli_query($conn,$query);

}
else {
  header("Location: login.php");
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
    <link rel="icon" href="images/rgukt.png">
    <!--BootStrap Links-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <!-- custom css -->
    <link rel="stylesheet" href="css/sidenav.css"/>
    <link rel="stylesheet" href="css/style.css"/>
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
      <a href="logout.php" class="logout_btn">Logout</a>
    </div>
  </header>
  <!--header area end-->
  <!--mobile navigation bar start-->
  <div class="mobile_nav">
    <div class="nav_bar">
      <img src="images/profile.jpg" class="mobile_profile_image" alt="">
      <i class="fa fa-bars nav_btn"></i>
    </div>
    <div class="mobile_nav_items">
      <a href="index.php" onclick="makeActive(this)" class="active-link"><i class="fa fa-tachometer"></i><span>Dashboard</span></a>
      <a href="profile.php" onclick="makeActive(this)" class="active"><i class="fa fa-user"></i><span>Profile</span></a>
      <a href="pages/Assignments/assignment.php" onclick="makeActive(this)" class="active"><i class="fa fa-book"></i><span>Assesments</span></a>
      <a href="pages/content.html" onclick="makeActive(this)" class="active"><i class="fa fa-folder"></i><span>Content</span></a>
      <a href="#" onclick="makeActive(this)" class="active"><i class="fa fa-users"></i><span>Webteam</span></a>
    </div>
  </div>
  <!--mobile navigation bar end-->
  <!--sidebar start-->
  <div class="sidebar">
    <div class="profile_info">
      <img src="simage/<?php echo $image; ?>" class="profile_image" alt="">
      <h4 class="text-center"><?php echo $user_data['s_name'];?></h4>
    </div>
    <a href="index.php" onclick="makeActive(this)" class="active-link"><i class="fa fa-tachometer"></i><span>Dashboard</span></a>
    <a href="profile.php" onclick="makeActive(this)" class="active"><i class="fa fa-user"></i><span>Profile</span></a>
    <a href="pages/Assignments/assignment.php" onclick="makeActive(this)" class="active"><i class="fa fa-book"></i><span>Assesments</span></a>
    <a href="pages/content.html" onclick="makeActive(this)" class="active"><i class="fa fa-folder"></i><span>Content</span></a>
    <a href="webteam.html" onclick="makeActive(this)" class="active"><i class="fa fa-users"></i><span>Webteam</span></a>
  </div>
  <!--sidebar end-->

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="container-fluid assignment-completion-details shadow">
            <div class="row">
              <div class="col-12 assignment-summary">
                <h3>Assignments summary <i class="fa fa-tasks"></i></h3>
                <div class="tcp-details">
                  <p class="total-assignments border-bottom">Total: <span class="total">10</span>  </p>
                  <span>
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50"
                        aria-valuemin="0" aria-valuemax="100" style="width:50%">
                        <span class="c-percentage">50% Complete</span>
                    </div>
                  </span>
                  <p class="completed-assignments border-bottom">Completed: <span class="completed">5</span></p>
                  <span>
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50"
                      aria-valuemin="0" aria-valuemax="100" style="width:50%">
                        <span class="p-percentage">50% Pending</span>
                    </div>
                  </span>
                  <p class="pending-assignments border-bottom">Pending: <span class="pending">5</span>  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

          <div class="col-12 col-md-6">
            <div class="container-fluid pt-1">
              <div class="row border bg-white rounded p-1 shadow" >
                <div class="col-12 overflow-auto px-2" style="height:235px;">
                  <h3 class="notifications-heading p-2 mt-1"><b>Notifications</b>
                  <i class="fa fa-bell"></i></h3>
                  <div class="d-flex border-bottom py-1 border-dotted">
                       <div class="p px-2">
                          <a href="#" class='noteLink'>notification1</a>
                       </div>

                  </div>
                  <div class="d-flex border-bottom py-1 border-dotted">
                       <div class="p px-2">
                          <a href="#" class='noteLink'>notification2</a>
                       </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
      </div>

           <div class="row shadow mt-3">
             <div class="col-12 pt-2">
               <h3><b>Results</b></h3>
               <div class="table-responsive">
               <table class="table table-sm">
                  <thead class="thead-dark">
                   <tr>
                     <th scope="col">S.No</th>
                     <th scope="col">Assignment No</th>
                     <th scope="col">Subject1</th>
                     <th scope="col">Subject2</th>
                     <th scope="col">Subject3</th>
                     <th scope="col">Subject4</th>
                     <th scope="col">Subject5</th>
                     <th scope="col">Subject6</th>
                   </tr>
                  </thead>
                  <tbody>
                   <tr>
                     <th scope="row">1</th>
                     <td>1</td>
                     <td>8</td>
                     <td>9</td>
                     <td>10</td>
                     <td>7</td>
                     <td>9</td>
                     <td>6</td>
                   </tr>
                   <tr>
                     <th scope="row">2</th>
                     <td>1</td>
                     <td>8</td>
                     <td>9</td>
                     <td>10</td>
                     <td>7</td>
                     <td>9</td>
                     <td>6</td>
                   </tr>
                  </tbody>
                </table>
              </div>
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
