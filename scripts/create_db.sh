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

#if new install (to do 0.1->0.2)

#Request for command & http status code for doc http codes
psql -U $dbuser -d $dbname -f ./sql/create/notification_texts.sql
psql -U $dbuser -d $dbname -f ./sql/create/notifications.sql

#Request for command & http status code for doc http codes
psql -U $dbuser -d $dbname -f ./sql/create/request_for_comments.sql
psql -U $dbuser -d $dbname -f ./sql/create/http_status_codes.sql
psql -U $dbuser -d $dbname -f ./sql/insert/request_forcomments.sql
psql -U $dbuser -d $dbname -f ./sql/create/http_status_codes.sql



psql -U $dbuser -d $dbname -f ./sql/create/semantic_cocoons.sql
psql -U $dbuser -d $dbname -f ./sql/create/queue_elements.sql
psql -U $dbuser -d $dbname -f ./sql/create/semantic_cocoon_responses.sql
psql -U $dbuser -d $dbname -f ./sql/create/semantic_cocoon_links.sql
psql -U $dbuser -d $dbname -f ./sql/create/semantic_cocoon_uniform_ressource_locators.sql
