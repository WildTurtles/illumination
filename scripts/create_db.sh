#!/bin/bash 

dbuser=illumination
dbname=illumination

#users and groups
psql -U $dbuser -d $dbname -f ./sql/create/groups_users.sql

# app configuration
psql -U $dbuser -d $dbname -f ./sql/create/configurations.sql

# formats for responses
psql -U $dbuser -d $dbname -f ./sql/create/formats.sql
psql -U $dbuser -d $dbname -f ./sql/insert/formats.sql

# formats for responses
psql -U $dbuser -d $dbname -f ./sql/create/corpuses.sql
psql -U $dbuser -d $dbname -f ./sql/insert/corpuses.sql

# accounts for request
psql -U $dbuser -d $dbname -f ./sql/create/accounts.sql

#visiblis supported languages 
psql -U $dbuser -d $dbname -f ./sql/create/languages.sql
psql -U $dbuser -d $dbname -f ./sql/insert/languages.sql

#categories for semantic request (url title text)
psql -U $dbuser -d $dbname -f ./sql/create/categories.sql
psql -U $dbuser -d $dbname -f ./sql/insert/categories.sql

#keyword send by the api 
psql -U $dbuser -d $dbname -f ./sql/create/keywords.sql

#the semantic request
psql -U $dbuser -d $dbname -f ./sql/create/semantic_requests.sql

#the results for keyword to a request
psql -U $dbuser -d $dbname -f ./sql/create/keyword_link_requests.sql

#some metrics send by the api
psql -U $dbuser -d $dbname -f ./sql/create/semantic_responses.sql
