CREATE TABLE configurations (
  id               uuid NOT NULL, 
  name             varchar(50) NOT NULL UNIQUE, 
  visiblis_api_key varchar(48), 
  ip               varchar(16), 
  is_default       bool, 
  created          timestamp, 
  updated          timestamp, 
  PRIMARY KEY (id));
CREATE INDEX configurations_id 
  ON configurations (id);
CREATE INDEX configurations_visiblis_api_key 
  ON configurations (visiblis_api_key);
CREATE INDEX configurations_ip 
  ON configurations (ip);
CREATE INDEX configurations_is_default
  ON configurations (is_default);
