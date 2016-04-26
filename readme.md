# Klikacara.com

Website that connects event services provider especially in the aspect of equipment to the client in an easy way by just one click.

### Version
1.0.0

### Dependence

Dillinger uses a number of open source projects to work properly:

* [Twitter Bootstrap] - great UI boilerplate for modern web apps
* [node.js] - evented I/O for the backend
* [Gulp] - the streaming build system
* [jQuery] - duh
* [Laravel] - Great PHP Framework

### Installation
* First -> create mySQl database "klikacara"
* Second -> edit .env file 
```
APP_ENV=local
APP_DEBUG=true
APP_KEY=base64:MCMVHlANCwNS259oR8ATqlMiefj9fq525VA/wN2o4Qg=
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=klikacara
DB_USERNAME=root
DB_PASSWORD=

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=mx1.idhostinger.com
MAIL_PORT=2525
MAIL_USERNAME=rizqy@beringin.net
MAIL_PASSWORD=majujaya123
MAIL_ENCRYPTION=null

FACEBOOK_CLIENT_ID=585228824965017
FACEBOOK_CLIENT_SECRET=1ebbfe3a3e7884f1553f3dcf008a32e4
FACEBOOK_CALLBACK_URL=http://localhost:8000/auth/facebook/callback

TWITTER_CLIENT_ID=zSx3vniIId9QY2HK9aP6i53zX
TWITTER_CLIENT_SECRET=dElzlAhiFxf9mc47QoYSrXpx68Ex2vv78GtmR5f25OxwCsorKG
TWITTER_CALLBACK_URL=http://localhost:8000/auth/twitter/callback
```
* Third -> migrate database
```sh
$ php artisan migrate
```

* Final -> Run the server
```sh
$ php artisan serve
```





