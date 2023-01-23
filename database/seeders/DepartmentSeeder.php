<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use DB;
class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $departments = array(
            array('department_name' => 'Acacia Hall', 'department_code' => 'SDGUMAM01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Accountancy', 'department_code' => 'COBACCOU01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Accounting Office', 'department_code' => 'ASACCOU01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Accreditation Center', 'department_code' => 'ASACCRE01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Advancement Office', 'department_code' => 'ASADVAN01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Alumni center & Detwiler', 'department_code' => 'IADALUMN01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'AVPF', 'department_code' => 'ASTREAS01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Audio Visual Center', 'department_code' => 'SSAUDIO01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Biology', 'department_code' => 'CASTBIOLO01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Business Administration', 'department_code' => 'COBCOMME01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Cadena De Amor Hall', 'department_code' => 'SDCADEN01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Food Service', 'department_code' => 'IADFOODS01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Caregiver', 'department_code' => 'CONCAREG01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Cattleya Hall', 'department_code' => 'SDCATTL01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Chemistry', 'department_code' => 'CASTCHEMI01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Chrysanthemum Hall', 'department_code' => 'SDCHRYS01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Health Service', 'department_code' => 'IADHEALT01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'COB SHORT PROGRAMS', 'department_code' => 'COBSHOPR01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'College of Medicine', 'department_code' => 'COMMEDIC01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'COM Apartment-Batangas', 'department_code' => 'COMAPART01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Community Service', 'department_code' => 'SSCOMMU01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Copy Center', 'department_code' => 'IADCOPY01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'COT Undergrad', 'department_code' => 'COTUNDER01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Dama De Noche Hall', 'department_code' => 'SDAPART01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Daniel Hall', 'department_code' => 'SDDANIE01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Dean, Arts & Humanities', 'department_code' => 'CASTDEAN02', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Dean, CGS', 'department_code' => 'GSDEAN01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Dean, COB', 'department_code' => 'COBDEAN01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Dean, COD', 'department_code' => 'CODDEAN01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Dean, COE', 'department_code' => 'COEDEAN01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Dean, COH', 'department_code' => 'COHDEAN01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Dean, CON', 'department_code' => 'CONDEAN01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Dean, COT', 'department_code' => 'COTDEAN01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Dean, CST', 'department_code' => 'CASTDEAN01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Dentistry', 'department_code' => 'CODDENTI01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Development Communication', 'department_code' => 'CASTDEVEL01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Eastern Hall', 'department_code' => 'SDDORM01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Electricity', 'department_code' => 'PPELECT01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Elementary', 'department_code' => 'COEELEME02', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Elementary Education', 'department_code' => 'COEELEME01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Engineering & Technical Education', 'department_code' => 'CASTENGTE01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Environmental Resources Management', 'department_code' => 'PPENVIR01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Faculty Housing', 'department_code' => 'PPFACUL01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Farm', 'department_code' => 'IADFARM01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Fine Arts', 'department_code' => 'CASTFINEA01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Food Factory', 'department_code' => 'IADFOODF01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Foreign Student Unit', 'department_code' => 'SSINTER01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'General Institutional', 'department_code' => 'ASGENER01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Graduate Business', 'department_code' => 'GSBUSIN01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Graduate Education', 'department_code' => 'GSMAED01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Graduate Health', 'department_code' => 'COHGRADU01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Graduate Psychology', 'department_code' => 'GSPSYCH01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Grounds', 'department_code' => 'PPGROUN01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Guidance', 'department_code' => 'SSGUIDA01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Health Foods CanteeN', 'department_code' => 'IADHEAFO01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'History & Social Science', 'department_code' => 'CASTHISTO01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Human Resource Management', 'department_code' => 'ASHUMAN01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Ilang-Ilang Hall', 'department_code' => 'SDILANG01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'ICTS', 'department_code' => 'SSINFCO01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Information Technology Program', 'department_code' => 'COBINFOR01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Internal Auditing', 'department_code' => 'ASINTER01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'ITC/Internet', 'department_code' => 'SSITCINT01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Junior High School', 'department_code' => 'COEACADE01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Language Center', 'department_code' => 'CASTLANGU01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Languages', 'department_code' => 'CASTENGLI01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Laundry', 'department_code' => 'IADLAUND01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Library', 'department_code' => 'SSLIBRA01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Library Science', 'department_code' => 'CASTLIBRA01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Mahogany Hall', 'department_code' => 'SDANTHU01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Maintenance', 'department_code' => 'PPMAINT01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Math & Physics', 'department_code' => 'CASTMATHP01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Medical Laboratory Science', 'department_code' => 'COHMEDIC01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Molave Hall - A', 'department_code' => 'SDMOLAV01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Molave Hall - B', 'department_code' => 'SDMOLAV02', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Molave Hall - C', 'department_code' => 'SDMOLAV03', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Motor Pool', 'department_code' => 'PPMOTOR01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Music', 'department_code' => 'CASTMUSIC01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'NSTP', 'department_code' => 'SSNSTP01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Nursing Graduate', 'department_code' => 'CONGRADU01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Nursing Undergraduate', 'department_code' => 'CONUNDER01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Nutrition and Dietetics', 'department_code' => 'COHFOOD01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Occupational Safety Health Office', 'department_code' => 'ASOSHO01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Office Management', 'department_code' => 'COBOFFIC01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Physical Education', 'department_code' => 'CASTPHYSI01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Planning & Quality Management', 'department_code' => 'ASQUALI01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Pre -School', 'department_code' => 'COEDAYC01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'President', 'department_code' => 'ASPRESI01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Press', 'department_code' => 'IADPRESS01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Property Custodian', 'department_code' => 'ASPROPE01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Psychology', 'department_code' => 'CASTPSYCH01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Public Safety', 'department_code' => 'SDSECUR01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Purchasing', 'department_code' => 'SDPURCH01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Records & Admission', 'department_code' => 'SSADMIS01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Rice Field', 'department_code' => 'IADRICEF01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Sampaguita Hall', 'department_code' => 'SDSAMPA01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Secondary Education', 'department_code' => 'COESECON01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Senior High School', 'department_code' => 'COESENHS01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Spiritual Development', 'department_code' => 'COTRELIG01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'STATISTICAL CENTER', 'department_code' => 'SSSTATI01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Student Finance', 'department_code' => 'ASSTUDE01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Student Housing', 'department_code' => 'SDSTUDE01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Student Housing -Apartments(ABEFGH)', 'department_code' => 'SDGRAHO01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'University Development', 'department_code' => 'ASUNIDE01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'University Engineer', 'department_code' => 'ASUNIVE01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'University Recreational Complex', 'department_code' => 'PPEDUCA01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'University Research', 'department_code' => 'SSUNIVE01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'University Store', 'department_code' => 'IADSTORE01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Village Dean', 'department_code' => 'SDVILDE01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'VP Academics', 'department_code' => 'ASVPAC01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'VP Finance', 'department_code' => 'ASVPFI01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'VP Student Services', 'department_code' => 'ASVPST01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Waling-Waling', 'department_code' => 'SDWALIN01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Water', 'department_code' => 'PPWATER01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Water Station', 'department_code' => 'IADSILVE01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Work Education', 'department_code' => 'SSWORKE01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'TF-CSC', 'department_code' => '3681STUDE03', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'TF-SM2022', 'department_code' => '3681SM202201', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'Stockroom', 'department_code' => 'PPSTOCK01', 'created_at' => NOW(), 'updated_at' => NOW()),
            array('department_name' => 'TF-Academy Books', 'department_code' => '368ACADE01', 'created_at' => NOW(), 'updated_at' => NOW()),
        );


        foreach ($departments as $department) {
            DB::table('departments')->insert([
                'account_code' => $department['department_code'],
                'department_name' => $department['department_name'],
            ]);
            # code...
        }

    }
}
