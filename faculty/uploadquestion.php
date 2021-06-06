<?php
session_start();

 $conn=mysqli_connect('localhost','root','','sas');
 if(isset($_POST['upload_questions'])){
     $question=$_POST['question'];
     $optionA=$_POST['optionA'];
     $optionB=$_POST['optionB'];
     $optionC=$_POST['optionC'];
     $optionD=$_POST['optionD'];
     $key=$_POST['key'];
     
     $fid= $_SESSION['f_id'];
     $assignment_name=$_POST['assign_name'];
     $year=$_POST['year'];

     $faculty_query="SELECT * FROM FACULTY WHERE f_id='$fid' limit 1";
     $fac_result=mysqli_query($conn,$faculty_query);
     $branch =mysqli_fetch_assoc($fac_result)['f_branch'];
    
     
    
    
     $insert_assign="INSERT INTO `assignment`(`as_name`, `fac_id`, `branch`, `year`) VALUES ('$assignment_name',
     '$fid','$branch','$year')";
     $insert_assign=mysqli_query($conn,$insert_assign);

    

     $assignment_id_query="SELECT * FROM assignment where as_name='$assignment_name'";
     $assign_id_result=mysqli_fetch_assoc(mysqli_query($conn,$assignment_id_query));
     $assign_id=$assign_id_result['as_id'];
    

     

     foreach($question as $index => $questions)
     {
         $query="INSERT INTO `questions`(`question`, `option1`, `option2`, `option3`, `option4`, `answer`,`as_id`) VALUES ('$question[$index]','$optionA[$index]','$optionB[$index]'
         ,'$optionC[$index]','$optionD[$index]','$key[$index]','$assign_id')";

        $run=mysqli_query($conn,$query);
     }
    $student_query="select s_id from students where s_branch='$branch' and s_year='$year'";
    $student_result=mysqli_query($conn,$student_query);
    foreach($student_result as $row)
    {
        $sid=$row['s_id'];
        $studentAssign="INSERT INTO `student_assign`(`s_id`, `as_id`, `is_answerd`, `score`) VALUES ('$sid','$assign_id','0','0')";
        mysqli_query($conn,$studentAssign);
    }





 }