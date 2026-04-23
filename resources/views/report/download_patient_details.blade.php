<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download Patient details</title>
    @php
    header('Content-type:aplication/xls');
    header('Content-Disposition:attachment;filename=patient_details'.date("Y-m-d-h:i:s").'.xls');
    @endphp
</head>
<body>
    <div class="wrapper-table reports">
        <table class="records">
            <thead style="padding:5px">
                <th>Account No</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Created</th>
                <th>Emergency Contact</th>
                <th>Emergency Phone</th>
                <th>Physician Name</th>
                <th>Physician Phone</th>
                <th>Physician Speciality</th>
            </thead>
            <tbody>
                @if ($records)
                    @foreach ($records as $record)
                        <tr>
                            <td>{{$record['account_no']}}</td>
                            <td>{{$record['name']}}</td>
                            <td>{{$record['gender']}}</td>
                            <td>{{$record['email']}}</td>
                            <td>{{$record['mobile_contact']}}</td>
                            <td>{{$record['created_at']}}</td>
                            <td>{{$record['emergency_contact_name']}}</td>
                            <td>{{$record['emergency_contact_mobile']}}</td>
                            <td>{{$record['physician_1_name']}}</td>
                            <td>{{$record['physician_1_phone']}}</td>
                            <td>{{$record['physician_1_phone']}}</td>
                        </tr>
                    @endforeach
                    
                @else
                    <tr>No records found</tr>
                @endif
                
            </tbody>
        </table>
    </div>
</body>
</html>