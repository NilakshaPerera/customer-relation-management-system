@extends('layouts.admin')

@section('content')
<div class="text-right">
    <form id="frmrefreshlog" name="frmrefreshlog" type="post">
        <button id="" name="" type="submit"  class="btn btn-round btn-default"><i class="fa fa-refresh"></i></button>
    </form>
</div>

<div id="refreshLog" name="refreshLog">
    
    
</div>

<form id="logToken" name="logToken">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

@endsection