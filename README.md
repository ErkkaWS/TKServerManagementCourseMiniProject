# **Ansible Duo Curriculum Vitae Portal**
We made this Ansible based automated nginx webpage- server/portal thingy on Debian 13.4 Trixie, it configures and installs our combined CV-portal over multiple worker nodes. 

KUVAKAAPPAUS IDEMPOTENSSISTA JA KUVAKAAPPAUS VALMIISTA ETUSIVUSTA

## **Authors**
Eric Setälä
Vili Virtanen

## **Licence**
GNU General Public License v3.0

## **Setup**
Clone: git clone git@github.com:ErkkaWS/Ansible-Duo-CV-Portal.git
<br>Configure network adapters per VM (see Network Setup) or regular Network configuration
<br>Copy SSH key to each worker: ssh-copy-id slave@<worker-ip>
<br>Update hosts.ini with worker IPs
<br>Run: ansible-playbook site.yml

## **VM Network Setup**
<br>
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

## **What it installs**
- nginx
- ufw (ports 22 & 80)
- fail2ban (prevents ssh-bruteforce attacks)
- Frontwebpage for CV-portal
- 2 x personal CV-webpages
- Custom 404-page
