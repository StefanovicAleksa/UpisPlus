DELIMITER //

CREATE PROCEDURE `BrojUpisaPoGodini`()
BEGIN
    SELECT Godina, COUNT(*) AS `Broj Upisa`
    FROM upisi
    GROUP BY Godina;
END//

CREATE PROCEDURE `RaspodelaUpisaPoPolu`()
BEGIN
    SELECT p.Ime AS Pol, COUNT(u.ID_upisa) AS Broj_upisa
    FROM polovi p
    INNER JOIN ucenici uc ON p.ID_pola = uc.ID_pola
    INNER JOIN upisi u ON uc.ID_ucenika = u.ID_ucenika
    GROUP BY p.Ime;
END//

CREATE PROCEDURE `BrojUpisaPoUpisnomRoku`()
BEGIN
    SELECT ur.Ime AS Naziv_upisnog_roka, COUNT(u.ID_upisa) AS Broj_upisa
    FROM upisniRokovi ur
    INNER JOIN upisi u ON ur.ID_upisnogRoka = u.ID_upisnogRoka
    GROUP BY ur.Ime;
END//

CREATE PROCEDURE `PopularnostSmerova`()
BEGIN
    SELECT f.Ime AS Fakultet, sf.Ime AS Naziv_smera, COUNT(u.ID_upisa) AS Broj_upisa
    FROM smeroviFakulteta sf
    INNER JOIN upisi u ON sf.ID_smeraFakulteta = u.ID_smeraFakulteta
    INNER JOIN fakulteti f ON sf.ID_fakulteta = f.ID_fakulteta
    GROUP BY f.Ime, sf.Ime;
END//

CREATE PROCEDURE `ProsecanBrojUpisanihStudenataPoGodiniZaSvakiFakultet`()
BEGIN
    SELECT f.Ime AS Naziv_fakulteta, AVG(broj_upisa) AS Prosecan_broj_studenata
    FROM fakulteti f
    LEFT JOIN (
        SELECT sf.ID_fakulteta, u.Godina, COUNT(*) AS broj_upisa
        FROM smeroviFakulteta sf
        LEFT JOIN upisi u ON sf.ID_smeraFakulteta = u.ID_smeraFakulteta
        GROUP BY sf.ID_fakulteta, u.Godina
    ) AS upisi_po_godini ON f.ID_fakulteta = upisi_po_godini.ID_fakulteta
    GROUP BY f.Ime;
END//

CREATE PROCEDURE `NajpopularnijiSmeroviNaSvakomFakultetu`()
BEGIN
    SELECT f.Ime AS Naziv_fakulteta, sf.Ime AS Naziv_smera, COUNT(u.ID_upisa) AS Broj_upisa
    FROM fakulteti f
    INNER JOIN smeroviFakulteta sf ON f.ID_fakulteta = sf.ID_fakulteta
    INNER JOIN upisi u ON sf.ID_smeraFakulteta = u.ID_smeraFakulteta
    GROUP BY f.Ime, sf.Ime
    ORDER BY f.Ime, Broj_upisa DESC;
END//

CREATE PROCEDURE `FakultetiSaNajvecimBrojemUpisanihStudenata`()
BEGIN
    SELECT f.Ime AS Naziv_fakulteta, COUNT(u.ID_upisa) AS Broj_studenata
    FROM fakulteti f
    LEFT JOIN smeroviFakulteta sf ON f.ID_fakulteta = sf.ID_fakulteta
    LEFT JOIN upisi u ON sf.ID_smeraFakulteta = u.ID_smeraFakulteta
    GROUP BY f.Ime
    ORDER BY Broj_studenata DESC;
END//

CREATE PROCEDURE `BrojUpisanihStudenataNaSvakomFakultetuPoPolu`()
BEGIN
    SELECT f.Ime AS Naziv_fakulteta, p.Ime AS Pol, COUNT(u.ID_upisa) AS Broj_studenata
    FROM fakulteti f
    INNER JOIN smeroviFakulteta sf ON f.ID_fakulteta = sf.ID_fakulteta
    INNER JOIN upisi u ON sf.ID_smeraFakulteta = u.ID_smeraFakulteta
    INNER JOIN ucenici uc ON u.ID_ucenika = uc.ID_ucenika
    INNER JOIN polovi p ON uc.ID_pola = p.ID_pola
    GROUP BY f.Ime, p.Ime;
END//

DELIMITER ;
