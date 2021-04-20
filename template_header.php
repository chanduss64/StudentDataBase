

<?php include('header.php'); ?>
<?php //include('server.php'); ?>

<?php 

    session_start();


    //setcookie("UpVal", "0");
    $val=$_COOKIE["UpVal"];


    
  

    $_SESSION['get_student'] = $val;


    

    if (!isset($_SESSION['username'])) {
        //$_SESSION['msg'] = "You must log in first";
        header('location: index.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        setcookie("UpVal", time() - 3600);
        header("location: logout.php");
    }

        $db = mysqli_connect('localhost', 'root', '', 'student');

?>


        <div class="col-md-6 cs-main-links">
          
          <a href="profile_view.php">Profile<span>|</span></a>
          <a href="#" class="cs-menu-active">Services<span>|</span></a>
          <a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?logout='1'">Logout</a>

        </div> <!-- ./ col-md-6 -->

        </div> <!-- ./ row -->

      </div> <!-- ./ container -->

    </div> <!-- ./ cs-headers  -->


<!-- ****************** CS-PROFILE-SECTION ******************* --->


<section class="cs-profle-sec cs-padding-bottom-30">


<div class="container">
  
  <div class="row">
    
    <div class="col-md-8">
      
      <div class="col-md-7 cs-reg-area">
              
              <h3>Personal <b>View</b></h3>

              <hr class="cs-hr" />

              <div class="cs-clearfix"></div>

             </div> <!-- ./ cs-reg-area -->

