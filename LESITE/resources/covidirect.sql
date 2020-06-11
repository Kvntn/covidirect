#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        iduser  Int  Auto_increment  NOT NULL ,
	email	Varchar (255) NOT NULL ,
        nom	Varchar (50) NOT NULL ,
	prenom	Varchar (50) NOT NULL,
        userlocation Int NOT NULL ,
        userphoto    Text ,
    	pw			 varchar(255) NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (iduser)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ad
#------------------------------------------------------------

CREATE TABLE ad(
        idad           Int  Auto_increment  NOT NULL ,
        statut         BOOLEAN NOT NULL ,
        title          Varchar (5) NOT NULL ,
        descriptionad    Text NOT NULL ,
        datead         Varchar (10) NOT NULL ,
        expirationdate Varchar (10) NOT NULL ,
        typead         Varchar (10) NOT NULL ,
        adlocation     Int NOT NULL ,
        iduser         Int NOT NULL
	,CONSTRAINT ad_PK PRIMARY KEY (idad)

	,CONSTRAINT ad_user_FK FOREIGN KEY (iduser) REFERENCES users(iduser)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: comments
#------------------------------------------------------------

CREATE TABLE comments(
        idcomment Int  Auto_increment  NOT NULL ,
        textcomment      Text NOT NULL ,
        datecomment      Varchar (10) NOT NULL ,
        idad      Int NOT NULL ,
        iduser    Int NOT NULL
	,CONSTRAINT comment_PK PRIMARY KEY (idcomment)

	,CONSTRAINT comment_ad_FK FOREIGN KEY (idad) REFERENCES ad(idad)
	,CONSTRAINT comment_user0_FK FOREIGN KEY (iduser) REFERENCES users(iduser)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: chatroom
#------------------------------------------------------------

CREATE TABLE chatroom(
        idchatroom Int  Auto_increment  NOT NULL
	,CONSTRAINT chatroom_PK PRIMARY KEY (idchatroom)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: message
#------------------------------------------------------------

CREATE TABLE messages(
        idmessage  Int  Auto_increment  NOT NULL ,
        messages    Varchar (240) NOT NULL ,
        datemessage Varchar (10) NOT NULL ,
        idchatroom Int NOT NULL ,
        iduser     Int NOT NULL
	,CONSTRAINT message_PK PRIMARY KEY (idmessage)

	,CONSTRAINT message_chatroom_FK FOREIGN KEY (idchatroom) REFERENCES chatroom(idchatroom)
	,CONSTRAINT message_user0_FK FOREIGN KEY (iduser) REFERENCES users(iduser)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: to fav
#------------------------------------------------------------

CREATE TABLE to_fav(
        idad   Int NOT NULL ,
        iduser Int NOT NULL
	,CONSTRAINT to_fav_PK PRIMARY KEY (idad,iduser)

	,CONSTRAINT to_fav_ad_FK FOREIGN KEY (idad) REFERENCES ad(idad)
	,CONSTRAINT to_fav_user0_FK FOREIGN KEY (iduser) REFERENCES users(iduser)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: to belong in
#------------------------------------------------------------

CREATE TABLE to_belong_in(
        iduser     Int NOT NULL ,
        idchatroom Int NOT NULL
	,CONSTRAINT to_belong_in_PK PRIMARY KEY (iduser,idchatroom)

	,CONSTRAINT to_belong_in_user_FK FOREIGN KEY (iduser) REFERENCES users(iduser)
	,CONSTRAINT to_belong_in_chatroom0_FK FOREIGN KEY (idchatroom) REFERENCES chatroom(idchatroom)
)ENGINE=InnoDB;

