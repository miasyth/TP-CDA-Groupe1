DROP SEQUENCE IF EXISTS seq_agence;
DROP SEQUENCE IF EXISTS seq_client;
DROP SEQUENCE IF EXISTS seq_compte;
DROP TABLE IF EXISTS compte;
DROP TABLE IF EXISTS client;
DROP TABLE IF EXISTS agence;

ALTER SEQUENCE IF EXISTS seq_agence RESTART WITH 1;
ALTER SEQUENCE IF EXISTS seq_client RESTART WITH 1;
ALTER SEQUENCE IF EXISTS seq_compte RESTART WITH 1;
--delete from seq_agence;
--delete from seq_client;
--delete from seq_compte;

       

create table agence
(	
	id_agence numeric not null,
	no_agence numeric(3),
	nom varchar(20),
	adresse varchar(255),
	codepostal numeric(5),
	telephone numeric(10),
	mail varchar(255),
	constraint id_agence_PK primary key (id_agence)
);



create table client
(
	id_client numeric not null,
	no_client varchar(8),
	nom varchar(50),
	prenom varchar(50),
	date_naissance date,
	sexe varchar(5),
	adresse varchar(50),
	codepostal numeric(5),
	telephone numeric(10),
	mail varchar(50),
	id_agence numeric,
	constraint id_client_PK primary key (id_client),
	constraint id_agence_FK foreign key (id_agence) references agence (id_agence)
);




create table compte
(
	id_compte numeric not null,
	no_compte numeric(11),
	type_Compte varchar(21),
	decouvert boolean,
	solde varchar(8),
	id_agence numeric,
	id_client numeric,
	constraint id_compte_PK primary key (id_compte),
	constraint id_agence_FK foreign key (id_agence) references agence (id_agence),
	constraint id_client_FK foreign key (id_client) references client (id_client)
);



CREATE SEQUENCE IF NOT EXISTS seq_agence INCREMENT BY 1
    
    START WITH 1 
    OWNED BY agence.id_agence;


CREATE SEQUENCE IF NOT EXISTS seq_client INCREMENT BY 1
    
    START WITH 1
    OWNED BY client.id_client;



CREATE SEQUENCE IF NOT EXISTS seq_compte INCREMENT BY 1
    
    START WITH 1
    OWNED BY compte.id_compte;


insert into agence values (nextval('seq_agence'),001,'HSBC','5 Rue Leon Gambetta',62000,0321214242,'https://www.hsbc.fr/contactez-nous/');
insert into agence values (nextval('seq_agence'),002,'IBM','99 Rue des Templiers',59000,0892977098,'https://mabanque.bnpparibas/fr/nous-contacter/');
insert into agence values (nextval('seq_agence'),003,'BNP Paribas','10 Route de Bapaume',62217,0321505429,'https://www.ibm.com/contact/fr/fr/');

commit;


insert into client values (nextval('seq_client'),'LC001001','Leclerc','Charles','25/12/1998','Homme','78 place de Cannel',83450,0787946325,'charlesleclerc@formula1.com',1);
insert into client values (nextval('seq_client'),'LC001002','Le Goff','Christophe', '25/12/1999','Homme','514 avenue du Boch',80000,0784254768,'christophelegoff@gmail.com',1);
insert into client values (nextval('seq_client'),'DM001003','Madasclaire','Dan', '22/02/1993','Homme','84 chemin des paquerettes',54000,0778563245,'apex@csgo.en',1);
insert into client values (nextval('seq_client'),'TZ002001','Thumaz','Zary','18/11/1987','Femme','1 rue des légendes',78004,0614976547,'zary.thumaz@legends.net',2);
insert into client values (nextval('seq_client'),'GG002002','Gadot','Gal','30/04/1985','Femme','654 boulevard du chêne',44300,0636459684,'galdot@wonder.net',2);
insert into client values (nextval('seq_client'),'FC003001','Fouquet','Corentin','31/12/1999','Homme','78 allé du carrefour',65170, 0865781234,'fouquetteco@chef.fr',3);



commit;

insert into compte values (nextval('seq_compte'),00100100101,'Courant',true,'400',1,1);
insert into compte values (nextval('seq_compte'),00100100202,'Livret A',false,'657,21',1,1);
insert into compte values (nextval('seq_compte'),00100100303,'Plan Epargne Logement',false,'10580,81',1,1);
insert into compte values (nextval('seq_compte'),00100200101,'Courant',true,'10580,81',1,2);
insert into compte values (nextval('seq_compte'),00100200202,'Livret A',false,'657,25',1,2);
insert into compte values (nextval('seq_compte'),00100200303,'Plan Epargne Logement',false,'10580,81',1,2);
insert into compte values (nextval('seq_compte'),00200100101,'Courant',true,'400',2,4);
insert into compte values (nextval('seq_compte'),00200200102,'Livret A',false,'50000',2,5);


commit;