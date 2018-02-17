<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listen extends Model
{
    //
	protected $broadcaster_id;
	protected $user_id;
	protected $fillable;
	protected $table = 'broadcaster_user';

	public function __construct( array $attributes = [] )
	{
		parent::__construct( $attributes );
		$this->fillable = [ 'broadcaster_id', 'user_id' ];
	}

	/**
	 * @return mixed
	 */
	public function getBroadcasterId()
	{
		return $this->broadcaster_id;
	}

	/**
	 * @param mixed $broadcaster_id
	 */
	public function setBroadcasterId( $broadcaster_id )
	{
		$this->broadcaster_id = $broadcaster_id;
	}

	/**
	 * @return mixed
	 */
	public function getUserId()
	{
		return $this->user_id;
	}

	/**
	 * @param mixed $user_id
	 */
	public function setUserId( $user_id )
	{
		$this->user_id = $user_id;
	}

}
