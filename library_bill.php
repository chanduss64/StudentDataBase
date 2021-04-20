<?php include('template_header.php'); ?>

 <div class="cs-p-list">

                <div class="row">
                <div class="col-md-3">
                  <h5>Name :</h5>
                  <h5>Aadhar Id :</h5>  
                  <h5>Library Tax :</h5>
                </div>


                    <div class="col-md-9 csss">
                        <?php
                            $uname = $_SESSION['username'];
                            
                            
                            $sql = "SELECT * FROM register where username='$uname'";
                            

                            if($result = mysqli_query($db, $sql)){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                            $aaid = $row['aid'];
                                            echo "<h5><b>" . $row['name'] . "</b></h5>";
                                            echo "<h5 class='cs-p-aad'><b>" . $row['aid'] . "</b></h5>";
                                    }
                                    // Free result set
                                    mysqli_free_result($result);
                                }
                            }

                            


                            $sql2 = "SELECT * FROM bills where aid='$aaid'";

                            if($result2 = mysqli_query($db, $sql2)){
                                if(mysqli_num_rows($result2) > 0){
                                    while($row2 = mysqli_fetch_array($result2)){

                                            $_SESSION['amount'] = $row2['library'];
                                            
                                            echo "<h5> &#8377; " . $row2['library'] . "</h5>";
                                    }
                                    // Free result set
                                    mysqli_free_result($result2);
                                }else{
                                    echo " Not Associated";
                                    $_SESSION['not_assocaited'] = "1";
                                    
                                }
                            }

                             $_SESSION['aid'] = $aaid;
                             //$_SESSION['amount'] = $amount;

                            ?>



                    </div> <!--  ./ csss -->
             		
             		


             		</div> <!-- ./ row -->


             </div> <!-- ./ cs-p-list -->
            
             <div class="cs-padding-20">
                <hr />
            </div> <!-- ./ cs-padding-20 -->

            <div class="col-md-7 cs-reg-area">
              
                <h3>Pay <b>Bill</b></h3>

                <hr class="cs-hr" />

                <div class="cs-clearfix"></div>

             </div> <!-- ./ cs-reg-area -->



             <form action="#" method="post">

                <?php 
                        $alert = '<div class="cs-alert alert alert-success alert-dismissible fade show" role="alert">
              Your Last Payment was <strong>Successful</strong> , Thanks for Paying the Bill !
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>' ;

                        $db = mysqli_connect('localhost', 'root', '', 'sample');
                        if (isset($_POST['bill_pay'])) {
                            $query = "UPDATE bills SET library='0' WHERE aid='$aaid'";

                                mysqli_query($db, $query);
                                header('location: library_bill.php');

                                

                        }


                    ?>




                 <?php 

                    if($_SESSION['not_assocaited'] == 1): ?>
                        <p>Your Account was not yet associated for the bill payment !</p>
                

                <?php elseif($_SESSION['amount'] != 0) : ?>
                 
                <p>You have a bill of <strong>&#8377; <?php echo $_SESSION['amount']; ?> </strong> . Click Pay button to pay the Bill through a payment gateway!</p>

                <button type="submit" name="bill_pay" class="btn btn-primary cs-btn-color">Pay Now</button>

                <?php else: ?>
                  <?php echo $alert; ?>
                    <p>You have no Pending Bill ! </p>

                <?php endif ?>

             </form> <!-- ./ cs_form -->


		</div> <!-- ./ col-md-8 -->

		<div class="col-md-4 cs-sidebar">
			<div class="col-md-7">
              
             	<h5>My <b>Services</b></h5>



            	<div class="cs-clearfix"></div>

             </div> <!-- ./ cs-sidebar -->

             <hr />

            <?php include('sidebar.php'); ?>

		</div>

		
	</div> <!-- ./ row  -->

</div> <!-- ./ container -->


   <div class="cs-padding-bottom-30"></div>
   <div class="cs-padding-bottom-30"></div>

	


</section> <!-- ./ cs-profle-sec -->




<!-- ****************** ./ CS-PROFILE-SECTION ******************* --->


<?php  include('footer.php'); ?>