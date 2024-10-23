<?php include __DIR__.'/partials/inicio-doc.part.php' ?>
<?php include __DIR__.'/partials/nav.part.php' ?>

<!-- Principal Content Start -->
   <div id="contact">
   	  <div class="container">
   	    <div class="col-xs-12 col-sm-8 col-sm-push-2">
       	   <h1>CONTACT US</h1>
       	   <hr>
       	   <p>Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>

		   <?php 
				if(!empty($array_dats)){
					echo "<div class='alert alert-info'>";
					echo "<ul>";
						foreach($array_dats as $dat){
							echo "<li>".$dat."</li>";
						}
					echo "</ul>";
					echo "</div>";
				}

				if(!empty($array_error)){
					echo "<div class='alert alert-danger'>";
					echo "<ul>";
						foreach($array_error as $error){
							echo "<li>".$error."</li>";
						}
					echo "</ul>";
					echo "</div>";
				}
			?>
	       <form class="form-horizontal" method="post">
			
	       	  <div class="form-group">
	       	  	<div class="col-xs-6">
	       	  	    <label for="firstName" class="label-control">First Name</label>
	       	  		<input name="firstName" class="form-control" type="text" >
	       	  	</div>
	       	  	<div class="col-xs-6">
	       	  	    <label for="lastName" class="label-control">Last Name</label>
	       	  		<input name="lastName" class="form-control" type="text">
	       	  	</div>
	       	  </div>
	       	  <div class="form-group">
	       	  	<div class="col-xs-12">
	       	  		<label for="mail" class="label-control">Email</label>
	       	  		<input name="mail" class="form-control" type="email" >
	       	  	</div>
	       	  </div>
	       	  <div class="form-group">
	       	  	<div class="col-xs-12">
	       	  		<label for="subject" class="label-control">Subject</label>
	       	  		<input name="subject" class="form-control" type="text" >
	       	  	</div>
	       	  </div>
	       	  <div class="form-group">
	       	  	<div class="col-xs-12">
	       	  		<label class="label-control">Message</label>
	       	  		<textarea class="form-control"></textarea>
	       	  		<button class="pull-right btn btn-lg sr-button">SEND</button>
	       	  	</div>
	       	  </div>
	       </form>
	       <hr class="divider">
	       <div class="address">
	           <h3>GET IN TOUCH</h3>
	           <hr>
	           <p>Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero.</p>
		       <div class="ending text-center">
			        <ul class="list-inline social-buttons">
			            <li><a href="#"><i class="fa fa-facebook sr-icons"></i></a>
			            </li>
			            <li><a href="#"><i class="fa fa-twitter sr-icons"></i></a>
			            </li>
			            <li><a href="#"><i class="fa fa-google-plus sr-icons"></i></a>
			            </li>
			        </ul>
				    <ul class="list-inline contact">
				       <li class="footer-number"><i class="fa fa-phone sr-icons"></i>  (00228)92229954 </li>
				       <li><i class="fa fa-envelope sr-icons"></i>  kouvenceslas93@gmail.com</li>
				    </ul>
				    <p>Photography Fanatic Template &copy; 2017</p>
		       </div>
	       </div>
	    </div>   
   	  </div>
   </div>
<!-- Principal Content Start -->

<?php include __DIR__.'/partials/fin-doc.part.php' ?>