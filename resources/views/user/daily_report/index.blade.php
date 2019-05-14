@extends ('common.user')
@section ('content')

<h2 class="brand-header">日報一覧</h2>
<div class="main-wrap">
  <div class="btn-wrapper daily-report">
    <form action="{{ route('daily_reports.search') }}" method="post">
      @csrf
      <input class="form-control" name="search-month" type="month">
      <button type="submit" class="btn btn-icon"><i class="fa fa-search"></i></button>
    </form>
    <a class="btn btn-icon" href="{{ route('daily_reports.create') }}"><i class="fa fa-plus"></i></a>
  </div>
  <div class="content-wrapper table-responsive">
    <table class="table table-striped">
      <thead>
        <tr class="row">
          <th class="col-xs-2">Date</th>
          <th class="col-xs-3">Title</th>
          <th class="col-xs-5">Content</th>
          <th class="col-xs-2"></th>
        </tr>
      </thead>
      <tbody>
      @foreach($reports as $report)
        @php
          $reporttime = new Datetime($report->reporting_time);
        @endphp
        <tr class="row">
          <td class="col-xs-2">{{ $reporttime->format('m/d(D)') }}</td>
          <td class="col-xs-3">{{ $report->title }}</td>
          <td class="col-xs-5">{{ $report->contents }}</td>
          <td class="col-xs-2"><a class="btn" href="{{ route('daily_reports.show', ['id' => $report->id]) }}"><i class="fa fa-book"></i></a></td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection

