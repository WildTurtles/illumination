CREATE TABLE semantic_cocoon_links (
  id                          uuid NOT NULL,
  source                      int8,
  destination                 int8,
  semantic_cocoon_response_id uuid NOT NULL,
  created                     timestamp,
  updated                     timestamp,
  PRIMARY KEY (id));
ALTER TABLE semantic_cocoon_links ADD CONSTRAINT FKsemantic_c997977 FOREIGN KEY (semantic_cocoon_response_id) REFERENCES semantic_cocoon_responses (id) ON DELETE CASCADE ON DELETE CASCADE;

