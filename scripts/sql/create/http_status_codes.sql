CREATE TABLE http_status_codes (
  id                     uuid NOT NULL,
  name                   varchar(255),
  description            text,
  request_for_comment_id uuid NOT NULL,
  created                timestamp,
  updated                timestamp,
  PRIMARY KEY (id));
ALTER TABLE http_status_codes ADD CONSTRAINT FKhttp_statu446397 FOREIGN KEY (request_for_comment_id) REFERENCES request_for_comments (id);

