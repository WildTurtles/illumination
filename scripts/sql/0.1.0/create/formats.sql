CREATE TABLE formats (
  id            uuid NOT NULL, 
  name          varchar(50) NOT NULL, 
  description   text, 
  created       timestamp, 
  updated       timestamp, 
  visiblis_code varchar(50), 
  PRIMARY KEY (id));
CREATE INDEX formats_id 
  ON formats (id);
CREATE INDEX formats_name 
  ON formats (name);

