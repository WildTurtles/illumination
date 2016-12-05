CREATE TABLE request_for_comments (
  id      uuid NOT NULL,
  name    varchar(255) NOT NULL,
  link    varchar(255) NOT NULL,
  created timestamp,
  updated timestamp,
  PRIMARY KEY (id));

