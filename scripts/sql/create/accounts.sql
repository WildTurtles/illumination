CREATE TABLE accounts (
  id       uuid NOT NULL, 
  name     varchar(255) NOT NULL UNIQUE, 
  login    varchar(255) NOT NULL, 
  password varchar(255), 
  PRIMARY KEY (id));
CREATE INDEX accounts_id 
  ON accounts (id);

