# Basic HTTP Relay

This Spoke device lets you control mains power over the Internet!

Paired with a simple relay, such as the DLI Power Controller (https://www.adafruit.com/product/2935), you can actuate devices such as lights, fans, pumps, and more!

## Things to Know

- There is a basic HTTP Server started at port 80
- This assumes the use of the Adafruit ESP8266 Huzzah board
- Uses GPIO Pin 0 to toggle the on-board LED
- Uses GPIO Pin 13 (and GND) to actuate the relay
- The on-board LED will blink every 100ms while it connects to Wifi and will shut off after wards
- By default on a reset, it will deactivate the relay
- Since the ESP8266 doesn't have an RTC or an easy way to get the time, time-series control is provided by the Hub - this is just a dump HTTP Relay device
- There are a number of HTTP Endpoints, all of them responding to GET:
  - `/` - Just the Index
  - `/healthz` - Kubernetes style health check
  - `/relay/on` - Toggles the Relay on by setting the relay pin HIGH
  - `/relay/off` - Toggles the Relay off by setting the relay pin LOW

## Partials

The `partials` subdirectory here is for ease of use in customizing the deployments via the Hub.