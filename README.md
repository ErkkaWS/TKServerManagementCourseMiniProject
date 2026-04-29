# **Ansible Duo Curriculum Vitae Portal**
We made this Ansible based automated nginx webpage- server/portal thingy on Debian 13.4 Trixie, it configures and installs our combined CV-portal over multiple worker nodes. 

<img width="1896" height="1205" alt="kuva" src="https://github.com/user-attachments/assets/9b2cf035-066a-4e27-9dd1-ac40404140ac" />
<img width="1912" height="1198" alt="kuva" src="https://github.com/user-attachments/assets/d6488f27-c32e-44d7-90dc-fe4500f98f6e" />
<img width="1918" height="1201" alt="kuva" src="https://github.com/user-attachments/assets/28f935e3-201b-453f-8c1c-46897fedae68" />
<img width="1915" height="1203" alt="kuva" src="https://github.com/user-attachments/assets/b012c492-dc76-49eb-9644-b59978f799c7" />
<img width="569" height="416" alt="kuva" src="https://github.com/user-attachments/assets/e6ade738-c6a4-4651-81f6-f6acfb53a047" />
<img width="984" height="216" alt="kuva" src="https://github.com/user-attachments/assets/d92f15ad-c2bf-4a54-871a-785e4510262d" />



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

## PHP CONFIGURATION
1. Open Discord and go to your server
2. Select a channel → Settings (gear icon) → Integrations → Webhooks
3. Click **New Webhook** → copy the webhook URL
4. Open `roles/php/files/yhteydenotto.php`
5. Replace `DISCORD_WEBHOOK` with your own webhook URL
6. Run: `ansible-playbook site.yml`

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
- php
