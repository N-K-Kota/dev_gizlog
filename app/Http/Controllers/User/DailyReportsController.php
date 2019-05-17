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
        $this->dailyReport = $report;
    }

    public function index(Request $request)
    {
        if($request->filled('search-month')) {
            $input = $request->only('search-month');
            $month = substr($input['search-month'], -2);
            $reports = DailyReport::whereMonth('reporting_time', $month)->get();
        } else {
            $reports = $this->dailyReport->all();
        }   
        return view('user.daily_report.index', ['reports' => $reports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $input = $request->all();
        $this->dailyReport->create($input);
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
        $report = $this->dailyReport->find($id);
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
        $user_id = Auth::id();
        $report = $this->dailyReport->find($id);
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
        $input = $request->all();
        $this->dailyReport->find($id)->update($input);
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
        $this->dailyReport->find($id)->delete();
        return redirect()->route('daily_reports.index');
    }
    
}
