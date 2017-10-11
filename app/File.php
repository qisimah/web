<?php

namespace App;

use App\Http\Controllers\FileController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class File extends Model
{

    //
	protected $fillable = [
		'title', 'release_date', 'user_id', 'q_id', 'audio', 'audio', 'img', 'file_type', 'indexed'
	];

	public function artists()
	{
		return $this->belongsToMany(Artist::class)->withTimestamps();
	}

	public function genres()
	{
		return $this->belongsToMany(Genre::class)->withTimestamps();
	}

    public function producers()
    {
        return $this->belongsToMany(Producer::class)->withTimestamps();
	}

	public function detections()
	{
		return $this->hasMany(Detection::class, 'acr_id', 'acr_id');
	}

	public static function toACR( $file, $bucket_name )
	{
		$file->indexed = 2;
		$file->save();
		$path = File::getData($file->audio);
		$acr = json_decode(File::fingerPrint($path, $file->q_id, $file->title, $bucket_name, '08aff44368610a67', 'face2a65f91dff9945c821945eab873d'), true);
		unlink($path);

		if (isset($acr['state']) && $acr['state'] === 0){
			$file->acr_id = $acr['acr_id'];
			$file->indexed = 1;
			return $file->save();
		}
	}

    public static function saveSong($song, $genres, $artists, $producers)
    {
        $song['file_type']  =   'song';
        $file = File::create($song);

        foreach ($genres as $genre) {
            $file->genres()->attach($genre);
        }

        foreach ($artists as $artist) {
            $file->artists()->attach($artist);
        }

        foreach ($producers as $producer) {
            $file->producers()->attach($producer);
        }
        return [
            'status' => 'success',
            'code'   => 100,
            'description'   =>  'Song saved!'
        ];
	}

	public static function fingerPrint($file, $audio_id, $title, $bucket_name, $access_key, $access_secret){
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

	$account_access_key = $access_key;
	$account_access_secret = $access_secret;
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
			'bucket_name' => $bucket_name,
			'data_type'=>'audio',  // if you upload fingerprint file please set 'data_type'=>'fingerprint'
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

	try{
        return $response = curl_exec($ch);
    } catch (Exception $exception){
	    return $exception->getMessage();
    }
}

    public static function getData($url)
    {
        $file = uniqid('').'.tmp';
        $fopen = fopen($file, 'wb+');
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_FILE, $fopen);
        curl_exec($curl);

        fclose($fopen);

        return $file;

}
}
