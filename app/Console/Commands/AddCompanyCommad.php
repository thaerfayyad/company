<?php

namespace App\Console\Commands;

use App\Campany;
use Illuminate\Console\Command;

class AddCompanyCommad extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contact:company ' ;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add New Company';


    public function handle()
    {
        $name =$this->ask('what is company name : ');
        $phone =$this->ask('what is company\'s phone number : ');

        if($this->confirm('are you ready to insert "' . $name .'"?'))
        {
            $company = Campany::create([
                'name'=>$name,
                'phone'=>$phone,
            ]);
            return $this->info('Added : ' .$company->name);
        }

            $this->warn('no new company added');





//        $this->info('Added ' . $company->name);
//        $this->warn('this is waring');
//        $this->error('this is errors here');
    }
}
