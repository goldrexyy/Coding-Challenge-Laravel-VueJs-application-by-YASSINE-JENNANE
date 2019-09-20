<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Element;
class AjouterElement extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'AjouterElement:csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ajouter des Elements';

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
    for ($x = 0; $x <= 1000; $x++) {
    $ajouterelement = new Element;
    $ajouterelement->titre='Lorem Ipsum';
    $ajouterelement->description='Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum';
    $ajouterelement->save();
    }
    $this->info('Done!'); 
    }
}
