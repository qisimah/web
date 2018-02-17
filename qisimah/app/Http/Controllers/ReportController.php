<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Broadcaster;
use App\File;
use App\Report;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function month()
    {
        $user = Auth::user();
        return view("pages.reports-dash", compact('user'));
    }

    public function getMonthlyReport()
    {
        return [
            Report::getReportMonthly(),
            Report::getTopBroadcastersInRegions(1),
            Report::rankBroadcasters(Broadcaster::getBroadcastersInRegions(1)),
            Report::top5PlaysForQuarter(),
            Report::top5Broadcasters(),
            Report::getCountryPlays()
        ];
    }

    public function fetchContentPlays(Request $request)
    {
//        return $request->all();
        $this->validate($request, [
            'q_id'          =>  'bail|required|exists:files|size:32',
            'start_date'    =>  'bail|required|date',
            'end_date'      =>  'bail|required|date',
            'show'          =>  'required'
        ],[
            'q_id.required' => 'The title field is required',
            'q_id.exists'   => 'The title specified does not exists'
        ]);

        $request->flash();

        if ($request->show === 'plays') {
            return redirect("report/plays/$request->q_id/$request->start_date/$request->end_date");
        } elseif( $request->show === 'heat map' ) {
            return redirect("report/heat-map/$request->q_id/$request->start_date/$request->end_date");
        }
    }

    public function content($file_id, $start, $end)
    {
        $records = self::getContentPlays($file_id, $start, $end);
        $user = Auth::user();
        $title = File::where('q_id', $file_id)->first()->title;
        if ($user->type === 'admin') {
            $artists = Artist::orderBy('nick_name', 'asc')->get();
        } else {
            $artists = User::find(Auth::id())->artists;
        }
        return view('pages.content-plays', compact('records', 'user', 'artists', 'title', 'start', 'end', 'file_id'));
    }

    public function heatMap($file_id, $start, $end)
    {
        $title = File::where('q_id', $file_id)->first()->title;
        $user = Auth::user();
        if ($user->type === 'admin') {
            $artists = Artist::orderBy('nick_name', 'asc')->get();
        } else {
            $artists = User::find(Auth::id())->artists;
        }
        return view('pages.content-heat-map', compact('user', 'artists', 'title', 'records', 'start', 'end', 'file_id'));
    }

    public function getContentPlays($file_id, $start, $end)
    {
        $isRange = Carbon::parse($start)->diffInDays(Carbon::parse($end));
        if ($isRange){
            return File::where('q_id', $file_id)->first()->plays()
                ->whereBetween('created_at', [Carbon::parse($start)->toDateString(), Carbon::parse($end)->addDay()->toDateString()])
                ->with('broadcaster')->paginate(20);
        }
        return File::where('q_id', $file_id)->first()->plays()->whereDate('created_at', $start)->with('broadcaster')->paginate(20);
    }

}
