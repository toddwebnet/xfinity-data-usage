#!/bin/bash

python3 data-usage-download.pyc
mv /home/jtodd/Downloads/usage.json /home/jtodd/projects/xfinity-data-usage/storage/usage.json
php artisan import
mv /home/jtodd/projects/xfinity-data-usage/storage/usage.json "/home/jtodd/projects/xfinity-data-usage/storage/usage_$(date +"%y_%m_%d").json"

