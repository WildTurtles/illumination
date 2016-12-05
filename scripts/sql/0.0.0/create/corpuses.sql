CREATE TABLE corpuses (
  id              uuid NOT NULL,
  name            varchar(50) NOT NULL UNIQUE,
  description     text,
  visiblis_number int4 NOT NULL,
  created         timestamp,
  updated         timestamp,
  PRIMARY KEY (id));
CREATE INDEX corpuses_id
  ON corpuses (id);
CREATE INDEX corpuses_visiblis_number
  ON corpuses (visiblis_number);

