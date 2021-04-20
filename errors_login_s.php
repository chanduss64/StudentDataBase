<?php  if (count($error_login_s) > 0) : ?>
  <div class="error">
  	<div class="cs-alert alert alert-danger alert-dismissible fade show" role="alert">
	  	<?php foreach ($error_login_s as $err) : ?>

	               <?php echo "&rarr; " . $err . "<br />" ?>    
	  	 
	  	<?php endforeach ?>
     </div> <!-- ./ cs-alert -->
  </div> <!-- ./ error -->

<?php  endif ?>