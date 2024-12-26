-- Création des tables dans PostgreSQL

-- Table des marques
CREATE TABLE brand (
    id SERIAL PRIMARY KEY,
    name VARCHAR(45) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP
);

-- Table des catégories
CREATE TABLE category (
    id SERIAL PRIMARY KEY,
    name VARCHAR(64) NOT NULL,
    subtitle VARCHAR(64),
    picture VARCHAR(128),
    home_order SMALLINT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP
);

-- Table des types de produits
CREATE TABLE type (
    id SERIAL PRIMARY KEY,
    name VARCHAR(64) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP
);

-- Table des produits
CREATE TABLE product (
    id SERIAL PRIMARY KEY,
    name VARCHAR(45) NOT NULL,
    description TEXT,
    picture VARCHAR(128),
    price NUMERIC(10,2) NOT NULL DEFAULT 0,
    rate SMALLINT DEFAULT 0,
    status SMALLINT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP,
    brand_id INT REFERENCES brand(id) ON DELETE CASCADE,
    category_id INT REFERENCES category(id) ON DELETE SET NULL,
    type_id INT REFERENCES type(id) ON DELETE CASCADE
);


-- Insértion des données

-- Données pour la table brand
INSERT INTO brand (name) VALUES
('Maticha'),
('Tomato');

-- Données pour la table category
INSERT INTO category (name, subtitle, picture, home_order) VALUES
('Normal', 'En bien', '/Serveur/public/Images/normal.svg', 4),
('Special', 'Pas comme les autres', '/Serveur/public/Images/special.svg', 2),
('Juteuse', 'DU JUS', '/Serveur/public/Images/juteuse.svg', 5),
('Lore Accurate', 'Sah on est ensemble', '/Serveur/public/Images/lore.svg', 3);

-- Données pour la table type
INSERT INTO type (name) VALUES
('Tomates Fraiches'),
('Tomates Mitigés'),
('Tomates Pourries');

-- Données pour la table product
INSERT INTO product (name, description, picture, price, rate, status, brand_id, category_id, type_id) VALUES
('Tomate Rouge', 'Une tomate rouge juteuse et délicieuse.', '/Serveur/public/Images/produit1.jpg', 1.50, 5, 1, 2, 1, 1),
('Tomate Cerise', 'Petite tomate parfaite pour les apéritifs.', '/Serveur/public/Images/produit2.jpg', 2.00, 4, 1, 2, 3, 1),
('Tomate Bio', 'Cultivée sans pesticides ni produits chimiques.', '/Serveur/public/Images/produit3.jpg', 3.50, 5, 1, 1, 2, 2),
('Tomate Cooked', 'Tellement cooked elle a accepté son destin.', '/Serveur/public/Images/produit4.jpg', 1000000, 10000, 1, 1, 4, 2);

SELECT * FROM product;
SELECT * FROM category;
SELECT * FROM brand;