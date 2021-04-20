

<?php



 include('template_header.php'); ?>


 <div class="cs-p-list">

                <div class="row">
                <div class="col-md-3">
                  <h5>Name :</h5>
                  <h5>Aadhar Id :</h5>  
                   <h5>Subjects Assigned :</h5>
                </div>


                    <div class="col-md-9 csss">
                        <?php
                            $uname = $_SESSION['username'];
                            
                            
                            $sql = "SELECT * FROM faculty where username='$uname'";
                            

                            if($result = mysqli_query($db, $sql)){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                            $emp_id = $row['emp_id'];
                                            echo "<h5><b>" . $row['name'] . "</b></h5>";
                                            echo "<h5 class='cs-p-aad'><b>" . $row['emp_id'] . "</b></h5>";
                                    }
                                    // Free result set
                                    mysqli_free_result($result);
                                }
                            }

                        

                             $_SESSION['emp_id'] = $emp_id;

                              $sql = " SELECT cname FROM courses where c_id in (SELECT c_id FROM enrol where emp_id='$emp_id')"; 
                            

                            if($result2 = mysqli_query($db, $sql)){
                                if(mysqli_num_rows($result2) > 0){
                                    while($row2 = mysqli_fetch_array($result2)){
                                            echo  "" . $row2['cname'] . "<br />";

                                    }
                                    // Free result set
                                    mysqli_free_result($result2);
                                }
                            }
                            

                            ?>



                    </div> <!--  ./ csss -->
             		
             		


             		</div> <!-- ./ row -->


             </div> <!-- ./ cs-p-list -->
            
             <div class="cs-padding-20">
                <hr />
            </div> <!-- ./ cs-padding-20 -->

            <div class="col-md-7 cs-reg-area">
              
                <h3>Post <b>Attendence</b></h3>

                <hr class="cs-hr" />

                <div class="cs-clearfix"></div>

             </div> <!-- ./ cs-reg-area -->

            


             <?php if($_SESSION['get_student'] != "1"): ?>

             <form action="conf.php" method="post">

               <div class="form-group col-md-6">
                    <label>Select Subject to Post Attendence :</label>
                    <select class="form-control" name="cname" required>
                      <!-- <option selected>Select...</option> -->
                      <?php
                      $sql = " SELECT cname, c_id FROM courses where c_id in (SELECT c_id FROM enrol where emp_id='$emp_id')"; 
                           

                            if($result2 = mysqli_query($db, $sql)){
                                if(mysqli_num_rows($result2) > 0){
                                    while($row2 = mysqli_fetch_array($result2)){
                                            echo  "<option>" . $row2['cname'] . "</option>";

                                    }
                                    // Free result set
                                    mysqli_free_result($result2);
                                }
                            }
                            

                            ?>
                    </select>
                  </div> <!-- ./ form-group -->

                  <button type="submit" name="get_std" class="btn btn-primary cs-btn-color">Get Students</button>
                

             </form> <!-- ./ cs_form -->

             <?php else:  ?>


              <?php

              $txt = "";

              function cs_switch(){

              if (isset($_POST['post_marks'])){
                echo ''. htmlentities($_SERVER['PHP_SELF']);;
              } 

              if (isset($_POST['reset_filter'])){
                echo "conf.php";
                $txt = "conf.php";

              }



            }



              ?>


               <form action="<?php cs_switch(); ?>" method="post">


                <?php



                         $cname = $_COOKIE["cname"];
                          $users = array();
                          $err_f_s = array();
                          $err_f_e = array();
                          $usr_val = 0;
                          $_SESSION['fac_err'] = 0;
                          $_SESSION['std_err'] = 0;

                        ?>



                 <?php
                      $sql = "SELECT name, std_id from student WHERE std_id in (SELECT std_id from enrol WHERE c_id in(SELECT c_id from courses WHERE cname='$cname'))"; 
                      
                      
                      ?>


                      


                           <?php if($result2 = mysqli_query($db, $sql)): ?>
                                
                                <?php if(mysqli_num_rows($result2) > 0): ?>

                                  <div class="cs-margin-bottom-30">

                                    <?php echo 'Post Attendence for <b>' . $cname . ': </b>'; ?>


                                   </div> <!-- ./ cs-padding-20 -->

                                    
                                    <?php while($row2 = mysqli_fetch_array($result2)): ?>
                                      

                                      <div class="form-group row">
                                      <label class='col-md-3'><?php echo $row2['std_id'] ?></label>
                                      <?php 
                                       $users[$usr_val] = $row2['std_id'];

                                      ?>
                                       <label class='col-md-3'><?php echo $row2['name'] ?> </label>
                                        <!--<input type='text' class='col-md-4 form-control' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='marks'  maxlength = '6' placeholder='Enter Marks here' > -->
                                        <input type='text' class='col-md-4 form-control' onkeypress='return event.charCode >= 48 && event.charCode <= 57' name='<?php echo "marks_". $usr_val ?>'  maxlength = '6' placeholder='Enter Attendence here'  > 
                                      
                                      <?php $usr_val++; ?>

                                      </div> <!-- ./ form-group -->
                                        

                                    <?php endwhile; ?>
                                    <?php mysqli_free_result($result2); ?>

                                <?php endif; ?>
                            <?php endif; ?>

                            <?php 

                              for ($n=0; $n <count($users) ; $n++) { 
                                $_SESSION['std_'.$n] = $users[$n];
                                //$_SESSION['marks_'.$n] = $_POST['marks_'.$n];
                                //echo $_COOKIE['c_id'] . "  ";
                                //echo $emp_id . "  ";
                                //echo $_SESSION['std_'.$n];
                                //echo " " . $_SESSION['marks_'.$n] . "<br />";

                              }

                              if (isset($_POST['post_marks'])){
                                for ($n=0; $n <count($users) ; $n++) { 

                                //$_SESSION['std_'.$n] = $users[$n];
                                $_SESSION['marks_'.$n] = $_POST['marks_'.$n];
                                //echo $_COOKIE['c_id'] . "  ";
                                //echo $emp_id . "  ";
                                //echo $_SESSION['std_'.$n];
                                //echo " " . $_SESSION['marks_'.$n] . "<br />";
                                }

                                $cc = $_COOKIE['c_id'];
                                

                                  //echo "Hey" .$_SESSION['marks_1'];

                                  for ($n=0; $n <count($users) ; $n++) { 

                                    //function ss(){
                                    
                                   //}

                                    
                                  
                                    $user_check_query = "SELECT * FROM attendence WHERE c_id='$cc' AND std_id='$users[$n]' LIMIT 1";
                                    $result = mysqli_query($db, $user_check_query);
                                    $user = mysqli_fetch_assoc($result);
                                    
                                    //if ($user){// if user exists
                                      if ((!$user['c_id'] == $cc) && (!$user['std_id'] == $users[$n]) ) {
                                         //echo "YES ";
                                        $mm = $_SESSION['marks_'.$n];
                                  $query = "INSERT INTO attendence (c_id,std_id,emp_id,attendence) VALUES('$cc','$users[$n]','$emp_id','$mm')";
                                  mysqli_query($db, $query);
                                   if(!$n > 0){ // SETTING LIMIT FTO PUSH ERROR ONCE
                                             array_push($err_f_s, "<strong>Attendence</strong> Entered Successfully");
                                            //echo "Dupli";
                                          }else{
                                            continue;
                                          }
                                       }
                                       else{
                                          if(!$n > 0){ // SETTING LIMIT FTO PUSH ERROR ONCE
                                             array_push($err_f_e, "<strong>Attendence</strong> Already exists");
                                            //echo "Dupli";
                                          }else{
                                            continue;
                                          }
                                        } 

                                       //}
                                       //else{
                                        //echo "none !";
                                       //}

                                     //endif;

                                      //$abc = $user?((($user['c_id'] === $cc) && ($user['std_id'] === $users[$n]))?($n):(ss())):($n);
                                    
                               
                               } // for



                              }
                             

                              

                            ?>

                      <?php include('errors_interface.php');?>
                      <?php echo $txt; ?>
  
                      <?php if(!$txt == 'conf.php'):?>
                      <button type="submit" name="post_marks" class="btn btn-primary cs-btn-color">Post Attendence</button>
                    <?php endif; ?>
                      <button type="submit" name="reset_filter" class="btn btn-primary cs-btn-color">Reset Filter</button>

                   </form> <!-- ./ cs-form -->






           <?php endif; ?>
             

                    



		</div> <!-- ./ col-md-8 -->

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
   <div class="cs-padding-bottom-30"></div>

	


</section> <!-- ./ cs-profle-sec -->




<!-- ****************** ./ CS-PROFILE-SECTION ******************* --->


<?php  include('footer.php'); ?>