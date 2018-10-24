drop table offre;
drop table categorie;
drop table utilisateur;


Create table offre (
ref INTEGER PRIMARY KEY,
photo TEXT,
intitule TEXT,
prix FLOAT,
region TEXT,
caracteristique TEXT,
id INTEGER,
categorie INTEGER,
FOREIGN KEY (id) REFERENCES utilisateur(identifiant),
FOREIGN KEY (region) REFERENCES utilisateur(region),
FOREIGN KEY (categorie) REFERENCES categorie(id)
);

Create table utilisateur (
identifiant INTEGER PRIMARY KEY,
nomUser TEXT,
prenomUser TEXT,
AGE INTEGER,
mdp TEXT,
region TEXT,
mail TEXT,
TELEPHONE INTEGER
);

Create table categorie (
id INTEGER PRIMARY KEY,
intitule TEXT,
pere INTEGER,
FOREIGN KEY (pere) REFERENCES categorie(id)
);
