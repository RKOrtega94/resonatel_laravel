<?php

namespace App\Http\Controllers;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $serviceAccount = ServiceAccount::fromArray([
            "type" => "service_account",
            "project_id" => "resonatel",
            "private_key_id" => "6bbcd0913b155e6c32590b5872cd2556f9dae24d",
            "private_key" => "-----BEGIN PRIVATE KEY-----\nMIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQDLZ1dinnnhRwlj\nW0yY2+DybBJXr1DGUYQ7sjPg/2SAKLREoFOX5x3sZSjVkTifkTaSzBMTURm+Nf+n\nGGjiFA2Z2oNHqEWqOtrPmAUBXpnw9IexmQLfSHr3BbHVj4pjn4lCd9Q07tga2avz\nCCgpwWNegj8OC5gabGysVAj/RC7kUF2AntTUio2f5iYTQOHEu4kaLX5bIh6yPj79\nwAkNRSeJE20T/9/SwmoSRZn+cGAQ7074oGwEpkleSmb/v5Q89cUZ/u1mZR8bhTn4\nve+SRng9BEnfgJlylRTawP/wA84LNJgZXUj3IWNy/9CeaDMxXG8781AWT7cRgXBn\n86bSx2rPAgMBAAECggEATkL03H0daBBtDE2Uqzvu0VfDtvk9mxDCUDXAwFGD2cvP\nkJgfkdLbMJm7nHDD2KGG3fSnYkdSIF2mgCRkNpiAozHwUSHtrBH5HubfBifgE1YC\n39J/yGma5nDKe+E+3hYEOg7hF3zOqYYXIuuAiJBgK3zxxfWwEHqnVab/zzfs0uto\nYx8YpKm+sN6CE+cHWkwEBsqxaYY60uZBRvukxDtF2PiHUTeuf5wyzljMk7nnd6ol\nlpCsYin9GnwbrU9sHL8uxvQ7c/aOlaKOimX9YfHPOtoBy62mJCMr8L2qrN1990yT\n6NWSqLJy5fm13jTyjMRLAwbGJord97ekrrnqDobQAQKBgQD+zVI59+T11S0xJCPr\niqDYAPRrDYuykjKy/5iPlPdksEGQZDLZoYJGf5EDkOMRWd4elO9WpCbygLZXoC6u\n5uRYhwHv1WoQTN3gtD5a2rCgLuSJ9Jq4QbTAaaCJ7z6LGsax30haDsmje9p9mjoF\nkkPtNp1fV54gDBwGp3kLpJrPPwKBgQDMXChDG6XiPhS0GO3nRPQMhZTEzawlDDeG\nVea0mR2T3BXB8rwiOEoF5w36r8Kircq4LdyWKQq3od7heHfyiE8Ic3HrnXfIgsjE\nq0ZTAyBj8mqBKMq7+Y2mG5ZvuTculgHte0j1bDB8JNMscEDZyWwVcFz+lEmVsgJd\nBGRDYQIQcQKBgFtcra4hZ9SJ4pFrPwH3DCNHfFxiWAPojgtGwKJDLM3KsUef1efZ\nFIhIt2uK6RBQo+ddSdBMPbbYVglnYzXNjnT7u8MOR+CeXzRyDKWxIoHdLo8UyOFm\nlfQkK68pvMhOCo6+3AeGo+BdyYMd6M4UmwyUd6s3FHizPt1X8XwuQmArAoGBALSU\njsNWEAxOXU8TZE3jQWA7Pc12DLKkDAB5saZOUrOQW+2JB7OZV9fFZzXoz62esq5z\nYCOUWrMPp3pHUH6Q8n1+PeE8wVb+MliPHFJIRfvrfy9ok1TtXLy2TgWlfdx9k3B9\na2fq1SEuDSiMfNG1yftb0eDnueo8ZRg6xDpB42gRAoGBALt9Cm4PSSgeu9Wve060\n3Ghq/f7r50m2WVYNy1zjGtR1EanlvtYMYFWc8z5bGG8Q1UVERHwMjdpwawF2yeEd\nNwvjeeZZnSKmbph33b890XUdad+xELlCYWWYnL3kG09FzGu9Nd3LHY9LCDs3B8Dz\nLCocYhvb7FlHgkXgP0xhjuKn\n-----END PRIVATE KEY-----\n",
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

        $database = $factory->createDatabase();

        $newPost = $database
            ->getReference('blog/posts')
            ->push([
                'title' => 'Post title',
                'body' => 'This should probably be longer.'
            ]);

        $newPost->getKey(); // => -KVr5eu8gcTv7_AHb-3-
        $newPost->getUri(); // => https://my-project.firebaseio.com/blog/posts/-KVr5eu8gcTv7_AHb-3-

        $newPost->getChild('title')->set('Changed post title');
        $newPost->getValue(); // Fetches the data from the realtime database
        $newPost->remove();
        return view('welcome');
    }
}
