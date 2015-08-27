#TidioAPI PHP Class

This class was created to start as fast as possible work with Tidio Api in PHP.

##Usage
Please use constructor with public key of your Tidio project and proper user details as much accurate as possible.

After you created proper TidioAPI object you can use one of methods from our api.

Please use call method with proper $action api method to run proper action.

For example use `identifyUpdate` to update visitor data or `track` to track tracking information about it.

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
To take a look at whole documentation about Tidio Api please visit https://tidio.co/en/docs

##Credits
https://tidio.co/en
