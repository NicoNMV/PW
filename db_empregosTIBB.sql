create database db_empregosTIBB;
use db_empregosTIBB;

create table tbl_Empregos(
    registro int primary key,
    nome varchar(80) not null,
    cargo varchar(20) not null,
    area varchar(25) not null,
    salario decimal(10,2) not null,
    eStatus varchar(8) not null
);

delimiter $$
create procedure sp_searchByCargoArea(vcargo varchar(20), varea varchar(25))
begin
    select * from tbl_empregos where cargo = vcargo and area = varea;
end
$$

call sp_searchByCargoArea('$cargo', '$area');