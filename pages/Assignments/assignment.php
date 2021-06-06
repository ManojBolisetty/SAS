<?php
session_start();
include('../connection.php');
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
  header("Location: ../../login.php");
}
 ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="static/style.css" rel="stylesheet" type="text/css">


</head>
<body class="bg-dark">
<div class="modal fade" id="examName" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">See Student Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action='setup_assignment.php' method='POST'>
        <div class="modal-body">

            <div class="form-group">
                <input type='hidden' name='asid' id='asid' class='form-control' placeholder='Enter First Name'>
                <input type='hidden' name='asname' id='asname' class='form-control' placeholder='Enter First Name'>
            </div>
            <div class="form-group">
              <h4 class='text-center'>Do You want to Attempt <br> <p style='color: green;' class='text-center asname' id=''></p></h4>
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

    <div class='container-fluid '>

        <!-- Navigation-->
        <div class="container-fluid pt-5 jumbotron-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-center">
                <div class="container-lg d-flex justify-content-between">
                    <a class="navbar-brand" href="#"><span class="title text-light display-6" >Student Assesment System</span></a>
                    <div class="a"><a href="../../index.php" class="btn btn-outline-primary">Home</a></div>
                </div>
              </nav>
        </div>

        
        <div class="assignment container  border">
            <div class="flex-column py-2">
            <div class="display-6 d-flex justify-content-center align-self-center"><u><i>Assignments</i></u></div>
            <div class="p-5 " id="assigned">


            </div>
        </div>
        

        </div>



    </div>
    <script src="static/assignment.js"></script>

    <script src="static/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){

            $('.taketest').on('click', function()
            {
                var title=$(this).attr("name");
                $('#examName').modal('show');
                $('.asname').text(title);
                $('#asname').val(title);
            });


        });
    </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>    
    <script src='https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js'></script>
</body>
</html>
