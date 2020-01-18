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
    protected $signature = 'update:baf';

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
        $database = BitacoraFirebase::firebaseConnection();

        $year = now()->format('Y');
        $month = now()->format('m');
        $day = now()->format('d');

        $data = [];

        $inp = file_get_contents('./public/data/baf.json');

        $tempArray = json_decode($inp, true);
        $users =  $database->getReference("tickets/baf/$year/$month/$day");
        foreach ($users->getChildKeys() as $user) {
            echo $user;
            $ticket = $database->getReference("tickets/baf/$year/$month/$day/$user");
            foreach ($ticket->getChildKeys() as $ticket) {
                $values = $database->getReference("tickets/baf/$year/$month/$day/$user/$ticket");
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
