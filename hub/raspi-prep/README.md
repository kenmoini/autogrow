# Raspberry Pi Preparation

## 1. Flash Autogrow OS

Before we begin, we need a slightly customized version of Raspberry Pi OS called Autogrow OS.  You can obtain the source from here: https://github.com/kenmoini/autogrow-rpi-os

To create an image to flash, all you need to do is:

```bash
## One time pre-reqs
sudo apt-get install coreutils quilt parted qemu-user-static debootstrap zerofree zip dosfstools libarchive-tools libcap2-bin grep rsync xz-utils file git curl bc

git clone https://github.com/kenmoini/autogrow-rpi-os.git
cd autogrow-rpi-os
sudo ./build.sh -c autogrow-config
```

Unfortunately, these instructions only operate on a debian-based system like Ubuntu.  The image will be built in the `deploy/` directory.

## 2. Adding initialization script

With that image flashed to a fresh SD card, copy over the `boot_init.sh` file from this directory onto the SD Card.

## 3. Copy SSH Public Key to SD Card

Finally, all that needs to be done is to add your Ansible control node's/local PC's SSH Public Key to the SD Card as the file `pi_public_ssh_key`, replacing the current contents.  From there, the init script will add it to the agadmin/pi user.