# Ansible Duo Curriculum Vitae Portal
We made this Ansible based automated nginx webpage- server/portal thingy on Debian 13.4 Trixie, it configures and installs our combined CV-portal over multiple worker nodes. 

**Setup**

Clone: git clone git@github.com:ErkkaWS/Ansible-Duo-CV-Portal.git
Configure network adapters per VM (see Network Setup) or regular Network configuration
Copy SSH key to each worker: ssh-copy-id slave@<worker-ip>
Update hosts.ini with worker IPs
Run: ansible-playbook site.yml

**VM Network Setup**
Each VM requires two network adapters in VirtualBox:

Adapter 1: NAT
Adapter 2: Internal Network (intnet)

Master static IP: 192.168.56.1
Workers: 192.168.56.10x
Add to /etc/network/interfaces on each VM:

auto enp0s9
iface enp0s9 inet static
    address 192.168.56.1xx
    netmask 255.255.255.0
