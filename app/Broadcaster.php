<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Broadcaster extends Model
{
	protected $name;
	protected $frequency;
	protected $tagline;
	protected $country_id;
	protected $region_id;
	protected $city;
	protected $address;
	protected $phone;
	protected $tags;
	protected $img;
	protected $user_id;
	protected $stream_id;

	protected $fillable = ['name', 'frequency', 'tagline', 'country_id', 'region_id', 'city', 'img', 'user_id', 'stream_id', 'phone', 'f_storage_id', 'address'];

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName( $name )
	{
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getFrequency()
	{
		return $this->frequency;
	}

	/**
	 * @param mixed $frequency
	 */
	public function setFrequency( $frequency )
	{
		$this->frequency = $frequency;
	}

	/**
	 * @return mixed
	 */
	public function getTagline()
	{
		return $this->tagline;
	}

	/**
	 * @param mixed $tagline
	 */
	public function setTagline( $tagline )
	{
		$this->tagline = $tagline;
	}

	/**
	 * @return mixed
	 */
	public function getReach()
	{
		return $this->reach;
	}

	/**
	 * @param mixed $reach
	 */
	public function setReach( $reach )
	{
		$this->reach = $reach;
	}

	/**
	 * @return mixed
	 */
	public function getCountry()
	{
		return $this->country;
	}

	/**
	 * @param mixed $country
	 */
	public function setCountry( $country )
	{
		$this->country = $country;
	}

	/**
	 * @return mixed
	 */
	public function getCity()
	{
		return $this->city;
	}

	/**
	 * @param mixed $city
	 */
	public function setCity( $city )
	{
		$this->city = $city;
	}

	/**
	 * @return mixed
	 */
	public function getAddress()
	{
		return $this->address;
	}

	/**
	 * @param mixed $address
	 */
	public function setAddress( $address )
	{
		$this->address = $address;
	}

	/**
	 * @return mixed
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * @param mixed $phone
	 */
	public function setPhone( $phone )
	{
		$this->phone = $phone;
	}

	/**
	 * @return mixed
	 */
	public function getTags()
	{
		return $this->tags;
	}

	/**
	 * @param mixed $tags
	 */
	public function setTags( $tags )
	{
		$this->tags = $tags;
	}

	/**
	 * @return mixed
	 */
	public function getImg()
	{
		return $this->img;
	}

	/**
	 * @param mixed $img
	 */
	public function setImg( $img )
	{
		$this->img = $img;
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

    public function region()
    {
        return $this->belongsTo(Region::class);
	}

    public function country()
    {
        return $this->belongsTo(Country::class);
	}

	public function listeners()
	{
		return $this->belongsToMany(User::class);
	}

	public function detections()
	{
		return $this->belongsToMany(Detection::class, null, 'stream_id', 'stream_id');
	}

    public function plays()
    {
        return $this->belongsToMany(Play::class, 'broadcaster_play', 'stream_id', 'stream_id')->withTimestamps();

	}

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
	}

    public static function attachAll()
    {
        foreach ($plays as $play) {
            $play->plays()->attach($play->stream_id);
        }

	}

    public static function saveBroadcaster($broadcaster, $tags)
    {
        if($_broadcaster = Broadcaster::create($broadcaster)) {
            $_broadcaster->tags()->sync($tags);
            return ['code' => 900, 'message' => 'Broadcaster saved!'];
        }
        return ['code' => 900, 'message' => 'Broadcaster could not be saved at this time'];


	}

    public static function getBroadcastersStreamIdsForCountry($country_id)
    {
        return Broadcaster::where('country_id', $country_id)->pluck('stream_id');
	}


    //
}
