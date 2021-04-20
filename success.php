<?php  if (count($success) > 0) : ?>
  <div class="error">
  	<div class="cs-alert alert alert-success alert-dismissible fade show" role="alert">
	  	<?php foreach ($success as $s) : ?>
		 <?php echo " Account has been succesfully created with username : <strong>" . $s . "</strong>"?>    
	  	 
	  	<?php endforeach ?>
	  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
     </div> <!-- ./ cs-alert -->
  </div> <!-- ./ error -->

<?php  endif ?>