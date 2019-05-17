<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests\User\DailyReportRequest;
use App\Http\Controllers\Controller;
use App\Models\DailyReport;
use Illuminate\Support\Facades\Auth;
class DailyReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $dailyreport;
    public function __construct(DailyReport $report)
    {
        $this->middleware('auth');
        $this->dailyreport = $report;
    }

    public function index(Request $request)
    {
        //
        $input = $request->input('search-month');
        if($input) {
            $month = substr($input, -2);
            $searchedreports = DailyReport::whereMonth('reporting_time', $month)->get();
            return view('user.daily_report.index', ['reports' => $searchedreports]);
        } else {
            $reports = $this->dailyreport->all();
            return view('user.daily_report.index', compact('reports'));
        }   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user_id = Auth::id();
        return view('user.daily_report.create', compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DailyReportRequest $request)
    {
        //
        $input = $request->all();
        $this->dailyreport->create($input);
        return redirect()->route('daily_reports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $report = $this->dailyreport->where(['id' => $id])->first();
        return view('user.daily_report.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user_id = Auth::id();
        $report = $this->dailyreport->where('id', $id)->first();
        return view('user.daily_report.edit', compact('report', 'user_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DailyReportRequest $request, $id)
    {
        //
        $input = $request->all();
        $this->dailyreport->where('id', $id)->first()->update($input);
        return redirect()->route('daily_reports.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->dailyreport->find($id)->delete();
        return redirect()->route('daily_reports.index');
    }
    
}
