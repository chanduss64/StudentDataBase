<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<div class="cs-alert alert alert-danger alert-dismissible fade show" role="alert">
	  	<?php foreach ($errors as $error) : ?>

	               <?php echo "&rarr; " . $error . "<br />" ?>    
	  	 
	  	<?php endforeach ?>
     </div> <!-- ./ cs-alert -->
  </div> <!-- ./ error -->

<?php  endif ?>