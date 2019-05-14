@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">
    <form action="{{ route('daily_reports.update', ['id' => $report->id]) }}" method="post">
      @csrf
      <input type="hidden" name="_method" value="PUT">
      <input class="form-control" name="user_id" type="hidden" value="4">
      <div class="form-group form-size-small">
        <input class="form-control" name="reporting_time" type="date" value="{{ $report->reporting_time }}">
      <span class="help-block">{{ $errors->first('reporting_time') }}</span>
      </div>
      <div class="form-group {{ $errors->has('title')? 'has-error' : '' }}">
        <input class="form-control" placeholder="Title" name="title" type="text" value="{{ $report->title }}">
      <span class="help-block">{{ $errors->first('title') }}</span>
      </div>
      <div class="form-group {{ $errors->has('contents')? 'has-error' : '' }}">
        <textarea class="form-control" placeholder="本文" name="contents" cols="50" rows="10">{{ $report->contents }}</textarea>
      <span class="help-block">{{ $errors->first('contents') }}</span>
      </div>
      <button type="submit" class="btn btn-success pull-right">Update</button>
    </form>
  </div>
</div>

@endsection

