<div style="background-color:#f2f2f2;padding: 5px;">
     Welcome, SDF War room<br>
    You have a new lead.<br>
<table class="table">
   <tr>
       <td>
    Name : {{ $data->name }} <br>
       </td>
   </tr>
    <tr>
        <td>
    email : {{ $data->email }}<br>
        </td>
    </tr>
    <tr>
        <td>
    Contact Number : {{ $data->phone }}<br>
        </td>
    </tr>
    <tr>
        <td>
    Added User : {{ $data->user->name }}<br>
        </td>
    </tr>

</table>




    Have a Great Day,<br>
    <strong>{{ config('app.name') }}</strong>
</div>

