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

        <!--<div class="col-md-6 cs-main-links cs-pull-right">
          
          <a href="#">Register<span>|</span></a>
          <a href="#">Login</a>

        </div> --> <!-- ./ col-md-6  -->

        </div> <!-- ./ row -->

      </div> <!-- ./ container -->

    </div> <!-- ./ cs-headers  -->

 <section>
      

      <div class="cs-body-section">


        
        <div class="container">

           <div class="row col-md-10">

            <div class="cs-alert alert alert-primary alert-dismissible fade show" role="alert">
              Welcome to the <strong>Student Information Portal</strong> Login for services !
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div> <!-- ./ cs-alert -->

          </div> <!-- ./ row & col-md-10 -->


          <!-- ======================== REGISTRATION FORM ===========================  -->


          <div class="row">
          
          <div class="col-md-6 cs-reg-area">
              
             <h3>Faculty <b>Login</b></h3>

               <hr class="cs-hr" />

             <div class="cs-clearfix"></div>

              <p>Faculty with their crenditals can Login here !</p>

             <hr />


             <form method="post" id="regis_form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">

              <?php include('errors_login_f.php'); ?> 
             
               <div class="form-row">

                   <div class="form-group col-md-12">
                    <label>Username</label>
                    <input type="text" class="form-control" placeholder="Enter Username" name="username_f" >
                  </div> <!-- ./ form-group -->

                  <div class="form-group col-md-12">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="pass_f">
                  </div> <!-- ./ form-group -->

              
              
                <button type="submit" name="cs_fac_login"  class="btn btn-primary cs-btn-color">Login Here</button>
               




              </div> <!-- ./ form-row -->

               

            </form> <!-- ./ register-form -->
       

          </div> <!-- ./ col-md-7 -->


          <!-- ======================== REGISTRATION FORM ===========================  -->



          <div class="cs-login-area col-md-6">

       
              
             <h3>Student <b>Login</b></h3>

             <hr class="cs-hr" />

             <div class="cs-clearfix"></div>

             <p>Students with their crenditals can Login here !</p>

             <hr />



             <!-- ======================== LOGIN FORM ===========================  -->


             <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" >

              <?php include('errors_login_s.php'); ?> 

              <div class="form-row">

                   <div class="form-group col-md-12">
                    <label>Username</label>
                    <input type="text" class="form-control" placeholder="Enter Username" name="username_s" >
                  </div> <!-- ./ form-group -->

                  <div class="form-group col-md-12">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="pass_s">
                  </div> <!-- ./ form-group -->

              
              
                <button type="submit" name="cs_std_login"  class="btn btn-primary cs-btn-color">Login Here</button>
               




              </div> <!-- ./ form-row -->

            </form> <!-- ./ form -->

             <!-- ======================== ./ LOGIN FORM ===========================  -->


          </div> <!-- ./ col-md-5 -->


        </div> <!--  ./ row -->

        </div> <!-- ./ container -->

      </div> <!-- ./ cs-body-section -->



    </section>


<?php include('footer.php'); ?>