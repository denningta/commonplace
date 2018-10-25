@extends ('layouts.master')

@section ('content')

<div id="app">
  <instant-search :user_id="{!! json_encode($user_id) !!}"></instant-search>
</div>

@endsection

