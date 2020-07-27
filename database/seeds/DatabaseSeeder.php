<?php

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
        //factory(App\User::class, 1)->create();
         $this->call(AboutIntroductionSeeder::class);
        $this->call(AboutMedicalSeeder::class);
        $this->call(CountryFlagSeeder::class);
        $this->call(DenesaObjectiveSeeder::class);
        $this->call(DenesaServiceSeeder::class);
        $this->call(DepartmentCostSeeder::class);
        $this->call(EstimationCostSeeder::class);
        $this->call(FeaturedHospitalSeeder::class);
        $this->call(FeaturedTreatmentSeeder::class);
        $this->call(IntroductionSeeder::class);
        $this->call(IsoOrganizationSeeder::class);
        $this->call(OverallFigureSeeder::class);
        $this->call(ServiceItemSeeder::class);
        $this->call(TopDoctorSeeder::class);
        $this->call(UniqueServiceSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(VisionSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(FooterSeeder::class);
    }
}
