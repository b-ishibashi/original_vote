create database original_vote;

grant all on testdb.* to root@localhost identified by '';

use testdb;

drop table if exists answers;
create table answers(
  id int not null auto_increment primary key,
  answer int not null,
  created datetime
);
