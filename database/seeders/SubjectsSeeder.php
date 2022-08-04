<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $subjects = [
            [
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS101', 
    'description' => 'Programming Fundamentals (C Prog)',
    'lec' => 1,
    'lab' => 2,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS102', 
    'description' => 'Introduction to Computing)',
    'lec' => 1,
    'lab' => 2,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'TYPE1', 
    'description' => 'Fundamentals of Typing',
    'lec' => 1,
    'lab' => 2,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'GEC1', 
    'description' => 'Understanding the Self',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'GEC2', 
    'description' => 'Reading in Philippine History',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'FIL1', 
    'description' => 'Kontekstuwalisadong Komunikasyon',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'PE1', 
    'description' => 'Self – Testing Activities',
    'lec' => 2,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS201', 
    'description' => 'Web Development',
    'lec' => 1,
    'lab' => 2,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS103', 
    'description' => 'Intermediate Programming (C prog)',
    'lec' => 1,
    'lab' => 2,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'TYPE2', 
    'description' => 'Speed Typing',
    'lec' => 1,
    'lab' => 2,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'GEC3', 
    'description' => 'Mathematics in Modern World',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'GEC4', 
    'description' => 'Contemporary World',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'FIL2', 
    'description' => 'Dalumat ng/sa Filipino',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS104', 
    'description' => 'Algorithm’s and Data Structure (C prog)',
    'lec' => 1,
    'lab' => 2,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS105', 
    'description' => 'Information Management 1',
    'lec' => 1,
    'lab' => 2,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS202', 
    'description' => 'Object Oriented Programming 1',
    'lec' => 1,
    'lab' => 2,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS203', 
    'description' => 'Multimedia, Modelling and Simulation',
    'lec' => 1,
    'lab' => 2,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'GEC5', 
    'description' => 'Art Appreciation',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'GEC5', 
    'description' => 'Art Appreciation',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'GEC6', 
    'description' => 'Purposive Communication',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'GEELEC1', 
    'description' => 'Environmental Science',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'PE3', 
    'description' => 'Ball Games',
    'lec' => 2,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS123', 
    'description' => 'Network Management',
    'lec' => 1,
    'lab' => 2,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS301', 
    'description' => 'Object Oriented Programming 2',
    'lec' => 1,
    'lab' => 2,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS300', 
    'description' => 'Introduction to Human Computer Interaction',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'GEC7', 
    'description' => 'Ethics',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'GEC8', 
    'description' => 'Science, Technology and Society',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'GEELECT2', 
    'description' => 'Entrepreneurial Mind',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS122', 
    'description' => 'Business Analytics',
    'lec' => 2,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'PE4', 
    'description' => 'BIndoor Games',
    'lec' => 2,
    'lab' => 0,
],


[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'PRO111', 
    'description' => 'Professional Elective 1',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS302', 
    'description' => 'Advanced Networking Management',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS213', 
    'description' => 'System Architecture and Integration 1',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'FRE101', 
    'description' => 'Free Elective 1',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'FRE102', 
    'description' => 'Free Elective 2',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS426', 
    'description' => 'Information Assurance and Security 1',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'VED1', 
    'description' => 'Values Education',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'GEC9', 
    'description' => 'Life and Works of Rizal',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'GEELEC3', 
    'description' => 'Philippine Popular Culture',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'PRO112', 
    'description' => 'Professional Elective 2',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS106', 
    'description' => 'Applications Development & Emerging Technologies',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS214', 
    'description' => 'System Architecture and Integration 2',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS320', 
    'description' => 'Principles of System Administration',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS215', 
    'description' => 'Discrete Structure (w/ Programming Approach)',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS427', 
    'description' => 'Information Assurance and Security 2',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS124', 
    'description' => 'Technical Writing for Computing',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS510', 
    'description' => 'IT Project Capstone 1',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'OJT', 
    'description' => 'Internship/OJT/Practicum (500 hrs.)',
    'lec' => 0,
    'lab' => 6,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS520', 
    'description' => 'IT Project Capstone 2',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'FRE103', 
    'description' => 'Free Elective 3',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'CCS324', 
    'description' => 'Professional Ethics for IT3',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'PRO113', 
    'description' => 'Professional Elective 3',
    'lec' => 1,
    'lab' => 2,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'PRO114', 
    'description' => 'Professional Elective 4',
    'lec' => 1,
    'lab' => 2,
],

[
    'curriculum_id' => 1,
    'course_id' => 2, 
    'subject_code' => 'TM111', 
    'description' => 'Macro Perspective of Tourism and Hospitality',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 2, 
    'subject_code' => 'TM112', 
    'description' => 'Risk Mgt. as Applied to Safety, Security and Sanitation',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'ABM111', 
    'description' => 'Organization and Management',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'ABM112', 
    'description' => 'Business Marketing',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 2, 
    'subject_code' => 'TM121', 
    'description' => 'Micro Perspective of Tourism and Hospitality',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 2, 
    'subject_code' => 'TM122', 
    'description' => 'Philippine Culture and Tourism Geography',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 2, 
    'subject_code' => 'TM123', 
    'description' => 'Kitchen Essentials and Basic Food Preparation',
    'lec' => 1,
    'lab' => 2,
],

[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'ABM121', 
    'description' => 'Fundamentals of Accounting Business Mgt.',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 2, 
    'subject_code' => 'TM211', 
    'description' => 'Multi-Cultural Diversity in Workplace for Tourism Professionals',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 2, 
    'subject_code' => 'TM212', 
    'description' => 'Global Culture and Tourism Geography',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 2, 
    'subject_code' => 'TM213', 
    'description' => 'Tour and Travel Management',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 2, 
    'subject_code' => 'TM214', 
    'description' => 'Applied Business Tools and Technologies',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'ABM211', 
    'description' => 'Business Finance',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'TM221', 
    'description' => 'Tourism and Hospitality Marketing',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'TM222', 
    'description' => 'Legal Aspects in Tourism and Hospitality',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'TM223', 
    'description' => 'Tourism Policy, Planning and Development',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'TM224', 
    'description' => 'Introduction to MICE',
    'lec' => 1,
    'lab' => 2,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'TMELEC1', 
    'description' => 'Specialized Food and Beverage Service Operation',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 2, 
    'subject_code' => 'TM311', 
    'description' => 'Professional Development and Applied Ethics',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 2, 
    'subject_code' => 'TM312', 
    'description' => 'Entrepreneurship in Tourism and Hospitality',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 2, 
    'subject_code' => 'TM313', 
    'description' => 'Quality Service Mgt. in Tourism and Hospitality',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 2, 
    'subject_code' => 'TM314', 
    'description' => 'Sustainable Tourism',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 2, 
    'subject_code' => 'TMFL1', 
    'description' => 'Foreign 1 (KOREAN LANGUAGE)',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'TMELEC2', 
    'description' => 'Ecotourism Management',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'TMBM1', 
    'description' => 'Operations Management',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 2, 
    'subject_code' => 'TMFL2', 
    'description' => 'Foreign Language 2 (KOREAN LANGUAGE)',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 2, 
    'subject_code' => 'TM322', 
    'description' => 'Research in Tourism',
    'lec' => 1,
    'lab' => 2,
],

[
    'curriculum_id' => 1,
    'course_id' => 2, 
    'subject_code' => 'TM323', 
    'description' => 'Transportation Management',
    'lec' => 1,
    'lab' => 2,
],

[
    'curriculum_id' => 1,
    'course_id' => 2, 
    'subject_code' => 'TMBM2', 
    'description' => 'Strategic Management in THI',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 2, 
    'subject_code' => 'TMELEC3', 
    'description' => 'Sustainable Tourism Destination Marketing',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 2, 
    'subject_code' => 'TMELEC4', 
    'description' => 'Cruise Tourism',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 2, 
    'subject_code' => 'TMELEC5', 
    'description' => 'Convention/Conference Management',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 2, 
    'subject_code' => 'PRACT', 
    'description' => 'Practicum (600HRS)',
    'lec' => 0,
    'lab' => 6,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'ED111', 
    'description' => 'The Child & Adolescent Learners',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'ED112', 
    'description' => 'The Teaching Profession',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'MT111', 
    'description' => 'History of Math',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'MT112', 
    'description' => 'College  Advanced Algebra',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'MT112', 
    'description' => 'Logic & Set Theory',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'ED121', 
    'description' => 'The Teacher & Community School Culture & Organization Leadership',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'ED122', 
    'description' => 'Foundation of Special & Inclusive Education',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'MT121', 
    'description' => 'Plane & Solid Geometry',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'MT123', 
    'description' => 'Elementary Statistics & Probability',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'FIL3', 
    'description' => 'Sinesosyedad/ Pelikulang Panlipunan',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'ED211', 
    'description' => 'Facilitating Learner - Centered Teaching',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'ED212', 
    'description' => 'Assessment in Learning 1',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'MT221', 
    'description' => 'Modern Geometry',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'MT222', 
    'description' => 'Mathematics of Investmenty',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'MT223', 
    'description' => 'Number Theory',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'FS311', 
    'description' => 'The Learner\'s Development & Environment',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'MT222', 
    'description' => 'Advanced Statistics',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'MT222', 
    'description' => 'Advanced Statistics',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'MT223', 
    'description' => 'Calculus with Analytic Geometry',
    'lec' => 4,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'MT222', 
    'description' => 'Living in the IT Era',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'ED311', 
    'description' => 'The Teacher & the School Curriculum',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'ED312', 
    'description' => 'Building and Enhancing New Literacies across the Curriculum',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'MT311', 
    'description' => 'Problem Solving Math Investigation and Modeling',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'MT312', 
    'description' => 'Principles & Strategies in Teaching Math',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'MT312', 
    'description' => 'Calculus 2',
    'lec' => 4,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'GEC11', 
    'description' => 'Gender & Society',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'GEC12', 
    'description' => 'Reading Visual Arts',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'MT321', 
    'description' => 'Calculus 3',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'FS312', 
    'description' => 'Experiencing the Teaching Leraning Process',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'MT322', 
    'description' => 'Research in Math',
    'lec' => 4,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'ED313', 
    'description' => 'Technology for Teaching & Learning I',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'MT324', 
    'description' => 'Assessment & Evaluation in Math',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'MT323', 
    'description' => 'Technology for Teaching & Learning (Instrumentation)',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'FS411', 
    'description' => 'Technology in the Learning Environment)',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'FS412', 
    'description' => 'Exploring in the Curriculum',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'PR411', 
    'description' => 'Pre-Review',
    'lec' => 6,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'ED421', 
    'description' => 'Teaching Internship',
    'lec' => 6,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 8, 
    'subject_code' => 'ED421', 
    'description' => 'Teaching Internship',
    'lec' => 6,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'ND111', 
    'description' => 'Teaching Science in Elem. Grades',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'MT111', 
    'description' => 'Teaching Math in Primary',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'SS111', 
    'description' => 'Teaching Social Studies in Elementary Grade, Culture & Geography',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'FIL121', 
    'description' => 'Pagtuturo ng Fil. Sa Elementarya - Instraktura at Gamit ng Wikang Filipino',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'VE121', 
    'description' => 'GMRC (Edukasyon sa Pagpapahalaga)',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'NS121', 
    'description' => 'Teaching Science in Elem. Grades (Physics, Earth & Space Sciences)',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'MT211', 
    'description' => 'Teaching Math in the Intermediate Grade)',
    'lec' => 3,
    'lab' => 0,
],


[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'SS211', 
    'description' => 'Teaching Social Studies in Elementary Grade (Phil. History & Gov\'t.)',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'TLE211', 
    'description' => 'Edukasyong Pantahanan at Pangkabuhayan',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'TLE211', 
    'description' => 'Edukasyong Pantahanan at Pangkabuhayan',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'EN311', 
    'description' => 'Teaching Eng. In the Elem. Grades Through Literature',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'HU311', 
    'description' => 'Teaching Arts in Elem. Grades',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'MAPEH311', 
    'description' => 'Teaching PE & Health in the Elem. Grade',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'FIL321', 
    'description' => 'Pagtuturo ng Fil. Sa Elementarya II - Panitikan ng Pilipinas',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'RE321', 
    'description' => 'Research in Education',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'TLE321', 
    'description' => 'Edukasyong Pantahanan at Pangkabuhayan w/ Entrepreneurship',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'TB321', 
    'description' => 'Content for Mother Tongue',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'ED322', 
    'description' => 'Elective: Teaching Multi-Grade Classes',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'FS411', 
    'description' => 'Technology in the Learning Environment',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'PR413', 
    'description' => 'Pre-Review',
    'lec' => 6,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HM111', 
    'description' => 'Macro Perspective of Tourism and Hospitality',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HM112', 
    'description' => 'Risk Mgt. as Applied to Safety, Security and Sanitation',
    'lec' => 3,
    'lab' => 0,
],


[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HM121', 
    'description' => 'Micro Perspective of Tourism and Hospitality',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HM122', 
    'description' => 'Philippine Culture and Tourism Geography',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HM123', 
    'description' => 'Kitchen Essentials and Basic Food Preparation',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HM211', 
    'description' => 'Multi-Cultural Diversity in Workplace for Tourism Professionals',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HM212', 
    'description' => 'Fundamentals in Lodging Operation',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HM213', 
    'description' => 'Supply Chain Management in Hospitality Industry',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HM214', 
    'description' => 'Applied Business Tools and Techniques',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HM221', 
    'description' => 'Tourism and Hospitality Marketing',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HM222', 
    'description' => 'Legal Aspects in Tourism and Hospitality',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HM223', 
    'description' => 'Fundamentals in Food Service Operations',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HM224', 
    'description' => 'Introduction to MICE',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HMELEC1', 
    'description' => 'Front Office Operations',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HM311', 
    'description' => 'Professional Dev’t and Applied Ethics',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HM312', 
    'description' => 'Entrepreneurship in Tourism and Hospitality',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HM313', 
    'description' => 'Quality Service Mgt. in Tourism and Hospitality',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HMFL1', 
    'description' => 'Foreign Language 1 (Korean Language)',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HMELEC2', 
    'description' => 'Bread and Pastry',
    'lec' => 1,
    'lab' => 2,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HMBM1', 
    'description' => 'Operations Management',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HMFL2', 
    'description' => 'Foreign 2 (KOREAN LANGUAGE)',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HM321', 
    'description' => 'Ergonomics and Facilities Planning for H. I',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HM322', 
    'description' => 'Research in Hospitality',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HMBM2', 
    'description' => 'Strategic Management in Tourism THI',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HMELEC3', 
    'description' => 'Asian Cuisine',
    'lec' => 1,
    'lab' => 2,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HMELEC4', 
    'description' => 'Food and Beverage Cost Control',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'HMELEC5', 
    'description' => 'Catering Management',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'SCM101', 
    'description' => 'Introduction to Supply Chain Management',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'SCM102', 
    'description' => 'Warehouse Operations Management',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'CM101', 
    'description' => 'Border Control and Security',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'TM101', 
    'description' => 'Fundamentals of Customs and Tariff Management',
    'lec' => 3,
    'lab' => 0,
],


[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'CM102', 
    'description' => 'Customs Operations and Cargo Handling',
    'lec' => 3,
    'lab' => 0,
],


[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'CM102', 
    'description' => 'Customs Operations and Cargo Handling',
    'lec' => 3,
    'lab' => 0,
],


[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'CM103', 
    'description' => 'Customs Warehousing',
    'lec' => 3,
    'lab' => 0,
],


[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'TM102', 
    'description' => 'Commodity Classification Systemg',
    'lec' => 3,
    'lab' => 0,
],


[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'EC101', 
    'description' => 'International Marketing',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'EC102', 
    'description' => 'Entrepreneurial Management',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'SCM103', 
    'description' => 'Procurement and Inventory Management',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'CM104', 
    'description' => 'Customs Clearance',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'TM103', 
    'description' => 'Customs Valuation System',
    'lec' => 4,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'CBMEC2', 
    'description' => 'Strategic Management',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'SCM104', 
    'description' => 'Transportation Management',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'FL101', 
    'description' => 'Foreign Language 1 (Nihongo)',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'CM106', 
    'description' => 'Customs Post Audit, Fraud Management',
    'lec' => 5,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'TM105', 
    'description' => 'Excise Taxes, Liquidation of Duty and Surcharges',
    'lec' => 5,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'SBEC103', 
    'description' => 'Law on Partnership and Corporation',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'CA-RES102', 
    'description' => 'Customs Research 2',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'CA-RES102', 
    'description' => 'Customs Research 2',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'SBEC104', 
    'description' => 'Law on Negotiable Instruments, Sales and Bailments',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'CM107', 
    'description' => 'Ethics and Standards of Customs Broker',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'TM106', 
    'description' => 'Special Duties and Trade Remedies',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'TM107', 
    'description' => 'International Trade Organizations, Agreements and Rules of Origin',
    'lec' => 5,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'CM108', 
    'description' => 'Competency Assessment in Customs Laws',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'CM108', 
    'description' => 'Competency Assessment in Customs Laws',
    'lec' => 5,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'TM108', 
    'description' => 'Competency Assessment in Tariff',
    'lec' => 5,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 5, 
    'subject_code' => 'CA-OCL', 
    'description' => 'Off-Campus Learning',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'ENTREPCORE1', 
    'description' => 'Entrepreneurial Behavior',
    'lec' => 3,
    'lab' => 0,
],


[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'ENTREPCORE2', 
    'description' => 'Social Entrepreneurship',
    'lec' => 3,
    'lab' => 0,
],


[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'ENTREPCORE3', 
    'description' => 'Opportunity Seeking',
    'lec' => 3,
    'lab' => 0,
],


[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'ENTREPCORE4', 
    'description' => 'Microeconomics',
    'lec' => 3,
    'lab' => 0,
],



[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'ENTREPCORE5', 
    'description' => 'Human Resource Management',
    'lec' => 3,
    'lab' => 0,
],


[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'ENTREPCORE6', 
    'description' => 'Innovation Management',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'ENTREPCORE7', 
    'description' => 'Market Research and Consumer Behavior',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'ENTREPELECT1', 
    'description' => 'Elective 1',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'ENTREPCORE8', 
    'description' => 'Pricing and Costing',
    'lec' => 3,
    'lab' => 0,
],


[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'ENTREPCORE9', 
    'description' => 'Financial Management',
    'lec' => 3,
    'lab' => 0,
],


[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'ENTREPELECT2', 
    'description' => 'Elective 2',
    'lec' => 3,
    'lab' => 0,
],


[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'ENTREPTRACK1', 
    'description' => 'Track 1 (Kitchen Essentials and Basic Food Preparation)',
    'lec' => 3,
    'lab' => 0,
],


[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'ENTREPTRACK1', 
    'description' => 'Track 1 (Kitchen Essentials and Basic Food Preparation)',
    'lec' => 1,
    'lab' => 2,
],

[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'ENTREPCORE10', 
    'description' => 'Business Law and Taxation w/ Laws Affecting MSMES)',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'ENTREPCORE11', 
    'description' => 'Business Plan Preparation',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'ENTREPCORE12', 
    'description' => 'International Business and Trade',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'ENTREPELECT3', 
    'description' => 'Elective 3',
    'lec' => 3,
    'lab' => 0,
],


[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'ENTREPTRACK2', 
    'description' => 'Track 2 (Fundamentals in Food Service Operations)',
    'lec' => 3,
    'lab' => 0,
],


[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'ENTRECORE13', 
    'description' => 'Business Plan Implementation I. Product Development and Market Analysis',
    'lec' => 2,
    'lab' => 3,
],


[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'ENTRECORE14', 
    'description' => 'Programs and Policies on Enterprise Development',
    'lec' => 3,
    'lab' => 0,
],


[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'Elective4', 
    'description' => 'ENTREPELECT4',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'ENTREPELECT5', 
    'description' => 'Elective 5',
    'lec' => 3,
    'lab' => 0,
],


[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'ENTREPTRACK3', 
    'description' => 'Track 3 (Bread and Pastry)',
    'lec' => 1,
    'lab' => 2,
],


[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'ENTRECORE15', 
    'description' => 'Business Plan Implementation II',
    'lec' => 2,
    'lab' => 3,
],


[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'ENTREPTRACK4', 
    'description' => 'Track 4 (Asian Cuisines)',
    'lec' => 1,
    'lab' => 2,
],


[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CRIM1', 
    'description' => 'Introduction to Criminology',
    'lec' => 3,
    'lab' => 0,
],


[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CLJ1', 
    'description' => 'Introduction to Philippine Criminal  Justice System',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'Comp1', 
    'description' => 'Computer Application ',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'ROTC1', 
    'description' => 'Reserve Officer Training Course 1 (ROTC1)',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'AGEN1', 
    'description' => 'LOGIC (Deductive and Inductive Reasoning))',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CRIM2', 
    'description' => 'Theories and Causes of Crime)',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'LEA1', 
    'description' => 'Law Enforcement Organization and Administration (Inter Agency Approach)',
    'lec' => 4,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'PE2', 
    'description' => 'Arnis and Disarming Technique',
    'lec' => 2,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'ROTC2', 
    'description' => 'Reserve Officer Training Course 2 (ROTC2)',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 1, 
    'subject_code' => 'Comp2', 
    'description' => 'Computer Application 2',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'LEA2', 
    'description' => 'Comparative Models of Policing',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CDI1', 
    'description' => 'Fundamentals of Criminal Investigation and Intelligence',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'LEA3', 
    'description' => 'Introduction to Industrial Security Concepts',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CRIM3', 
    'description' => 'Human Behavior and Victimology',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'PE3', 
    'description' => 'First Aid and Water Safety',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'AGen2', 
    'description' => 'General Chemistry (Organic)',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CDI2', 
    'description' => 'Specialized Crime Investigation 1 with Legal Medicine',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CRIM4', 
    'description' => 'Professional Conduct and Ethical Standard',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'FRNSC1', 
    'description' => 'Personal Identification',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'FRNSC2', 
    'description' => 'Forensic Photography',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CFLM-1', 
    'description' => 'Nationalism and Patriotism with Environmental Law',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'PE4', 
    'description' => 'Fundamentals of Marksmanship',
    'lec' => 2,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'FRNSC3', 
    'description' => 'Forensic Chemistry and Toxicology',
    'lec' => 3,
    'lab' => 2,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CLJ2', 
    'description' => 'Human Rights Education',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CLJ3', 
    'description' => 'Criminal Law ( RPC Book 1)',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CA1', 
    'description' => 'Institutional Corrections',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CDI3', 
    'description' => 'Specialized Crime Investigation 2 w/ Simulation on Interrogation & Interview',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'CDI3', 
    'description' => 'Technical English 1 (Investigative Report Writing and Presentation)',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 6, 
    'subject_code' => 'CFLM-2', 
    'description' => 'Leadership, Decision Making Management and Administration',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'LEA4', 
    'description' => 'Law Enforcement Operations and Planning with Crime Mapping',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CDI4', 
    'description' => 'Traffic Management and Accident Investigation with Driving',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CA2', 
    'description' => 'Non-Institutional Correction',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'FRSNC4', 
    'description' => 'Questioned Documents Examination',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CDI7', 
    'description' => 'Fire Protection and Arson Investigation',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'FRSNC5', 
    'description' => 'Lie Detection Techniques',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CLJ4', 
    'description' => 'Criminal law Book 2',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CLJ4', 
    'description' => 'Criminal law Book 2',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CRIM5', 
    'description' => 'Juvenile Delinquency and Juvenile System',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'FRNSC6', 
    'description' => 'Forensic Ballistic',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'GEC11', 
    'description' => 'Gender & Society',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 7, 
    'subject_code' => 'GEC11', 
    'description' => 'Technical English 2 (Legal Forms)',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CDI7', 
    'description' => 'Fire Technology and Arson Investigation',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CA3', 
    'description' => 'Therapeutic Modalities',
    'lec' => 2,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CLJ5', 
    'description' => 'Evidence',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CDI8', 
    'description' => 'Vice and Drug Education Control',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CRIM6', 
    'description' => 'Dispute Resolution and Crises/ Incidents Management',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CRIM7', 
    'description' => 'Criminological Research 1 (Research Methods & Applied Statistics)',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'PRACT1', 
    'description' => 'Internship (On-the Job Training 1) 270 hrs.',
    'lec' => 0,
    'lab' => 3,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CDI9', 
    'description' => 'Introduction to Cybercrime and Environmental Laws and Protection',
    'lec' => 2,
    'lab' => 1,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CRIM8', 
    'description' => 'Criminological Research 2 (Thesis Writing and Presentation)',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 4, 
    'subject_code' => 'CRIMAUDIT1', 
    'description' => 'Program Audit',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'CLJ6', 
    'description' => 'Criminal Procedure and Court Testimony',
    'lec' => 3,
    'lab' => 0,
],

[
    'curriculum_id' => 1,
    'course_id' => 3, 
    'subject_code' => 'PRACT2', 
    'description' => 'Internship (On-the Job Training 2) 270 hrs.',
    'lec' => 0,
    'lab' => 3,
],
];

        foreach($subjects as $subject) { 
            $s = new Subject;
            $s->curriculum_id = $subject['curriculum_id'];
            $s->course_id = $subject['course_id'];
            $s->subject_code = $subject['subject_code'];
            $s->description = $subject['description'];
            $s->lec = $subject['lec'];
            $s->lab = $subject['lab'];
            $s->save();
        }
    }
}
