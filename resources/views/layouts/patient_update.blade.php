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
        .links{
            text-decoration: none;
            color:white;
        }
        .wrapper{
            width: 70%;
            margin: auto;
            border: 1px solid green;
            border-radius: 5px;
            padding: 10px 20px;
            /* height: 100vh; */
            
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
        .wrapper-updateblade{
            width: 95%;
            margin: auto;
            /* border: 1px solid green; */
            border-top: none;
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
            padding: 20px;
            /* padding-top: 30px; */
            width: 20%;
            background-color: #d7d8db;
            border-radius: 5px;
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
            border-radius: 4px;
            box-sizing: border-box;
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
        textarea {
            padding: 20px 20px;
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
        .dose_n_sig{
            padding-bottom: 50px;
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




       .form_layout{
            display: flex;
            justify-content: space-between;
            /* background-color: #a2cc3a; */
            background-color: #2b3a80;
            padding: 10px 15px;
            color: white;
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

        .dropdown_div .form_dropbtn, .dropdown_div .acc_dropbtn, .dropdown_div .record_dropbtn {
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
    <div >
        <main class="py-0">
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
          var form_Dropdown = document.getElementById("acc_Dropdown");
            if (form_Dropdown.classList.contains('show')) {
                form_Dropdown.classList.remove('show');
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
