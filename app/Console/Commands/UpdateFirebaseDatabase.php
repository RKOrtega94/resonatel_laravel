<?php

namespace App\Console\Commands;

use App\BitacoraFirebase;
use Exception;
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

        $newRef = $database->getReference("tickets/baf");

        foreach ($newRef->getChildKeys() as $key) {
            $ticketRef = $database->getReference("tickets/baf/$key");
            if ($ticketRef->getKey() == $ticketRef->getChildKeys()) {
                echo $ticketRef->getKey();
            }
        }

        //$ticket = $values->getChild('ticket')->getValue();
        //
        //$ticketRef = $database->getReference("tickets/baf/$ticket");
        //

        //
        //$database->getReference("tickets/baf/data/$key")->remove();
        //
        //$ticketRef->update([
        //    'escalado' => $values->getChild('escalado') ? $values->getChild('escalado')->getValue() : 'NO INFO',
        //    'hour' => $values->getChild('hour') ? $values->getChild('hour') : '00:00'
        //]);
    }
}
