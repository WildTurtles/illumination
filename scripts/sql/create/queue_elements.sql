CREATE TABLE queue_elements (
  id                 uuid NOT NULL,
  position           int4,
  semantic_cocoon_id uuid NOT NULL,
  PRIMARY KEY (id));
CREATE UNIQUE INDEX queue_elements_position
  ON queue_elements (position);
ALTER TABLE queue_elements ADD CONSTRAINT FKqueue_elem644281 FOREIGN KEY (semantic_cocoon_id) REFERENCES semantic_cocoons (id);

