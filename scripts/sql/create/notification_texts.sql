CREATE TABLE notification_texts (
  uuid        uuid NOT NULL,
  name        varchar(255),
  description text NOT NULL,
  created     timestamp,
  updated     timestamp,
  PRIMARY KEY (uuid));
CREATE UNIQUE INDEX notification_texts_name
  ON notification_texts (name);

