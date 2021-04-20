<?php 

$c_id = 0;
$std_id = 0;

$db = mysqli_connect('localhost', 'root', '', 'student');


if (isset($_POST['get_std'])) {
   
    $cname = mysqli_real_escape_string($db, $_POST['cname']); // FETCHING CNAME 
    $fetch_cname = "SELECT c_id,cname from courses WHERE cname='$cname'";
      $c_id_res = mysqli_query($db, $fetch_cname);
      $user = mysqli_fetch_assoc($c_id_res);

      
      $c_id = $user['c_id']; // FETCHING C_ID
      $cname = $user['cname']; // FETCHING CNAMW
      setcookie("c_id", $c_id);
      setcookie("cname", $cname);

      //echo $v2;

    $fetch_std_id = "SELECT std_id from student WHERE std_id in (SELECT std_id from enrol WHERE c_id in(SELECT c_id from courses WHERE cname='$cname'))"; 
      $std_id_res = mysqli_query($db, $fetch_std_id);
      $user_1 = mysqli_fetch_assoc($std_id_res);


      $std_id= $user_1['std_id']; // FETCHING STD_ID
      setcookie("std_id", $std_id);

      //echo $v3;
     
    $_SESSION['get_student'] = "1";
    //echo  $_SESSION['get_student'];
    
  setcookie("UpVal", "1");
   header('location: marks_fac.php');

   // $v1  = $v1 + $y2;

}


if (isset($_POST['reset_filter'])) {
  setcookie("UpVal", time() - 3600);
  setcookie("UpVal", "0");
  //echo $_SESSION['std_0'];
  $txt="conf.php";


   header('location: marks_fac.php');

}




//echo $y2;

/*

 
  class PostMarks
  {

    public $empid, $c_id, $std_id, $marks;
    public $c2 = 0;

    
    function __construct($c_id, $std_id, $c2)
    {
      $this->c_id = $c_id;
      $this->std_id = $std_id;

      $this->c2 += $c_id;
    }



  }



    $obj = new PostMarks($c_id, $std_id, $c_id); 
    echo $obj->c_id;
    echo $obj->std_id;

    echo $obj->c2;


    //$c2 += $c_id;

    //echo $c2;*/
   

?>