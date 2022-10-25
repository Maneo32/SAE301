DROP table if exists Etudiant, Prof, Patient, Scenario, Note, Medicament, Intervenant, Prescription, Diagnostic, Radio, Neuro, Mobilite, MiseEnSecurite, Elimination, Alimentation,
SoinsRelationnels , Cardio, Respi, Hygiene, Soins Cascade;

insert into groupe values ( 1 , 'tous', 'admin@gmail.com', true);

drop table if exists message;
CREATE table message(
    id serial primary key,
    email text,
    userx text,
    textmessage text,
    date date,
    idgroupe int not null ,
    foreign key (idgroupe, email) references groupe(idgroupe, email)
);

drop table if exists groupe cascade;

CREATE TABLE Groupe (
    idGroupe serial,
    nomGroupe text,
    email text REFERENCES Etudiant(email),
    primary key (idGroupe,email),
    admin boolean not null
);

delete from prof where nom = 'Soil';
create TABLE email(
    email text primary key
);

CREATE Table Etudiant (
    email text primary key,
    mdp text not null,
    nom text ,
    prenom text,
    classe text,
    Annee int,
    Code text
);


Create Table Prof (
    email text primary key,
    matiere text ,
    mdp text not null,
    nom text not null,
    prenom text not null
);

drop table if exists Patient cascade ;

Create Table Patient(
    idPatient serial primary key,
    nom text not null,
    prenom text not null,
    Age int not null,
    DDN date not null,
    poids int not null,
    taille int not null,
    IEP int not null,
    IPP int not null,
    sexe text not null,
    Adresse text not null,
    Ville text not null,
    CodePostal int not null
);


Create table Scenario (
    idScenario int primary key,
    email text references Prof,
    idPatient int references Patient
);

Create Table Note (
    email text references Etudiant,
    idScenario int references Scenario,
    note int not null,
    primary key (email, idScenario)
);

CREATE table Medicament(
    nom text primary key,
    CP int not null,
    prise text not null
);
drop table if exists Prescription;

Create Table Diagnotic (
    idIntervenant serial primary key,
    nom text not null,
    prenom text not null,
    compteRendu text not null,
    idPatient int references Patient
);


Create table Prescription (
    idPrescription int primary key,
    prise date not null,
    medicament text references Medicament,
    idPatient int references Patient,
    medecin text not null
);



Create table Radio (
    idRadio serial Primary Key,
     image text not null,
     idPatient int references Patient
);

Create TABLE Neuro (
    date date not null ,
    t°c float not null,
    Glasgow float not null,
    EVA int not null,
    AlgoPlus int not null,
    idPatient int references Patient,
    primary key (date,idPatient)
);

CREATE TABLE Mobilite(
    date date not null,
    aideALaMarche boolean not null,
    aideAuLever boolean not null,
    aideAuCoucher boolean not null,
    aideAuFauteil boolean not null,
    idPatient int references Patient,
    primary key (date, idPatient)

);

CREATE table MiseEnSecurite(
    date date not null ,
    barriereDeLitPrescrite boolean not null ,
    barriereDeLitConfort boolean not null ,
    ServeillanceContention boolean not null ,
    idPatient int references Patient,
    primary key (date, idPatient)

);

Create table Elimination(
    date date not null,
    Selles boolean not null ,
    Gaz boolean not null ,
    Urines boolean not null ,
    idPatient int references Patient,
    primary key (date, idPatient)
);

Create Table Alimentation(
    date date not null ,
    aJeun boolean not null ,
    SurveillanceHydratation boolean not null ,
    SurveillanceAlimentation boolean not null ,
    regime boolean not null ,
    AideAuRepas boolean not null ,
    idPatient int references Patient,
    primary key (date , idPatient)

);

CREATE table  SoinsRelationnels(
    date date not null ,
    Accueil boolean not null ,
    EntretienInfirmer boolean not null ,
    ToucherMassage boolean not null ,
    idPatient int references Patient,
    primary key (date, idPatient)

);

Create table Cardio(
    date timestamp not null,
    TA text ,
    pls int  ,
    ECG text  ,
    idPatient int references Patient,
    primary key (date,idPatient)

);

Create table Respi(
    date timestamp not null ,
    SaO2 int  ,
    Fr int  ,
    O2 text ,
    idPatient int references Patient,
    primary key (date, idPatient)

);

Create table Hygiene(
    date date not null ,
    Douche boolean not null ,
    Bain boolean not null ,
    refectionLit boolean not null ,
    Change boolean not null ,
    SoinDeBouche boolean not null ,
    PreventionDescare boolean not null ,
    ChangementDePos boolean not null,
    MatelasAAir boolean not null ,
    idPatient int references Patient,
    primary key (date , idPatient)

);

Create table Soins(
    date date not null ,
    /* CatheterVeineuxPeriph not null ,*/
    SurveillancePerf boolean not null ,
    Pansement boolean not null,
    /*SondageUriniaire not null,*/
    SurveillanceGlycemique float not null ,
    BasDeContention boolean not null ,
    Autre text not null ,
    idPatient int references Patient,
    primary key (date, idPatient)

)