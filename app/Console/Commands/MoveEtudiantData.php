<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Support\Facades\Hash;


class MoveEtudiantData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'move:etudiantdata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Transférer les données des étudiants a la table users';

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
     * @return int
     */
    public function handle()
    {
        $etudiants = Etudiant::all();

    foreach ($etudiants as $etudiant) {
        $user = new User;
        $user->id = $etudiant->id;      
        $user->name = $etudiant->nom;   
        $user->email = $etudiant->email;
        $user->password = Hash::make('defaultPassword');
        $user->save();
    }

    $this->info('Les données ont ete transférées');
    }
}
