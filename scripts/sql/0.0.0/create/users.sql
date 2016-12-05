CREATE TABLE users (
  id       uuid NOT NULL,
  username varchar(255) NOT NULL,
  email    varchar(255),
  password varchar(255) NOT NULL,
  created  timestamp,
  updated  timestamp,
  PRIMARY KEY (id));
CREATE INDEX users_id
  ON users (id);
CREATE UNIQUE INDEX users_username
  ON users (username);
CREATE UNIQUE INDEX users_email
  ON users (email);

