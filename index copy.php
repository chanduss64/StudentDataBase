<?php
    if(!isset($_SESSION)) 
    { 
        // To Prevent the slide b/w the re-login pages after logout
        session_start(); 
        session_destroy();
    } 
?>

<?php include('server.php'); ?>
<?php include('header.php'); ?>

        <div class="col-md-6 cs-main-links cs-pull-right">
          
          <a href="#">Register<span>|</span></a>
          <a href="#">Login</a>

        </div> <!-- ./ col-md-6 -->

        </div> <!-- ./ row -->

      </div> <!-- ./ container -->

    </div> <!-- ./ cs-headers  -->

 <section>
      

      <div class="cs-body-section">
        
        <div class="container">

           <div class="row col-md-10">

            <div class="cs-alert alert alert-primary alert-dismissible fade show" role="alert">
              Welcome to the <strong>Grama Panchayat Service.</strong> Register or Login for services
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div> <!-- ./ cs-alert -->

          </div> <!-- ./ row & col-md-10 -->

          <!-- ======================== REGISTRATION FORM ===========================  -->


          <div class="row">
          
          <div class="col-md-7 cs-reg-area">
              
             <h3>Register <b>Now</b></h3>

             <hr class="cs-hr" />

            <div class="cs-clearfix"></div>

             <form method="post" id="regis_form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">

              <?php include('errors.php'); ?> 
              <?php include('success.php'); ?> 


                <div class="form-row">

                  <div class="form-group col-md-12">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Enter Your name" name="name" >
                  </div> <!-- ./ form-group -->

                  <div class="form-group col-md-12">
                    <label>Username</label>
                    <input type="text" class="form-control" placeholder="Enter Username" name="username" >
                  </div> <!-- ./ form-group -->

                  <div class="form-group  col-md-12">
                    <label>Aadhaar ID</label>
                     <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" maxlength = "12" placeholder="Enter Aadhaar" name="aid" required>
                     
                  </div> <!-- ./ form-group -->

                  <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Enter Your Email" name="email_1" >
                  </div> <!-- ./ form-group -->

                  <div class="form-group col-md-6">
                    <label>Confirm Email</label>
                    <input type="email" class="form-control" placeholder="Confirm Your Email " name="email_2">

                  </div> <!-- ./ form-group -->

                  
                  <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="pass_1">
                  </div> <!-- ./ form-group -->

                   <div class="form-group col-md-6">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirm Password"  name="pass_2">
                  </div> <!-- ./ form-group -->

                </div> <!-- ./ form-row -->

                <div class="form-group">
                  <label>Address</label>
                    <input type="text" class="form-control" placeholder="1234 Main St" name="adr_1">

                </div> <!-- ./ form-group -->

                <div class="form-group">
                  <label>Address 2</label>
                  <input type="text" class="form-control" name="adr_2" placeholder="Apartment, studio, or floor" >
                </div> <!-- ./ form-group -->

                <div class="form-row">

                  <div class="form-group col-md-6">
                    <label>City</label>
                    <input type="text" class="form-control" name="city" >
                  </div> <!-- ./ form-group -->

                  <div class="form-group col-md-4">
                    <label>State</label>
                    <select class="form-control" name="state" >
                      <option selected>Select...</option>
                      <option>Andhra Pradesh</option>
                      <option>Telangana</option>
                    </select>
                  </div> <!-- ./ form-group -->

                  <div class="form-group col-md-2">
                    <label>Zip</label>
                    <input type="text" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="zipcode"  maxlength = "6" required >
                  </div> <!-- ./ form-group -->
                
                </div> <!-- ./ form-row -->
              
                <button type="submit" name="push" class="btn btn-primary cs-btn-color">Register Now</button>
               

            </form> <!-- ./ register-form -->
       

          </div> <!-- ./ col-md-7 -->


          <!-- ======================== REGISTRATION FORM ===========================  -->



          <div class="cs-login-area col-md-5">

       
              
             <h3>Login <b>Area</b></h3>

             <hr class="cs-hr" />

             <div class="cs-clearfix"></div>

             <p>If already registered , then Login here !</p>

             <hr />



             <!-- ======================== LOGIN FORM ===========================  -->


             <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" >

              <?php include('errors_login.php'); ?> 

              <div class="form-row">

                   <div class="form-group col-md-12">
                    <label>Username</label>
                    <input type="text" class="form-control" placeholder="Enter Username" name="username_l" >
                  </div> <!-- ./ form-group -->

                  <div class="form-group col-md-12">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="pass_l">
                  </div> <!-- ./ form-group -->

              
              
                <button type="submit" name="push_login"  class="btn btn-primary cs-btn-color">Login Here</button>
               




              </div> <!-- ./ form-row -->

            </form> <!-- ./ form -->

             <!-- ======================== ./ LOGIN FORM ===========================  -->


          </div> <!-- ./ col-md-5 -->


        </div> <!--  ./ row -->

        </div> <!-- ./ container -->

      </div> <!-- ./ cs-body-section -->



    </section>


<?php include('footer.php'); ?>