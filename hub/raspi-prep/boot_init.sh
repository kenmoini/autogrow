#!/bin/bash

# Install Pi user SSH Key
if [ -f "/boot/pi_public_ssh_key" ]; then
  PUB_KEY=$(cat /boot/pi_public_ssh_key)
  umask 0077
  mkdir -p /home/pi/.ssh
  touch /home/pi/.ssh/authorized_keys
  grep -q -F "$PUB_KEY" /home/pi/.ssh/authorized_keys 2>/dev/null || echo "$PUB_KEY" >> /home/pi/.ssh/authorized_keys
  chown -R pi:pi /home/pi/.ssh
fi