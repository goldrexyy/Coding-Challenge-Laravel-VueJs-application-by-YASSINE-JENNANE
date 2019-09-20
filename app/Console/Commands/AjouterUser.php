<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\user;
use Illuminate\Support\Facades\Hash;
class AjouterUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'AjouterUser:csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ajouter des Users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {  
    for ($x = 0; $x <= 100; $x++) {
    $ajouteruser = new User;
    $ajouteruser->name='default';
    $code=mt_rand();
    $ajouteruser->email=$code.'@gmail.com';
    $motdepass=mt_rand();
    $crypt=Hash::make($motdepass);
    $ajouteruser->password=$crypt;
    $ajouteruser->save();
    }
    $this->info('Done!'); 
    }
}
