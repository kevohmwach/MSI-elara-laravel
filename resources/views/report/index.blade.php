@extends('layouts.app')

@section('content')

    <div class="wrapper">
        <table class="records">
            <thead>
                <th>Report</th>
                <th>Action</th>
            </thead>
            <tbody>
                <tr>
                    <td>Patient Details</td>
                    <td>
                        <a class="link" href="{{route('patient_details_report')}}">Generate</a>
                    </td>
                </tr>
                <tr>
                    <td>Dose & Sig</td>
                    <td>
                        <a class="link" href="{{route('dose_n_sig_report')}}">Generate</a>
                    </td>
                </tr>

                <tr>
                    <td>Patient's Attachments</td>
                    <td>
                        <a class="link" href="{{route('patient_attachment_report')}}">Generate</a>
                    </td>
                </tr>
                <tr>
                    <td>Cancer Report</td>
                    <td>
                        <a class="link" href="{{route('cancer_report')}}">Generate</a>
                    </td>
                </tr>
                <tr>
                    <td>Medical History</td>
                    <td>
                        <a class="link" href="{{route('medical_history_report')}}">Generate</a>
                    </td>
                </tr>
                <tr>
                    <td>Social History</td>
                    <td>
                        <a class="link" href="{{route('social_history_report')}}">Generate</a>
                    </td>
                </tr>
                <tr>
                    <td>Call  Script</td>
                    <td>
                        <a class="link" href="{{route('call_script_report')}}">Generate</a>
                    </td>
                </tr>
                <tr>
                    <td>CT4HER</td>
                    <td>
                        <a class="link" href="{{route('ct4her_report')}}">Generate</a>
                    </td>
                </tr>
                <tr>
                    <td>Adverse Events</td>
                    <td>
                        <a class="link" href="{{route('adverse_report')}}">Generate</a>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>






@endsection