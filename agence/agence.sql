DROP SEQUENCE IF EXISTS seq_agence;
DROP TABLE IF EXISTS agence;

create table agence (

    _date date default CURRENT_TIMESTAMP,
    agence varchar(40) not null,
    adresse varchar(40) not null,
    code_postal varchar(40) not null,
    téléphone VARCHAR(40) not null
    mail VARCHAR(40) not null
    CONSTRAINT utilisateur_PK PRIMARY KEY (agence)

);

CREATE SEQUENCE IF NOT EXISTS seq_agence INCREMENT BY 1

    START WITH 1 
    OWNED BY agence.id_user;


insert into agence values(nextval('seq_agence'),CURRENT_TIMESTAMP,'BMP','39 rue des tilleuls','62000',' 06 56 84 96 36','bmp@contact.fr','BMP');


commit;