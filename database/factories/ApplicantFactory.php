<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applicant>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static $id = 100 ;
    private static $pen = 489675 ;
    private static $application_no = 215487235698 ;
    public function definition()
    {   
       
        return [
           
                'photo' => 'C:\xampp\tmp\php967C.tmp',
                'user_id' => self::$id++,
                'application_no' => self::$application_no++,
                'applicant_name' =>  fake()->name(),
                'applicant_type' => 'MINISTERIAL',
                'pen' => self::$pen++ ,
                'rank' => 'TYPIST',
                'gl_no' => '13518',
                'mother_unit' => 'CRIME BRANCH',
                'pay' => 31500,
                'scale_of_pay' => '31,200 - 64,200',
                'present_unit' => 'SCRB',
                'working_status' => '1',
                'working_status_doc' => 'C:\xampp\tmp\php967C.tmp',
                'date_of_birth' => fake()->date(),
                'date_of_joining' => fake()->date(),
                'date_of_superannuation' => fake()->date(),
              
                
                'house_name' => fake()->name(),
                'street_name' => fake()->city(),
                'post_office' => 'KOWDIAR',
                'pin_code' => 695542,

                'village' =>fake()->city(),
                'taluk' => 'KOWDIAR',
                'district' => 'KOLLAM',

                'marital_status' => 'MARRIED',
                'partner_employee' => '1',
                'radius_five_miles' => '1',

                'marriage_certificate' => 'C:\xampp\tmp\php967C.tmp',
                'mob' => '9897858685',
                'declaration' => '1',
              
                'approval' => '0',
                'created_at' => '2022-12-29 08:56:35',
                'updated_at' => '2022-12-29 08:56:35',

        ];
    }
}
