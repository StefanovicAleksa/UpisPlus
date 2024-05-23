DELIMITER //

CREATE TRIGGER triger_provera_imena_generacije
BEFORE INSERT ON generacije
FOR EACH ROW
BEGIN
    DECLARE is_valid BOOLEAN;

    SET is_valid = NEW.Ime REGEXP '^[0-9]{4}/[0-9]{4}$';

    IF NOT is_valid THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Nevažeća vrednost za kolonu Ime. Mora da se poklapa sa obrascem YYYY/YYYY.';
    END IF;
END//

DELIMITER ;

DELIMITER //

CREATE TRIGGER `set_default_year`
BEFORE INSERT ON `upisi`
FOR EACH ROW
BEGIN
    IF NEW.Godina = 0 THEN
        SET NEW.Godina = YEAR(CURDATE());
    END IF;
END//

DELIMITER ;

DELIMITER //

CREATE TRIGGER `provera_duzine_pred_unosom`
BEFORE INSERT ON `ucenici`
FOR EACH ROW
BEGIN
    IF CHAR_LENGTH(NEW.JMBG) != 13 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Nevalidan JMBG.';
    END IF;
END//

DELIMITER ;

DELIMITER //

CREATE TRIGGER check_godina_before_insert_update
BEFORE INSERT ON upisi
FOR EACH ROW
BEGIN
    IF NEW.Godina > YEAR(CURDATE()) THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Godina ne može biti veća od trenutne godine.';
    END IF;
END//

DELIMITER ;

DELIMITER //
CREATE TRIGGER trg_check_ImeIPrezime_before_insert
BEFORE INSERT ON `ucenici`
FOR EACH ROW
BEGIN
  DECLARE space_count INT;
  -- Brojimo broj razmaka u `ImeIPrezime`
  SET space_count = LENGTH(NEW.ImeIPrezime) - LENGTH(REPLACE(NEW.ImeIPrezime, ' ', ''));
  -- Ako broj razmaka nije tačno 1, to znači da nije uneto tačno dve reči
  IF space_count != 1 THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Polje ImeIPrezime mora sadržati tačno dve reči.';
  END IF;
END //