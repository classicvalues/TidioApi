#TidioAPI PHP Class

This class was designed to help get you started working with Tidio Api in PHP as quickly as possible.

##Usage
Please use constructor with the public key of your Tidio project and the correct user details to the best of your accuracy.

After you create the proper TidioAPI object you can choose one of the methods from our api.

Please use the call method with the proper $action api method so that you can run the proper action.

For example use `identifyUpdate` to update visitor data or `track` to track information the information that you need.

##Example
```php
$visitor = array(
    '_email' => 'example@example.net'
);
$data = array(
    "_first_name" => "1"
);
$tidio = new TidioAPI('xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', $visitor);
$response = $tidio->call('visitor', $data);
```

##More information
To take a look at the entire documentation about Tidio Api please visit https://tidio.co/en/docs

##Credits
https://tidio.co/en
