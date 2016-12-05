CREATE TABLE keywords (
  id      uuid NOT NULL,
  name    text NOT NULL UNIQUE,
  created timestamp,
  updated timestamp,
  PRIMARY KEY (id));
CREATE INDEX keywords_id
  ON keywords (id);

