Create table offre (
ref INTEGER PRIMARY KEY,
photo TEXT,
intitule TEXT,
prix FLOAT,
region TEXT,
caracteristique TEXT,
id INTEGER,
FOREIGN KEY id REFERENCE utilisateur(id),
FOREIGN KEY region REFERENCE utilisateur(region)
);

Create table utilisateur (
id INTEGER PRIMARY KEY,
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
categorieG TEXT,
FOREIGN KEY id REFERENCE offre(id)
);