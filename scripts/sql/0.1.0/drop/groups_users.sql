ALTER TABLE groups_users DROP CONSTRAINT FKgroups_use122235;
ALTER TABLE groups_users DROP CONSTRAINT FKgroups_use576859;
DROP TABLE IF EXISTS groups CASCADE;
DROP TABLE IF EXISTS groups_users CASCADE;
DROP TABLE IF EXISTS users CASCADE;

