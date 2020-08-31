# 1. MAKING THE SYSTEM WORK. DO NOT REMOVE
mount -t tmpfs tmp /run
mkdir -p /run/systemd
mount / -o remount,rw
sed -i 's| init=.*||' /boot/cmdline.txt

# 2. THE USEFUL PART OF THE SCRIPT
PUB_KEY=$(cat /boot/pi_public_ssh_key)
umask 0077
mkdir -p /home/pi/.ssh
touch /home/pi/.ssh/authorized_keys
grep -q -F "$PUB_KEY" /home/pi/.ssh/authorized_keys 2>/dev/null || echo "$PUB_KEY" >> /home/pi/.ssh/authorized_keys
chown -R pi:pi /home/pi/.ssh

/usr/lib/raspi-config/init_resize.sh

# 3. CLEANING UP AND REBOOTING
sync
umount /boot
mount / -o remount,ro
sync
echo 1 > /proc/sys/kernel/sysrq
echo b > /proc/sysrq-trigger
sleep 5