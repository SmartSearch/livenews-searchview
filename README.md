SMART - Live news use case
==========================

This project is a sample application developed by 
[PRISA Digital](http://www.prisa.com) as a demonstration of the Live News use 
case of the [SMART Project](http://www.smartfp7.eu/).

You can find more information in the 
[SMART Project portal](http://www.smartfp7.eu/) and in the 
[SMART Project wiki](http://opensoftware.smartfp7.eu/projects/smart).


How to start
------------

Install prerequisites...
- [Vagrant](http://www.vagrantup.com/)

Execute...

vagrant up

This command will download and configure all the necessary to provide you with
a complete and standarized development environment (based on the contents of 
the Vagrantfile file).

To connect to the just created and started development environment you have to
execute the command...

vagrant ssh

...or the command...

vagrant ssh-config

...in order to get the info needed to connect to the development environment
using any standard SSH client (like, for example, [PuTTY](http://www.putty.org/)

Once finished your work to stop the development environment you have to execute
the command...

vagrant halt

You can execute again the command...

vagrant up

...to restart the development environment in any moment and continue working.

If you want to remove any trace of the development environment from your machine
you have to execute the command...

vagrant destroy

In any moment you can use the command...

vagrant status

...to check the status of the Vagrant environment.

Having the development environment up and running you should be able to access
the Livenews application using any browser and pointing to the URL 
http://localhost:8080/index.php (*production* environment) or to the URL
http://localhost:8080/index_dev.php (*development* environment).