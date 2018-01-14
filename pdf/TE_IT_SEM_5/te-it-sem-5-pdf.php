<?php
session_start();
include_once '../../dbconnect.php';

if(!isset($_SESSION['user']))
{
  header("Location: login.php");
}
$res=mysql_query("SELECT * FROM all_student_database WHERE roll=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>

<?php
//session_start();


require("../../fpdf/fpdf.php");
// require_once("dompdf/autoload.inc.php");

$EGP = $_SESSION['EGP'];
$GPA = $_SESSION['GPA'];

$oose_theory_pointer = $_SESSION['oose_theory_pointer'];
$oose_tw_pracs_pointer = $_SESSION['oose_tw_pracs_pointer'];

$os_theory_pointer = $_SESSION['os_theory_pointer'];
$os_tw_viva_pointer = $_SESSION['os_tw_viva_pointer'];

$cg_theory_pointer = $_SESSION['cg_theory_pointer'];
$cg_tw_pracs_pointer = $_SESSION['cg_tw_pracs_pointer'];

$ad_theory_pointer = $_SESSION['ad_theory_pointer'];
$ad_tw_viva_pointer = $_SESSION['ad_tw_viva_pointer'];

$itc_theory_pointer = $_SESSION['itc_theory_pointer'];

$wp2_tw_pointer = $_SESSION['wp2_tw_pointer'];

$oose_pointer = $_SESSION['oose_pointer'];
$os_pointer = $_SESSION['os_pointer'];
$cg_pointer = $_SESSION['cg_pointer'];
$ad_pointer = $_SESSION['ad_pointer'];
$itc_pointer = $_SESSION['itc_pointer'];
$wp2_pointer = $_SESSION['wp2_pointer'];

// sorting pointers

$oose_sub_pointer = ($oose_theory_pointer + $oose_tw_pracs_pointer)/2;
$os_sub_pointer = ($os_theory_pointer + $os_tw_viva_pointer)/2;
$cg_sub_pointer = ($cg_theory_pointer + $cg_tw_pracs_pointer)/2;
$ad_sub_pointer = ($ad_theory_pointer + $ad_tw_viva_pointer)/2;
$itc_sub_pointer = $itc_theory_pointer;
$wp2_sub_pointer = ($wp2_tw_pointer);

$sort = array( 'OOSE' => $oose_sub_pointer,'CG' => $cg_sub_pointer,'AD' => $ad_sub_pointer,'OS' => $os_sub_pointer,'ITC' => $itc_sub_pointer,'WP2' => $wp2_sub_pointer);
arsort($sort);
$subject = array(); 
$points = array();
$k = $t = 0;

foreach ($sort as $key => $value)
{
  $subject[$k++] = $key;
  $points[$t++] = $value;  
}


// sorting ends here

//$gpa = " <script type='text/javascript'>document.writeln(localStorage.getItem('WPI_CA'));</script> ";
//$mygpa = $_POST['key'];
$pdf = new FPDF();
$pdf->AddPage();

// Begin configuration

$textColour = array( 20, 31, 31 );
$headerColour = array( 100, 100, 100 );
$tableHeaderTopTextColour = array( 255, 255, 255 );
$tableHeaderTopFillColour = array( 125, 152, 179 );
$tableHeaderTopProductTextColour = array( 0, 0, 0 );
$tableHeaderTopProductFillColour = array( 143, 173, 204 );
$tableHeaderLeftTextColour = array( 99, 42, 57 );
$tableHeaderLeftFillColour = array( 184, 207, 229 );
$tableBorderColour = array( 50, 50, 50 );
$tableRowFillColour = array( 213, 170, 170 );
$reportName = "2009 Widget Sales Report";
$reportNameYPos = 160;
$logoFile = "widget-company-logo.png";
$logoXPos = 50;
$logoYPos = 108;
$logoWidth = 110;
$columnLabels = array( "Q1", "Q2", "Q3", "Q4" );
$rowLabels = array( $subject[0], $subject[1], $subject[2], $subject[3], $subject[4], $subject[5]);
$chartXPos = 20;
$chartYPos = 250;
$chartWidth = 160;
$chartHeight = 80;
$chartXLabel = "Subjects";
$chartYLabel = "Pointer";
$chartYStep = 1;

$chartColours = array(
                  array( 0, 128, 0 ),
                  array( 204, 204, 204 ),
                  array( 204, 204, 204 ),
                  array( 204, 204, 204 ),
                  array( 204, 204, 204 ),
                  array( 255, 0, 0 ),
                );

$data = array(
          array( $points[0] ),
          array( $points[1] ),
          array( $points[2] ),
          array( $points[3] ),
          array( $points[4] ),
          array( $points[5] ),

        );

// End configuration

/*Various colours used in the report. Each colour is specified as a 3-element array containing red, green and blue values (in the range 0-255).
The report title ("2009 Widget Sales Report") and position.
The URL and dimensions of the company logo image. You'll include this image in the title page of the report.
The row and column labels for the report data. You'll use these when displaying the table and chart in the report.
Configuration settings for the chart. These include the chart position, dimensions, axis labels, and the step value to use for the Y-axis scale.
The colours to use for the chart bars. As with the other report colours, these are specified as 3-element arrays. There are 4 colours: 1 for each bar in the chart.
The report data. This is a 2-dimensional array containing 4 rows of quarterly sales figures, 1 row per product.*/

$pdf->SetFont("Times","B",18);
$pdf->Cell(0,8,"K. J. Somaiya College of Engineering",0,1,"C");
$pdf->SetFont("Times","",14);
$pdf->Cell(0,8,"Vidyanagar, Vidyavihar, Mumbai - 400 077",0,1,"C");
$pdf->SetFont("Times","B",12);
$pdf->Cell(0,8,"Autonomous College",0,1,"C");
$pdf->SetFont("Times","B",12);
$pdf->Cell(0,7,"Affiliated to Univarsity of Mumbai",0,1,"C");
$pdf->Cell(0,7,"","",1,"");
$pdf->SetFont("Times","B",16);
$pdf->Cell(0,15,"Grade Card","T",1,"C");

$pdf->SetFont("Times","B",12);
$pdf->Cell(0,7,"Roll Number : {$userRow['roll']}","T L R",1,"L");
$pdf->Cell(0,7,"Student's name : {$userRow['name']}","T L R",1,"L");
$pdf->Cell(0,7,"Programme : Bachelor Of Engineering","T L R",1,"L");
$pdf->Cell(0,7,"Branch : Information technology","T L R",1,"L");
$pdf->Cell(0,7,"Examination : April 2016","T L R",1,"L");
$pdf->Cell(0,7,"Year & semester : Third Year B.TECH. IN I.T. Semester 5",1,1,"L");

$pdf->SetFont("Times","",10);

$pdf->Cell(0,12,"Note : Grade point * credit point = CG",0,1);

$pdf->SetFillColor(204,204,204);
$pdf->SetFont("Times","B",12);

$pdf->Cell(37,12,"Subject",1,0,"C",True);
$pdf->Cell(37,12,"Theory",1,0,"C",True);
$pdf->Cell(37,12,"TW/Practical",1,0,"C",True);
$pdf->Cell(37,12,"Tutorial",1,0,"C",True);
$pdf->Cell(42,12,"Subject CG",1,1,"C",True);

$pdf->SetFont("Times","",10);

$pdf->Cell(37,12,"OOSE",1,0,"C");
$gp = $oose_theory_pointer * 3;
$pdf->Cell(37,12,"{$oose_theory_pointer} * 3 = {$gp}",1,0,"C");
$pdf->Cell(37,12,"--",1,0,"C");
$pdf->Cell(37,12,"{$oose_tw_pracs_pointer} * 1 = {$oose_tw_pracs_pointer}",1,0,"C");
$gp_other = $gp + $oose_tw_pracs_pointer;
$pdf->Cell(42,12,"{$gp_other}",1,1,"C");

$pdf->Cell(37,12,"AD",1,0,"C");
$gp = $ad_theory_pointer * 3;
$pdf->Cell(37,12,"{$ad_theory_pointer} * 3 = {$gp}",1,0,"C");
$pdf->Cell(37,12,"--",1,0,"C");
$pdf->Cell(37,12,"{$ad_tw_viva_pointer} * 1 = {$ad_tw_viva_pointer}",1,0,"C");
$gp_other = $gp + $ad_tw_viva_pointer;
$pdf->Cell(42,12,"{$gp_other}",1,1,"C");

$pdf->Cell(37,12,"CG",1,0,"C");
$gp = $cg_theory_pointer * 3;
$pdf->Cell(37,12,"{$cg_theory_pointer} * 3 = {$gp}",1,0,"C");
$pdf->Cell(37,12,"--",1,0,"C");
$pdf->Cell(37,12,"{$cg_tw_pracs_pointer} * 1 = {$cg_tw_pracs_pointer}",1,0,"C");
$gp_other = $gp + $cg_tw_pracs_pointer;
$pdf->Cell(42,12,"{$gp_other}",1,1,"C");

$pdf->Cell(37,12,"OS",1,0,"C");
$gp = $os_theory_pointer * 3;
$pdf->Cell(37,12,"{$os_theory_pointer} * 3 = {$gp}",1,0,"C");
$pdf->Cell(37,12,"{$os_tw_viva_pointer} * 1 = {$os_tw_viva_pointer}",1,0,"C");
$gp_other = $gp + $os_tw_viva_pointer;
$pdf->Cell(37,12,"--",1,0,"C");
$pdf->Cell(42,12,"{$gp_other}",1,1,"C");

$pdf->Cell(37,12,"ITC",1,0,"C");
$gp = $itc_theory_pointer * 3;
$pdf->Cell(37,12,"{$itc_theory_pointer} * 3 = {$gp}",1,0,"C");
$pdf->Cell(37,12,"--",1,0,"C");
$pdf->Cell(37,12,"--",1,0,"C");
$gp_other = $gp;
$pdf->Cell(42,12,"{$gp_other}",1,1,"C");

$pdf->Cell(37,12,"WP2",1,0,"C");
$pdf->Cell(37,12,"--",1,0,"C");
$gp_other = $wp2_tw_pointer * 3;
$pdf->Cell(37,12,"{$wp2_tw_pointer} * 3 = {$gp_other}",1,0,"C");
$pdf->Cell(37,12,"--",1,0,"C");
$pdf->Cell(42,12,"{$gp_other}",1,1,"C");

// $pdf->Cell(37,12,"PCS",1,0,"C");
// $pdf->Cell(37,12,"--",1,0,"C");
// $gp_other = $pcs_tw_pointer * 2;
// $pdf->Cell(37,12,"{$pcs_tw_pointer} * 2 = {$gp_other}",1,0,"C");
// $pdf->Cell(37,12,"--",1,0,"C");
// $pdf->Cell(42,12,"{$gp_other}",1,1,"C");

$pdf->Cell(37,12,"","L B",0,"C");
$pdf->Cell(37,12,"","B",0,"C");
$pdf->Cell(37,12,"","B",0,"C");
$pdf->Cell(37,12,"","B",0,"C");
$pdf->Cell(42,12,"ECG = {$EGP}",1,1,"C");

$pdf->cell(0,12,"Note : GPA = ECG / EC",0,1);

$pdf->SetFont("Arial","B",13);

$pdf->Cell(63,12,"ECG",1,0,"C",True);
$pdf->Cell(63,12,"EC",1,0,"C",True);
$pdf->Cell(63,12,"GPA",1,1,"C",True);

$pdf->Cell(63,16,"{$EGP}",1,0,"C");
$pdf->Cell(63,16,"22",1,0,"C");
$pdf->Cell(63,16,"{$GPA}",1,0,"C");

/***
  Create the chart
***/

// Compute the X scale

$pdf->AddPage();

$xScale = count($rowLabels) / ( $chartWidth - 40 );

// Compute the Y scale

$maxTotal = 0;

foreach ( $data as $dataRow ) {
  $totalSales = 0;
  foreach ( $dataRow as $dataCell ) $totalSales += $dataCell;
  $maxTotal = ( $totalSales > $maxTotal ) ? $totalSales : $maxTotal;
}

$yScale = $maxTotal / $chartHeight;

// Compute the bar width
$barWidth = ( 1 / $xScale ) / 1.5;

// Add the axes:

$pdf->SetFont( 'Arial', '', 10 );

// X axis
$pdf->Line( $chartXPos + 30, $chartYPos, $chartXPos + $chartWidth, $chartYPos );

for ( $i=0; $i < count( $rowLabels ); $i++ ) {
  $pdf->SetXY( $chartXPos + 40 +  $i / $xScale, $chartYPos );
  $pdf->Cell( $barWidth, 10, $rowLabels[$i], 0, 0, 'C' );
}

// Y axis
$pdf->Line( $chartXPos + 30, $chartYPos, $chartXPos + 30, $chartYPos - $chartHeight - 8 );

for ( $i=0; $i <= $maxTotal; $i += $chartYStep ) {
  $pdf->SetXY( $chartXPos + 7, $chartYPos - 5 - $i / $yScale );
  $pdf->Cell( 20, 10, number_format( $i ), 0, 0, 'R' );
  $pdf->Line( $chartXPos + 28, $chartYPos - $i / $yScale, $chartXPos + 30, $chartYPos - $i / $yScale );
}

// Add the axis labels
$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->SetXY( $chartWidth / 2 + 20, $chartYPos + 8 );
$pdf->Cell( 30, 10, $chartXLabel, 0, 0, 'C' );
$pdf->SetXY( $chartXPos + 7, $chartYPos - $chartHeight - 12 );
$pdf->Cell( 20, 10, $chartYLabel, 0, 0, 'R' );

// Create the bars
$xPos = $chartXPos + 40;
$bar = 0;

foreach ( $data as $dataRow ) {

  // Total up the sales figures for this product
  $totalSales = 0;
  foreach ( $dataRow as $dataCell ) $totalSales += $dataCell;

  // Create the bar
  $colourIndex = $bar % count( $chartColours );
  $pdf->SetFillColor( $chartColours[$colourIndex][0], $chartColours[$colourIndex][1], $chartColours[$colourIndex][2] );
  $pdf->Rect( $xPos, $chartYPos - ( $totalSales / $yScale ), $barWidth, $totalSales / $yScale, 'DF' );
  $xPos += ( 1 / $xScale );
  $bar++;
}

// $dompdf->load_html($html);    
// $dompdf->render();
// $pdf = $dompdf->output();
// $file_location = $_SERVER['DOCUMENT_ROOT']."app_folder_name/pdfReports/".$pdf_name.".pdf";
// file_put_contents($file_location,$pdf); 

$filename= $userRow['roll'].".pdf";
$pdf->Output($filename,'F');

if(isset($_POST['send_mail']))
{

require '../PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'mayur.hadawale@somaiya.edu';          // SMTP username
$mail->Password = 'Mayur@svv'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('mayur.hadawale@somaiya.edu', 'Mayur Hadawale');
$mail->addReplyTo('mayur.hadawale@somaiya.edu', 'Mayur Hadawale');
$mail->addAddress($_POST['email']);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->addAttachment($filename);
$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h3>Hello '.$userRow['name'].',<br>PFA SEM 5 result pdf.</h3>';

$mail->Subject = 'SEM 5 RESULT';
$mail->Body    = $bodyContent;

  if(!$mail->send()) {
      echo '<script>alert("Message could not be sent. Mailer Error: "'.$mail->ErrorInfo.'");
            window.location = "http://localhost/igc/result/te_it_sem_5_result.php"
            </script>';
      // echo 'Message could not be sent.';
      // echo 'Mailer Error: ' . $mail->ErrorInfo;
  } 
  else {
    $_SESSION['Calculate_GPA']=0;
    echo '<script>alert("Message has been sent.");
            window.location = "http://localhost/igc/result/te_it_sem_5_result.php"
          </script>';
      // echo 'Message has been sent';
  }
}
else
{
    $pdf->output();
}



// $im = new imagick('test123.pdf[0]');
// $im->setImageFormat('jpg');
// header('Content-Type: image/jpeg');
// echo $im;

//$pdf->output();

?>