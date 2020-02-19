<?php

namespace App\Console\Commands;

use App\BitacoraFirebase;
use Exception;
use Illuminate\Console\Command;
use Kreait\Firebase\Util\JSON;

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

        $newRef = $database->getReference("tickets/baf/2020");

        foreach ($newRef->getChildKeys() as $month) {
            $monthRef = $database->getReference("tickets/baf/2020/$month");
            foreach ($monthRef->getChildKeys() as $day) {
                $dayRef = $database->getReference("tickets/baf/2020/$month/$day");
                foreach ($dayRef->getChildKeys() as $user) {
                    $userRef = $database->getReference("tickets/baf/2020/$month/$day/$user");
                    foreach ($userRef->getChildKeys() as $ticket) {
                        $data = $database->getReference("tickets/baf/2020/$month/$day/$user/$ticket");
                        $data->update([
                            'user' => $user
                        ]);
                        $newData = $database->getReference("baf/ticket/$ticket");
                        $newData->set($data->getValue());
                        echo "$newData";
                        $data->remove();
                    }
                }
            }
        }
    }
}
