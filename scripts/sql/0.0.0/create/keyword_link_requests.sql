CREATE TABLE keyword_link_requests (
  id                  uuid NOT NULL,
  count               int8,
  keyword_id          uuid NOT NULL,
  semantic_request_id uuid NOT NULL,
  percentage          numeric(5, 2),
  created             timestamp,
  updated             timestamp,
  PRIMARY KEY (id));
ALTER TABLE keyword_link_requests ADD CONSTRAINT FKkeyword_li258132 FOREIGN KEY (semantic_request_id) REFERENCES semantic_requests (id);
ALTER TABLE keyword_link_requests ADD CONSTRAINT FKkeyword_li745121 FOREIGN KEY (keyword_id) REFERENCES keywords (id);

