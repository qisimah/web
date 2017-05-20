<?php

namespace App;

use App\Http\Controllers\FileController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
	//
	protected $fillable = [
		'title', 'year', 'album', 'user_id', 'label', 'audio', 'producer', 'audio', 'img'
	];

	public function artists()
	{
		return $this->belongsToMany(Artist::class, 'artist_detection', 'detection_id');
	}

	public function genres()
	{
		return $this->belongsToMany(Genre::class, 'detection_genre', 'detection_id');
	}

	public function detections()
	{
		return $this->hasMany(Detection::class, 'acr_id', 'acr_id');
	}

	public static function toACR( $file )
	{
		$file->indexed = 2;
		$file->save();
		$acr = json_decode(File::fingerPrint("public/".$file->audio, $file->id, $file->title, $file->artists[0]->name, $file->year), true);
//		Storage::append('test.txt', $acr);
		if (isset($acr['state']) && $acr['state'] === 0){
			$file->acr_id = $acr['acr_id'];
			$file->indexed = 1;
			return $file->save();
		}
		return false;
	}

	public static function fingerPrint($file, $audio_id, $title, $artist, $year){
	$request_url = 'https://api.acrcloud.com/v1/audios';
	$http_method = 'POST';
	$http_uri = '/v1/audios';
	$timestamp = time();
	$signature_version = '1';
	/*

	This demo shows how to use the RESTful API to upload an audio file ( "data_type":"audio" ) into your bucket.

	You can find account_access_key and account_access_secret in your account page.

	Log into http://console.acrcloud.com -> "Account" (top right corner) -> "RESTful API Keys" -> "Create Key Pair".

	Be Careful, they are different with access_key and access_secret of your project.

	*/

	$account_access_key = '08aff44368610a67';
	$account_access_secret = 'face2a65f91dff9945c821945eab873d';
	$string_to_sign = $http_method . "\n" .
		$http_uri ."\n" .
		$account_access_key . "\n" .
		$signature_version . "\n" .
		$timestamp;

	$signature = hash_hmac("sha1",$string_to_sign,$account_access_secret,true);
	$signature = base64_encode($signature);
	// suported file formats: mp3,wav,wma,amr,ogg, ape,acc,spx,m4a,mp4,FLAC, etc
	if(class_exists('\CURLFile'))
		$cfile = new \CURLFile($file, 'audio/mp3', basename($file));
	else
		$cfile = '@' . $file;
		$postfields = array(
			'audio_file' => $cfile,
			'title' => $title,
			'audio_id' => $audio_id,
			'bucket_name' => 'musically',
			'data_type'=>'audio',  // if you upload fingerprint file please set 'data_type'=>'fingerprint'
			'custom_key[0]' => 'artist',
			'custom_value[0]' => $artist,
			'custom_key[1]' => 'year',
			'custom_value[1]' => $year
		);

	$headers = array(
		'access-key' => $account_access_key,
		'timestamp' => $timestamp,
		'signature-version' => '1',
		'signature' => $signature
	);

	foreach( $headers as $n => $v ) {

		$headerArr[] = $n .':' . $v;

	}

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $request_url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArr);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	$response = curl_exec($ch);
//	curl_close($ch);

	if ( $response === false ){
		return curl_error($ch);
	}
	return $response;
}
}
