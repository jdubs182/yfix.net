### Installation

How to make demo virtual up and running. Step-by-step instructions

```sh
# Сreate some new local dir, for example: /opt/yfix-demo 
mkdir -p /opt/yfix-demo
# Clone this repository into that dir 
git clone --recursive --depth 1 https://github.com/yfix/yfix.net /opt/yfix-demo
cd /opt/yfix-demo
# copy .dev/config.yml.example into .dev/config.yml and edit it according to your needs
# copy .dev/override.php into .dev/override.php and edit with choosed db connection params
# Setup virtualbox 
apt-get install -y virtualbox
# Download and install vagrant from https://www.vagrantup.com/ 
wget https://dl.bintray.com/mitchellh/vagrant/vagrant_1.7.4_x86_64.deb
dpkg -i vagrant_1.7.4_x86_64.deb
# Add vagrant plugin for automatic refresh of the system file /etc/hosts 
vagrant plugin install vagrant-hostsupdater
# Setup ansible 
apt-get -y install software-properties-common
apt-add-repository -y ppa:ansible/ansible
apt-get -y update ; apt-get -y install ansible
# Setup required ansible playbooks: 
ansible-galaxy install -ir ansible/requirements.txt or ansible-galaxy install -i yfix.mc
# Setup nfs-kernel-server for fast folder sync with virtual machine 
apt-get install nfs-common nfs-kernel-server
# Run all this: 
vagrant up
```

If everything was done right - you should see working docs/demo website at the url 
(or whatever else you set inside .dev/config.yml): 
http://yfix-test.dev/
