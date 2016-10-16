CREATE TABLE configurations (
  id        uuid NOT NULL, 
  name      varchar(50) NOT NULL UNIQUE, 
  "key"     varchar(48), 
  ip        varchar(16), 
  "default" bool, 
  created   timestamp, 
  updated   timestamp, 
  PRIMARY KEY (id));
CREATE INDEX configurations_id 
  ON configurations (id);
CREATE INDEX configurations_key 
  ON configurations ("key");
CREATE INDEX configurations_ip 
  ON configurations (ip);
CREATE INDEX configurations_default 
  ON configurations ("default");

