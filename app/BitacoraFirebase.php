<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Illuminate\Http\Request;

class BitacoraFirebase extends Model
{
    public function firebaseConnection()
    {
        $serviceAccount = ServiceAccount::fromArray([
            "type" => "service_account",
            "project_id" => "resonatel",
            "private_key_id" => "2306e2e16d3baed49e2c6388f69105ce76bedc50",
            "private_key" => "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQC71AZTrEIcHhB4\nDyFR1jt8uIGi6iPpwBaCjYIFTjUPp2g+elOTwcToFADOD3ySTCoZptcrwdiGkSFQ\nBJlpkmwJhhfS3o79p66idiJhuwCGhnPSlFQekZPlo4HEO1p108NCv1nWbq+PBjxn\n/oc/btmWKQA7N14JYIB7jyPWo//sR3cLRvosX9ED+K0rfMrIXu+4ha3YI5xqmTZG\n3uYjHPGhiwlDGfzQY+u2Zqj7gKQ41WTiylb5cWST1xi8PFJLngy3E3tXxCAaf9Gn\nI5UirmnPLBwcTW0BzL6Rag1wD9njcPJzju1isLJNN/0mn7bdkGJekTPj/z+on9zp\nZvTfW+YPAgMBAAECggEAATNz/HbhlHTigxkJxDXgP745fyYuBQu0ueva1hMqW6Rd\nGH5xc2O05AB2sVd81nLuRi23JMrlwmOWcbK1cLTC/3OEwRajqKSsZfGV0lpl7EqT\nQi/CB03EBKU4lf/4Ib1467A3iSf7ll3Svl+VRDIONP31GS1k8RiaQkwX/E1i1VEq\nzlAmgC8WRO6brE4fWvLwLPXyp9rKd3Exvs3nNMsoIBb9CbHtFnU7nqiYv5pjVMZU\nTD0yB4KVbEFcBfbxsNG/y7foo9J/2bIPinAkUr0f58gTV/Te6vCA7SbbaX+deF3S\niijLK2AFJ8mAk41cuw1FT3MRTA88gS76zzyUlX/+aQKBgQDpysiQj0M3cZKwOrDA\nwEPKGQzoo7W5Yt+fEWjE62jPxXmdM+MejsROtH27JYdIBUPPZQGmK/Irx3LqKvUc\nsIUTHSGx2d25KcM1KVKUCZFvyN2hJegt36riV5d8N0QFJ5lRrfr8XIc8gf+e2k/n\nB7r1wbe5oSjZrLinw4ZTZyehIwKBgQDNq4TIzOj6HQez2T7b22ewBJkslWzAe7iv\nuHCvTBqPmQ1SMUDhNdmlkR4NhpO4tOat5LI4mqQBtNzhyFbfF0Zuo8Pxnk/qpKay\noF6/HlZ4Z9rSvBggJw9kOMNHJPosvtZYJQDt3dDOyokKFCzzkPbVLJ0urynpdcJK\nCjkRjye0JQKBgBqa6wwYYYvTrt/DLg4hUxWSmDd5Odro943Ai22tZHYQgPB00SnP\nEWPrgktjz+tQPhFB61gftCVrQxaG4PHs3Jf6PrVgl6zUpdRM6YrTM+vGrgICsFNY\nGrg7Q4/tMh5sDTSQWfmSBgnKuW44ZdNiu9Hvw5qqTl3HHBRrWcPv/0CFAoGBALTX\nIJ1TF3N8fR5VYiD9LZGmqWx7QrGI196iZWqtlxk2cXEY37xmliYvkGZCM7eQUNkM\nIu0EhDr/5cwdVM06cPKtyoe0NP7TocOkoUqZCV07rDvpqajzz2PHSWVQDS2061F7\nz/JXPNfnXFHhZZkQmQjd/qNi345ovdpOXNmkrzuFAoGAIZCNTaUYVVKQVaowdorO\nq/FJQBQ0Lw/xscBPtIoPV5DNoKpXmYHzq+gOqMuh1nH8f6EgFldHATag2V2VSlZc\nyxX1fY9aMvpRtxdrKoj5Gales1Gytlmlv5CfX5w1NwbCeXon/WfIwSBQ+qbt+7NZ\n+oBA0O2OWgZPa3qJnqVTaLc=\n-----END PRIVATE KEY-----\n",
            "client_email" => "firebase-adminsdk-j2p51@resonatel.iam.gserviceaccount.com",
            "client_id" => "111983783831927998005",
            "auth_uri" => "https://accounts.google.com/o/oauth2/auth",
            "token_uri" => "https://oauth2.googleapis.com/token",
            "auth_provider_x509_cert_url" => "https://www.googleapis.com/oauth2/v1/certs",
            "client_x509_cert_url" => "https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-j2p51%40resonatel.iam.gserviceaccount.com"
        ]);

        $factory = (new Factory)
            ->withServiceAccount($serviceAccount)
            // The following line is optional if the project id in your credentials file
            // is identical to the subdomain of your Firebase project. If you need it,
            // make sure to replace the URL with the URL of your project.
            ->withDatabaseUri('https://resonatel.firebaseio.com');

        return $factory->createDatabase();
    }

    public static function queryFirebase()
    {
        // Define connection
        $database = BitacoraFirebase::firebaseConnection();

        // References
        $yearReference = [];
        $years = [];
        $monthReference = [];
        $dayReference = [];
        $userReference = [];
        $ticketReference = [];

        // Getting years
        $yearReference = $database->getReference('tickets/baf');
        $years = $yearReference->getChildKeys();

        // Getting months
        foreach ($years as $year) {
            $months = $database->getReference("tickets/baf/$year");
            $monthReference = array_merge($monthReference, $months->getChildKeys());
            foreach ($months->getChildKeys() as $month) {
                $days = $database->getReference("tickets/baf/$year/$month");
                $dayReference = array_merge($dayReference, $days->getChildKeys());
                foreach ($days->getChildKeys() as $day) {
                    $user = $database->getReference("tickets/baf/$year/$month/$day");
                    $userReference = array_merge($userReference, $user->getChildKeys());
                    foreach ($user->getChildKeys() as $user) {
                        if ($user == auth()->user()->user) {
                            $ticket = $database->getReference("tickets/baf/$year/$month/$day/$user");
                            $ticketReference = array_merge($ticketReference, $ticket->getChildKeys());
                        }
                    }
                }
            }
        }
        return $ticketReference;
    }

    public static function getFirebaseData($data)
    {
        Request::session()->put('firebase', 'test1');
    }
}
