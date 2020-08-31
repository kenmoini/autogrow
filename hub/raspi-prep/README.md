# Raspberry Pi Preparation

In order to configure the Raspberry Pi as a Autogrow Hub via the Ansible Content provided, you must:

## 1. Enable SSH

This is pretty easy - just create an `ssh` file on the mountable SD card after you burn the image.  The `ssh` file needs no extension and nothing contained, just a file that is touched.  You can also use the `ssh` file and copy it over from this directory onto the SD Card.

## 2. Adding initialization script

Next we'll modify the `cmdline.txt` file on the SD Card to run our initialization script - append the following to the `cmdline.txt` file:

`init=/boot/boot_init.sh`

With that in place, also copy over the `boot_init.sh` file from this directory onto the SD Card.

## 3. Copy SSH Public Key to SD Card

Finally, all that needs to be done is to add your local PC's SSH Public Key to the SD Card as the file `pi_public_ssh_key`, replacing the current contents.  From there, the init script will add it to the Pi user.