<?php  
// include "conn.php";
$conn = mysqli_connect("localhost","root","","taskmanager");
// if (isset($_GET['id'])) {
// 		$id = $_GET['id'];
		$update = true;
      
		$sql = "SELECT id,username,email FROM users";
		$record = mysqli_query($conn, $sql);
      

		if ($record->num_rows>0) {
         while($n = $record->fetch_assoc()){

            // print_r($n); 
            foreach($n as $emp){

               $username = $n['username'];
      
               $email = $n['email'];
            }
            
            

			
		}
   }
      
	// }
   // echo $email;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\htdocs\email\vendor\autoload.php';
$mail = new PHPMailer(TRUE);
try {
   
   $mail->setFrom('mahimabh93@gmail.com', 'System');
   $mail->addAddress($email, 'Employee');

   $mail->Subject ="Task Regarding";
   $mail->Body = 'Dear '.$username.',

   This task has been assigned to you';
   
   /* SMTP parameters. */
   
   /* Tells PHPMailer to use SMTP. */
   $mail->isSMTP();
   
   /* SMTP server address. */
   $mail->Host = 'smtp.elasticemail.com';

   /* Use SMTP authentication. */
   $mail->SMTPAuth = TRUE;
   
   /* Set the encryption system. */
   $mail->SMTPSecure = 'tls';
   
   /* SMTP authentication username. */
   $mail->Username = 'mahimabh93@gmail.com';
   
   /* SMTP authentication password. */
   $mail->Password = '4856E79B9DB34BDD4FD5F78FCA078A942CCD';
   
   /* Set the SMTP port. */
   $mail->Port = 2525;
   
   /* Finally send the mail. */
   
   if($mail->send()){
   	echo "Success";


   }


}
catch (Exception $e)
{
   echo $e->errorMessage();
}
catch (\Exception $e)
{
   echo $e->getMessage();
}

?>