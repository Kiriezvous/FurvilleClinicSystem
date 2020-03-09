<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Generated Report: User</title>
    <!-- Tell the browser to be responsive to screen width -->
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    table.redTable {
        border: 2px solid #FF8D00;
        background-color: #EEE7DB;
        width: 100%;
        text-align: center;
        border-collapse: collapse;
    }
    table.redTable td, table.redTable th {
        border: 1px solid #AAAAAA;
        padding: 3px 2px;
    }
    table.redTable tbody td {
        font-size: 13px;
    }
    table.redTable tr:nth-child(even) {
        background: #F5C885;
    }
    table.redTable thead {
        background: #FEB700;
    }
    table.redTable thead th {
        font-size: 19px;
        font-weight: bold;
        color: #FFFFFF;
        text-align: center;
        border-left: 2px solid #FF8D00;
    }
    table.redTable thead th:first-child {
        border-left: none;
    }

    table.redTable tfoot {
        font-size: 13px;
        font-weight: bold;
        color: #FFFFFF;
        background: #FEB700;
    }
    table.redTable tfoot td {
        font-size: 13px;
    }
    table.redTable tfoot .links {
        text-align: right;
    }
    table.redTable tfoot .links a{
        display: inline-block;
        background: #FFFFFF;
        color: #A40808;
        padding: 2px 8px;
        border-radius: 5px;
    }
</style>
</head>
<body>
<h1>LIST OF PATIENTS</h1>
<table class="redTable">
    <thead>
    <tr>
        <th>#</th>
        <td class="th-lg"><b>Type</b></td>
        <th class="th-lg">Pet's Name</th>
        <th class="th-lg">Owner's Name</th>
        <th class="th-lg">Gender</th>
        <th class="th-lg">Blood Type</th>
        <th class="th-lg">Weight</th>
        <th class="th-lg">Height</th>

    </tr>
    </thead>
    <tbody>
    @foreach($users as $data)
        <tr>
            <th scope="row">{{$data->id}}</th>
            <td>{{$data->pettype->name}}</td>
            <td>{{$data->pet_name}}</td>
            <td>{{$data->users->name}}</td>
            <td>{{$data->gender}}</td>
            <td>{{$data->bloodtypes->blood_type}}</td>
            <td>{{$data->weight}}</td>
            <td>{{$data->height}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
