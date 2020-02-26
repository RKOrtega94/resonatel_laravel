<?php

namespace App\Console\Commands;

use App\BitacoraFirebase;
use Illuminate\Console\Command;

class UpdateChatDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:chat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualizar base de datos de firebase campaña chat.';

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

        $newRef = $database->getReference("tickets/chat/2020");

        foreach ($newRef->getChildKeys() as $month) {
            $monthRef = $database->getReference("tickets/chat/2020/$month");
            foreach ($monthRef->getChildKeys() as $day) {
                $dayRef = $database->getReference("tickets/chat/2020/$month/$day");
                foreach ($dayRef->getChildKeys() as $user) {
                    $userRef = $database->getReference("tickets/chat/2020/$month/$day/$user");
                    foreach ($userRef->getChildKeys() as $ticket) {
                        $data = $database->getReference("tickets/chat/2020/$month/$day/$user/$ticket");
                        $data->update([
                            'user' => $user
                        ]);
                        $newData = $database->getReference("chat/ticket/");
                        $key = $newData->push($data->getValue());
                        $newData->getChild($key->getKey())->update([
                            'id' => $key->getKey()
                        ]);
                        echo "$newData";
                        $data->remove();
                    }
                }
            }
        }
    }
}
