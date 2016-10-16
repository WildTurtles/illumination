CREATE TABLE semantic_responses (
  id                  uuid NOT NULL, 
  count               int8, 
  url                 text, 
  as_title            numeric(5, 2), 
  as_page             numeric(5, 2), 
  as_text             numeric(5, 2), 
  language_id         uuid NOT NULL, 
  semantic_request_id uuid NOT NULL, 
  created             timestamp, 
  updated             timestamp, 
  PRIMARY KEY (id));
CREATE INDEX semantic_responses_id 
  ON semantic_responses (id);
CREATE INDEX semantic_responses_semantic_request_id 
  ON semantic_responses (semantic_request_id);
ALTER TABLE semantic_responses ADD CONSTRAINT FKsemantic_r663177 FOREIGN KEY (semantic_request_id) REFERENCES semantic_requests (id);
ALTER TABLE semantic_responses ADD CONSTRAINT FKsemantic_r935857 FOREIGN KEY (language_id) REFERENCES languages (id);

