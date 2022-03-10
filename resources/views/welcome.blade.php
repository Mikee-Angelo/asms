<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>SBCI - Academic Student Management System</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <!-- Font Awesome if you need it
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
  -->
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <!--Replace with your tailwind.css once created-->
    <link href="https://unpkg.com/@tailwindcss/custom-forms/dist/custom-forms.min.css" rel="stylesheet" />
    <!--Tailwind Custom Forms - use to standardise form fields - https://github.com/tailwindcss/custom-forms-->

    <style>
        @import url("https://rsms.me/inter/inter.css");

        html {
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI",
                Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif,
                "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol",
                "Noto Color Emoji";
        }

        .gradient {
            /* background-image: linear-gradient(-225deg, #cbbacc 0%, #000038 100%); */
            background-color: #000038
        }

        button,
        .gradient2 {
            background-color: #fff;
            /* background-image: linear-gradient(315deg, #f39f86 0%, #f9d976 74%); */
        }

        /* Browser mockup code
 * Contribute: https://gist.github.com/jarthod/8719db9fef8deb937f4f
 * Live example: https://updown.io
 */

        .browser-mockup {
            border-top: 2em solid rgba(230, 230, 230, 0.7);
            position: relative;
            height: 60vh;
        }

        .browser-mockup:before {
            display: block;
            position: absolute;
            content: "";
            top: -1.25em;
            left: 1em;
            width: 0.5em;
            height: 0.5em;
            border-radius: 50%;
            background-color: #f44;
            box-shadow: 0 0 0 2px #f44, 1.5em 0 0 2px #9b3, 3em 0 0 2px #fb5;
        }

        .browser-mockup>* {
            display: block;
        }

        /* Custom code for the demo */

    </style>
</head>

<body id="header" class="gradient leading-relaxed tracking-wide flex flex-col">
    <!--Nav-->
    <nav id="header" class="w-full z-30 top-0 text-white py-1 lg:py-6">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-2 lg:py-6">
            <div class="pl-4 flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{asset('img/logo.png')}}" class="h-12" alt="SBCI Logo">
                    </a>
                    <p class="ml-3 text-2xl">Subic Bay Colleges, Inc.</p>
                </div>
            </div>

            <div class="block lg:hidden pr-4">
                <button id="nav-toggle"
                    class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-800 hover:border-green-500 appearance-none focus:outline-none">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>

            <div class="w-full flex-grow lg:flex  lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 text-black p-4 lg:p-0 z-20"
                id="nav-content">
                <ul class="list-reset lg:flex justify-end flex-1 items-center">

                </ul>
                <button {{-- href="{{route('login')}}" --}} id="navAction"
                    class="mx-auto lg:mx-0 hover:underline text-gray-800 font-extrabold rounded mt-4 mr-4 lg:mt-0 py-4 px-8 shadow opacity-75">
                    Login
                </button>

            </div>
        </div>
    </nav>

    <div class="container mx-auto h-screen">
        <div class="text-center px-3 lg:px-0">
            <h1 class="my-4 text-2xl md:text-3xl lg:text-5xl font-black text-white leading-tight">
                Academic Student Management System
            </h1>
            <p class="leading-normal text-white text-base md:text-xl lg:text-2xl mb-8">
                Global competency, our aim!
            </p>

              <button {{-- href="{{route('login')}}" --}} id="enrollCTA"
                    class="mx-auto lg:mx-0 hover:underline text-gray-800 font-extrabold rounded mt-4 lg:mt-0 py-4 px-8 shadow opacity-75">
                    Enroll Now
                </button>

        </div>

        <div class="flex items-center w-full mx-auto content-end">
            <div class="browser-mockup flex flex-1 m-6 md:px-0 md:m-12 bg-white w-1/2 rounded shadow-xl"></div>
        </div>
    </div>

    {{-- Introduction --}}
    <section class="bg-gray-100 py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12">

            <h2 class="w-full my-2 text-5xl font-black leading-tight text-center text-gray-800">
                Brief History
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>

            <p class="w-full indent-96 text-gray-600 text-md md:text-lg px-6 mt-5">
                Subic Bay Colleges (SBCI), Inc., a non-stock and non-profit educational institution, was built through
                the efforts of its founding President, Dr. Fernando F. Julian, in November 2002 located at KDIC
                Building, Olongapo City. The very first program offered by SBCI is the 6-month Live-In Caregiver Course
                with only eighteen (18) students enrolled. After a few months, there were almost a hundred students who
                sought admission, which prompted the school to offer more TESDA programs, and necessitates its
                expansion, and occupied more rooms at KDIC Building. In June 2006, SBCI began to offer its first
                collegiate program, the Bachelor of Science in Customs Administration and followed by more CHED programs
                which require the acquisition of its present buildings, the Four-Storey Administration Building and
                Five-Storey Florenda Felipe-Julian (FFJ) Building, strategically located at No. 2 & 3 – 18th Street,
                West Bajac-Bajac, Olongapo City, respectively. Moreover, in 2010, due to the positive feedback from
                students and parents, SBCI offered Basic Education (Pre-Elementary, Elementary and High School). SBCI is
                continuously keeping abreast with the present education system (K-12) by offering Junior and Senior High
                School Programs in 2016. With the increasing number of the student population in the Basic Education,
                Subic Bay Colleges leased a four-story building (the former Lorraine Technical School) located at No. 14
                – 18th Street, West Bajac-Bajac, Olongapo City.
            </p>

            <p class="w-full indent-96 text-gray-600 text-md md:text-lg px-6 mt-6">
                This is Subic Bay Colleges (SBCI), Inc. where the global competency of our graduates is our aim.
            </p>
        </div>
    </section>

    {{-- Background of the study --}}
    <section class="bg-white py-8">
        <div class="container mx-auto flex flex-col justify-evenly pt-4 pb-12">
            <div class="flex flex-col md:flex-row items-center text-center md:text-left md:mb-7 mb-10 px-4 md:px-0">
                <img class="h-32 md:mr-10" src="{{ asset('img/vision.png')}}" alt="Vision Image">

                <div>
                    <h3 class="w-full text-lg font-black leading-tight text-gray-800 mb-5">
                        Vision
                    </h3>
                    <p class="text-md md:text-lg text-gray-600">

                        Subic Bay Colleges (SBCI), Inc. envisions itself to be the breeding ground of professionals who
                        shall
                        serve as the pillars of the economy and produce skilled workers with global competency in
                        international
                        trade and commerce.
                    </p>
                </div>
            </div>
            <div class="flex flex-col md:flex-row items-center text-center md:text-left md:mb-7  px-4 md:px-0">
                <img class="h-32 md:mr-10" src="{{ asset('img/mission.jpeg')}}" alt="Mission Image">

                <div>

                    <h3 class="w-full text-lg font-black leading-tight text-gray-800 mb-5">
                        Mission
                    </h3>
                    <p class="text-md md:text-lg text-gray-600">

                        Guided by its vision, SBCI is committed to the total development of man imbued with inherent
                        intellectual and physical capabilities to enable him to participate in nation-building. It aims
                        to
                        accomplish this through the development of its infrastructure, physical plant facilities, and
                        human
                        resource training and development.
                    </p>

                </div>

            </div>
            <div class="flex flex-col md:flex-row items-center md:mb-7 mb-10 px-4 md:px-0">
                <img class="h-32 md:mr-10" src="{{ asset('img/goal.png')}}" alt="Goal Image">

                <div>
                    <h3 class="w-full text-lg font-black leading-tight text-center md:text-left text-gray-800 mb-5">
                        Goal
                    </h3>
                    <p class="w-full text-md md:text-lg text-gray-600">• To develop and offer programs that are
                        designed to produce professionals who shall serve as the pillar
                        of the economy.</p>

                    <p class="w-full text-md md:text-lg text-gray-600">• To promote research and studies in the areas of
                        business management, entrepreneurship, and human
                        resource development and management.</p>

                    <p class="w-full text-md md:text-lg text-gray-600">• To assist the national government in providing
                        Filipino youth skills development training for
                        gainful employment here and abroad.</p>

                    <p class="w-full text-md md:text-lg text-gray-600">• To produce experts and skilled employees with
                        ethical principles, excellent human relationships, and
                        strong faith in God.</p>

                </div>

            </div>
            <div class="flex flex-col md:flex-row items-center px-4 md:px-0">
                <img class="h-32 md:mr-10" src="{{ asset('img/objective.png')}}" alt="Objective Image">

                <div>

                     <h3 class="w-full text-lg font-black leading-tight text-center md:text-left text-gray-800 mb-5">
                        Objective
                    </h3>

                    <p class="w-full text-md md:text-lg text-gray-600">• To, carry out sustainable institutional growth
                        and development.</p>
                    <p class="w-full text-md md:text-lg text-gray-600">• To make higher education accessible to all
                        Filipinos.</p>
                    <p class="w-full text-md md:text-lg text-gray-600">• To review the curricula at regular intervals to
                        ensure their relevance to the industry.</p>
                    <p class="w-full text-md md:text-lg text-gray-600">• To establish networking and linkages with other
                        educational institutions and industries to establish an active relationship for mutual benefit.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- Objective of the study --}}
    <section class="bg-gray-100 py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12">
            <h2 class="w-full my-2 text-5xl font-black leading-tight text-center text-gray-800">
                Objective of the study
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>

            <h3 class="w-full px-6 my-2 text-lg font-black leading-tight text-gray-800 mt-10">
                General Objectives
            </h3>

            <p class="w-full indent-96 text-gray-600 text-md md:text-lg px-6 mt-2">
                The general objective of the study is to design and develop a SBCI Student Management System, that will
                provide a systematic organized process .
            </p>

            <h3 class="w-full px-6 my-2 text-lg font-black leading-tight text-gray-800 mt-10">
                Specific Objectives
            </h3>

            <p class="w-full indent-96 text-gray-600 text-md md:text-lg px-6 mt-2">
                The general objective of the study is to design and develop a SBCI Student Management System, that will
                provide a systematic organized process .
            </p>

            <p class="w-full  text-gray-600 text-md md:text-lg px-6 mt-6">
                Students
            </p>

            <p class="w-full text-md md:text-lg text-gray-600 px-6 mt-2">• To design module for enrollment system with
                curriculum/course evaluation.</p>
            <p class="w-full text-md md:text-lg text-gray-600 px-6 mt-2">• To design and develop a database storage for
                student information.</p>
            <p class="w-full text-md md:text-lg text-gray-600 px-6 mt-2">• To manage student grades of SBCI Students.
            </p>
            <p class="w-full text-md md:text-lg text-gray-600 px-6 mt-2">• To design a proposed system in terms of
                saving time, and deducting the burden
                of the Registrar’s Office and SBCI Students. </p>
        </div>
    </section>

    {{-- Scope and limitation of the study --}}
    <section class="bg-white py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12">
            <h2 class="w-full my-2 text-5xl font-black leading-tight text-center text-gray-800">
                Scope and limitation of the study
            </h2>
            <div class="w-full mb-4 ">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>

            <p class="w-full indent-96 text-gray-600 text-md md:text-lg px-6 mt-10">
                Aim to identify the potential weakness of the study and clarify the boundaries and exception of the
                system.
            </p>

            <h3 class="w-full px-6 my-2 text-lg font-black leading-tight text-gray-800 mt-10">
                Scope
            </h3>

            <p class="w-full indent-96 text-gray-600 text-md md:text-lg px-6 mt-2">
                The general intent of this study focuses on the development of SBCI Student Management System that will
                serves as a portal for the students. However, the study focuses on the following:
            </p>

            <p class="w-full text-md md:text-lg text-gray-600 px-6 mt-6">• Student Management: This is a customized
                module where student’s details are maintained and stored for future. The information can be used when
                required by the registrar.</p>
            <p class="w-full text-md md:text-lg text-gray-600 px-6 mt-2">• Enrollment Management: This makes the
                enrollment process easy, faster and paperless. Enrolling through online admission form has made the
                entire process easier and provides clear visibility on student’s details which can be securely stored
                for future endeavors.</p>
            <p class="w-full text-md md:text-lg text-gray-600 px-6 mt-2">• Year Level and Subject Management: It allows
                faculty posting of class subject such as course syllabus and handouts.</p>
            <p class="w-full text-md md:text-lg text-gray-600 px-6 mt-2">• Grading System: It allows faculty to manage
                class grades and submit grades. Professors can access list of students for each class that they are
                teaching and perform standard school management such as to submit final grades, incompletes, and failed
                information.</p>
            <p class="w-full text-md md:text-lg text-gray-600 px-6 mt-2">• Hardware and Software specifications :The
                SBCI Student Management System is intended for Desktop and Mobile phone.</p>
            <p class="w-full text-md md:text-lg text-gray-600 px-6 mt-2">• Access Control: Only the Registrar can access
                the whole system. While the SBCI Students can view their all information</p>


            <h3 class="w-full px-6 my-2 text-lg font-black leading-tight text-gray-800 mt-10">
                Limitation
            </h3>

            <p class="w-full text-md md:text-lg text-gray-600 px-6 mt-6">1. Students</p>
            <ul class="mt-3">
                <li class="ml-5">
                    <p class="w-full text-md md:text-lg text-gray-600 px-6">1.1 Login</p>
                </li>

                <li class="ml-5 mt-2">
                    <p class="w-full text-md md:text-lg text-gray-600 px-6">1.2 Check his/her personal information</p>
                </li>

                <li class="ml-5 mt-2">
                    <p class="w-full text-md md:text-lg text-gray-600 px-6">1.3 Evaluate enrollment status</p>
                </li>

                <li class="ml-5 mt-2">
                    <p class="w-full text-md md:text-lg text-gray-600 px-6">1.4 Check year level</p>
                </li>

                <li class="ml-5 mt-2">
                    <p class="w-full text-md md:text-lg text-gray-600 px-6">1.5 Evaluate Grade</p>
                </li>

                <li class="ml-5 mt-2">
                    <p class="w-full text-md md:text-lg text-gray-600 px-6">1.6 Add and Drop Subject</p>
                </li>


                <p class="w-full text-md md:text-lg text-gray-600 px-6 mt-6">2. Registrar</p>
                <ul class="mt-3">
                    <li class="ml-5">
                        <p class="w-full text-md md:text-lg text-gray-600 px-6">2.1 Have the access to the whole system
                        </p>
                    </li>

                    <li class="ml-5 mt-2">
                        <p class="w-full text-md md:text-lg text-gray-600 px-6">2.2 Record SBCI Student Information</p>
                    </li>

                    <li class="ml-5 mt-2">
                        <p class="w-full text-md md:text-lg text-gray-600 px-6">2.3 Enroll Student</p>
                    </li>

                    <li class="ml-5 mt-2">
                        <p class="w-full text-md md:text-lg text-gray-600 px-6">2.4 Add/ View / Delete Students</p>
                    </li>

                    <li class="ml-5 mt-2">
                        <p class="w-full text-md md:text-lg text-gray-600 px-6">2.5 Create Year level</p>
                    </li>

                    <li class="ml-5 mt-2">
                        <p class="w-full text-md md:text-lg text-gray-600 px-6">2.6 Generate grade and subject</p>
                    </li>

                    <li class="ml-5 mt-2">
                        <p class="w-full text-md md:text-lg text-gray-600 px-6">2.7 Enrollment form and student grades
                            printing</p>
                    </li>
                </ul>
        </div>
    </section>



    {{-- Significance of the study --}}
    <section class="bg-gray-100 py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12">

            <h2 class="w-full my-2 text-5xl font-black leading-tight text-center text-gray-800">
                Significance of the study
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>

            <p class="w-full indent-96 text-gray-600 text-md md:text-lg px-6 mt-10">
                The proposed study is intended of keeping records, enrollment process, year level, subject, and also the
                grades of the Student in Subic Bay Colleges Inc. and eventually to upgrade its operation in order to
                facilitate be able to recognize pertinent information, enrollment processes, year level, subject and
                grades of students. This study was conducted for the benefit of the School, Registrar’s Office,
                Teachers, School Head, Students, Researchers and Future Researchers as well.
            </p>

            <p class="w-full indent-96 text-gray-600 text-md md:text-lg px-6 mt-6">
                <span class="font-black">The School. </span>The proposed system is intended for the school of Subic Bay
                Colleges Inc. which is more improving delivery of service especially in keeping the information,
                registration, course and subject and grading system of a students . This study leads to the development
                of a computerized information system in the most practicable way.
            </p>

            <p class="w-full indent-96 text-gray-600 text-md md:text-lg px-6 mt-6">
                <span class="font-black">The Registrar’s Office. </span>The Registrar can access and monitor the Student
                Information and this will helps them to lessen their workload.
            </p>

            <p class="w-full indent-96 text-gray-600 text-md md:text-lg px-6 mt-6">
                <span class="font-black">The Teachers. </span>This leads them to a reduction in workload and saves them
                time that could be better spent in the class.</p>

            <p class="w-full indent-96 text-gray-600 text-md md:text-lg px-6 mt-6">
                <span class="font-black">The School Head. </span>This study will help them to organize procedure and
                different transactions in school.</p>

            <p class="w-full indent-96 text-gray-600 text-md md:text-lg px-6 mt-6">
                <span class="font-black">The Students. </span>The development of the system is to lessen the burden in
                keeping information, registration, course and subject, and class grades of the students through the
                computerized student information system.</p>

            <p class="w-full indent-96 text-gray-600 text-md md:text-lg px-6 mt-6">
                <span class="font-black">The Researchers. </span>By study, the researchers gain additional knowledge and
                have the opportunity to develop their skills in system analysis and software development.</p>

            <p class="w-full indent-96 text-gray-600 text-md md:text-lg px-6 mt-6">
                <span class="font-black">The Future Researchers. </span>This study will serve as reference for future
                researchers. It will serve as a guide on how to conduct such study to do better of necessary.</p>
        </div>
    </section>

    {{-- Conceptual Framework of the study --}}
    <section class="bg-white py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12">
            <h2 class="w-full my-2 text-5xl font-black leading-tight text-center text-gray-800">
                Conceptual Framework of the Study
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>

            <h3 class="w-full px-6 my-2 text-lg font-black leading-tight text-gray-800 mt-10">
                Definition of terms
            </h3>

            <p class="w-full indent-96 text-gray-600 text-md md:text-lg px-6 mt-6">
                For clarity, the following terms are defined operationally and conceptually:
            </p>

            <p class="w-full indent-96 text-gray-600 text-md md:text-lg px-6 mt-6">
                <span class="font-black">Database. </span>A digital tracking system that maintain the record of all the
                SBCI Students.</p>

            <p class="w-full indent-96 text-gray-600 text-md md:text-lg px-6 mt-6">
                <span class="font-black">Manual Based System. </span>Is a bookkeeping system where the SBCI Students
                record are maintained by hand, without using a computer system.</p>

            <p class="w-full indent-96 text-gray-600 text-md md:text-lg px-6 mt-6">
                <span class="font-black">SBCI Student Management System. </span>It is a web-based application, that
                keeps the personal information, enrollment process, year level, subject and grades of a student.</p>

            <p class="w-full indent-96 text-gray-600 text-md md:text-lg px-6 mt-6">
                <span class="font-black">Student Data Right. </span>A secured SBCI Student Management System would
                prefer the security of student’s information as the most crucial aspect of the job. It values security
                and uses inbuilt mechanisms to deal with sensitive or vulnerable information. </p>

            <p class="w-full indent-96 text-gray-600 text-md md:text-lg px-6 mt-6">
                <span class="font-black">Web-based application software. </span>A software package that can be accessed
                through the web browser. </p>

        </div>
    </section>

    <!--Footer-->
    <footer class="gradient ">
        <div class="container mx-auto mt-8 px-8">
            <div class="w-full flex items-center flex-col md:flex-row py-6 ">
                <div class="flex-1 mb-6">
                    <a class="text-orange-600 no-underline hover:no-underline font-bold text-2xl lg:text-4xl text-white"
                        href="#">
                        <svg class="h-6 w-6 inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M13 8V0L8.11 5.87 3 12h4v8L17 8h-4z" />
                        </svg>
                        SBCI - ASMS
                    </a>
                </div>

                <div class="flex-1">
                    <p class="uppercase font-extrabold text-white md:mb-6">Links</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="text-white font-light no-underline hover:underline hover:text-orange-500">FAQ</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="text-white font-light no-underline hover:underline hover:text-orange-500">Help</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="text-white font-light no-underline hover:underline hover:text-orange-500">Support</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase font-extrabold text-white md:mb-6">Legal</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="font-light no-underline hover:underline text-white hover:text-orange-500">Terms</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="font-light no-underline hover:underline text-white hover:text-orange-500">Privacy</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase font-extrabold text-white md:mb-6">Social</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="font-light no-underline hover:underline text-white hover:text-orange-500">Facebook</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="font-light no-underline hover:underline text-white hover:text-orange-500">Linkedin</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="font-light no-underline hover:underline text-white hover:text-orange-500">Twitter</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase font-extrabold text-white md:mb-6">
                        Company
                    </p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="font-light no-underline hover:underline text-white hover:text-orange-500">Official
                                Blog</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="font-light no-underline hover:underline text-white hover:text-orange-500">About
                                Us</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="font-light no-underline hover:underline text-white hover:text-orange-500">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script>
        /*Toggle dropdown list*/
        /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

        var navMenuDiv = document.getElementById("nav-content");
        var navMenu = document.getElementById("nav-toggle");
        var navAction = document.getElementById('navAction');
        var enrollCTA = document.getElementById('enrollCTA');

        navAction.onclick = () => {
            // console.log('HELLO');
            window.location.href = "{{route('login')}}";
        }

        enrollCTA.onclick = () => {
            // console.log('HELLO');
            window.location.href = "{{ route('enroll') }}";
        }


        document.onclick = check;

        function check(e) {
            var target = (e && e.target) || (event && event.srcElement);

            //Nav Menu
            if (!checkParent(target, navMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, navMenu)) {
                    // click on the link
                    if (navMenuDiv.classList.contains("hidden")) {
                        navMenuDiv.classList.remove("hidden");
                    } else {
                        navMenuDiv.classList.add("hidden");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    navMenuDiv.classList.add("hidden");
                }
            }
        }

        function checkParent(t, elm) {
            while (t.parentNode) {
                if (t == elm) {
                    return true;
                }
                t = t.parentNode;
            }
            return false;
        }

    </script>
</body>

</html>
