#!/bin/bash

# Install user SSH Public Key
PASSWD_FILE=/etc/passwd

if [ -f "/boot/pi_public_ssh_key" ]; then
  PUB_KEY=$(cat /boot/pi_public_ssh_key)
  umask 0077
  # try to locate username in in /etc/passwd
  grep "^agadmin" $PASSWD_FILE > /dev/null

  # store exit status of grep
  # if found grep will return 0 exit stauts
  # if not found, grep will return a nonzero exit stauts
  status=$?

  if test $status -eq 0
  then
    echo "Copying SSH Public Key to agadmin user..."
    mkdir -p /home/agadmin/.ssh
    touch /home/agadmin/.ssh/authorized_keys
    grep -q -F "$PUB_KEY" /home/agadmin/.ssh/authorized_keys 2>/dev/null || echo "$PUB_KEY" >> /home/agadmin/.ssh/authorized_keys
    chown -R agadmin:agadmin /home/agadmin/.ssh
  else
    echo "Copying SSH Public Key to pi user..."
    mkdir -p /home/pi/.ssh
    touch /home/pi/.ssh/authorized_keys
    grep -q -F "$PUB_KEY" /home/pi/.ssh/authorized_keys 2>/dev/null || echo "$PUB_KEY" >> /home/pi/.ssh/authorized_keys
    chown -R pi:pi /home/pi/.ssh
  fi
fi