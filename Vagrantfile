Vagrant.configure(2) do |config|
  config.vm.box = "yfix/trusty64"
  config.vm.network :private_network, ip: "192.168.33.123"
  config.vm.network "forwarded_port", guest: 80, host: 12380
  config.vm.network "forwarded_port", guest: 22, host: 12322
  config.ssh.insert_key = false
  config.ssh.forward_agent = true
  config.vm.hostname = "yfix-test.dev"
  config.vm.provider :virtualbox do |v|
    v.name = config.vm.hostname
    v.memory = 512
    v.cpus = 2
    v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
    v.customize ["modifyvm", :id, "--ioapic", "on"]
  end
  config.vm.synced_folder "./", "/sites/default", type: "nfs"
  config.vm.provision "ansible" do |ansible|
    ansible.host_key_checking = false
    ansible.playbook = "ansible/main.yml"
  end
end
