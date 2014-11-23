FlashMessage
=============
Php class for flash messsages.


###License
This software is free software and carries a MIT license. 


How to use
-------------

###1. Download

Install using composer.
Add to your composer.json: 
```
"require": {
    "sial/FlashMessage": "dev-master"
},
```

You can also download as .zip!

###2. include FlashMessage in ANAX-application
To include FlashMessage in your ANAX-application, add the class in your front
controller:
```
$di->set('Flash', function() use ($di) {
	$flash = new \Sial\FlashMessage\CFlashMessage();
	$flash->setDI($di);
	return $flash;
});
```
Also an example in webroot shows how to include FlashMessage in your ANAX-application.



###3. set messages
```
$app->Flash->setMessage('success')
```
###4. Display messages
```
$app->Flash->getMessage()
```
###5. Options
You have 2 params in setMessages() as shown in the example below.
```
$app->Flash->setMessage(messageType, message)
```
You can choose from 4 message types ( success, notice, warning, error) in the first param.

The second param is optional that enables you to write your own custom message.
If not set a default message will be prompted.
