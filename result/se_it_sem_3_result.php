<?php
session_start();
include_once '../dbconnect.php';

if(!isset($_SESSION['user']))
{
  header("Location: index.php");
}
$res=mysql_query("SELECT * FROM all_student_database WHERE roll=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

if(isset($_POST['update'])) 
{

  $updated_class = mysql_real_escape_string($_POST['updated_class']);

  if(mysql_query("UPDATE all_student_database SET class='$updated_class' WHERE roll=".$userRow['roll']))
  {
    if(mysql_query("UPDATE all_student_database SET gpa=NULL WHERE roll=".$userRow['roll'])){
     echo '<script>alert("Class updated Successfully!");
            window.location = "http://localhost/igc/class/'.$updated_class.'.php"</script>';
     // if ($updated_class == "SE_IT_SEM_4")
     // {
     //    header("Location: se_it_sem_4.php");
     // }
     // if ($updated_class == "TE_IT_SEM_5")
     // {
     //    header("Location: te_it_sem_5.php");
     // }
     // if ($updated_class == "TE_IT_SEM_6")
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

	<title>Result</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="../css/se_it.css">

	<link rel="stylesheet" type="text/css" href="../css/se_it_sem_3_result.css">

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
            	<option>SE_IT_SEM_4</option>
              <option>TE_IT_SEM_5</option>
              <option>TE_IT_SEM_6</option>
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

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> -->


<div class="modal fade" id="send_mail_call" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="modal-title" id="exampleModalLabel">Sign In</p>
      </div>
      <div class="modal-body">
        <form method="post" action="../pdf/SE_IT_SEM_3/se-it-sem-3-pdf.php">
          <div class="form-group">
            <label for="recipient-name" class="control-label sr-only">Recipient:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
          </div>

          <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	        <!-- <button type="reset" class="btn btn-primary">Reset</button> -->
	        <button type="submit" class="btn btn-primary" id="send_mail" name="send_mail">Send</button>
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
      <h1 class="title-class">SE IT SEM 3</h1>
      
     
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


<?php
//session_start();
	function points($total){
	
		if($total >= 85){  
			return 10;
		}
		else if($total >= 75){ 
			return 9;
		}
		else if($total >= 70){
			return 8;
		}
		else if($total >= 60){
			return 7;
		}
		else if($total >= 50){
			return 6;
		}
		else if($total >= 45){
			return 5;
		}
		else if($total >= 40){
			return 4;
		}
		else { 
			return 0;
		}
	}

$am3_ese = round(((60*($_REQUEST['am3-ese']))/100),0);
$dms_ese = round(((60*($_REQUEST['dms-ese']))/100),0);
$ds_ese = round(((60*($_REQUEST['ds-ese']))/100),0);
$dlda_ese = round(((60*($_REQUEST['dlda-ese']))/100),0);
$toc_ese = round(((60*($_REQUEST['toc-ese']))/100),0);

$am3_ca = $_REQUEST['am3-ca'];
$dms_ca = $_REQUEST['dms-ca'];
$dlda_ca = $_REQUEST['dlda-ca'];
$ds_ca = $_REQUEST['ds-ca'];
$toc_ca = $_REQUEST['toc-ca'];
	
$am3_tw = 4*$_REQUEST['am3-tw'];
$dlda_tw = $_REQUEST['dlda-tw'];
$ds_tw = 	$_REQUEST['ds-tw'];
$pl1_tw =   $_REQUEST['pl1-tw'];
$dms_tw =   $_REQUEST['dms-tw'];
$toc_tw =  4*$_REQUEST['toc-tw'];	


$dlda_viva = $_REQUEST['dlda-viva'];
$pl1_viva = $_REQUEST['pl1-viva'];

$dms_pracs = $_REQUEST['dms-pracs'];
$pl1_pracs = $_REQUEST['pl1-pracs'];
$ds_pracs = $_REQUEST['ds-pracs'];

$am3_theory = $am3_ca + $am3_ese;
$dms_theory = $dms_ca + $dms_ese;
$dlda_theory = $dlda_ca + $dlda_ese;
$ds_theory = $ds_ca + $ds_ese;
$toc_theory = $toc_ca + $toc_ese;

$dlda_tw_viva = $dlda_tw+$dlda_viva;
$ds_tw_pracs = $ds_tw+$ds_pracs;
$dms_tw_pracs = $dms_tw+$dms_pracs;

$am3_theory_pointer = points($am3_theory);//am3
$am3_tw_pointer = points($am3_tw);

$dlda_theory_pointer = points($dlda_theory);//dlda
$dlda_tw_viva_pointer = points(2*($dlda_tw_viva));

$ds_theory_pointer = points($ds_theory);//ds
$ds_tw_pracs_pointer = points(2*($ds_tw_pracs));

$dms_theory_pointer = points($dms_theory);//dms
$dms_tw_pracs_pointer = points(2*($dms_tw_pracs));

$toc_theory_pointer = points($toc_theory);//toc
$toc_tw_pointer = points($toc_tw);
//points( round( ((100*($toc_tw + $toc_pracs + $toc_viva))/75), 0) );

$pl1_tw_pointer = points($pl1_tw + $pl1_pracs + $pl1_viva);


$am3_pointer = $am3_theory_pointer*3 + $am3_tw_pointer;
// echo("am3_pointer : ".$am3_pointer."\n");
$dlda_pointer = $dlda_theory_pointer*3 + $dlda_tw_viva_pointer;
// echo("dlda_pointer : ".$dlda_pointer."\n");
$ds_pointer = $ds_theory_pointer*3 + $ds_tw_pracs_pointer;
// echo("ds_pointer : ".$ds_pointer."\n");
$dms_pointer = $dms_theory_pointer*3 + $dms_tw_pracs_pointer;
// echo("dms_pointer : ".$dms_pointer."\n");
$toc_pointer = $toc_theory_pointer*3 + $toc_tw_pointer;
// echo("toc_pointer : ".$toc_pointer."\n");
$pl1_pointer = $pl1_tw_pointer*3;
// echo("pl1_pointer : ".$pl1_pointer."\n");

$EGP = $am3_pointer+$ds_pointer+$dlda_pointer+$dms_pointer+$toc_pointer+$pl1_pointer;
$GPA = round($EGP/23,2);

//echo "GPA is : ".round($GPA,2);

$_SESSION['EGP'] = $EGP;
$_SESSION['GPA'] = $GPA;

$_SESSION['am3_theory_pointer'] = $am3_theory_pointer;
$_SESSION['am3_tw_pointer'] = $am3_tw_pointer;

$_SESSION['dlda_theory_pointer'] = $dlda_theory_pointer;
$_SESSION['dlda_tw_viva_pointer'] = $dlda_tw_viva_pointer;

$_SESSION['ds_theory_pointer'] = $ds_theory_pointer;
$_SESSION['ds_tw_pracs_pointer'] = $ds_tw_pracs_pointer;

$_SESSION['dms_theory_pointer'] = $dms_theory_pointer;
$_SESSION['dms_tw_pracs_pointer'] = $dms_tw_pracs_pointer;

$_SESSION['toc_theory_pointer'] = $toc_theory_pointer;
$_SESSION['toc_tw_pointer'] = $toc_tw_pointer;

$_SESSION['pl1_tw_pointer'] = $pl1_tw_pointer;

$_SESSION['am3_pointer'] = $am3_pointer;
$_SESSION['dlda_pointer'] = $dlda_pointer;
$_SESSION['ds_pointer'] = $ds_pointer;
$_SESSION['dms_pointer'] = $dms_pointer;
$_SESSION['toc_pointer'] = $toc_pointer;
$_SESSION['pl1_pointer'] = $pl1_pointer;

mysql_query("UPDATE all_student_database SET gpa='$GPA' WHERE roll=".$userRow['roll']);

?>

<div class="col-md-12 text-center result-sentence">
	<h2 class="gpa_header">Congratulations! You scored <?php echo $GPA; ?> points.</h2>
</div>

<div class="container">
	<div class="row col-md-6 col-md-offset-3 result-type-div">
		<div class="col-md-6"><a class="result-type btn btn-success btn-lg" href="../pdf/SE_IT_SEM_3/se-it-sem-3-pdf.php" target="_blank" id="pdf">View as a pdf</a></div>
		<div class="col-md-6"><a class="result-type btn btn-success btn-lg" href="#" data-toggle="modal" data-target="#send_mail_call">Send mail</a></div>
	</div>
</div>

<div class="container">
	<div class="row">
		
	</div>
</div>

</body>
</html>