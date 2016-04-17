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
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=klikacara
DB_USERNAME=root
DB_PASSWORD=
```
* Third -> migrate database
```sh
$ php artisan migrate
```

* Final -> Run the server
```sh
$ php artisan serve
```





