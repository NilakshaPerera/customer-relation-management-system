@extends('layouts.admin')

@section('content')
<div class="x_panel">

    <div id="dashItemsInProgress" name="dashItemsInProgress" class="x_content">
    </div>

</div>
<form id="dashTokenInProgress" name="dashTokenInProgress">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

@endsection
