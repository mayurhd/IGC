<?php
session_start();
include_once '../dbconnect.php';

if(!isset($_SESSION['user']))
{
  header("Location: ../index.php");
}
$res=mysql_query("SELECT * FROM all_student_database WHERE roll=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

if(isset($_POST['update'])) 
{
  $updated_class = mysql_real_escape_string($_POST['updated_class']);

  if(mysql_query("UPDATE all_student_database SET class='$updated_class' WHERE roll=".$userRow['roll']))
  {
    if(mysql_query("UPDATE all_student_database SET gpa=NULL WHERE roll=".$userRow['roll'])){
     // echo '<script> alert("Class updated Successfully!"); </script> ';

     echo '<script>alert("Class updated Successfully!");
            window.location = "http://localhost/igc/class/'.$updated_class.'.php"</script>';

     // if ($updated_class == "se_it_sem_4")
     // {
     //    header("Location: se_it_sem_4.php");
     // }
     // if ($updated_class == "te_it_sem_5")
     // {
     //    header("Location: te_it_sem_5.php");
     // }
     // if ($updated_class == "te_it_sem_6")
     // {
     //    header("Location: te_it_sem_6.php");
     // }
   }
  }
  else
  {
     ?> <script> alert("Error occurred! Could not update your class."); </script> <?php
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

	<!-- jQuery library -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->

	<!-- Latest compiled JavaScript -->
	<!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

<!-- Latest compiled and minified CSS -->
  <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">


  <!-- jQuery library -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>   -->
  <script src="../bootstrap/js/jquery-3.1.1.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <!-- bootstrap ends here  -->
	<link rel="stylesheet" type="text/css" href="../css/te_it.css">

</head>
<body>

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> -->


<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="modal-title" id="exampleModalLabel">Update class</p>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group sr-only">
            <label for="recipient-name" class="control-label sr-only">Recipient:</label>
            <input type="number" class="form-control" id="recipient-name" placeholder="Roll Number">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label sr-only">Recipient:</label>
            <select class="form-control" id="updated_class" name="updated_class" required>
              <option value="">- Select class -</option>
              <option>te_it_sem_6</option>
            </select>
          </div>
          <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	        <!-- <button type="reset" class="btn btn-primary">Reset</button> -->
	        <button type="submit" class="btn btn-primary" id="update" name="update">Update Me</button>
	      </div>

        </form>
      </div>
    </div>
  </div>
</div>

	
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
      <h1 class="title-class">TE IT SEM 5</h1>
      
     
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a class="user-heading"><?php echo $userRow['name']." - ".$userRow['roll'] ?></a></li>
        <li><a href="#" data-toggle="modal" data-target="#exampleModal3">Update Class <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></li>
        <li><a href="../signout.php?signout">Sign out <span class="glyphicon glyphicon-log-out" aria-hidden="true"></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div class="container">

  

  <div class="row">
   <form id="se_it_form" class="clearfix" method="post" onsubmit="<?php $_SESSION['submit_is_set']="submit_is_set"; ?>" action="../result/te_it_sem_5_result.php">

    
      <?php 
      // if ("SELECT IF(gpa IS NULL or gpa = '', 'empty', gpa) as gpa from all_student_database WHERE roll=".$userRow['roll']) {
      if($userRow['gpa'] != NULL){
              // echo ('<div class="row text-center"> <a href="#">Recently calculated GPA : '.$userRow['gpa'].'</a></div>');
        echo('<div class="old-result-call col-md-12"> <a href="../pdf/TE_IT_SEM_5/'.$userRow['roll'].'.pdf" target=_blank class="btn btn-default btn-lg col-md-2">Recent Result</a></div>');
      }
      ?>
    

    <div class="col-md-4 col-sm-6 subject">

    
          <div class="subject_border">
          <div class="text-center title">
            OOSE
          </div>

          <div class="form_content text-center">
         
            <div class="form-group">
              <!-- <label for="exampleInputEmail1" class="sr-only">Email address</label> -->
              <input type="number" class="form-control" placeholder="ESE out of 100" id="oose-ese" class="input" min="40" max="100" name="oose-ese" required>
            </div>
            <div class="form-group">
              <!-- <label for="exampleInputPassword1" class="sr-only">Password</label> -->
              <input type="number" class="form-control" placeholder="CA out of 40" id="oose-ca" class="error" min="16" max="40" name="oose-ca" required>
            </div>
            <div class="form-group">
              <!-- <label for="exampleInputPassword1" class="sr-only">Password</label> -->
              <input type="number" class="form-control" placeholder="TW out of 25" id="oose-tw" class="input" min="10" max="25" name="oose-tw" required>
            </div>
            <!-- <button type="submit" class="btn btn-default">Submit</button> -->
           <div class="form-group">
            <!-- <label for="exampleInputPassword1" class="sr-only">Password</label> -->
            <input type="number" class="form-control" placeholder="Practical out of 25" id="oose-pracs" class="input" min="10" max="25" name="oose-pracs" required>
          </div>
          </div>
          </div>
        
    </div>

    <div class="col-md-4 col-sm-6 subject">

          <div class="subject_border">
          <div class="text-center title">
           AD
          </div>

          <div class="form_content text-center">
         
            <div class="form-group">
              <!-- <label for="exampleInputEmail1" class="sr-only">Email address</label> -->
              <input type="number" class="form-control" placeholder="ESE out of 100" id="ad-ese" class="input" min="40" max="100" name="ad-ese" required>
            </div>
            <div class="form-group">
              <!-- <label for="exampleInputPassword1" class="sr-only">Password</label> -->
              <input type="number" class="form-control" placeholder="CA out of 40" id="ad-ca" class="error" min="16" max="40" name="ad-ca" required>
            </div>
            <div class="form-group">
              <!-- <label for="exampleInputPassword1" class="sr-only">Password</label> -->
              <input type="number" class="form-control" placeholder="TW out of 25" id="ad-tw" class="input" min="10" max="25" name="ad-tw" required>
            </div>
            <!-- <button type="submit" class="btn btn-default">Submit</button> -->
            <div class="form-group">
              <!-- <label for="exampleInputPassword1" class="sr-only">Password</label> -->
              <input type="number" class="form-control" placeholder="Viva out of 25" id="ad-viva" class="input" min="10" max="25" name="ad-viva" required>
            </div>
          </div>
          </div>
        
    </div>

        
    <div class="col-md-4 col-sm-6 subject">

          <div class="subject_border">
          <div class="text-center title">
            CG
          </div>

          <div class="form_content text-center">
         
            <div class="form-group">
              <!-- <label for="exampleInputEmail1" class="sr-only">Email address</label> -->
              <input type="number" class="form-control" placeholder="ESE out of 100" id="cg-ese" class="input" min="40" max="100" name="cg-ese" required>
            </div>
            <div class="form-group">
              <!-- <label for="exampleInputPassword1" class="sr-only">Password</label> -->
              <input type="number" class="form-control" placeholder="CA out of 40" id="cg-ca" class="error" min="16" max="40" name="cg-ca" required>
            </div>
            <div class="form-group">
              <!-- <label for="exampleInputPassword1" class="sr-only">Password</label> -->
              <input type="number" class="form-control" placeholder="TW out of 25" id="cg-tw" class="input" min="10" max="25" name="cg-tw" required>
            </div>
            <div class="form-group">
              <!-- <label for="exampleInputPassword1" class="sr-only">Password</label> -->
              <input type="number" class="form-control" placeholder="Practical out of 25" id="cg-pracs" class="input" min="10" max="25" name="cg-pracs" required>
            </div>
            <!-- <button type="submit" class="btn btn-default">Submit</button> -->
          </div>
          </div>
        
    </div>

    <div class="col-md-4 col-sm-6 subject">

          <div class="subject_border">
          <div class="text-center title">
            OS
          </div>

          <div class="form_content text-center">
         
            <div class="form-group">
              <!-- <label for="exampleInputEmail1" class="sr-only">Email address</label> -->
              <input type="number" class="form-control" placeholder="ESE out of 100" id="os-ese" class="input" min="40" max="100" name="os-ese" required>
            </div>
            <div class="form-group">
              <!-- <label for="exampleInputPassword1" class="sr-only">Password</label> -->
              <input type="number" class="form-control" placeholder="CA out of 40" id="os-ca" class="error" min="16" max="40" name="os-ca" required>
            </div>
            <div class="form-group">
              <!-- <label for="exampleInputPassword1" class="sr-only">Password</label> -->
              <input type="number" class="form-control" placeholder="TW out of 25" id="os-tw" class="input" min="10" max="25" name="os-tw" required>
            </div>
            <div class="form-group">
              <!-- <label for="exampleInputPassword1" class="sr-only">Password</label> -->
              <input type="number" class="form-control" placeholder="Viva out of 25" id="os-viva" class="input" min="10" max="25" name="os-viva" required>
            </div>
            <!-- <button type="submit" class="btn btn-default">Submit</button> -->
          </div>
          </div>
        
    </div>

    <div class="col-md-4 col-sm-6 subject">

          <div class="subject_border">
          <div class="text-center title">
            WP II
          </div>

          <div class="form_content text-center">
         
            <div class="form-group">
              <!-- <label for="exampleInputEmail1" class="sr-only">Email address</label> -->
              <input type="number" class="form-control" placeholder="TW out of 50" id="wp2-tw" class="input" min="20" max="50" name="wp2-tw" required>
            </div>
            <div class="form-group">
              <!-- <label for="exampleInputPassword1" class="sr-only">Password</label> -->
              <input type="number" class="form-control" placeholder="Practical out of 25" id="wp2-pracs" class="input" min="10" max="25" name="wp2-pracs" required>
            </div>
            <div class="form-group">
              <!-- <label for="exampleInputPassword1" class="sr-only">Password</label> -->
              <input type="number" class="form-control" placeholder="Viva out of 25" id="wp2-viva" class="input" min="10" max="25" name="wp2-viva" required>
            </div>
            <!-- <button type="submit" class="btn btn-default">Submit</button> -->

          </div>
          </div>
        
    </div>

    <div class="col-md-4 col-sm-6 subject">

          <div class="subject_border">
          <div class="text-center title">
            ITC
          </div>

          <div class="form_content text-center">
         
            <div class="form-group">
              <!-- <label for="exampleInputEmail1" class="sr-only">Email address</label> -->
              <input type="number" class="form-control" placeholder="ESE out of 100" id="itc-ese" class="input" min="40" max="100" name="itc-ese" required>
            </div>
            <div class="form-group">
              <!-- <label for="exampleInputPassword1" class="sr-only">Password</label> -->
              <input type="number" class="form-control" placeholder="CA out of 40" id="itc-ca" class="error" min="16" max="40" name="itc-ca" required>
            </div>
          </div>
          </div>
        
    </div>

    <div class="call col-md-12">
      <button type="submit" class="btn btn-default btn-lg col-md-2" name="Calculate_GPA" onclick="<?php $_SESSION['Calculate_GPA']=1; ?>">Calculate GPA</button>
      <button type="reset" class="btn btn-default btn-lg col-md-2">Reset Marks</button>
    </div>  

    </form>
  </div>
</div>

</body>
</html>