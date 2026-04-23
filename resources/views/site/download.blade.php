<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download</title>
</head>

<style>
    
    .wrapper-table{
        width: 80%;
        margin: auto;
        padding: 20px;
    }

    .results {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        .results td, .results th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        .results tr:nth-child(even){background-color: #f2f2f2;}

        .results tr:hover {background-color: #ddd;}

        .results th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
        }


</style>

<body>
    @php
        header('Content-type:aplication/xls');
        header('Content-Disposition:attachment;filename=results'.date("Y-m-d-h:i:s").'.xls');
    @endphp
    <div class="wrapper-table">
        
        <table class="results">
            <thead style="padding:5px">
                <th style="padding:10px">First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>County</th>
            </thead>
            <tbody>
                {{-- dd({{$results}}) --}}
                @foreach ($results as $result)
                    <tr>
                        <td>{{$result['surv_fname']}}</td>
                        <td>{{$result['surv_lname']}}</td>
                        <td>{{$result['surv_gender']}}</td>
                        <td>{{$result['surv_age']}}</td>
                        <td>{{$result['surv_county']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>