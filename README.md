
## About Project

- Assign voucher to customer which eligible for campaign.


## Project Requirement
- You can setup project xampp or wampp software
- Laragon software is recommended.


## Project Setup
 - Clone the from this link ```https://github.com/Dinesh-Wasnik/aicampaign.git```

 - Create database and set value in .env file.

 - ```DB_CONNECTION=mysql
		DB_HOST=127.0.0.1
		DB_PORT=3306
		DB_DATABASE=aicampaign
		DB_USERNAME=root
		DB_PASSWORD=
	 ```
	set value like this.	

## Run Below commands

 - ```Composer install``` .
 

 - ```PHP artisan migrate ``` 


 - ```PHP artisan db:seed  ``` .

 - ```php artisan passport:keys ``` .


## Postman Guidine.
 - For client_id field  take value from id column of  ```oauth_clients```  table from 2nd id .
 
 - For client_secret  field  take value from secret column of ```oauth_clients```  table from 2nd row .
 
 ## Task Scheduling
  - Add  the following Cron entry to server, in linux server add cron to crontab file.

       ``` * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1 ```
  - Replace the project path with your system project url
  


