<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Detection;
use App\Genre;
use App\Label;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DetectionController extends Controller
{
    //
	public function index(){

	}

	public function create(){

	}

	public function store(Request $request){
		Storage::append('test.txt', json_encode($request->all()));
		$detection = $request->all();
		if ($detection['status']){
			$detected['stream_id'] = $detection['stream_id'];
			$data = $detection['data'];
			$status = $data['status'];
			if ($status['msg'] === 'Success' && $status['code'] === 0){
				$metadata = $data['metadata'];
				$detected['type'] 			= $metadata['type'];
				$detected['created_at'] 	= $metadata['timestamp_utc'];
				$skip = ['Ortaya Üçlü Çektir Kartala', '123 Beşiktaş!', 'Gol Beşiktaş', 'Take a Walk'];

				if (isset($metadata['music']) && (in_array($metadata['music'][0]['title'], $skip)) <> true){
					$music = $metadata['music'][0];
					$detected['title'] 				= $music['title'];
					$detected['acr_id'] 			= $music['acrid'];
					$detected['release_date'] 		= (isset($music['release_date']))? $music['release_date'] : '';
//					$detected['external_metadata'] 	= json_encode($music['external_metadata']);
					$detected['album'] 				= $music['album']['name'];
					$detected['label']				= (isset($music['label']))? $music['label'] : null;
					$detected['genres'] 			= (isset($music['genres']))? $music['genres'] : null;

				} else if (isset($metadata['custom_files'])){
					$file = $metadata['custom_files'][0];
					$detected['title'] 	= $file['title'];
					$detected['acr_id'] = $file['acrid'];
					$detected['mode'] 	= 'Custom';
					$detected['release_date'] = Carbon::create($file['year']);
					$detected['label'] 	= $detected['album'] = 'Qisimah Audio Insights';
					$music['artists'] 	= File::where('acr_id', $file['acrid'])->first()->artists;
				}

				$detection = Detection::create($detected);

				$detected['artist'] = null;
				foreach ($music['artists'] as $artist){
					$this_artist = Artist::firstOrCreate(['name' => $artist['name']]);
					$detection->artists()->attach($this_artist->id);
				}

//				if ($detected['genres'] <> null){
//					foreach ($detected['genres'] as $genre){
//						$this_genre = Genre::firstOrCreate(['name' => $genre['name']]);
//						$detection->genres()->attach($this_genre->id);
//					}
//				}
			}
		}
	}
}
