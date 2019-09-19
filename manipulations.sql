
/* I sometimes have multiple queries which are the same.
   I will not be repeating the queries which are the exact same.
   So, for example, if a query that is in update was already used 
   in another section it will be excluded from update.
*/

/**********************************************************
*************************Fighters**************************
**********************************************************/

/* ADD */
SELECT id, name FROM squad;

SELECT w.id, w.name 
FROM weapon w
WHERE w.id NOT
IN (
    SELECT f.weapon_id
    FROM fighter f 
    WHERE f.weapon_id IS NOT NULL
);

SELECT a.id, a.name 
FROM armor a
WHERE a.id NOT
IN (
    SELECT f.armor_id
    FROM fighter f
    WHERE f.armor_id IS NOT NULL
);

/* Display Tables*/
SELECT id, name, race, class, squad_id, weapon_id,armor_id FROM fighter;

INSERT INTO fighter (name, race, class, squad_id, weapon_id, armor_id)
VALUES ([$name], [race], [class], 
(SELECT id FROM squad WHERE id=[squad_id]), 
(SELECT id FROM weapon WHERE id=[weapon_id]), 
(SELECT id FROM armor WHERE id=[$armor_id]));

/* Update */
SELECT id, name FROM weapon WHERE id=[$weapon_id];

SELECT id, name FROM armor WHERE id=[$armor_id];

UPDATE fighter SET name=[name], race=[race], class=[class], 
squad_id=(SELECT id FROM squad WHERE id=[squad_id]), 
weapon_id=(SELECT id FROM weapon WHERE id=[weapon_id]),
armor_id=(SELECT id FROM armor WHERE id=[$armor_id])
WHERE id=[id];

/* Delete */
DELETE FROM fighter WHERE id=[id];

/* Search */
SELECT id, name, race, class, squad_id, weapon_id,armor_id FROM fighter WHERE name=[search];


/**********************************************************
**************************Squads***************************
**********************************************************/

/* ADD */
INSERT INTO squad (name, gold) VALUES ([name], [gold]);

/* Display Tables*/
SELECT id, name, gold FROM squad;

/* Update */
SELECT name, gold FROM squad WHERE id=[$id];

UPDATE squad SET name=[$name], gold=[gold] WHERE id=[id];

/* Delete */
DELETE FROM squad WHERE id=[id];

/* Search */
SELECT id, name, gold FROM squad WHERE name=[search];


/**********************************************************
*************************Weapons***************************
**********************************************************/

/* ADD */
INSERT INTO weapon (name, type, quality, durability, damage)
VALUES ([name], [type], [quality], [durability], [damage])

/* Display Tables*/
SELECT id, name, type, quality, durability, damage FROM weapon;

/* Search */
SELECT id, name, type, quality, durability, damage FROM weapon WHERE name=[search];


/**********************************************************
***************************Armor***************************
**********************************************************/

/* ADD */
INSERT INTO armor (name, type, quality, durability, damage_reduction)
VALUES ([name], [type], [quality], [durability], [damage_reduction])

/* Display Tables*/
SELECT id, name, type, quality, durability, damage_reduction FROM armor;

/* Search */
SELECT id, name, type, quality, durability, damage_reduction FROM armor WHERE name=[search];


/**********************************************************
*************************Power-Ups*************************
**********************************************************/

/* ADD */
INSERT INTO power_up (name, type)
VALUES ([name], [type]);

/* Display Tables*/
SELECT id, name, type FROM power_up;

/* Search */
SELECT id, name, type FROM power_up WHERE name=[search];


/**********************************************************
*******************Fighter - Power-Ups*********************
**********************************************************/

/* ADD */
SELECT id, name FROM fighter;

SELECT id, name FROM power_up;

INSERT INTO fighter_power_up (fighter_id, power_up_id)
VALUES ((SELECT id FROM fighter WHERE id=[fighter_id]),
(SELECT id FROM power_up WHERE id=[power_up_id]));


/* Display Tables*/
SELECT id, fighter_id, power_up_id FROM fighter_power_up;

/* Update */
SELECT fighter_id, power_up_id FROM fighter_power_up WHERE id=[id];

UPDATE fighter_power_up SET fighter_id=(SELECT id FROM fighter WHERE id=[fighter]), 
power_up_id=(SELECT id FROM power_up WHERE id=[power_up])
WHERE id=[id];

/* Delete */
DELETE FROM fighter_power_up WHERE id=[id];

