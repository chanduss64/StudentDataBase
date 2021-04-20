

<?php include('header.php'); ?>

<?php 

    session_start();

    /* Making the Login Session 'Universal' Bro :D ! */    
    if(isset($_SESSION['username_std'])){
       $_SESSION['username'] = $_SESSION['username_std'];
    }else{
       $_SESSION['username'] = $_SESSION['username_fac'];
    }

    if (!isset($_SESSION['username'])) {
        //$_SESSION['msg'] = "You must log in first";
        header('location: index.php');
    } 



    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']); 
        header("location: logout.php");
    }

        $db = mysqli_connect('localhost', 'root', '', 'student');

?>


        <div class="col-md-6 cs-main-links">
          
          <a href="#"  class="cs-menu-active">Profile<span>|</span></a>
          <a href="#">Services<span>|</span></a>
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

                <?php if(isset($_SESSION['username_std'])): // if the login is from student ?> 

                    <!-- <p>You visited from Student Login </p> ############## -->
                    <h3>Student Profile <b>View</b></h3>

                    <hr class="cs-hr" />

                <div class="cs-clearfix"></div>

             </div> <!-- ./ cs-reg-area -->

             <div class="cs-p-list">

                    <div class="row">
                    <div class="col-md-3">
                        <h5>Name :</h5>
                        <h5>Username:</h5>
                        <h5>Student ID :</h5>
                        <h5>Email :</h5>
                        <h5>Address: </h5>
                        <h5>City: </h5>
                        <h5>PinCode: </h5>
                        <h5>Year of Join :</h5>
                        <h5>Attendence :</h5>
                        <h5>CGPA :</h5>

                    </div> <!-- col-md-3 -->

                    <div class="col-md-9 csss">
                        <?php
                            $uname = $_SESSION['username'];
                            
                            
                            $sql = "SELECT * FROM student where username='$uname'";
                            

                            if($result = mysqli_query($db, $sql)){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                            $std_id = $row['std_id'];
                                            echo "<h5><b>" . $row['name'] . "</b></h5>";
                                            echo "<span class='cs-light-text cs-p-uname'> @" . $row['username'] . "</span>";
                                            echo "<h5 class='cs-p-aad'><b>" . $row['std_id'] . "</b></h5>";

                                            echo "<h5>" . $row['email'] . "</h5>";
                                            echo "<h5>" . $row['adr'] . "</h5>";
                                            echo "<h5>" . $row['city'] . "</h5>";
                                            echo "<h5>" . $row['pin'] . "</h5>";
                                            echo "<h5>" . $row['yoj'] . "</h5>";
                                            echo "<h5>" . $row['attd'] . "</h5>";
                                            echo "<h5>" . $row['cgpa'] . "</h5>";
                                    }
                                    // Free result set
                                    mysqli_free_result($result);
                                }
                            }


                             $_SESSION['std_id'] = $std_id; // SETTING THE SESSION FOR PRIMARY KEY REF IN DB

                            ?>



                    </div> <!-- ./ csss -->
                    
                    


                    </div>


             </div> <!-- ./ cs-p-list -->

        </div> <!-- ./ col-md-8 -->



                <?php else: ?> <!-- ######### ELSE ######### -->

                    <!-- <p>You visited from Faculty Login </p> ############# -->

                    <h3>Faculty Profile <b>View</b></h3>

                    <hr class="cs-hr" />

                <div class="cs-clearfix"></div>

             </div> <!-- ./ cs-reg-area -->

             <div class="cs-p-list">

                    <div class="row">
                    <div class="col-md-3">
                        <h5>Name :</h5>
                        <h5>Username:</h5>
                        <h5>Employee ID :</h5>
                        <h5>Email :</h5>
                        <h5>Address: </h5>
                        <h5>City: </h5>
                        <h5>PinCode: </h5>
                        <h5>Year of Join :</h5>

                    </div> <!-- col-md-3 -->

                    <div class="col-md-9 csss">
                        <?php
                            $uname = $_SESSION['username'];
                            
                            
                            $sql = "SELECT * FROM faculty where username='$uname'";
                            

                            if($result = mysqli_query($db, $sql)){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                            $emp_id = $row['emp_id'];
                                            echo "<h5><b>" . $row['name'] . "</b></h5>";
                                            echo "<span class='cs-light-text cs-p-uname'> @" . $row['username'] . "</span>";
                                            echo "<h5 class='cs-p-aad'><b>" . $row['emp_id'] . "</b></h5>";

                                            echo "<h5>" . $row['email'] . "</h5>";
                                            echo "<h5>" . $row['adr'] . "</h5>";
                                            echo "<h5>" . $row['city'] . "</h5>";
                                            echo "<h5>" . $row['pin'] . "</h5>";
                                            echo "<h5>" . $row['yoj'] . "</h5>";
                                    }
                                    // Free result set
                                    mysqli_free_result($result);
                                }
                            }


                            

                             $_SESSION['emp_id'] = $emp_id; // SETTING THE SESSION FOR PRIMARY KEY REF IN DB

                            ?>



                    </div> <!-- ./ csss -->
                    
                    


                    </div>


             </div> <!-- ./ cs-p-list -->

        </div> <!-- ./ col-md-8 -->


                <?php endif; ?>
              


		<div class="col-md-4 cs-sidebar">
			<div class="col-md-7">
              
             	<h5>My <b>Services</b></h5>



            	<div class="cs-clearfix"></div>

             </div> <!-- ./ cs-sidebar -->

             <hr />

               <?php if(isset($_SESSION['username_std'])): // if the login is from Student ?> 

                    <?php include('sidebar_s.php'); ?>

               <?php else:  // if the login is from Faculty  ?>

                    <?php include('sidebar_f.php'); ?>

                <?php endif; ?>


		</div>

		
	</div> <!-- ./ row  -->

</div> <!-- ./ container -->


   <div class="cs-padding-bottom-30"></div>

	


</section> <!-- ./ cs-profle-sec -->




<!-- ****************** ./ CS-PROFILE-SECTION ******************* --->


<?php  include('footer.php'); ?>