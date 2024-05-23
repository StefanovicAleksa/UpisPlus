DROP VIEW IF EXISTS view_lista_upisa;
CREATE VIEW view_lista_upisa AS
SELECT 
    u.JMBG,
    u.ImeIPrezime AS `Ime I Prezime`,
    p.Ime AS Pol,
    g.Ime AS Generacija,
    s.Ime AS Smer,
    o.Oznaka AS Odeljenje,
    up.Godina AS `Godina Upisa`,
    ur.Ime AS `Upisni Rok`,
    f.Ime AS `Upisani Fakultet`,
    sf.Ime AS `Smer Fakulteta`
FROM
    ucenici u
JOIN
    polovi p ON u.ID_pola = p.ID_pola
JOIN
    odeljenja o ON u.ID_odeljenja = o.ID_odeljenja
JOIN
    generacije g ON o.ID_generacije = g.ID_generacije
JOIN
    smerovi s ON o.ID_smera = s.ID_smera
JOIN
    upisi up ON u.ID_ucenika = up.ID_ucenika
JOIN
    upisniRokovi ur ON up.ID_upisnogRoka = ur.ID_upisnogRoka
JOIN
    smeroviFakulteta sf ON up.ID_smeraFakulteta = sf.ID_smeraFakulteta
JOIN
    fakulteti f ON sf.ID_fakulteta = f.ID_fakulteta;
    
DROP VIEW IF EXISTS view_lista_upisa_po_fakultetu;
CREATE VIEW view_lista_upisa_po_fakultetu AS
SELECT
    f.Id_Fakulteta AS `ID Fakulteta`,
    f.Ime AS Fakultet,
    sf.Ime AS `Smer Fakulteta`,
    g.Ime AS `Generacija`,
    s.Ime AS `Smer`,
    COUNT(*) AS `Broj Upisa`
FROM
    upisi up
JOIN
    smeroviFakulteta sf ON up.ID_smeraFakulteta = sf.ID_smeraFakulteta
JOIN
    fakulteti f ON sf.ID_fakulteta = f.ID_fakulteta
JOIN
    ucenici u ON up.ID_ucenika = u.ID_ucenika
JOIN
    odeljenja o ON u.ID_odeljenja = o.ID_odeljenja
JOIN
	generacije g ON o.ID_generacije = g.ID_generacije
JOIN
    smerovi s ON o.ID_smera = s.ID_smera
GROUP BY
    f.Ime, sf.Ime, g.Ime, s.Ime, o.Oznaka;

CREATE VIEW view_imena_odeljenja AS
SELECT
    o.ID_odeljenja,
    CONCAT(g.Ime, ' ', o.Oznaka) AS `Ime Odeljenja`
FROM
    odeljenja o
JOIN
    generacije g ON o.ID_generacije = g.ID_generacije;
