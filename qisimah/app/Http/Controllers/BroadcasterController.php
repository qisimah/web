<?php

    namespace App\Http\Controllers;

    use App\Broadcaster;
    use App\Country;
    use App\File;
    use App\Region;
    use App\Tag;
    use App\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\App;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Validation\Validator;

    class BroadcasterController extends Controller
    {
        function __construct()
        {
            $this->middleware('auth');
        }

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $listening = Auth::user()->listening()->with('country')->get();
            $broadcasters = Broadcaster::whereNotIn('id', $listening)->with('country')->orderBy('name',
                'asc')->paginate(20);
            $user = Auth::user();
            return view('pages.broadcaster', compact('user', 'broadcasters', 'listening'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('pages.createbroadcaster',
                ['countries' => Country::all(), 'regions' => [], 'user' => Auth::user()->toArray()]);
        }

        public function select()
        {
            return view('pages.selectbroadcaster', ['user' => Auth::user()->toArray()]);
        }

        protected function validator(array $data)
        {
            return Validator::make($data, [
                'name' => 'bail|required|min:3|max:20',
                'frequency' => 'bail|required|min:4|max:5'
            ]);
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $broadcaster = [];
            $tags = $request->input('tags');

            $broadcaster['name'] = $request->input('name');
            $broadcaster['frequency'] = $request->input('frequency');
            $broadcaster['tagline'] = ucfirst(strtolower($request->input('tagline')));
            $broadcaster['country_id'] = $request->input('country');
            $broadcaster['region_id'] = $request->input('region');
            $broadcaster['city'] = ucfirst(strtolower($request->input('city')));
            $broadcaster['address'] = $request->input('address');
            $broadcaster['phone'] = $request->input('phone');
            $broadcaster['stream_id'] = $request->input('stream_id');
            $broadcaster['user_id'] = Auth::id();
            $broadcaster['img'] = $request->input('logo');
            $broadcaster['f_storage_id'] = $request->input('f_storage_id');

            return Broadcaster::saveBroadcaster($broadcaster, $tags);
        }

        /**
         * Display the specified resource.
         *
         * @param  \App\Broadcaster $broadcaster
         * @return \Illuminate\Http\Response
         */
        public function show(Broadcaster $broadcaster)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Broadcaster $broadcaster
         * @return \Illuminate\Http\Response
         */
        public function edit(Broadcaster $broadcaster)
        {
            return view('pages.updatebroadcaster', [
                'broadcaster' => $broadcaster,
                'countries' => Country::all(),
                'regions' => Region::where('country_id', $broadcaster->country_id)->get(),
                'user' => Auth::user(),
                'tags' => Tag::all()
            ]);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  \App\Broadcaster $broadcaster
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Broadcaster $broadcaster)
        {
            $broadcaster->name = $request->input('name', $broadcaster->name);
            $broadcaster->frequency = $request->input('frequency', $broadcaster->frequency);
            $broadcaster->tagline = $request->input('tagline', $broadcaster->tagline);
            $broadcaster->reach = $request->input('reach', $broadcaster->reach);
            $broadcaster->city = $request->input('city', $broadcaster->city);
            $broadcaster->address = $request->input('address', $broadcaster->address);
            $broadcaster->phone = $request->input('phone', $broadcaster->phone);
            $broadcaster->stream_id = $request->input('stream_id', $broadcaster->stream_id);
            $broadcaster->region_id = $request->input('region', $broadcaster->region_id);
            $broadcaster->country_id = $request->input('country', $broadcaster->country_id);

            if ($request->hasFile('img')) {
                $file = new FileController();
                $data['artist'] = $request->input('name');
                $data['title'] = $request->input('frequency');
                $data['featured'] = '';
                $broadcaster->img = $file->prepareFile($request->file('img'), $data, 'image', 5000000);
            }

            if ($broadcaster->save()) {
                $broadcaster->tags()->sync($request->tags);
                return redirect('/broadcaster')->with(['success' => $broadcaster->name . ' has been updated!']);
            } else {
                return redirect('/broadcaster')->with(['failed' => $broadcaster->name . ' could not be updated at this time. Please try again later!']);
            }
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Broadcaster $broadcaster
         * @return \Illuminate\Http\Response
         */
        public function destroy(Broadcaster $broadcaster)
        {
            //
            $user = Auth::user()->toArray();
            if ($user['type'] === 'admin') {
                return ['delete' => $broadcaster->delete()];
            }
        }
    }
