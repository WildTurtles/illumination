CREATE TABLE categories (
  id                uuid NOT NULL,
  name              varchar(255) NOT NULL,
  visiblis_api_code varchar(3) NOT NULL,
  description       text,
  created           timestamp,
  updated           timestamp,
  PRIMARY KEY (id));
CREATE INDEX categories_id
  ON categories (id);
CREATE UNIQUE INDEX categories_name
  ON categories (name);
CREATE UNIQUE INDEX categories_visiblis_api_code
  ON categories (visiblis_api_code);

