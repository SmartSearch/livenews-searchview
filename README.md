SMART. Livenews use case. Searchview application
================================================

This project is a sample application developed by 
[PRISA Digital](http://www.prisa.com) as a demonstration of the Livenews use 
case of the [SMART Project](http://www.smartfp7.eu/).

You can find more information in the 
[SMART Project portal](http://www.smartfp7.eu/) and in the 
[SMART Search repository](https://github.com/SmartSearch) in GitHub.


How to start
------------

This application is build using PHP5.3 and the [Silex Framework](http://silex.sensiolabs.org/) as starting point. Therefore is a good idea to have a minimum understanding of this technologies in order to work with this application.

Install prerequisites...
* [Vagrant](http://www.vagrantup.com/)

After having Vagrant installed in your local computer execute...

```
vagrant up
```

This command will download and configure all the necessary to provide you with
a complete and standarized development environment (based on the contents of 
the Vagrantfile file).

This development environment includes a complete Ubuntu based server, Apache2
web server, PHP5.3 and composer.phar.

To connect to the just created and started development environment you have to
execute the command...

```
vagrant ssh
```

...or the command...

```
vagrant ssh-config`
```

...in order to get the info needed to connect to the development environment
using any standard SSH client (like, for example, [PuTTY](http://www.putty.org/)

Once finished your work to stop the development environment you have to execute
the command...

```
vagrant halt
```

You can execute again the command...

```
vagrant up
```

...to restart the development environment in any moment and continue working.

If you want to remove any trace of the development environment from your machine
you have to execute the command...

```
vagrant destroy
```

In any moment you can use the command...

```
vagrant status
```

...to check the status of the Vagrant environment.

Having the development environment up and running you should be able to access
the Searchview application using any browser and pointing to the URLs
* [http://localhost:8080/index.php](http://localhost:8080/index.php): *production* environment
* [http://localhost:8080/index_dev.php](http://localhost:8080/index_dev.php): *development* environment
