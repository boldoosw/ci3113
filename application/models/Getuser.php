<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class getUser extends CI_Model {

	function getinfo()
	{
		$this->db->from('user');
		$query = $this->db->get();

		return $query->result();
	}

	function sendmail($email, $message, $subject)
	{
		$this->load->library('phpmailer_lib');
        $mail = $this->phpmailer_lib->load();
        $mail->isSMTP();

		$mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'b.munkhbaatar10@gmail.com';
        // $mail->Password = 'cwvumfywpueyfdyy'; --old
		$mail->Password = 'hlqpymqiuifgwttq';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        // $mail->addAttachment('Instruction.pdf');
        $mail->setFrom('b.munkhbaatar10@gmail.com', ' хэрэглэгчийн бүртгэл');
        $mail->addReplyTo('b.munkhbaatar10@gmail.com','хэрэглэгчийн бүртгэл');
        $mail->addAddress($email);
        $mail->Subject = $subject;
        $mail->isHTML(true);
		$mail->CharSet = 'UTF-8';
        $mail->Body = $message;

		if(!$mail->send()){
            $data = 1;
        }else{
            $data = 2;
        }

		return $data;
	}

	function sendmail_log($subject, $message, $status, $email, $desc)
	{
		$this->db->insert('mail_log', array("title"=>$subject, "msg"=>$message, "email"=>$email, "status"=>$status, "maildesc"=>$desc));

		// echo $this->db->last_query();
	}

	function random_password() 
	{
		$alphabet = '1234567890';
		$password = array(); 
		$alpha_length = strlen($alphabet) - 1; 
		for ($i = 0; $i < 6; $i++) 
		{
			$n = rand(0, $alpha_length);
			$password[] = $alphabet[$n];
		}
		return implode($password); 
	}

//admin user
	function loginpasscheck($loginname, $loginpass)
	{
		$this->db->select("id,email,firstname,lastname,permission");
		$this->db->where("email",$loginname);
		$this->db->where("password",md5($loginpass));
		$this->db->where("status","active");
		$this->db->from('user');
		$query = $this->db->get();

		return $query->result();

		echo $this->db->last_query();
	}

	function newpass($loginname,$loginpass)
	{
		$this->db->where("username",$loginname);
		$this->db->update("users",array('userpass' => sha1(md5($loginpass))));	
	}
}