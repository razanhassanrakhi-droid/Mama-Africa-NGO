<?php
use Illuminate\Database\Seeder;
use App\Models\Beneficiary;

class BeneficiaryTestSeeder extends Seeder
{
    public function run()
    {
        Beneficiary::create(['name' => 'John Doe', 'sector' => 'Clean Water', 'impact_desc' => 'Received 50 liters.']);
        Beneficiary::create(['name' => 'Jane Smith', 'sector' => 'Protection', 'impact_desc' => 'Provided safe shelter.']);
        Beneficiary::create(['name' => 'Ahmed Ali', 'sector' => 'Livelihoods', 'impact_desc' => 'Joined microfinance program.']);
        Beneficiary::create(['name' => 'Maria Garcia', 'sector' => 'Nutrition', 'impact_desc' => 'Received weekly meals.']);
    }
}
