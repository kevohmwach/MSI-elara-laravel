@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-table reports">
    <div style="overflow-x: auto;">
        {{-- {{dd($records)}} --}}

        <table class="records">
            <div class="record_filter">
                <form action="{{route('medical_history_report')}}" method="get">
                    <label for="toDate">From</label>&nbsp&nbsp&nbsp&nbsp
                    <input type="date" name="fromDate" id="fromDate" value="{{$fromDate}}" required>
                        
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                        <label for="toDate">To</label>&nbsp&nbsp&nbsp&nbsp
                        <input type="date" name="toDate" id="toDate" value="{{$toDate}}" required>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    
                        <a href="#">
                            <button type="submit" class=" btn-primary search-button ">
                                Filter
                                {{-- <i class="fa fa-search" style="font-size:20px;color:white"></i> --}}
                            </button>
                        </a>
                </form>
            </div>
            <div>
                <button class="download_button">
                    <a class="download_link" target="_blank"  href="{{route('download_medical_history_report', ['from' => $fromDate, 'to' => $toDate])}}" >Download</a>
                </button>
            </div>
            <thead style="padding:5px">
                <th>Account_No</th>
                <th>Patient's_Name</th>

                <th>Surgery_1_Doctor</th>
                <th>Surgery_1_location</th>
                <th>Surgery_1_year</th>
                <th>Surgery_2_description</th>
                <th>Surgery_2_Doctor</th>
                <th>Surgery_2_location</th>
                <th>Surgery_2_year</th>
                <th>Surgery_3_description</th>
                <th>Surgery_3_Doctor</th>
                <th>Surgery_3_location</th>
                <th>Surgery_3_year</th>
                <th>Surgery_4_description</th>
                <th>Surgery_4_Doctor</th>
                <th>Surgery_4_location</th>
                <th>Surgery_4_year</th>
                {{-- <th>Surgery_5_description</th>
                <th>Surgery_5_Doctor</th>
                <th>Surgery_5_location</th>
                <th>Surgery_5_year</th> --}}
                <th>anemia</th>
                <th>arthritis</th>
                <th>asthma</th>
                <th>Atrial_fibrillation</th>
                <th>bleeding_problems</th>
                <th>benign_prostatic_hyperplasia</th>
                <th>coronary_artery_disease</th>
                <th>cancer</th>
                <th>cardiac</th>
                <th>celiac</th>
                <th>chestPain</th>
                <th>heartfailure</th>
                <th>fatiguesyndrome</th>
                <th>depression</th>
                <th>diabetes</th>
                <th>drug_alcohol_abuse</th>
                <th>erectile_dysfunction</th>
                <th>fibromyalgia</th>
                <th>gerd</th>
                <th>heart_disease</th>
                <th>hyperinsulinemia</th>
                <th>hyperlipidemia</th>
                <th>hypertension</th>
                <th>male_hypogonadism</th>
                <th>hypogonadism</th>
                <th>Infection_problems</th>
                <th>insomnia</th>
                <th>irritable_bowel_syndrome</th>
                <th>kidney_problems</th>
                <th>menopause</th>
                <th>migranes_headaches</th>
                <th>neuropathy</th>
                <th>onychomycosis</th>
                <th>organ_injury</th>
                <th>osteoporosis</th>
                <th>pulmonary_embolism</th>
                <th>seizure_disorders</th>
                <th>short_Breath</th>
                <th>sinus_onditions</th>
                <th>stroke</th>
                <th>syndrome_x</th>
                <th>tremors</th>
                <th>wheat_allergy</th>
                <th>other_medical_problem</th>
                <th>Was_Client_discussed_at_MDT?</th>



            </thead>
            <tbody>
                @if ($records)
                    @foreach ($records as $record)
                        <tr>
                            <td>{{$record['account_no']}}</td>
                            <td>{{$record['name']}}</td>
                         

                            <td>{{$record['surgery_1_Doctor']}}</td>
                            <td>{{$record['surgery_1_location']}}</td>
                            <td>{{$record['surgery_1_year']}}</td>
                            <td>{{$record['surgery_2_description']}}</td>
                            <td>{{$record['surgery_2_Doctor']}}</td>
                            <td>{{$record['surgery_2_location']}}</td>
                            <td>{{$record['surgery_2_year']}}</td>
                            <td>{{$record['surgery_3_description']}}</td>
                            <td>{{$record['surgery_3_Doctor']}}</td>
                            <td>{{$record['surgery_3_location']}}</td>
                            <td>{{$record['surgery_3_year']}}</td>
                            <td>{{$record['surgery_4_description']}}</td>
                            <td>{{$record['surgery_4_Doctor']}}</td>
                            <td>{{$record['surgery_4_location']}}</td>
                            <td>{{$record['surgery_4_year']}}</td>
                            {{-- <td>{{$record['surgery_5_description']}}</td>
                            <td>{{$record['surgery_5_Doctor']}}</td>
                            <td>{{$record['surgery_5_location']}}</td>
                            <td>{{$record['surgery_5_year']}}</td> --}}
                            <td>{{$record['med_hist_anemia']}}</td>
                            <td>{{$record['med_hist_arthritis']}}</td>
                            <td>{{$record['med_hist_asthma']}}</td>
                            <td>{{$record['med_hist_Atrial_fibrillation']}}</td>
                            <td>{{$record['med_hist_bleeding_problems']}}</td>
                            <td>{{$record['med_hist_benign_prostatic_hyperplasia']}}</td>
                            <td>{{$record['med_hist_coronary_artery_disease']}}</td>
                            <td>{{$record['med_hist_cancer']}}</td>
                            <td>{{$record['med_hist_cardiac']}}</td>
                            <td>{{$record['med_hist_celiac']}}</td>
                            <td>{{$record['med_hist_chestPain']}}</td>
                            <td>{{$record['med_hist_heartfailure']}}</td>
                            <td>{{$record['med_hist_fatiguesyndrome']}}</td>
                            <td>{{$record['med_hist_depression']}}</td>
                            <td>{{$record['med_hist_diabetes']}}</td>
                            <td>{{$record['med_hist_drug_alcohol_abuse']}}</td>
                            <td>{{$record['med_hist_erectile_dysfunction']}}</td>
                            <td>{{$record['med_hist_fibromyalgia']}}</td>
                            <td>{{$record['med_hist_gerd']}}</td>
                            <td>{{$record['med_hist_heart_disease']}}</td>
                            <td>{{$record['med_hist_hyperinsulinemia']}}</td>
                            <td>{{$record['med_hist_hyperlipidemia']}}</td>
                            <td>{{$record['med_hist_hypertension']}}</td>
                            <td>{{$record['med_hist_male_hypogonadism']}}</td>
                            <td>{{$record['med_hist_hypogonadism']}}</td>
                            <td>{{$record['med_hist_Infection_problems']}}</td>
                            <td>{{$record['med_hist_insomnia']}}</td>
                            <td>{{$record['med_hist_irritable_bowel_syndrome']}}</td>
                            <td>{{$record['med_hist_kidney_problems']}}</td>
                            <td>{{$record['med_hist_menopause']}}</td>
                            <td>{{$record['med_hist_migranes_headaches']}}</td>
                            <td>{{$record['med_hist_neuropathy']}}</td>
                            <td>{{$record['med_hist_onychomycosis']}}</td>
                            <td>{{$record['med_hist_organ_injury']}}</td>
                            <td>{{$record['med_hist_osteoporosis']}}</td>
                            <td>{{$record['med_hist_pulmonary_embolism']}}</td>
                            <td>{{$record['med_hist_seizure_disorders']}}</td>
                            <td>{{$record['med_hist_short_Breath']}}</td>
                            <td>{{$record['med_hist_sinus_onditions']}}</td>
                            <td>{{$record['med_hist_stroke']}}</td>
                            <td>{{$record['med_hist_syndrome_x']}}</td>
                            <td>{{$record['med_hist_tremors']}}</td>
                            <td>{{$record['med_hist_wheat_allergy']}}</td>
                            <td>{{$record['any_other_medical_problem']}}</td>
                            <td>{{$record['discussed_at_mdt']}}</td>
                            

                        </tr>
                    @endforeach
                    
                @else
                    <tr>No records found</tr>
                @endif
                
            </tbody>
        </table>
    </div>
    {{-- <div class="pagination-div">
        {{$records->links('pagination::bootstrap-4')}}
    </div> --}}
</div>

@endsection
