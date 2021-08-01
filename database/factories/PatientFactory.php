<?php

namespace Database\Factories;

use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Provider\en_US\Person;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'ssn' => $this->faker->unique()->ssn,
            'status' => 'active',
            'preferred_communication_method' => 'phone',
            'account_number' => $this->faker->unique()->bankAccountNumber,
            'date_of_death' => null,
            'last_seen_date' => $this->faker->date('Y-m-d'),
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ];
    }
}
