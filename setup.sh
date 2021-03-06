#!/bin/bash

echo "Welcome, Let's get started."

## CLIENTS COMPANY SETTINGS
echo -n "What is the Clients Company Name? "
read -e CNAME
gsed -i "s/'COMPANY NAME'/'$CNAME'/" app/config/settings.php

echo -n "What is the Clients Company's Slogan? "
read -e SLOGAN
gsed -i "s/COMPANY SLOGAN./$SLOGAN/" app/config/settings.php

echo -n "What is the Clients Company's Domain name? "
read -e CLIENTURL
gsed -i "s/COMPANYURL.com.ng/$CLIENTURL/g" app/config/settings.php
gsed -i "s/PRODUCTIONURL/$CLIENTURL/" .env.php

## LOCAL ENVIRONMENT SETTINGS
echo -n "Do You want to Set Local Environment Variables? [yes/no] "
read -e LOCAL
if [ $LOCAL = 'yes' ]
then
	## LOCAL DB SETTINGS
	echo -n "Do you need to setup a local database for this app? [yes/no] "
	read -e LWANTDB

	if [ $LWANTDB = 'yes' ]
	then
	    echo -n "What is the name of the database for this app? "
		read -e LOCALDBNAME

		echo "Creating MySQL database"
		mysql -uroot -p -e "CREATE DATABASE $LOCALDBNAME"

		echo ' Updating database configuration file '
		gsed -i "s/'SET DB NAME'/'$LOCALDBNAME'/" .env.local.php
		
		echo -n "Do you need a users table? [yes/no] "
		read -e WANTUSERTABLE

		if [ $WANTUSERTABLE = 'yes' ]
		then
		    echo 'Creating users table migration'
		    php artisan generate:migration create_users_table --fields="username:string:unique, email:string:unique, password:string"

		    echo 'Migrating the database'
		    php artisan migrate
		fi

	fi
fi

## PRODUCTION ENVIRONMENT SETTINGS
echo -n "Do You want to Set PRODUCTION Environment Variables? [yes/no] "
read -e PRODUCTION
if [ $PRODUCTION = 'yes' ]
then
	## PRODUCTION DB SETTINGS
	echo -n "Do you need to setup a PRODUCTION database for this app? [yes/no] "
	read -e PWANTDB

	if [ $PWANTDB = 'yes' ]
	then
		echo -n "What is the HOSTNAME of the database for this app? "
		read -e PRODUCTIONDBHOSTNAME
		echo 'Updating database HOSTNAME'
		gsed -i "s/'SET DB HOSTNAME'/'$PRODUCTIONDBHOSTNAME'/" .env.php

	    echo -n "What is the name of the database for this app? "
		read -e PRODUCTIONDBNAME
		echo 'Updating database NAME'
		gsed -i "s/'SET DB NAME'/'$PRODUCTIONDBNAME'/" .env.php

		echo -n "What is the USER of the database for this app? "
		read -e PRODUCTIONDBUSER
		echo 'Updating database USERNAME'
		gsed -i "s/'SET DB USER'/'$PRODUCTIONDBUSER'/" .env.php

		echo -n "What is the PASSWORD of the database for this app? "
		read -e PRODUCTIONDBPASSWORD
		echo 'Updating database PASSWORD'
		gsed -i "s/'SET DB PASSWORD'/'$PRODUCTIONDBPASSWORD'/" .env.php
	fi
fi

## STAGING ENVIRONMENT SETTINGS
echo -n "Do You want to Set STAGING Environment Variables? [yes/no] "
read -e STAGING
if [ $STAGING = 'yes' ]
then
	## STAGING DB SETTINGS
	echo -n "Do you need to setup a STAGING database for this app? [yes/no] "
	read -e SWANTDB

	if [ $SWANTDB = 'yes' ]
	then
	    echo -n "What is the HOSTNAME of the database for this app? "
		read -e STAGINGDBHOSTNAME
		echo 'Updating database HOSTNAME'
		gsed -i "s/'SET DB HOSTNAME'/'$STAGINGDBHOSTNAME'/" .env.staging.php

	    echo -n "What is the name of the database for this app? "
		read -e STAGINGDBNAME
		echo 'Updating database NAME'
		gsed -i "s/'SET DB NAME'/'$STAGINGDBNAME'/" .env.staging.php

		echo -n "What is the USER of the database for this app? "
		read -e STAGINGDBUSER
		echo 'Updating database USERNAME'
		gsed -i "s/'SET DB USER'/'$STAGINGDBUSER'/" .env.staging.php

		echo -n "What is the PASSWORD of the database for this app? "
		read -e STAGINGDBPASSWORD
		echo 'Updating database PASSWORD'
		gsed -i "s/'SET DB PASSWORD'/'$STAGINGDBPASSWORD'/" .env.staging.php

	fi

	echo -n "What is the STAGING Domain name? "
	read -e STAGINGURL
	gsed -i "s/STAGINGURL/$STAGINGURL/" .env.staging.php
fi

## MAIL SETTINGS
echo -n "Do you need to setup mail sending settings? [yes/no] "
read -e WANTMAIL

if [ $WANTMAIL = 'yes' ]
then
    echo -n "What is the username of for your mail service? (eg. postmaster@yourdomain.com) "
	read -e MAILUSER
	echo 'Updating mail username'
	gsed -i "s/'MAIL_USER' 		=> null/'MAIL_USER' 	=> '$MAILUSER'/" .env.*

	echo -n "What is the password of for your mail service? (eg. GDYj3j3883) "
	read -e MAILPASS
	echo "Updating mail password"
	gsed -i "s/'MAIL_PASS' 		=> null/'MAIL_PASS' 	=> '$MAILPASS'/" .env.*

	echo -n "Do you want to your local app to send mails or continue pretending? [yes/no] "
	read -e PRETEND

	if [ $PRETEND = 'yes' ]
	then
		echo "Setting Mail Pretend to false"
		gsed -i "s/true/false/" .env.local.php
	fi
fi

## MAILCHIMP SETTINGS
echo -n "Do you need to setup a mailchimp settings for this app? [yes/no] "
read -e WANTMAILCHIMP

if [ $WANTMAILCHIMP = 'yes' ]
then
    echo -n "What is the API KEY for your mailchimp account? "
	read -e MAILCHIMP_API_KEY

	echo 'Updating mailchimp API KEY'
	gsed -i "s/'MAILCHIMP_API_KEY' => 'SET MAILCHIMP API KEY'/'MAILCHIMP_API_KEY' => '$MAILCHIMP_API_KEY'/" .env.*

	echo -n "What is the LIST ID to add people to on your mailchimp account? "
	read -e MAILCHIMP_LIST_ID

	echo 'Updating mailchimp LIST ID'
	gsed -i "s/'MAILCHIMP_LIST_ID' => 'SET MAILCHIMP LIST ID'/'MAILCHIMP_LIST_ID' => '$MAILCHIMP_LIST_ID'/" .env.*

fi

## IRON.IO SETTINGS
echo -n "Do you need to setup a Queue Listener on Iron.io? [yes/no] "
read -e WANTIRON

if [ $WANTIRON = 'yes' ]
then
    echo -n "What is the PROJECT ID for your IRON account? "
	read -e IRON_PROJECT
	echo 'Updating IRON PROJECT ID'
	gsed -i "s/SET IRON.IO PROJECT ID/$IRON_PROJECT/" .env.staging.php
	gsed -i "s/SET IRON.IO PROJECT ID/$IRON_PROJECT/" .env.php

	echo -n "What is the TOKEN ID for your IRON account? "
	read -e IRON_TOKEN
	echo 'Updating IRON TOKEN ID'
	gsed -i "s/SET IRON.IO TOKEN/$IRON_TOKEN/" .env.staging.php
	gsed -i "s/SET IRON.IO TOKEN/$IRON_TOKEN/" .env.php

	echo -n "What is the QUEUE NAME for your IRON PRODUCTION account? "
	read -e IRON_PQNAME
	gsed -i "s/SET IRON.IO QUEUE NAME/$IRON_PQNAME/" .env.php
	echo -n "What is the PRODUCTION QUEUE URL (eg. http://yourdomain.com/queue/recieve) ? "
	read -e PQUEUEURL
	echo 'Updating IRON PRODUCTION QUEUE NAME'
	php artisan --env=production queue:subscribe $IRON_PQNAME $PQUEUEURL

	echo -n "What is the QUEUE NAME for your IRON STAGING account? "
	read -e IRON_SQNAME
	echo 'Updating IRON STAGING QUEUE NAME'
	gsed -i "s/SET IRON.IO QUEUE NAME/$IRON_SQNAME/" .env.staging.php
	echo -n "What is the STAGING QUEUE URL (eg. http://yourdomain.frtrbt.com/queue/recieve) ? "
	read -e SQUEUEURL
	echo 'Updating IRON STAGING QUEUE NAME'
	php artisan --env=staging queue:subscribe $IRON_SQNAME $SQUEUEURL
fi

echo "Setup Is Complete, Build Something Amazing."