# [Work in Progress] autogrow

Autogrow is an agriculture automation hub

## Background

- Autogrow is based on a hub-and-spoke model with a Raspberry Pi as the Hub and ESP8266 devices as the Spokes.
- The Raspberry Pi hub requires a wired LAN connection, and broadcasts a wireless access point with the SSID formatted as "aghub-LAST_4_CHARS_OF_WLAN0_MAC_ADDRESS"
- Spoke devices operate as traditional Wireless Clients and can be configured manually or by connecting to a FTDI Friend attached to the Raspberry Pi and flashing via the web interface

## Supported Spoke Devices

The ESP8266 Spoke devices that are currently supported are:

- [Finished] Relay for power/solenoid control, paired with a DLI Power Controller such as this one: https://www.adafruit.com/product/2935
- Temperature Sensor
- Humidity Sensor

## Setup

Setting up Autogrow requires Ansible on your local PC and is as follows:

1. Get Raspberry Pi 3 B+ or better with at least a 16GB SD Card
2. Flash Autogrow OS to the SD Card: https://github.com/kenmoini/autogrow-rpi-os
3. Follow the instructions in `hub/raspi-prep/README.md` to pre-configure the connection requirements.
4. Attach the Raspberry Pi to your network via Ethernet
5. Run the `hub/ansible-configuration/configure.yaml` Ansible Playbook on your local PC with something like `ansible-playbook -i inventory configure.yaml`
6. Connect a Spoke device to the Raspberry Pi via FTDI Adapter
7. Connect your PC to the Wifi Network provided by the hub and access the web interface by navigating to `http://hub.aghub-local`
8. Navigate to the ***Devices*** section and flash the Spoke device to perform the task desired
9. Once flashed, physically attach the Spoke devices to their sensors as directed - provide power and install where desired
