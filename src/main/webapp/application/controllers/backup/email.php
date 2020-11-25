<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {


	public function index()
	{
		$to      = 'vijayalakshmivulli@gmail.com';
$subject = 'test';
$message = 'Hi vijaya how r u';
$headers = 'From: vrkumar60@gmail.com' . "\r\n" .
    'Reply-To: vrkumar60@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */