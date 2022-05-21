CREATE DATABASE site_music character set utf8 collate utf8_general_ci;
use site_music;
-- create table illustration 
	-- (id_illustration int auto_increment primary key not null, 
	-- nom_illustration varchar(50),
    -- createur_illustration varchar(100),
    -- date_post_illustration datetime);
    
create table morceau 
	(id_morceau int auto_increment primary key not null,
	morceau varchar(255),
    nom_morceau varchar(100),
    compositeur_morceau varchar(100),
	description_morceau  text,
	genre_morceau varchar(255),
    -- duree_morceau time,
    -- date_post_morceau datetime,
	image_morceau varchar(255));
    
-- create table associer 
	-- (id_morceau int,
    -- id_illustration int,
    -- primary key(id_morceau, id_illustration),
    -- foreign key(id_morceau) references morceau(id_morceau),
    -- foreign key(id_illustration) references illustration(id_illustration));
    
create table icone_like
	(id_icone_like int auto_increment primary key not null,
	pseudo_utilisateur_like varchar(100),
    date_like datetime);
    
create table repost
	(id_repost int auto_increment primary key not null,
    pseudo_utilisateur_repost varchar(100),
    date_repost datetime);

create table commentaire 
	(id_commentaire int auto_increment primary key not null,
    pseudo_utilisateur_commentaire varchar(100),
    contenu_commentaire text,
    date_commentaire datetime);

create table utilisateur
	(id_utilisateur int auto_increment primary key not null,
    pseudo_utilisateur varchar(100),
    nom_utilisateur varchar(30),
    prenom_utilisateur varchar(30),
    mail_utilisateur varchar(100),
    log_utilisateur varchar(50),
    mdp_utilisateur varchar (255));
    
create table abonnement
	(id_utilisateur_n int,
    id_utilisateur int,
    primary key(id_utilisateur, id_utilisateur_n),
    foreign key(id_utilisateur) references utilisateur(id_utilisateur));
    
alter table morceau
add id_utilisateur int,
add constraint fk_morceau_utilisateur foreign key (id_utilisateur) references utilisateur(id_utilisateur);

alter table commentaire
add id_utilisateur int, 
add id_morceau int,
add constraint fk_commentaire_utilisateur foreign key (id_utilisateur) references utilisateur(id_utilisateur),
add constraint fk_commentaire_morceau foreign key (id_morceau) references morceau(id_morceau);

alter table repost
add id_utilisateur int,
add id_morceau int,
add constraint fk_repost_utilisateur foreign key (id_utilisateur) references utilisateur(id_utilisateur),
add constraint fk_repost_morceau foreign key (id_morceau) references morceau(id_morceau);

alter table icone_like
add id_utilisateur int,
add id_morceau int,
add constraint fk_icone_like_utilisateur foreign key (id_utilisateur) references utilisateur(id_utilisateur),
add constraint fk_icone_like_morceau foreign key (id_morceau) references morceau(id_morceau);

