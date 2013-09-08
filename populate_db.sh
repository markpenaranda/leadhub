#!/bin/bash
clear
echo "Populating Database. Please select ENVIRONMENT (eg. local, stage, production)"
echo "environment:"
read env
php artisan populate_db --env=$env
echo "Populated :)"
