@extends('layouts.app')

@section('content')

<div class="wrapper-showblade" >

    {{-- {{$patients}} --}}
    {{-- <div>
        <div class="show_blade_row">
            <div>Name</div>
            <div>{{$patients->fname." ".$patients->lname}}</div>
        </div>
        <div class="show_blade_row">
            <div>Account Number</div>
            <div>{{$patients->account_no}}</div>
        </div>
        <div class="show_blade_row">
            <div>Date of birth</div>
            <div>{{$patients->birth_date}}</div>
        </div>
        <div class="show_blade_row">
            <div>Account Number</div>
            <div>{{$patients->account_no}}</div>
        </div>
        <div class="show_blade_row">
            <div>Account Number</div>
            <div>{{$patients->account_no}}</div>
        </div>
        <div class="show_blade_row">
            <div>Account Number</div>
            <div>{{$patients->account_no}}</div>
        </div>
        <div class="show_blade_row">
            <div>Account Number</div>
            <div>{{$patients->account_no}}</div>
        </div>
       
    </div> --}}


    <div>
        {{-- <div>Patient's personal details</div> --}}
        <div class="subsections_showblade">
            <p>Patient's personal details</p>
        </div>
        <table>
            <tr>
                <td class="td-showblade-property" >Patient Name</td>
                <td>{{$patients->fname." ".$patients->lname}}</td>
            </tr>
            <tr>
                <td class="td-showblade-property" style="padding: 8px">Account Number</td>
                <td>{{$patients->account_no}}</td>
            </tr>
            <tr>
                <td class="td-showblade-property" style="padding: 8px">Birth date</td>
                <td>{{$patients->birth_date}}</td>
            </tr>
            <tr>
                <td class="td-showblade-property" style="padding: 8px">Mobile Contact</td>
                <td>{{$patients->mobile_contact}}</td>
            </tr>
            <tr>
                <td class="td-showblade-property" style="padding: 8px">Email Address</td>
                <td>{{$patients->email}}</td>
            </tr>
            <tr>
                <td class="td-showblade-property" style="padding: 8px">Marital Status</td>
                <td>{{$patients->marital}}</td>
            </tr>
            <tr>
                <td class="td-showblade-property" style="padding: 8px">Emergency Contact</td>
                <td>{{$patients->emergency_contact_name}}</td>
            </tr>
            <tr>
                <td class="td-showblade-property" style="padding: 8px">Emergency Mobile</td>
                <td>{{$patients->emergency_contact_mobile}}</td>
            </tr>
            <tr>
                <td class="td-showblade-property" style="padding: 8px">Created at</td>
                <td>{{$patients->created_at}}</td>
            </tr>
            <tr>
                <td class="td-showblade-property" style="padding: 8px">On boarded by</td>
                <td>{{$createUser}}</td>
            </tr>

        </table>
        <div class="addition_info_showblade">
            <div class="subsections_showblade">
                <p>Additional Info</p>
            </div>
            <table>
                @foreach ($physicians as $physician)
                    @if ($physician[0])
                        <tr>
                            <td class="td-showblade-property" >Physician Name</td>
                            <td>{{$physician[0]}}</td>
                        </tr>
                        <tr>
                            <td class="td-showblade-property" >Physician Speciality</td>
                            <td>{{$physician[1]}}</td>
                        </tr>
                    @endif

                @endforeach

                @foreach ($allergys as $allergy)
                    @if ($allergy[0])
                        <tr>
                            <td class="td-showblade-property" >Alergy</td>
                            <td>{{$allergy[0]}}</td>
                        </tr>
                        <tr>
                            <td class="td-showblade-property" >Alergy Reaction</td>
                            <td>{{$allergy[1]}}</td>
                        </tr>
                    @endif

                @endforeach


                @foreach ($dose_n_sigs as $dose_n_sig)
                    @if ($dose_n_sig[0])
                        <tr>
                            <td class="td-showblade-property" >Dose_n_Sig</td>
                            <td>{{$allergy[0]}}</td>
                        </tr>
                        <tr>
                            <td class="td-showblade-property" >Dose_n_Sig Medication</td>
                            <td>{{$allergy[1]}}</td>
                        </tr>
                    @endif

                @endforeach
            </table>
        </div>
    </div>
       
    <div>
        <div class="subsections_showblade">
            <p>Cancer details</p>
        </div>
        @if($cancerRecord)
            <table>
                <tbody>
                    <tr>
                        <td class="td-showblade-property" >Created at</td>
                        <td>{{$cancerRecord->created_at}}</td>
                    </tr>
                    <tr>
                        <td class="td-showblade-property" >Updated at</td>
                        <td>{{$cancerRecord->updated_at}}</td>
                    </tr>
                    <tr>
                        <td class="td-showblade-property" >Current diagnosis</td>
                        <td>{{$cancerRecord->current_diagnosis}}</td>
                    </tr>
                    <tr>
                        <td class="td-showblade-property" >Diagnosis date</td>
                        <td>{{$cancerRecord->diagnosis_date}}</td>
                    </tr>
                    <tr>
                        <td class="td-showblade-property" >Had Surgery?</td>
                        <td>{{$cancerRecord->had_surgery}}</td>
                    </tr>

                    @if($cancerRecord->had_surgery=='Yes')
                        <tr>
                            <td class="td-showblade-property" >Surgery date</td>
                            <td>{{$cancerRecord->surgery_date}}</td>
                        </tr>
                        <tr>
                            <td class="td-showblade-property" >Surgeon Name</td>
                            <td>{{$cancerRecord->surgeon_name}}</td>
                        </tr>
                        <tr>
                            <td class="td-showblade-property" >Surgeon Contact</td>
                            <td>{{$cancerRecord->surgeon_phone}}</td>
                        </tr>
                        <tr>
                            <td class="td-showblade-property" >Surgery description</td>
                            <td>{{$cancerRecord->what_surgery}}</td>
                        </tr>
                        <tr>
                            <td class="td-showblade-property" >Recovered from surgery?</td>
                            <td>{{$cancerRecord->surgery_recovered}}</td>
                        </tr>
                        <tr>
                            <td class="td-showblade-property" >Surgery Complication?</td>
                            <td>{{$cancerRecord->surgery_complication}}</td>
                        </tr>
                        @if ($cancerRecord->surgery_complication=='Yes')
                            <tr>
                                <td class="td-showblade-property" >Surgery Complication</td>
                                <td> {{$cancerRecord->surgery_complication_explain}}</td>
                            </tr>
                        @endif

                    @endif

                    
                    <tr>
                        <td class="td-showblade-property" >Had radiation?</td>
                        <td>{{$cancerRecord->had_radiation}}</td>
                    </tr>
                    @if ($cancerRecord->had_radiation=='Yes')
                        <tr>
                            <td class="td-showblade-property" >Radiation date</td>
                            <td>{{$cancerRecord->radiation_date}}</td>
                        </tr>
                        <tr>
                            <td class="td-showblade-property" >Radiologist Name</td>
                            <td>{{$cancerRecord->radiologist_name}}</td>
                        </tr>
                        <tr>
                            <td class="td-showblade-property" >Radiologist Phone</td>
                            <td>{{$cancerRecord->radiologist_phone}}</td>
                        </tr>
                        <tr>
                            <td class="td-showblade-property" >Radiation treatment</td>
                            <td>{{$cancerRecord->radiation_treatment}}</td>
                        </tr>
                        <tr>
                            <td class="td-showblade-property" >Recovered from radiations?</td>
                            <td>{{$cancerRecord->radiation_recovered}}</td>
                        </tr>
                        <tr>
                            <td class="td-showblade-property" >Radiation Complications?</td>
                            <td>{{$cancerRecord->radiation_complications}}</td>
                        </tr>
                        @if($cancerRecord->radiation_complications=='Yes')
                            <tr>
                                <td class="td-showblade-property" >Radiation Complications</td>
                                <td>{{$cancerRecord->radiation_complication_explain}}</td>
                            </tr>
                        @endif
                    @endif
                    <tr>
                        <td class="td-showblade-property" >Primary Physician</td>
                        <td>{{$cancerRecord->primary_physician_name}}</td>
                    </tr>
                    <tr>
                        <td class="td-showblade-property" >Physician Contact</td>
                        <td>{{$cancerRecord->primary_physician_contact}}</td>
                    </tr>
                    
                   
                   

                    <tr>
                        <td class="td-showblade-property" >Oncologist Name</td>
                        <td>{{$cancerRecord->oncologist_name}}</td>
                    </tr>
                    <tr>
                        <td class="td-showblade-property" >Primary Worry</td>
                        <td>{{$cancerRecord->primary_worry}}</td>
                    </tr>

                    <tr>
                        <td class="td-showblade-property" >When Issue began</td>
                        <td>{{$cancerRecord->issue_began}}</td>
                    </tr>
                    <tr>
                        <td class="td-showblade-property" >In Pain?</td>
                        <td>{{$cancerRecord->in_pain}}</td>
                    </tr>
                    @if ($cancerRecord->in_pain=='Yes')
                        <tr>
                            <td class="td-showblade-property" >Pain Location</td>
                            <td>{{$cancerRecord->pain_location}}</td>
                        </tr>
                        <tr>
                            <td class="td-showblade-property" >Pain treatment</td>
                            <td>{{$cancerRecord->pain_treatment}}</td>
                        </tr>
                        <tr>
                            <td class="td-showblade-property" >Pain Change after treatment</td>
                            <td>{{$cancerRecord->pain_treatment_change}}</td>
                        </tr>
                        <tr>
                            <td class="td-showblade-property" >Pain begin trend</td>
                            <td>{{$cancerRecord->pain_begin_trend}}</td>
                        </tr>
                        <tr>
                            <td class="td-showblade-property" >Pain Frequency</td>
                            <td>{{$cancerRecord->pain_occurence}}</td>
                        </tr>
                        <tr>
                            <td class="td-showblade-property" >Pain is Worst</td>
                            <td>{{$cancerRecord->pain_worst}}</td>
                        </tr>
                        <tr>
                            <td class="td-showblade-property" >Current Symptoms</td>
                            <td>{{$cancerRecord->curr_symptoms}}</td>
                        </tr>
                        <tr>
                            <td class="td-showblade-property" >Describe Pain</td>
                            <td>{{$cancerRecord->pain_descr}}</td>
                        </tr>
                    @endif
                   
                   
                   
                    <tr>
                        <td class="td-showblade-property" >Other health Concerns</td>
                        <td>{{$cancerRecord->other_health_concerns}}</td>
                    </tr>

                    <tr>
                        <td class="td-showblade-property" >Oncologist Contact</td>
                        <td>{{$cancerRecord->oncologist_name}}</td>
                    </tr>
                    <tr>
                        <td class="td-showblade-property" >Oncologist Contact</td>
                        <td>{{$cancerRecord->oncologist_name}}</td>
                    </tr>
                </tbody>
            </table>  
        @else
            <div>No recors Found</div>
        @endif
    </div>

    {{-- <div>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
        afafqaqfqaqfqafqf <br>
    </div>
    <div></div>
    <div></div> --}}

</div>

@endsection