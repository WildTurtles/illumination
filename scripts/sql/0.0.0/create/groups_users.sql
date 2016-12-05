CREATE TABLE groups_users (
  user_id  uuid NOT NULL,
  group_id uuid NOT NULL,
  created  timestamp,
  updated  timestamp,
  PRIMARY KEY (user_id,
  group_id));
CREATE INDEX groups_users_user_id
  ON groups_users (user_id);
CREATE INDEX groups_users_group_id
  ON groups_users (group_id);
ALTER TABLE groups_users ADD CONSTRAINT FKgroups_use576859 FOREIGN KEY (user_id) REFERENCES users (id);
ALTER TABLE groups_users ADD CONSTRAINT FKgroups_use122235 FOREIGN KEY (group_id) REFERENCES groups (id);
