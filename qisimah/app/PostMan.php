<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;

class PostMan extends Model
{
    //
	protected $to;
	protected $from;
	protected $message;

	/**
	 * @return mixed
	 */
	public function getTo()
	{
		return $this->to;
	}

	/**
	 * @param mixed $to
	 */
	public function setTo( $to )
	{
		$this->to = $to;
	}

	/**
	 * @return mixed
	 */
	public function getFrom()
	{
		return $this->from;
	}

	/**
	 * @param mixed $from
	 */
	public function setFrom( $from )
	{
		$this->from = $from;
	}

	/**
	 * @return mixed
	 */
	public function getMessage()
	{
		return $this->message;
	}

	/**
	 * @param mixed $message
	 */
	public function setMessage( $message )
	{
		$this->message = $message;
	}



	public static function send()
	{
		$postMan = new PostMan();
		$postMan->setTo('solomon.appiah@meltwater.org');
//		$postMan->setFrom();
		$postMan->setMessage('Test message from the other side!');

		$headers = [
			'Content-Type: application/json',
			'Authorization: Basic '.base64_encode('api:key-70d4d05c1984eefe42be9e1ff8518692')
		];

		$body = [
			'from'		=> 'Qisimah<admin@qisimah.com>',
			'subject'	=>	"Nice Subject",
			'text'		=>	"Akoss Test message from the other side!",
			'to'		=>	'solomon.appiah@meltwater.org'
		];

		$curl = curl_init('https://api.mailgun.net/v3/mail.qisimah.com/messages');
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($body));

		try{
			return curl_exec($curl);
		} catch (Exception $exception){
			return $exception->getMessage();
		}

	}
}
