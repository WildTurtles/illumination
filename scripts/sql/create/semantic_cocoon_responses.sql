CREATE TABLE semantic_cocoon_responses (
  id                 uuid NOT NULL, 
  started            timestamp, 
  ended              timestamp, 
  count              int4, 
  semantic_cocoon_id uuid NOT NULL, 
  PRIMARY KEY (id));
ALTER TABLE semantic_cocoon_responses ADD CONSTRAINT FKsemantic_c150326 FOREIGN KEY (semantic_cocoon_id) REFERENCES semantic_cocoons (id);

