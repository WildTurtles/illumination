CREATE TABLE groups (
  id      uuid NOT NULL,
  name    varchar(50) NOT NULL UNIQUE,
  created timestamp,
  updated timestamp,
  PRIMARY KEY (id));
CREATE INDEX groups_id
  ON groups (id);
