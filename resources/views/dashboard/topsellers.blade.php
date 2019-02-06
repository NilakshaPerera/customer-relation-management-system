@extends('layouts.admin')

@section('content')
<div class="x_panel">

    <div id="dashTopSellers" name="dashTopSellers" class="x_content">
    </div>

</div>
<form id="dashTokenTopSellers" name="dashTokenTopSellers">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

@endsection
