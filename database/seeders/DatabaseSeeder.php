<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   /**
    * Seed the application's database.
    *
    * @return void
    */
   public function run()
   {
      // \App\Models\Applicant::factory(5)->create();

      // \App\Models\Quarters::factory()->create([
      //    'unit_id' =>1,
      //    'quarters_name' => 'BHAKTHI VILASOM',
      //       'class' => 'LSQ',
      //       'type' => 'FLAT',
      //       'quarters_no' => 101
      // ]);
      // \App\Models\Quarters::factory()->create([
      //    'unit_id' =>1,
      //    'quarters_name' => 'BHAKTHI VILASOM',
      //       'class' => 'USQ',
      //       'type' => 'FLAT',
      //       'quarters_no' => 102,
            
      // ]);
      // \App\Models\Quarters::factory()->create([
      //    'unit_id' =>2,
      //    'quarters_name' => 'VIKAS BHAVAN',
      //       'class' => 'LSQ',
      //       'type' => 'SINGLE QUARTERS',
      //       'quarters_no' => 103
      // ]);


      // User seed

      \App\Models\User::factory()->create([
         'name' => 'Admin',
         'pen' => '123456',
         'password' => '$2y$10$1aXjt85D7ULFpau5x2897OsrMCLYglxxEgkExLL2n5x6RfEMCnAhO',
         'mother_unit' => 'SPECIAL ARMED POLICE, THIRUVANANTHAPURAM',
         'role' => '4',
         'applied' => '1'
      ]);

      // \App\Models\User::factory()->create([
      //    'name' => 'MANEESH',
      //    'pen' => '506532',
      //    'password' => '$2y$10$hHXBtAKWEOl.h712EYdXrOs1l.S9Z6n0qwj7QeUl.yRTx64JNTrK2',
      //    'mother_unit' => 'CITY POLICE OFFICE, KOLLAM',
      //    'role' => '2',
      //    'applied' => '0'
      // ]);
     
    

       // Mother Units 
     
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'DISTRICT POLICE OFFICE, THIRUVANANTHAPURAM RURAL'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'CITY POLICE OFFICE, THIRUVANANTHAPURAM'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'POLICE TELECOMMUNICATION HEADQUARTERS, THIRUVANANTHAPURAM'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'CITY POLICE OFFICE, KOLLAM'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'DISTRICT POLICE OFFICE, KOLLAM RURAL'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'DISTRICT POLICE OFFICE, PATHANAMTHITTA'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'DISTRICT POLICE OFFICE, ALAPPUZHA'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'DISTRICT POLICE OFFICE, KOTTAYAM'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'DISTRICT POLICE OFFICE, IDUKKI'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'CITY POLICE OFFICE, KOCHI'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'DISTRICT POLICE OFFICE, ERNAKULAM RURAL'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'CITY POLICE OFFICE, THRISSUR'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'DISTRICT POLICE OFFICE, THRISSUR RURAL'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'DISTRICT POLICE OFFICE, PALAKKAD'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'DISTRICT POLICE OFFICE, MALAPPURAM'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'CITY POLICE OFFICE KOZHIKKODE'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'DISTRICT POLICE OFFICE, KOZHIKODE'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'DISTRICT POLICE OFFICE, WAYANAD'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'CITY POLICE OFFICE, KANNUR'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'DISTRICT POLICE OFFICE, KANNUR RURAL'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'DISTRICT POLICE OFFICE, KASARGOD'
      ]);


      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'SPECIAL ARMED POLICE, THIRUVANANTHAPURAM'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'KERALA ARMED WOMEN POLICE BATTALION, THIRUVANANTHAPURAM'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'MALABAR SPECIAL POLICE, MALAPPURAM'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'INDIA RESERVE BATTALION, THRISSUR'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'KERALA ARMED POLICE-I, ERNAKULAM'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'KERALA ARMED POLICE-II, PALAKKAD'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'KERALA ARMED POLICE-III, PATHANAMTHITTA'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'KERALA ARMED POLICE-IV, KANNUR'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'KERALA ARMED POLICE - V, IDUKKI'
      ]);
      \App\Models\MotherUnit::factory()->create([
         'mother_unit' => 'KERALA ARMED POLICE-VI, KOZHIKODE'
      ]);




      // Police Districts and Units

      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'STATE CRIME RECORDS BUREAU, THIRUVANANTHAPURAM'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'CRIME BRANCH HEADQUARTERS, THIRUVANANTHAPURAM'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'DISTRICT POLICE OFFICE, THIRUVANANTHAPURAM RURAL'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'POLICE TELECOMMUNICATION HEADQUARTERS, THIRUVANANTHAPURAM'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'POLICE TRAINING HEADQUARTERS, THIRUVANANTHAPURAM'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'RAILWAY POLICE HEADQUARTERS, THIRUVANANTHAPURAM'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'STATE SPECIAL BRANCH HEADQUARTERS, THIRUVANANTHAPURAM'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'CITY POLICE OFFICE, THIRUVANANTHAPURAM'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'CITY POLICE OFFICE, KOLLAM'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'DISTRICT POLICE OFFICE, KOLLAM RURAL'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'DISTRICT POLICE OFFICE, PATHANAMTHITTA'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'DISTRICT POLICE OFFICE, ALAPPUZHA'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'DISTRICT POLICE OFFICE, KOTTAYAM'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'DISTRICT POLICE OFFICE, IDUKKI'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'CITY POLICE OFFICE, KOCHI'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'DISTRICT POLICE OFFICE, ERNAKULAM RURAL'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'CITY POLICE OFFICE, THRISSUR'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'DISTRICT POLICE OFFICE, THRISSUR RURAL'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'KERALA POLICE ACADEMY, THRISSUR'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'DISTRICT POLICE OFFICE, PALAKKAD'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'DISTRICT POLICE OFFICE, MALAPPURAM'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'CITY POLICE OFFICE KOZHIKKODE'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'DISTRICT POLICE OFFICE, KOZHIKODE'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'DISTRICT POLICE OFFICE, WAYANAD'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'CITY POLICE OFFICE, KANNUR'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'DISTRICT POLICE OFFICE, KANNUR RURAL'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'DISTRICT POLICE OFFICE, KASARGOD'
      ]);


      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'ARMED POLICE HEADQUARTERS, THIRUVANANTHAPURAM'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'SPECIAL ARMED POLICE, THIRUVANANTHAPURAM'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'KERALA ARMED WOMEN POLICE BATTALION, THIRUVANANTHAPURAM'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'INDIA RESERVE BATTALION, THRISSUR'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'MALABAR SPECIAL POLICE, MALAPPURAM'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'RAPID RESPONSE & RESCUE FORCE, MALAPPURAM'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'KERALA ARMED POLICE-I, ERNAKULAM'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'KERALA ARMED POLICE-II, PALAKKAD'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'KERALA ARMED POLICE-III, PATHANAMTHITTA'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'KERALA ARMED POLICE-IV, KANNUR'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'KERALA ARMED POLICE - V, IDUKKI'
      ]);
      \App\Models\PresentUnit::factory()->create([
         'present_unit' => 'KERALA ARMED POLICE-VI, KOZHIKODE'
      ]);



      // Districts
     
      \App\Models\District::factory()->create([
         'district' => 'THIRUVANANTHAPURAM'
      ]);
      \App\Models\District::factory()->create([
         'district' => 'KOLLAM'
      ]);
      \App\Models\District::factory()->create([
         'district' => 'PATHANAMTHITTA'
      ]);
      \App\Models\District::factory()->create([
         'district' => 'ALAPUZHA'
      ]);
      \App\Models\District::factory()->create([
         'district' => 'KOTTAYAM'
      ]);
      \App\Models\District::factory()->create([
         'district' => 'IDUKKI'
      ]);
      \App\Models\District::factory()->create([
         'district' => 'ERNAKULAM'
      ]);
      \App\Models\District::factory()->create([
         'district' => 'THRISSUR'
      ]);
      \App\Models\District::factory()->create([
         'district' => 'PALAKKAD'
      ]);
      \App\Models\District::factory()->create([
         'district' => 'MALAPPURAM'
      ]);
      \App\Models\District::factory()->create([
         'district' => 'KOZHIKKOD'
      ]);
      \App\Models\District::factory()->create([
         'district' => 'WAYANAD'
      ]);
      \App\Models\District::factory()->create([
         'district' => 'KANNUR'
      ]);
      \App\Models\District::factory()->create([
         'district' => 'KASARGOD'
      ]);
   }
}
