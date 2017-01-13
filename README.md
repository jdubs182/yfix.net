
### 1. Install using docker-compose

https://docs.docker.com/compose/

```sh
# Сreate some new local dir, for example: /opt/yfix-demo 
mkdir -p /opt/yfix-demo
# Clone this repository into that dir 
git clone --recursive --depth 1 https://github.com/yfix/yfix.net /opt/yfix-demo
cd /opt/yfix-demo
# copy .dev/override.php.example into .dev/override.php and edit with choosed db connection params
# edit docker-compose.yml with choosed db connection params
# Setup docker engine
sudo apt-key adv --keyserver hkp://p80.pool.sks-keyservers.net:80 --recv-keys 58118E89F3A912897C070ADBF76221572C52609D
echo 'deb https://apt.dockerproject.org/repo ubuntu-trusty main' > /etc/apt/sources.list.d/docker.list
sudo apt-get update && sudo apt-get install -y docker-engine
# Setup docker-compose
curl -L https://github.com/docker/compose/releases/download/1.9.0/docker-compose-`uname -s`-`uname -m` > /usr/local/bin/docker-compose
chmod +x /usr/local/bin/docker-compose
docker-compose --version
# bash completiom
curl -L https://raw.githubusercontent.com/docker/compose/$(docker-compose --version | awk 'NR==1{print $NF}')/contrib/completion/bash/docker-compose > /etc/bash_completion.d/docker-compose
# Run all this: 
docker-compose up -d && docker-compose logs
```

If everything was done right - you should see working docs/demo website at the url 
(use 8081 or any other port that was chosen inside docker-compose.yml)
http://localhost:8081/

### 2. Install using vagrant

https://www.vagrantup.com/

```sh
# Сreate some new local dir, for example: /opt/yfix-demo 
mkdir -p /opt/yfix-demo
# Clone this repository into that dir 
git clone --recursive --depth 1 https://github.com/yfix/yfix.net /opt/yfix-demo
cd /opt/yfix-demo
# copy .dev/config.yml.example into .dev/config.yml and edit it according to your needs
# copy .dev/override.php.example into .dev/override.php and edit with choosed db connection params
# Setup virtualbox 
apt-get install -y virtualbox
# Download and install vagrant from https://www.vagrantup.com/ 
wget https://dl.bintray.com/mitchellh/vagrant/vagrant_1.7.4_x86_64.deb
dpkg -i vagrant_1.7.4_x86_64.deb
# Add vagrant plugin for automatic refresh of the system file /etc/hosts 
vagrant plugin install vagrant-hostsupdater
# Setup nfs-kernel-server for fast folder sync with virtual machine 
apt-get install nfs-common nfs-kernel-server
# Run all this: 
vagrant up
```

Optionally you can install ansible

```sh
# Setup ansible 
apt-get -y install software-properties-common
apt-add-repository -y ppa:ansible/ansible
apt-get -y update ; apt-get -y install ansible
# Setup required ansible playbooks: 
ansible-galaxy install -ir ansible/requirements.txt or ansible-galaxy install -i yfix.mc
```

If everything was done right - you should see working docs/demo website at the url 
(or whatever else you set inside .dev/config.yml): 
http://yfix-test.dev/
