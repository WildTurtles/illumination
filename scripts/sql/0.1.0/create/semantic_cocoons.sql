CREATE TABLE semantic_cocoons (
  id                 uuid NOT NULL,
  name               varchar(255),
  count              int4,
  url                text,
  request            text,
  clusters           int2,
  language_id        uuid NOT NULL,
  corpus_id          uuid NOT NULL,
  regular_expression varchar(255),
  exclusive          bool,
  account_id         uuid NOT NULL,
  created            timestamp,
  updated            timestamp,
  PRIMARY KEY (id));
ALTER TABLE semantic_cocoons ADD CONSTRAINT FKsemantic_c778677 FOREIGN KEY (account_id) REFERENCES accounts (id);
ALTER TABLE semantic_cocoons ADD CONSTRAINT FKsemantic_c184775 FOREIGN KEY (language_id) REFERENCES languages (id);
ALTER TABLE semantic_cocoons ADD CONSTRAINT FKsemantic_c11824 FOREIGN KEY (corpus_id) REFERENCES corpuses (id);

