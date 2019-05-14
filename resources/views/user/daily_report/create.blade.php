@extends ('common.user')
@section ('content')

<h2 class="brand-header">日報作成</h2>
<div class="main-wrap">
  <div class="container">
    <form action="{{ route('daily_reports.store') }}" method="post">
      @csrf
      <input class="form-control" name="user_id" type="hidden" value="{{ $user_id }}">
      <div class="form-group form-size-small">
        <input class="form-control" name="reporting_time" type="date">
        <span class="help-block"></span>
      </div>
      <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        <input class="form-control" placeholder="Title" name="title" type="text">
        <span class="help-block">{{ $errors->first('title') }}</span>
      </div>
      <div class="form-group {{ $errors->has('contents') ? 'has-error' : '' }}">
        <textarea class="form-control" placeholder="Content" name="contents" cols="50" rows="10"></textarea>
        <span class="help-block">{{ $errors->first('contents') }}</span>
      </div>
      <button type="submit" class="btn btn-success pull-right">Add</button>
    </form>
  </div>
</div>

@endsection

