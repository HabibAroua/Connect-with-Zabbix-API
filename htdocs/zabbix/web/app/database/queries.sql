create DATABASE zabbix_db;

create table service
(
	id_service int primary key,
	root varchar(55) unique,
	status varchar(10),
	problem_time double,
	sla double,
	acceptable_sla double default 99.90000
)