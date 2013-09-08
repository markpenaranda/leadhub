#!/bin/bash
echo "Updating Repository" 
svn update
echo "Optimizing.."
php artisan optimize
