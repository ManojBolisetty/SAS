<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="../static/style.css" rel="stylesheet" type="text/css">
</head>
<body class="bg-dark">

  <!--Modal for Instruction-->
    <div class="modal fade" id="instruction">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Instructions</h4>
                </div>

                <div class="modal-body">
                    <p>You should not close Fullscreen</p>
                    <p>You should not change tab</p>
                    <p>You should not change window</p>
                    <p>If you do any of the above mentioned tasks your test will be submited with no options selected</p>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-outline-primary" href="#" id="start" onclick="openFullscreen()" data-dismiss="modal">Start >></button>
                </div>
            </div>

        </div>
    </div>
    
    <!--Header of the page-->
    <div class="header">
      <div class="container d-flex justify-content-center">
        <div class="logo">
          <div class="row pt-5">
            <div class="col">
               <img class="mx-5"src="../static/images/rgukt.png" alt="logo" align="left" class="title-logo" width="75">
                <div class="h2">Rajiv Gandhi University of Knowledge Technologies-AP</div>
                <div class="h5">Catering to the Educational Needs of Gifted Rural Youth of Andhra Pradesh</div>
               <div class="h5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Established by the Govt. of Andhra Pradesh and recognized as per Section 2(f) of UGC Act, 1956)</div><BR>
      
            </div>
        </div>
      </div>
      </div>
    </div>

          
    <!--Timer-->
    <div class="container d-flex justify-content-end">
      <span id="counter" class="border border-primary rounded">
            
      </span>
    </div>

    <!--Assignemt Card-->
    <div class="invisible container-fluid flex-columns " id="taketest">
        <div class="card  bg-dark m-5 px-5">
        <div class="card-header">
            <center><div class="card-title display-6">Assignment 1</span></div></center>
            <div class="pt-5 m-5" id="test">

            </div>
            <div class="submit card-footer container d-flex justify-content-end"><span class=" subtest btn btn-primary" id="subtest">Submit -></span></div>
        </div>
        </div>

       
    </div>

 <!--Confirmation-->
    <div class="modal fade" id="confirm">
      <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">

              <div class="modal-header">
                  <h4 class="modal-title text-warning">Confimation &#10004;</h4>
              </div>
              
              <div class="modal-body container-sm px-5">
               <div class="info d-flex justify-content-around">
               </div>
               
                <div id="testcon">
                </div>
                
              </div>

              <div class="modal-footer d-flex justify-content-between">
                <div class="submit card-footer container d-flex justify-content-around"><span class="recheck btn btn-danger" data-dismiss="modal">Close</span> <span class=" subtest btn btn-outline-primary" onclick="submit()" data-dismiss="modal" >I Confirm !</span></div>
                  
              </div>
          </div>

      </div>
  </div>

    <!--result-->
    <div class="modal fade" id="result">
      <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">

              <div class="modal-header">
                  <h4 class="modal-title text-success">Result &#10004;</h4>
              </div>
              
              <div class="modal-body container-sm px-5">
               <div class="info d-flex justify-content-around">
                 <span class="text-success">Correct :- ✔ </span>
                 <span class="text-danger">Incorrect :- ✘ </span>
                 <span class="text-warning">No option selected :- ✐ </span>
               </div>
               
                <div id="testres">
                  
                </div>
                
              </div>

              <div class="modal-footer d-flex justify-content-between">
                <div class="text-success" id="score"> </div>
                  <a class="btn btn-outline-primary" id="res"  href="../assignment.html">OK </a>
              </div>
          </div>

      </div>
  </div>
    
    <!--screen change warning-->
    <div class="modal fade" id="warning">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">

              <div class="modal-header">
                  <h4 class="modal-title text-danger">Warning</h4>
              </div>

              <div class="modal-body">
                  You're ristricted to change the full screen mode (or) the tab. You tried to change them, So your test will be submited automatically with <b>NO</b> options selected.
              </div>

              <div class="modal-footer">
                  <button class="btn btn-outline-primary" href="#" id="warn" onclick="submit(0)//openFullscreen()" data-dismiss="modal">OK</button>
              </div>
          </div>

      </div>
  </div>


  <!-- footer -->
  <div class="footer container">
    <footer class="bg-dark text-center text-lg-start">
      <!-- Copyright -->
      <div class="text p-3">
        © 2021 Student Assesment System
      </div>
      <!-- Copyright -->
    </footer>
  </div>

     <script src="../static/test.js"></script>
    
</body>
</html>