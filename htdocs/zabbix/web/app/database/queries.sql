create DATABASE zabbix_db;

create table service
(
	id_service int primary key,
	root varchar(55) unique,
	status varchar(10),
	problem_time double,
	sla double,
	acceptable_sla double default 99.90000
);

create table Host_Service
(
    id int primary key,
    host_name varchar(40) unique,
    ip_address varchar(15)
);

create table Value_SLA
(
    val float
);

create table sla_status
(
    id int PRIMARY Key AUTO_INCREMENT,
    date_s	date,
    actual_sla float,
    id_service int
);

alter table sla_status add CONSTRAINT fk1 FOREIGN key (id_service) REFERENCES host_service(id);