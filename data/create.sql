drop table offre;
drop table categorie;
drop table utilisateur;
drop table region;

Create table offre (
ref INTEGER PRIMARY KEY,
photo TEXT,
intitule TEXT,
prix TEXT,
region TEXT,
caracteristique TEXT,
id INTEGER,
categorie INTEGER,
FOREIGN KEY (id) REFERENCES utilisateur(identifiant),
FOREIGN KEY (region) REFERENCES utilisateur(region),
FOREIGN KEY (categorie) REFERENCES categorie(id)
);

Create table suivisOffre (
refOffre INTEGER,
idUtilisateur INTEGER,
PRIMARY KEY(refOffre,idUtilisateur),
FOREIGN KEY (idUtilisateur) REFERENCES utilisateur(identifiant),
FOREIGN KEY (refOffre) REFERENCES offre(ref)
);

Create table utilisateur (
identifiant INTEGER PRIMARY KEY,
nomUser TEXT,
prenomUser TEXT,
age INTEGER,
mdp TEXT,
region TEXT,
mail TEXT,
telephone TEXT,
FOREIGN KEY (region) REFERENCES region(nom)
);

Create table categorie (
id INTEGER PRIMARY KEY,
intitule TEXT,
pere INTEGER,
FOREIGN KEY (pere) REFERENCES categorie(id)
);

Create table region (
nom TEXT PRIMARY KEY
);
