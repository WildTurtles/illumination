CREATE TABLE groups (
  id      uuid NOT NULL, 
  name    varchar(50) NOT NULL UNIQUE, 
  created timestamp, 
  updated timestamp, 
  PRIMARY KEY (id));
CREATE TABLE groups_users (
  user_id  uuid NOT NULL, 
  group_id uuid NOT NULL, 
  created  timestamp, 
  updated  timestamp, 
  PRIMARY KEY (user_id, 
  group_id));
CREATE TABLE users (
  id       uuid NOT NULL, 
  username varchar(255) NOT NULL, 
  email    varchar(255), 
  password varchar(255) NOT NULL, 
  created  timestamp, 
  updated  timestamp, 
  PRIMARY KEY (id));
CREATE INDEX groups_id 
  ON groups (id);
CREATE INDEX groups_users_user_id 
  ON groups_users (user_id);
CREATE INDEX groups_users_group_id 
  ON groups_users (group_id);
CREATE INDEX users_id 
  ON users (id);
CREATE UNIQUE INDEX users_username 
  ON users (username);
CREATE UNIQUE INDEX users_email 
  ON users (email);
ALTER TABLE groups_users ADD CONSTRAINT FKgroups_use122235 FOREIGN KEY (group_id) REFERENCES groups (id);
ALTER TABLE groups_users ADD CONSTRAINT FKgroups_use576859 FOREIGN KEY (user_id) REFERENCES users (id);

