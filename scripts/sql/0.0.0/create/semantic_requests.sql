CREATE TABLE semantic_requests (
  id          uuid NOT NULL,
  name        varchar(255) NOT NULL,
  count       int8,
  category_id uuid NOT NULL,
  field       text,
  request     text,
  block       text,
  language_id uuid NOT NULL,
  corpus_id   uuid NOT NULL,
  account_id  uuid,
  created     timestamp,
  updated     timestamp,
  PRIMARY KEY (id));
CREATE INDEX semantic_requests_id
  ON semantic_requests (id);
CREATE INDEX semantic_requests_name
  ON semantic_requests (name);
CREATE INDEX semantic_requests_category_id
  ON semantic_requests (category_id);
CREATE INDEX semantic_requests_language_id
  ON semantic_requests (language_id);
CREATE INDEX semantic_requests_corpus_id
  ON semantic_requests (corpus_id);
CREATE INDEX semantic_requests_account_id
  ON semantic_requests (account_id);
ALTER TABLE semantic_requests ADD CONSTRAINT FKsemantic_r130721 FOREIGN KEY (language_id) REFERENCES languages (id);
ALTER TABLE semantic_requests ADD CONSTRAINT FKsemantic_r667918 FOREIGN KEY (corpus_id) REFERENCES corpuses (id);
ALTER TABLE semantic_requests ADD CONSTRAINT FKsemantic_r122583 FOREIGN KEY (account_id) REFERENCES accounts (id);
ALTER TABLE semantic_requests ADD CONSTRAINT FKsemantic_r688373 FOREIGN KEY (category_id) REFERENCES categories (id);

