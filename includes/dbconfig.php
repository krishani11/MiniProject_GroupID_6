<?php
    require __DIR__.'/vendor/autoload.php';
    
    use Kreait\Firebase\Factory;
    use Kreait\Firebase\ServiceAccount;

    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/eatsmart-9a826-firebase-adminsdk-7as8n-3b86b24aa5.json');
    $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://eatsmart-9a826-default-rtdb.firebaseio.com/')
        ->create();
    
    $database = $firebase->getDatabase();

 

?>