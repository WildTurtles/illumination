CREATE TABLE languages (
  id            uuid NOT NULL, 
  name          varchar(50) NOT NULL, 
  description   text, 
  visiblis_code varchar(2) NOT NULL UNIQUE, 
  created       timestamp, 
  updated       timestamp, 
  PRIMARY KEY (id));
CREATE INDEX languages_id 
  ON languages (id);
CREATE UNIQUE INDEX languages_name 
  ON languages (name);
