CREATE TABLE notifications (
  uuid                 uuid NOT NULL,
  created              timestamp,
  "read"               bool,
  notification_text_id uuid NOT NULL,
  PRIMARY KEY (uuid));
ALTER TABLE notifications ADD CONSTRAINT FKnotificati502086 FOREIGN KEY (notification_text_id) REFERENCES notification_texts (uuid);

