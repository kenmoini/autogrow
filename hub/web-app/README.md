# Autogrow OS - Web Application

This is the web application and platform that runs the Autogrow OS system.  It's based on Laravel.

## Features and Functions

- Schedule device properties (eg. turning relays on/off)
- Time-series sensor streaming

## Roadmap

- Centralized Multi-hub Control
- Spoke Device Adoption & OTA Updates
- Message Broker for added reliability
- Visualization (graphs)

## Deployment

```bash
sudo apt-get install php7.3-common php7.3-fpm php7.3-bcmath php7.3-json php7.3-mbstring php7.3-mysql php7.3-sqlite3 php7.3-xml php7.3-xmlrpc php7.3-zip php7.3-bz2 php7.3-gd php7.3-curl openssl nginx
composer install
npm install
npm run dev
```