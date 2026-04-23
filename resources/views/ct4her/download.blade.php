
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download</title>
</head>

<style>
    a{
        text-decoration: none;
        color: white
    }
    button{
        background-color: rgb(226, 165, 165);
        color: white;
        padding: 10px 20px;
        border-radius: 2px;
        border: 1px;
    }

    .wrapper-table{
        width: 80%;
        margin: auto;
        padding: 20px;
    }

    .patients {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        .patients td, .patients th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        .patients tr:nth-child(even){background-color: #f2f2f2;}

        .patients tr:hover {background-color: #ddd;}

        .patients th {
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
    
        <table class="patients">
            <thead style="padding:5px">
                <th>Account No</th>
                <th>Facility Name</th>
                <th>Facility Email</th>
                <th>Facility Contact Person</th>
                <th>Contact Person Phone</th>
                <th>Facility Type</th>
                {{-- <th>Action</th> --}}
            </thead>
            <tbody>
                @foreach ($ct4hers as $ct4her)
                    <tr>
                        <td>{{$ct4her['ct4her_account_no']}}</td>
                        <td>{{$ct4her['facility_name']}}</td>
                        <td>{{$ct4her['facility_email_address']}}</td>
                        <td>{{$ct4her['facility_contact_person']}}</td>
                        <td>{{$ct4her['facility_contact_person_phone']}}</td>
                        <td>{{$ct4her['facility_type']}}</td>
                        
                        {{-- <td>
                            <a href="{{route('ct4her_update', ['id'=>$ct4her['id'] ] )}}" >Update</a>
                        </td> --}}
    
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

