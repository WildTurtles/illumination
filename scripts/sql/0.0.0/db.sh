#!/bin/bash 

create()
{

crte=./create/
isrt=./insert/

#users and groups
psql -U $dbuser -d $dbname -f ${crte}groups.sql
psql -U $dbuser -d $dbname -f ${crte}users.sql
psql -U $dbuser -d $dbname -f ${crte}groups_users.sql
#psql -U $dbuser -d $dbname -f ${insert}admin.sql

# app configuration
psql -U $dbuser -d $dbname -f ${crte}configurations.sql

# formats for responses
psql -U $dbuser -d $dbname -f ${crte}formats.sql
psql -U $dbuser -d $dbname -f ${isrt}formats.sql

# formats for responses
psql -U $dbuser -d $dbname -f ${crte}corpuses.sql
psql -U $dbuser -d $dbname -f ${isrt}corpuses.sql

# accounts for request
psql -U $dbuser -d $dbname -f ${crte}accounts.sql

#visiblis supported languages
psql -U $dbuser -d $dbname -f ${crte}languages.sql
psql -U $dbuser -d $dbname -f ${isrt}languages.sql

#categories for semantic request (url title text)
psql -U $dbuser -d $dbname -f ${crte}categories.sql
psql -U $dbuser -d $dbname -f ${isrt}categories.sql

#keyword send by the api
psql -U $dbuser -d $dbname -f ${crte}keywords.sql

#the semantic request
psql -U $dbuser -d $dbname -f ${crte}semantic_requests.sql

#the results for keyword to a request
psql -U $dbuser -d $dbname -f ${crte}keyword_link_requests.sql

#some metrics send by the api
psql -U $dbuser -d $dbname -f ${crte}semantic_responses.sql

#if new install (to do 0.1->0.2)

#Request for command & http status code for doc http codes
psql -U $dbuser -d $dbname -f ${crte}notification_texts.sql
psql -U $dbuser -d $dbname -f ${crte}notifications.sql

#Request for command & http status code for doc http codes
psql -U $dbuser -d $dbname -f ${crte}request_for_comments.sql
psql -U $dbuser -d $dbname -f ${isrt}request_for_comments.sql
psql -U $dbuser -d $dbname -f ${crte}http_status_codes.sql
psql -U $dbuser -d $dbname -f ${isrt}http_status_codes.sql

psql -U $dbuser -d $dbname -f ${crte}cocoon_categories.sql
psql -U $dbuser -d $dbname -f ${isrt}cocoon_categories.sql

psql -U $dbuser -d $dbname -f ${crte}semantic_cocoons.sql
psql -U $dbuser -d $dbname -f ${crte}queue_elements.sql
psql -U $dbuser -d $dbname -f ${crte}semantic_cocoon_responses.sql
psql -U $dbuser -d $dbname -f ${crte}semantic_cocoon_links.sql
psql -U $dbuser -d $dbname -f ${crte}semantic_cocoon_uniform_ressource_locators.sql


#if new install (to do 0.2->0.3)
}

create
