create database db_fh5;
use db_fh5;

/*
TB_GOLIATH_TIMES
ID int primary key auto_increment
IMG_VHC varchar2(500)
NM_VHC varchar2(200) not null
HR_TEMPO_VHC time* not null (*o tempo deverá ser de minuto:segundo.milisegundo) 
NM_CLASSE_VHC varchar2(2) not null (a classe será definida pela lógica do site)
QT_CLASSE_VHC int not null
*/

create table tb_goliath_times(
id int primary key auto_increment,
img_vhc varchar(500),
nm_vhc varchar(200) not null,
hr_tempo_vhc timestamp not null,
nm_classe_vhc varchar(2) not null,
qt_classe_vhc int not null
);

select * from tb_goliath_times;

insert into tb_goliath_times 
(nm_vhc, hr_tempo_vhc, nm_classe_vhc, qt_classe_vhc) values
('dbTestNome', CURRENT_TIMESTAMP, 'A', 1);








