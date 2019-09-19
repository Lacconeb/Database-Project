
DROP TABLE IF EXISTS `fighter_power_up`;
DROP TABLE IF EXISTS `fighter`;
DROP TABLE IF EXISTS `squad`;
DROP TABLE IF EXISTS `weapon`;
DROP TABLE IF EXISTS `armor`;
DROP TABLE IF EXISTS `power_up`;

CREATE TABLE squad (
    id INT AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    gold INT NOT NULL,
    PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE weapon (
    id INT AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    type varchar(255) NOT NULL,
    quality varchar(255) NOT NULL,
    durability INT NOT NULL,
    damage INT NOT NULL,
    PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE armor (
    id INT AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    type varchar(255) NOT NULL,
    quality varchar(255) NOT NULL,
    durability INT NOT NULL,
    damage_reduction INT NOT NULL,
    PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE fighter (
    id INT AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    race varchar(255) NOT NULL,
    class varchar(255) NOT NULL,
    squad_id INT,
    weapon_id INT,
    armor_id INT,
    CONSTRAINT UC_weapon UNIQUE (weapon_id),
    CONSTRAINT UC_armor UNIQUE (armor_id),
    PRIMARY KEY(id),
    FOREIGN KEY (squad_id) REFERENCES squad(id) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (weapon_id) REFERENCES weapon(id) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (armor_id) REFERENCES armor(id) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE power_up (
    id INT AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    type varchar(255) NOT NULL,
    PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE fighter_power_up (
    id INT AUTO_INCREMENT,
    fighter_id INT,
    power_up_id INT,
    PRIMARY KEY(id),
    FOREIGN KEY (fighter_id) REFERENCES fighter(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (power_up_id) REFERENCES power_up(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;