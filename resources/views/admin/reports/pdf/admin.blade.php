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
<h1>LIST OF CLIENT'S ACCOUNTS</h1>
<table class="redTable">
    <thead>
    <tr>
        <th><b>ID</b></th>
        <th><b>CLIENT'S NAME</b></th>
        <th><b>EMAIL</b></th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $data)
        <tr>
            <td>{{$data->id}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->email}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
