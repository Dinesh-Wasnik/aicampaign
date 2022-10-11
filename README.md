
## Business requirements

### Background
   Company ABC would like to run an anniversary celebration campaign to give away 1000
    pieces of cash vouchers to its loyal customers. When the campaign starts, all customers
    who are eligible and submit a qualified photo within 10 minutes will receive a string of cash
    voucher code immediately. The vouchers are first come first serve basis by clicked through
    the campaign link and eligible to participate.
    
###  Gamification
1. All customers will see the campaign entry link when the campaign starts.
2. Campaign links will disappear/denied access if fully redeemed or locked down.
3. Customers who are eligible will proceed to the page to upload their photo.
4. Customers who uploaded a qualified photo will receive the voucher code.


### Customer who eligible to participate

   - Complete 3 purchase transactions within the last 30 days.
   - Total transactions equal or more than $100.
   - Each customer is allowed to redeem 1 cash voucher only.
### Photo to submit
  - Selfie with ABC product
Note: Please faking the image recognition API return true for now while AI engineer WIP.


### Other: Voucher
  1000 of cash vouchers with unique randomise code are pre-generated by the client, we have
  to insert them into the application database before the campaign starts


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
  


