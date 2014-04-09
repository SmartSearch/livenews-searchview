# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu32-12.04"
  config.vm.box_url = "http://files.vagrantup.com/precise32.box"

  config.vm.provision :shell, :path => "Vagrant-bootstrap.sh"

  config.vm.synced_folder ".", "/home/vagrant/devlab"

  config.vm.network "forwarded_port", guest: 80, host: 8080, auto_correct: true
  config.vm.network "public_network"
end
