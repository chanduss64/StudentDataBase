 <?php //if($_SESSION['fac_err'] == "1"): ?>

	<?php  if (count($err_f_e) > 0) : ?>
	  <div class="error">
	  	<div class="cs-alert alert alert-danger alert-dismissible fade show" role="alert">
		  	<?php foreach ($err_f_e as $err) : ?>

		               <?php echo "&rarr; " . $err . "<br />" ?>    
		  	 
		  	<?php endforeach; ?>
	     </div> <!-- ./ cs-alert -->
	  </div> <!-- ./ error --> 

	<?php  endif ?>

	<?php  if (count($err_f_s) > 0) : ?>
	  <div class="error">
	  	<div class="cs-alert alert alert-success alert-dismissible fade show" role="alert">
		  	<?php foreach ($err_f_s as $err) : ?>

		               <?php echo "&rarr; " . $err . "<br />" ?>    
		  	 
		  	<?php endforeach; ?>
	     </div> <!-- ./ cs-alert -->
	  </div> <!-- ./ error --> 

	<?php  endif; ?>





<!-- <?php //elseif($_SESSION['std_err'] == "1"): ?>

	<?php // if (count($err_f_s) > 0) : ?>
	  <div class="error">
	  	<div class="cs-alert alert alert-danger alert-dismissible fade show" role="alert">
		  	<?php //foreach ($err_f_s as $err) : ?>

		               <?php //echo "&rarr; " . $err . "<br />" ?>    
		  	 
		  	<?php //endforeach ?>
	     </div> 
	  </div> 

	<?php  //endif ?> -->


<?php // endif; ?>