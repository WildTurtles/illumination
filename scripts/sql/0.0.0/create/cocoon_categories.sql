CREATE TABLE cocoon_categories (
  id          uuid NOT NULL,
  name        varchar(255) NOT NULL,
  description text,
  created     timestamp,
  updated     timestamp,
  PRIMARY KEY (id));
