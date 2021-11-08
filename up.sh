#!/bin/bash

php bin/magento cache:clean
php bin/magento cache:fl
php bin/magento setup:upgrade

sudo chmod -R 777 generated/ var/ pub/
