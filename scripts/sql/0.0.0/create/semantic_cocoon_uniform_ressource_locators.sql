CREATE TABLE semantic_cocoon_uniform_ressource_locators (
  id                          uuid NOT NULL,
  id_url_visiblis             int8,
  url                         text,
  as_title                    numeric,
  as_page                     numeric,
  title_semantic_rank         numeric,
  page_semantic_rank          numeric,
  page_rank                   numeric,
  http_status_code_id         uuid NOT NULL,
  semantic_cocoon_response_id uuid NOT NULL,
  created                     timestamp,
  updated                     timestamp,
  PRIMARY KEY (id));
ALTER TABLE semantic_cocoon_uniform_ressource_locators ADD CONSTRAINT FKsemantic_c624354 FOREIGN KEY (http_status_code_id) REFERENCES http_status_codes (id);
ALTER TABLE semantic_cocoon_uniform_ressource_locators ADD CONSTRAINT FKsemantic_c639501 FOREIGN KEY (semantic_cocoon_response_id) REFERENCES semantic_cocoon_responses (id);
