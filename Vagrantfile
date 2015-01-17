Vagrant.configure("2") do |config|
  config.vm.box = "trusty-cloud"
  config.vm.box_url = "https://cloud-images.ubuntu.com/vagrant/trusty/current/trusty-server-cloudimg-amd64-vagrant-disk1.box"
  config.vm.hostname = "blog.local"

  config.vm.network "forwarded_port", guest: 80, host: 8080, auto_correct: true
  config.vm.network "forwarded_port", guest: 443, host: 8443, auto_correct: true
  config.vm.network "private_network", type: "dhcp"

  config.vm.synced_folder "salt/states",  "/srv/salt"
  config.vm.synced_folder "salt/pillars", "/srv/pillars"

  config.vm.provider "virtualbox" do |v|
    v.name = "blog.local"
    v.customize ["modifyvm", :id, "--cpuexecutioncap", "40"]
    v.customize ["modifyvm", :id, "--memory", "3072"]
  end

  config.vm.provision :salt do |c|
    c.minion_config = "salt/masterless"
    c.run_highstate = true
    c.verbose = true
  end
end
