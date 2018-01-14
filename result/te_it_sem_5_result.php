<?php
session_start([
    'cookie_lifetime' => 86400,
    'read_and_close'  => true,
]);
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
        <p class="modal-title" id="exampleModalLabel">Enter your Email Id to get the result.</p>
      </div>
      <div class="modal-body">
        <form method="post" action="../pdf/TE_IT_SEM_5/te-it-sem-5-pdf.php">
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


<?php
$grade = "";
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
  function grades($point){
  
    if($point == 10){ 
      return "AA";
    }
    else if($point == 9){ 
      return "AB";
    }
    else if($point == 8){
      return "BB";
    }
    else if($point == 7){
      return "BC";
    }
    else if($point == 6){
      return "CC";
    }
    else if($point == 5){
      return "CD";
    }
    else if($point == 4){
      return "DD";
    }
    else { 
      return "FF";
    }
  }
if ($_SESSION['Calculate_GPA'] == 1) {
  $_SESSION['oose-ese'] = $_POST['oose-ese'];
  $_SESSION['ad-ese'] = $_POST['ad-ese'];
  $_SESSION['cg-ese'] = $_POST['cg-ese'];
  $_SESSION['os-ese'] = $_POST['os-ese'];
  $_SESSION['itc-ese'] = $_POST['itc-ese'];
  $_SESSION['oose-ca'] = $_POST['oose-ca'];
  $_SESSION['ad-ca'] = $_POST['ad-ca'];
  $_SESSION['cg-ca'] = $_POST['cg-ca'];
  $_SESSION['os-ca'] = $_POST['os-ca'];
  $_SESSION['itc-ca'] = $_POST['itc-ca'];

$_SESSION['oose-tw'] = $_POST['oose-tw'];
$_SESSION['os-tw'] = $_POST['os-tw'];
$_SESSION['cg-tw'] =  $_POST['cg-tw'];
$_SESSION['ad-tw'] =   $_POST['ad-tw'];
$_SESSION['wp2-tw'] =   $_POST['wp2-tw'];


$_SESSION['os-viva'] = $_POST['os-viva'];
$_SESSION['wp2-viva'] = $_POST['wp2-viva'];
$_SESSION['ad-viva'] = $_POST['ad-viva'];

$_SESSION['oose-pracs'] = $_POST['oose-pracs'];
$_SESSION['wp2-pracs'] = $_POST['wp2-pracs'];
$_SESSION['cg-pracs'] = $_POST['cg-pracs'];
}

$oose_ese = round(((60*($_SESSION['oose-ese']))/100),0);
$ad_ese = round(((60*($_SESSION['ad-ese']))/100),0);
$cg_ese = round(((60*($_SESSION['cg-ese']))/100),0);
$os_ese = round(((60*($_SESSION['os-ese']))/100),0);
$itc_ese = round(((60*($_SESSION['itc-ese']))/100),0);

$oose_ca = $_SESSION['oose-ca'];
$ad_ca = $_SESSION['ad-ca'];
$os_ca = $_SESSION['os-ca'];
$cg_ca = $_SESSION['cg-ca'];
$itc_ca = $_SESSION['itc-ca'];
	
$oose_tw = $_SESSION['oose-tw'];
$os_tw = $_SESSION['os-tw'];
$cg_tw = 	$_SESSION['cg-tw'];
$ad_tw =   $_SESSION['ad-tw'];
$wp2_tw =   $_SESSION['wp2-tw'];


$os_viva = $_SESSION['os-viva'];
$wp2_viva = $_SESSION['wp2-viva'];
$ad_viva = $_SESSION['ad-viva'];

$oose_pracs = $_SESSION['oose-pracs'];
$wp2_pracs = $_SESSION['wp2-pracs'];
$cg_pracs = $_SESSION['cg-pracs'];

$oose_theory = $oose_ca + $oose_ese;
$ad_theory = $ad_ca + $ad_ese;
$os_theory = $os_ca + $os_ese;
$cg_theory = $cg_ca + $cg_ese;
$itc_theory = $itc_ca + $itc_ese;

$os_tw_viva = $os_tw+$os_viva;
$ad_tw_viva = $ad_tw+$ad_viva;
$cg_tw_pracs = $cg_tw+$cg_pracs;
$oose_tw_pracs = $oose_tw+$oose_pracs;

$oose_theory_pointer = points($oose_theory);//oose
$oose_tw_pracs_pointer = points(2*($oose_tw+$oose_pracs));

$os_theory_pointer = points($os_theory);//os
$os_tw_viva_pointer = points(2*($os_tw_viva));

$cg_theory_pointer = points($cg_theory);//cg
$cg_tw_pracs_pointer = points(2*($cg_tw_pracs));

$ad_theory_pointer = points($ad_theory);//ad
$ad_tw_viva_pointer = points(2*($ad_tw_viva));

$itc_theory_pointer = points($itc_theory);//itc
//points( round( ((100*($itc_tw + $itc_pracs + $itc_viva))/75), 0) );

$wp2_tw_pointer = points($wp2_tw + $wp2_pracs + $wp2_viva);


$oose_pointer = $oose_theory_pointer*3 + $oose_tw_pracs_pointer;
// echo("oose_pointer : ".$oose_pointer."\n");
$os_pointer = $os_theory_pointer*3 + $os_tw_viva_pointer;
// echo("os_pointer : ".$os_pointer."\n");
$cg_pointer = $cg_theory_pointer*3 + $cg_tw_pracs_pointer;
// echo("cg_pointer : ".$cg_pointer."\n");
$ad_pointer = $ad_theory_pointer*3 + $ad_tw_viva_pointer;
// echo("ad_pointer : ".$ad_pointer."\n");
$itc_pointer = $itc_theory_pointer*3;
// echo("itc_pointer : ".$itc_pointer."\n");
$wp2_pointer = $wp2_tw_pointer*3;
// echo("pl1_pointer : ".$pl1_pointer."\n");

$EGP = $oose_pointer+$cg_pointer+$os_pointer+$ad_pointer+$itc_pointer+$wp2_pointer;
$GPA = round($EGP/22,2);

//echo "GPA is : ".round($GPA,2);

$_SESSION['EGP'] = $EGP;
$_SESSION['GPA'] = $GPA;

$_SESSION['oose_theory_pointer'] = $oose_theory_pointer;
$_SESSION['oose_tw_pracs_pointer'] = $oose_tw_pracs_pointer;

$_SESSION['os_theory_pointer'] = $os_theory_pointer;
$_SESSION['os_tw_viva_pointer'] = $os_tw_viva_pointer;

$_SESSION['cg_theory_pointer'] = $cg_theory_pointer;
$_SESSION['cg_tw_pracs_pointer'] = $cg_tw_pracs_pointer;

$_SESSION['ad_theory_pointer'] = $ad_theory_pointer;
$_SESSION['ad_tw_viva_pointer'] = $ad_tw_viva_pointer;

$_SESSION['itc_theory_pointer'] = $itc_theory_pointer;

$_SESSION['wp2_tw_pointer'] = $wp2_tw_pointer;

$_SESSION['oose_pointer'] = $oose_pointer;
$_SESSION['os_pointer'] = $os_pointer;
$_SESSION['cg_pointer'] = $cg_pointer;
$_SESSION['ad_pointer'] = $ad_pointer;
$_SESSION['itc_pointer'] = $itc_pointer;
$_SESSION['wp2_pointer'] = $wp2_pointer;

mysql_query("UPDATE all_student_database SET gpa='$GPA' WHERE roll=".$userRow['roll']);

?>

<div class="col-md-12 text-center result-sentence">
	<h2 class="gpa_header">Congratulations! You scored <?php echo $GPA; ?> points.</h2>
</div>

<div class="container">
	<div class="row col-md-6 col-md-offset-3 result-type-div">
		<div class="col-md-6"><a class="result-type btn btn-success btn-lg" href="../pdf/TE_IT_SEM_5/te-it-sem-5-pdf.php" target="_blank" id="pdf">View as a pdf</a></div>
		<div class="col-md-6"><a class="result-type btn btn-success btn-lg" href="#" data-toggle="modal" data-target="#send_mail_call">Send mail</a></div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="table-responsive">
      <table class="table text-center">
        <thead style="color:#ffffff; background-color:#00331A;">
          <tr>
              <th class="text-center cell-border" rowspan="2" style="vertical-align: middle; border-right: 2px solid #cccccc">Subject</th>
              <th class="text-center cell-border" style="border-right: 2px solid #cccccc" colspan="2">Theory<br></th> 
              <th class="text-center cell-border" style="border-right: 2px solid #cccccc" colspan="2">TW/Practical</th>
              <th class="text-center cell-border" style="border-right: 2px solid #cccccc" colspan="2">Tutorial</th>
          </tr>
          <tr>
              <th class="text-center">CG</th>
              <th class="text-center cell-border" style="border-right: 2px solid #cccccc">Grade</th>
              <th class="text-center">CG</th>
              <th class="text-center cell-border" style="border-right: 2px solid #cccccc">Grade</th>
              <th class="text-center">CG</th>
              <th class="text-center">Grade</th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <td class="cell-border">OOSE</td>
             <td><?php echo $oose_theory_pointer ?>*3 = <?php echo $oose_theory_pointer*3 ?></td>
            <td class="cell-border"><?php echo grades($oose_theory_pointer); ?></td>
            <td>--</td>
            <td class="cell-border">--</td>
            <td><?php echo $oose_tw_pracs_pointer ?>*1 = <?php echo $oose_tw_pracs_pointer*1 ?></td>
            <td><?php echo grades($oose_tw_pracs_pointer); ?></td>
          </tr>
          <tr class="success">
           <td class="cell-border">AD</td>
           <td><?php echo $ad_theory_pointer ?>*3 = <?php echo $ad_theory_pointer*3 ?></td>
           <td class="cell-border"><?php echo grades($ad_theory_pointer); ?></td>
           <td>--</td>
           <td class="cell-border">--</td>
           <td><?php echo $ad_tw_viva_pointer ?>*1 = <?php echo $ad_tw_viva_pointer*1 ?></td>
           <td><?php echo grades($ad_tw_viva_pointer); ?></td>
          </tr>
          <tr>
            <td class="cell-border">CG</td>
            <td><?php echo $cg_theory_pointer ?>*3 = <?php echo $cg_theory_pointer*3 ?></td>
            <td class="cell-border"><?php echo grades($cg_theory_pointer); ?></td>
            <td>--</td>
            <td class="cell-border">--</td>
            <td><?php echo $cg_tw_pracs_pointer ?>*1 = <?php echo $cg_tw_pracs_pointer*1 ?></td>
            <td><?php echo grades($cg_tw_pracs_pointer); ?></td>
          </tr>
          <tr class="success">
           <td class="cell-border">OS</td>
           <td><?php echo $os_theory_pointer ?>*3 = <?php echo $os_theory_pointer*3 ?> </td>
           <td class="cell-border"><?php echo grades($os_theory_pointer); ?></td>
           <td><?php echo $os_tw_viva_pointer ?>*1 = <?php echo $os_tw_viva_pointer*1 ?> </td>
           <td class="cell-border"><?php echo grades($os_tw_viva_pointer); ?></td>
           <td>--</td>
           <td>--</td>
          </tr>
          <tr>
            <td class="cell-border">ITC</td>
            <td><?php echo $itc_theory_pointer ?>*3 = <?php echo $itc_theory_pointer*3 ?> </td>
            <td class="cell-border"><?php echo grades($itc_theory_pointer); ?></td>
            <td>--</td>
            <td class="cell-border">--</td>
            <td>--</td>
            <td>--</td>
          </tr>
          <tr class="success">
            <td class="cell-border">WP2</td>
            <td>--</td>
            <td class="cell-border">--</td>
            <td><?php echo $wp2_tw_pointer ?>*3 = <?php echo $wp2_tw_pointer*3 ?> </td>
            <td class="cell-border"><?php echo grades($wp2_tw_pointer); ?></td>
            <td>--</td>
            <td>--</td>
          </tr>
        </tbody>
      </table>
	</div>

  <div class="table-responsive">
      <table class="table text-center">
        <thead style="color:#ffffff; background-color:#00331A;">
          <tr>
              <th class="text-center">ECG</th>
              <th class="text-center">EC<br></th>
              <th class="text-center">GPA</th>
          </tr>
        </thead>
        <tbody>

          <tr class="success">
            <td><?php echo $EGP ?></td>
            <td>22</td>
            <td><?php echo $GPA ?></td>
          </tr>
        </tbody>
      </table>
  </div>


</div>

</body>
</html>