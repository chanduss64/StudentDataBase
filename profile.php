<?php include('header.php'); ?>
<?php
$db = mysqli_connect('localhost', 'root', '', 'register');





?>

        <div class="col-md-6 cs-main-links">
          
          <a href="#"  class="cs-menu-active">Profle<span>|</span></a>
          <a href="#">Services<span>|</span></a>
          <a href="logout.php">Logout</a>

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
              
             	<h3>Profile <b>View</b></h3>

             	<hr class="cs-hr" />

            	<div class="cs-clearfix"></div>

             </div> <!-- ./ cs-reg-area -->

             <div class="cs-p-list">

             		<div class="row">
             		<div class="col-md-3">
             			<h5>Name :</h5>
             			<h5>Username:</h5>
             			<h5>Aadhar Id :</h5>
             			<h5>Email :</h5>
             			<h5>Address: </h5>
             			<h5>City: </h5>
             			<h5>PinCode: </h5>
             		</div>
             			
             		<div class="col-md-9 csss">
                        <?php

                            
                            $sql = "SELECT * FROM users";
                            if($result = mysqli_query($db, $sql)){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                            echo "<h5><b>" . $row['fname'] . "</b></h5>";
                                            echo "<span class='cs-light-text cs-p-uname'> @" . $row['uname'] . "</span>";
                                            echo "<h5 class='cs-p-aad'><b>" . $row['aid'] . "</b></h5>";

                                            echo "<h5>" . $row['email_2'] . "</h5>";
                                            echo "<h5>" . $row['adr_1'] . "</h5>";
                                            echo "<h5>" . $row['city'] . "</h5>";
                                            echo "<h5>" . $row['zipcode'] . "</h5>";

                                    }
                                    // Free result set
                                    mysqli_free_result($result);
                                }
                            }

                            ?>

             		</div>
             		
             		


             		</div>


             </div> <!-- ./ cs-p-list -->

		</div> <!-- ./ col-md-8 -->

		<div class="col-md-4 cs-sidebar">
			<div class="col-md-7">
              
             	<h5>My <b>Services</b></h5>



            	<div class="cs-clearfix"></div>

             </div> <!-- ./ cs-sidebar -->

             <hr />

             <ul>	
             	
             	<li><a href="#">Water tax</a></li>
             	<li><a href="#">House tax</a></li>
             	<li><a href="#">Wealth tax</a></li>
             	<li><a href="#">Library tax</a></li>
             	<li><a href="#">Phone bill</a></li>
             	<li><a href="#">Electricity bill</a></li>

             </ul>

		</div>

		
	</div> <!-- ./ row  -->

</div> <!-- ./ container -->


   <div class="cs-padding-bottom-30"></div>

	


</section> <!-- ./ cs-profle-sec -->




<!-- ****************** ./ CS-PROFILE-SECTION ******************* --->


<?php  include('footer.php'); ?>