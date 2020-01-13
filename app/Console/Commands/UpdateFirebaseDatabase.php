<?php

namespace App\Console\Commands;

use App\BitacoraFirebase;
use Illuminate\Console\Command;

class UpdateFirebaseDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:firebase';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualizar base de datos de firebase';

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
        $data = array();

        $database = BitacoraFirebase::firebaseConnection();

        $data = [];

        $inp = file_get_contents('./public/data/baf.json');

        $tempArray = json_decode($inp, true);

        $users =  $database->getReference("tickets/baf/2019/11/08");
        foreach ($users->getChildKeys() as $user) {
            $ticket = $database->getReference("tickets/baf/2019/11/08/$user");
            foreach ($ticket->getChildKeys() as $ticket) {
                $values = $database->getReference("tickets/baf/2019/11/08/$user/$ticket");
                $values->update([
                    'user' => $user
                ]);
                $data = array_merge($data, $values->getValue());
                array_push($tempArray, $data);
                $validado = array_unique($tempArray, SORT_REGULAR);
                $jsonData = json_encode($validado);
                file_put_contents('./public/data/baf.json', $jsonData);
            }
        }
    }
}
