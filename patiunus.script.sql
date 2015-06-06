drop database if exists patiunus;
create database patiunus;
create user patiunus@localhost identified by 'patiunus';
grant all privileges on patiunus.* to patiunus@localhost;

use patiunus;
\. patiunus.sql
