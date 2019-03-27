create database testdb;

grant all on testdb.* to root@localhost identified by '';

use testdb;

drop table if exists polls;
create table polls(
  id int not null auto_increment primary key,
  answer int not null,
  created datetime,
  remote_addr varchar(15),
  user_agent varchar(255),
  answer_date date,
  unique unique_answer(remote_addr, user_agent, answer_date)
);
