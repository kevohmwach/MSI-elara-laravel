<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('assets/css/site.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @livewireStyles

    <style>
        *,body{
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
        }

        /* ----------------------------------Home Page --------------------------------------- */
        .wrapper_home{
            width: 100%;
            height: 100vh;
        }
        .hero_image {
            background-image:  url("assets/images/banner.jpg");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            /* opacity: 0.1; */
        }

        .hero_text {
            text-align: center;
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }
        .home_div_text{
            padding: 15px 20px;
            margin-bottom: 50px;
            /* color: black; */
            /* font-weight: bold; */
            background-color: rgb(198, 194, 207);
            background-color: #5886a8;
            background-color: #2b3a80;
            border-radius: 10px;
            /* font-size: 16px; */
            line-height: 30px;
            text-align: left;
            font-family: Verdana, sans-serif;
        }
        .vission{
           margin-top: 200px; 
        }
        .home_div_text > h1{
            font-family: Georgia, serif;
        }

        /* ----------------------------------Home Page End --------------------------------------- */

        .links{
            text-decoration: none;
            color:white;
        }
        .link{
            text-decoration: none;
        }
        .wrapper{
            width: 70%;
            margin: auto;
            /* border: 1px solid green; */
            border-radius: 5px;
            padding: 10px 20px;
            min-height: 100vh;
            
        }
        .container{
            min-height: 100vh;
        }
        .wrapper-showblade{
            width: 90%;
            margin: 0 auto;
            /* border: 1px solid green; */
            border-radius: 5px;
            padding: 10px 20px;
            display:flex;
            /* flex-wrap: wrap; */
            
        }
        .wrapper-showblade > div{
            width: 50%;
            margin: 0 auto;
            /* border: 1px solid green; */
            /* height: 400px; */
            border-radius: 5px;
            padding: 10px 10px;
            /* display:flex; */
            
        }
        .addition_info_showblade{
            margin-top: 50px;
        }
        .subsections_showblade{
            color: white;
            font-weight: bold;
            font-size: 20px;
            text-align: center;
            background-color: grey;
            padding: 20px;
        }
        .pre_sectionTitle{
            padding-right: 20px;
        }
        .wrapper-updateblade{
            width: 95%;
            margin: auto;
            border: 1px solid green;
            border-radius: 5px;
            padding: 10px 20px;
            display: flex;
            
        }
        /* .show_blade_row{
            display: flex;
        } */
        .show_blade_row > div{
            padding: 5px 5px;
            width: 50%;
            /* border: 1px solid grey;
            border-bottom: none; */
            
        }
        .forms_updateblade{
            width: 20%;
            border-right: 1px solid green;
            padding: 20px
        }
        .client_info_updateform{
            width: 70%;
        }
        .patient_details{
            padding-top: 30px;
            width: 20%;
        }
        .patient_details_values{
            padding-bottom: 10px;
        }

        .column_1, .column_2 {
            width: 40%
    
        }
        .column_3{
            width: 20%
        }
        .form_title{
            margin: auto;
            text-align: center;
        }
        .sectionTitle{
            color: #45a049;
        }
    
        input[type=text], input[type=email], input[type=date], input[type=number], .dropdown {
            width: 100%;
            padding: 10px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-sizing: border-box;
        }
       
        input[type=search] {
            padding: 10px 20px;
            /* margin: 8px 0; */
            /* display: inline-block; */
            border: 1px solid #ccc;
            border-radius: 2px;
            box-sizing: border-box;
            /* border-right: none; */
        }
        input[type=search]:focus, .patient_search_opton:focus {
            outline: none;
            
        }
        .patient_search_opton{
            box-sizing: border-box;
            padding: 10px 20px;
            border: 1px solid #ccc;
            border-radius: 2px;
        }
    
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    
        input[type=submit]:hover {
            background-color: #45a049;
        }
        .non_textInputs{
            margin-bottom: 5px;
            box-sizing: border-box;
        }
        .row_entry{
            display: flex;
        }
        .row_entry > div{
            width: 50%;
            padding-right: 30px;
        }
        .single_item{
            display: block;
        }
        .single_item > div{
            width: 100%;
        }
        .select {
            padding: 10px 20px;
            width: 100%;
            margin-bottom: 10px;
            border-radius: 10px;
        }
        .steps{
            font-weight: bold;
            text-align: center;
            padding: 5px;
            background-color: green;
        }
        .step-one, .step-two {
            padding: 20px;
        }
        .form_buttons_update{
            margin: 10px;
            /* width: 100%; */
        }
        .pain_descr, .surgery_history, .med_history{
            display: flex;
        }
        .pain_descr > div {
            width:25%;
        }
        .surgery_history > div {
            /* width:33%; */
            margin: 5px;
        }
        .surgery_Doctor, .surgery_location{
            width: 40%;
        }
        .surgery_year{
            width: 20%;
        }
        .subsection_heading{
            font-weight: bold;
            font-size: 15px;
            color: green;
        }
        .med_history > div {
            width:50%;
        }
       .med_history_diseases{
            display: flex;
            justify-content: space-between;
       }
       .med_history_diseases > div:last-child{
            padding-right: 40px;
       }
       .disease_spacing {
            padding-left: 40px;
       }
       .disease_spacing{
            margin-right: 20px;
       }
       .td-showblade-property{
            padding: 8px; 
            font-weight:bold;
            width: 40%;
       }
       /* .td-showblade-value{
            padding: 8px; 
       } */
        .td-showblade-singleitem-value{
            padding-left: 15px;
        }
        .preconfigure_options{
            text-align: center;
        }
        .wrapper_preconfigured{
            width: 50%;
        }
       .wrapper_practioner_dex{
            width: 100%;
            border: none;
       }
       .dose_n_sig{
            padding-bottom: 30px;
       }
       textarea {
            padding: 10px
        }

        

       .form_layout{
            display: flex;
            justify-content: space-between;
            /* background-color: #a2cc3a; */
            background-color: #2b3a80;
            padding: 10px 15px;
            color: white;
            /* top:0; */
            /* position: fixed; */
            /* margin-bottom: 50px; */
       }
       .form-nav-links{
            
       }
       .form-nav-links-list{
            list-style: none;
            overflow: hidden;
            margin: 0px;
            padding: 0px;
       }
       .form-links{
            display: inline;
       }
       .form-links a {
            color:white;
            text-decoration: none;
            padding-right: 10px;
       } 
       .dropdown_content {
            position: absolute;
            float: right;
       }
       .dropdown_content a{
            display: block;
       }



       /* -------------------------------Clickable Dropdown Navbar---------------------------------------- */
       .form_navbar {
            overflow: hidden;
            padding-top: 20px;
            /* background-color: #333; */
            /* font-family: Arial, Helvetica, sans-serif; */
        }

        .form_navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            /* padding: 10px 15px; */
            padding-right: 15px;
            text-decoration: none;
        }

        .dropdown_div {
            float: left;
            overflow: hidden;
        }

        .dropdown_div .form_dropbtn, .dropdown_div .acc_dropbtn, .dropdown_div .record_dropbtn  {
            cursor: pointer;
            font-size: 16px;  
            border: none;
            outline: none;
            color: white;
            /* padding: 10px 15px; */
            padding-right: 15px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .form_navbar a:hover, .dropdown_div:hover .form_dropbtn, .form_dropbtn:focus {
            /* background-color: red; */
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 150px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown-content-account {
            min-width: 80px;
        }
        .dropdown-content a {           
            float: none;
            color: black;
            padding: 5px 5px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .show {
            display: block;
        }


        .logo_sizer{
            height: 60px; 
            width: 60px;
        }
        .logo_n_name{
            display: flex;
            align-items: center;
        }
        .app_name{
            padding: 20px;
            font-size: 18px;
        }
        .logo_image{
            border-radius: 50%; 
        }
        .patient_layout_details{
            padding: 
        }
       
         .ct4her_info_updateform{
            padding: 10px;
         }
         .record_filter{
            /* display: flex; */
            padding: 10px;
            /* border: 1px solid green; */
            align-items: center;
        }
        /* .lable{
            display: inline;
        }
        .input{
            display: inline;
        } */
        .record_filter_attachment{
            display: flex;
            align-items:baseline;
        }
        .record_filter_attachment_field{
            display: flex;
            align-items:baseline;
            /* padding: 10px; */
            /* width: 50%; */
            
        }
        .record_filter_attachment_field > div{
            padding-right: 10px;
        }
        .search-button{
            box-sizing: border-box;
            border-radius: 5px;
            padding: 13px;
            border-left: none;

        }

        /* ************************Table styles********************************************************** */
        .download_link{
        color: white;
        font-weight: bold;
        text-decoration: none;
    }
    button{
        background-color: #2b3a80;
        color: white;
        /* padding: 10px 20px; */
        border-radius: 2px;
        border: 1px;
    }

    .wrapper-table{
        width: 80%;
        margin: auto;
        padding: 20px;
        padding-top: 0px;
    }

    .records {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        .records td, .records th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        .records tr:nth-child(even){background-color: #f2f2f2;}

        .records tr:hover {background-color: #ddd;}

        .records th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #6c757d;
        color: white;
        }
        .record_filter{
            display: flex;
            padding: 10px;
            /* border: 1px solid green; */
            align-items: center;
        }
        .search-button{
            box-sizing: border-box;
            border-radius: 5px;
            padding: 13px;
            border-left: none;

        }
        .reports{
            width: 100%;
        }
        .download_button{
            padding: 10px 20px;
        }

        /* ---------------------------Footer-------------------------------------------- */
        footer{
            background-color: #2b3a80;
            width:100%;
            color: white;
            padding: 20px;
        }
        .footer{
            top:50%;
            text-align: center;
       }
    
    
    </style>

</head>
<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else


                            @if (Route::has('patientwwww'))
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Patient Forms
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="nav-link" href="{{route('patient')}}">Patients</a>
                                    <a class="nav-link" href="{{route('ct4her')}}">Facility/Physicians</a>
                                </div>
                            
                            </li>
                            @endif    

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                View Records
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="nav-link" href="{{route('patient')}}">Patients</a>
                                    <a class="nav-link" href="{{route('ct4her')}}">Facility/Physicians</a>
                                </div>
                            
                            </li>

                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   Intake Forms
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="nav-link" href="{{route('patient_register')}}">Patient Intake</a>
                                    <a class="nav-link" href="{{route('ct4her_register')}}">Facility/Physicians</a>
                                </div>
                               
                            </li>
                           










                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}




        <div class="form_layout">
            <div class="logo_n_name">
                <div class="logo-image_container">
                    <a  href="{{ url('/') }}">
                        <div class="logo_sizer" >
                            <img class="logo_image" src="{{asset('assets/images/elara_logo.png')}}" width="100%" height="100%" alt="Logo">
                        </div>
                    </a>
                </div>
        
                <div class="app_name">
                    <a  class="links" href="{{ url('/') }}">
                        Elara Health innovations
                    </a>
                </div>
            </div>
        
            <div class="form_navbar">
                {{-- <button> --}}
                    <a href="{{route('profile')}}">Templates</a>
                {{-- </button> --}}
                {{-- <button> --}}
                    <a href="{{route('report')}}">Reports</a>
                {{-- </button> --}}
               
                <div class="dropdown_div">
                    <button class="record_dropbtn" onclick="view_records()">Records
                      {{-- <i onclick="view_records()" class="fa fa-caret-down"></i> --}}
                    </button>
                    <div class="dropdown-content" id="record_Dropdown">
                      <a href="{{route('patient')}}">Patients</a>
                      <a href="{{route('ct4her')}}">Facility/Physicians</a>
                    </div>
                </div> 

                <div class="dropdown_div">
                    <button class="form_dropbtn" onclick="update_patient()">Forms 
                      {{-- <i onclick="update_patient()" class="fa fa-caret-down"></i> --}}
                    </button>
                    <div class="dropdown-content" id="form_Dropdown">
                      <a href="{{route('patient_register')}}">Patient Intake</a>
                      <a href="{{route('ct4her_register')}}">Facility/Physicians</a>
                    </div>
                </div> 
                
                <div class="dropdown_div">
                  <button class="acc_dropbtn" onclick="account()">Account 
                    {{-- <i onclick="account()" class="fa fa-caret-down"></i> --}}
                  </button>
                  <div class="dropdown-content dropdown-content-account" id="acc_Dropdown">
                    @guest
                        @if (Route::has('login'))
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif
                        @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <a href="{{route('logout')}}" 
                                onclick="event.preventDefault();    
                                document.getElementById('logout-form').submit();">
                           {{ __('Logout') }}
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>

                    @endguest
                   
                  </div>
                </div> 
              </div>
        
        </div>

        <main class="">
            @yield('content')
        </main>
    </div>
    @livewireScripts
    <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function update_patient() {
          document.getElementById("form_Dropdown").classList.toggle("show");
          //alert( document.getElementById("myDropdown").classList);
        }
        function account() {
          document.getElementById("acc_Dropdown").classList.toggle("show");
        }

        function view_records() {
          document.getElementById("record_Dropdown").classList.toggle("show");
        }
        
        // Close the dropdown if the user clicks outside of it
        window.onclick = function(e) {
          if (!e.target.matches('.form_dropbtn')) {
          var form_Dropdown = document.getElementById("form_Dropdown");
            if (form_Dropdown.classList.contains('show')) {
                form_Dropdown.classList.remove('show');
            }
          }

          if (!e.target.matches('.acc_dropbtn')) {
          var acc_Dropdown = document.getElementById("acc_Dropdown");
            if (acc_Dropdown.classList.contains('show')) {
                acc_Dropdown.classList.remove('show');
            }
          }

          if (!e.target.matches('.record_dropbtn')) {
          var record_Dropdown = document.getElementById("record_Dropdown");
            if (record_Dropdown.classList.contains('show')) {
                record_Dropdown.classList.remove('show');
            }
          }

        }
        </script>
</body>

<footer>
    <div class="footer">
        <p> <?=date('Y')?> &nbsp &#169; Elara Health innovations</p>

    </div>
</footer>

</html>
