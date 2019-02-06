@extends('layouts.admin')

@section('content')
<div class="x_panel">

    <div id="dashItems" name="dashItems" class="x_content">
    </div>

</div>
<form id="dashToken" name="dashToken">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

@endsection
