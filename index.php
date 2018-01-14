
<?php
session_start();
if(isset($_SESSION['user'])!="")
{/* logout testing */
  include_once 'dbconnect.php';
  $row = mysql_query("SELECT * FROM all_student_database WHERE roll=".$_SESSION['user']);
  $userRow=mysql_fetch_array($row);
	// session_destroy();
	// unset($_SESSION['user']);
	// header("Location: index.php");
  $existing_class = $userRow['class'];

  if($existing_class == "fe_it_sem_1"){
      header("Location: class/fe_it_sem_1.php");
  }
  if($existing_class == "se_it_sem_3"){
      header("Location: class/se_it_sem_3.php");
  }
  if($existing_class == "te_it_sem_5"){
      header("Location: class/te_it_sem_5.php");
  }
  if($existing_class == "te_it_sem_6"){
      header("Location: class/te_it_sem_6.php");
  }
}
          
?>


<html>
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>IGC</title>

	<!-- Latest compiled and minified CSS -->
	<!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">


	<!-- jQuery library -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>	 -->
	<script src="bootstrap/js/jquery-3.1.1.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
	<script src="bootstrap/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/index.css">
  	<script type="text/javascript" src="js/main.js"></script>
  	<!-- <script type="text/javascript" src="validation.js"></script> -->

  <link rel="icon" type="image/ico" href="favicon.ico">

  <!-- <script type="text/javascript" src="js/md5.js"></script> -->

</head>
<body>


<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> -->


<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="modal-title" id="exampleModalLabel">Sign In</p>
        <p>Don't have an account? <a data-dismiss="modal" data-toggle="modal" data-target="#exampleModal2" id="in-modal" name="submit_in">Sign up</a></p>
      </div>
      <div class="modal-body">

        <div id="signin_error"></div>

        <form method="POST" id="login-form">
        	
          <div class="form-group">
            <label for="recipient-name" class="control-label sr-only">Recipient:</label>
            <input type="text" class="form-control" id="roll_login" name="roll_login" placeholder="Roll Number" required>
          </div>

          <div class="form-group">
            <label for="message-text" class="control-label sr-only">Message:</label>
            <input type="password" class="form-control" id="password_login" name="password_login"  placeholder="Password" required></input>
          </div>

          <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	        <!-- <button type="reset" class="btn btn-primary">Reset</button> -->
	        <button type="submit" class="btn btn-primary" id="submit_in" name="submit_in">Sign In</button>

	      </div>

        </form>
      </div>
    </div>
  </div>
</div>

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> -->


<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="modal-title" id="exampleModalLabel">Sign Up</p>
        <p class="switch-modal">Already have an account? <a data-dismiss="modal" data-toggle="modal" data-target="#exampleModal1" id="in-modal" name="submit_in">Sign In</a></p>

      </div>
      <div class="modal-body">

        <div id="signup_error"></div>
        <div id="signup_success"></div>

        <form method="POST" id="signup-form"> <!-- action="signup.php" -->
          <div class="form-group">
            <label for="recipient-name" class="control-label sr-only">Recipient:</label>
            <input type="text" class="form-control" id="name" placeholder="Full Name" name="name" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label sr-only">Recipient:</label>
            <input type="number" class="form-control" id="roll" placeholder="Roll Number" name="roll" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label sr-only">Recipient:</label>
            <select class="form-control" id="list" name="list" required>

            	<option value="">- Select class -</option>

          				<option>fe_it_sem_1</option>
          				<option>fe_it_sem_2</option>
          				<option>se_it_sem_3</option>
          				<option>se_it_sem_4</option>
          				<option>te_it_sem_5</option>
          				<option>te_it_sem_6</option>

            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label sr-only">Message:</label>
            <input type="password" class="form-control" id="password"  placeholder="Password" name="password" required>
          </div>

          <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	        <!-- <button type="reset" class="btn btn-primary">Reset</button> -->
	        <button type="submit" class="btn btn-primary" id="submit_up" name="submit_up">Sign Up</button>
	      </div>

        </form>
      </div>
      
    </div>
  </div>
</div>


<div class="container ">	
  <div class="row navbar-fixed-top x-navbar">
	<nav class="navbar navbar-default clearfix">
  	<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"> <span class="glyphicon glyphicon-education" aria-hidden="true"></span>IGC</a>
	    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <!--  <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form> -->
      <ul class="nav navbar-nav navbar-right">
      	<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
        <li><a href="#" data-toggle="modal" data-target="#exampleModal1">Sign In<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></a></li>
        <li><a href="#" data-toggle="modal" data-target="#exampleModal2">Sign up <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
        <!-- <li><a href="#" data-toggle="modal" data-target="#exampleModal3">Update Class <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></li> -->
        <!-- <li><a href="#testimonials">Testimonials<span class="glyphicon glyphicon-book" aria-hidden="true"></span></a></li> -->
        <li><a href="#contact_us">Contact <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></a></li>
        <!-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li> -->
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
</div>

<div class="index_page">
	<p class="text-center size"><span class="igc">Instant GPA Calculator</span></p>
	<h2 class="text-center"><small>Get your GPA on the go with IGC</small></h2>
</div>

<section id="contact_us" style="padding-top:50px; padding-bottom:50px;">
	<div class="container">
    <h2 style="padding-left:30px; padding-bottom:50px;">Contact Us</h2>
		<div class="col-md-7">
			<div class="col-md-12 form-title"> <h3>Drop us a line</h3></div>
			<form method="POST" action="duser-msg.php" id="contact_form">
			  <div class="form-group">
			    <label class="sr-only" for="exampleInputName3">Email address</label>
			    <input type="text" class="form-control" name="sender-name" id="exampleInputName3" placeholder="Name" required>
			  </div>
			  <div class="form-group">
			    <label class="sr-only" for="exampleInputEmail3">Email address</label>
			    <input type="email" name="sender-email" class="form-control" id="exampleInputEmail3" placeholder="Email" required>
			  </div>
			  <div class="form-group">
			    <label class="sr-only" for="exampleMsg3">Password</label>
			    <textarea class="form-control" rows="3" name="sender-msg" placeholder="Message" required></textarea>
			  </div>
			  <button type="submit" name="send_msg" class="btn btn-default">Send</button>
			</form>
		</div>

		<div class="col-md-5 address">
			<div class="col-md-12">
				<address>
				  <strong>Address</strong><br>
				  IGC, 1355 Market Street<br> 
				  Suite 900, San Francisco<br>
				  CA 94103<br>
				  <abbr title="Phone">P:</abbr> +91 9594404636
				</address>

				<address>
				  <strong>Email</strong><br>
				  <a href="mailto:#">mayurhadawale@igc.com</a>
				</address>

				<address>
				  <strong>Contact</strong><br>
				  <p>+91 9594404636</h4>
				</address>
			</div>
		</div>
	</div>
</section>

<!-- <div class="container-fluid" id="testimonials">

	
	<div class="row testimonial-title text-center">
		<h2>What people says about us</h2>
	</div>


	<div class="container">
	<div class="row">
		<div class="col-md-4">
			<blockquote class="twitter-tweet" data-lang="en"><p lang="en" dir="ltr">It was a great visit to <a href="https://twitter.com/hashtag/makermela?src=hash">#makermela</a>  <a href="https://twitter.com/gaurangshetty">@gaurangshetty</a>,feeling proud &amp; ignited to see fellow innovators working on IoT,AI,AR,VR &amp; makerspaces</p>&mdash; Monu Shetty (@shetty_monu) <a href="https://twitter.com/shetty_monu/status/652843401298100224">October 10, 2015</a></blockquote>
			<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>
		<div class="col-md-4">
			<blockquote class="twitter-tweet" data-conversation="none" data-cards="hidden" data-lang="en"><p lang="en" dir="ltr"><a href="https://twitter.com/makermelaIndia">@makermelaIndia</a> your <a href="https://twitter.com/hashtag/IWearHandloom?src=hash">#IWearHandloom</a> look will go a long way in supporting the weaver community in India. <a href="https://t.co/Xe6435WjoH">pic.twitter.com/Xe6435WjoH</a></p>&mdash; Ministry of Textiles (@TexMinIndia) <a href="https://twitter.com/TexMinIndia/status/760782511299452929">August 3, 2016</a></blockquote>
			<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>
		<div class="col-md-4">
			<blockquote class="twitter-tweet" data-cards="hidden" data-lang="en"><p lang="en" dir="ltr">Amazing time speaking and trying out incredible new technology at the <a href="https://twitter.com/hashtag/makermela?src=hash">#makermela</a> Saw the future unfold before me! <a href="http://t.co/aVnu8onFD2">pic.twitter.com/aVnu8onFD2</a></p>&mdash; kunal kapoor (@kapoorkkunal) <a href="https://twitter.com/kapoorkkunal/status/653491989342748672">October 12, 2015</a></blockquote>
			<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>

		<div class="col-md-4">
			<blockquote class="twitter-tweet" data-conversation="none" data-cards="hidden" data-lang="en"><p lang="en" dir="ltr"><a href="https://twitter.com/makermelaIndia">@makermelaIndia</a> your <a href="https://twitter.com/hashtag/IWearHandloom?src=hash">#IWearHandloom</a> look will go a long way in supporting the weaver community in India. <a href="https://t.co/Xe6435WjoH">pic.twitter.com/Xe6435WjoH</a></p>&mdash; Ministry of Textiles (@TexMinIndia) <a href="https://twitter.com/TexMinIndia/status/760782511299452929">August 3, 2016</a></blockquote>
			<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>
		<div class="col-md-4">
			<blockquote class="twitter-tweet" data-cards="hidden" data-lang="en"><p lang="en" dir="ltr">Amazing time speaking and trying out incredible new technology at the <a href="https://twitter.com/hashtag/makermela?src=hash">#makermela</a> Saw the future unfold before me! <a href="http://t.co/aVnu8onFD2">pic.twitter.com/aVnu8onFD2</a></p>&mdash; kunal kapoor (@kapoorkkunal) <a href="https://twitter.com/kapoorkkunal/status/653491989342748672">October 12, 2015</a></blockquote>
			<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>

		<div class="col-md-4">
			<blockquote class="twitter-tweet" data-conversation="none" data-cards="hidden" data-lang="en"><p lang="en" dir="ltr"><a href="https://twitter.com/makermelaIndia">@makermelaIndia</a> your <a href="https://twitter.com/hashtag/IWearHandloom?src=hash">#IWearHandloom</a> look will go a long way in supporting the weaver community in India. <a href="https://t.co/Xe6435WjoH">pic.twitter.com/Xe6435WjoH</a></p>&mdash; Ministry of Textiles (@TexMinIndia) <a href="https://twitter.com/TexMinIndia/status/760782511299452929">August 3, 2016</a></blockquote>
			<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>
		

		<div class="col-md-4">
		<blockquote class="twitter-tweet" data-lang="en"><p lang="en" dir="ltr">Amazing time speaking and trying out incredible new technology at the <a href="https://twitter.com/hashtag/makermela?src=hash">#makermela</a> Saw the future unfold before me! <a href="http://t.co/aVnu8onFD2">pic.twitter.com/aVnu8onFD2</a></p>&mdash; kunal kapoor (@kapoorkkunal) <a href="https://twitter.com/kapoorkkunal/status/653491989342748672">October 12, 2015</a></blockquote>
		<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>

	</div>
</div>
</div> -->



<footer>
	<div class="container">
		<div class="row">
			<!-- <div class="col-md-4 footer-brand">
				<a class="navbar-brand" href="#"> <span class="glyphicon glyphicon-education" aria-hidden="true"></span>IGC</a>
			</div> --> 
			<div class="col-md-4 footer-typography">
				<p>Copyright &copy; 2016 | Coded with love <!-- <span class="glyphicon glyphicon-heart" style="color:#ff9999;"></span> --> By Mayur Hadawale.</p>
			</div>
			<div class="col-md-4 footer-typography">
				<p>Follow on</span> 
					<a href="www.facebook.com">Facebook</a> |
					<a href="www.twitter.com">Twitter</a> |
					<a href="www.googleplus.com">Google +</a>
				</p>
			</div>
		</div>
	</div>
</footer>

<!-- <script>
    $('#login-form').submit(function(e) {
        $('#messages').removeClass('hide').addClass('alert alert-success alert-dismissible').slideDown().show();
        $('#messages_content').html('<h4>MESSAGE HERE</h4>');
        $('#modal').modal('show');
        e.preventDefault();
    });
</script> -->

</body>
</html>

 <script>  
 
 </script>  