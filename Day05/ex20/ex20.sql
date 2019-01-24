SELECT db_azavrazh.film.id_genre,
       db_azavrazh.genre.name AS `name_genre`,
       db_azavrazh.film.id_distrib,
       db_azavrazh.distrib.name AS `name_distrib`,
       `title` AS `title_film`
FROM db_azavrazh.film
LEFT JOIN db_azavrazh.genre
    ON db_azavrazh.genre.id_genre = db_azavrazh.film.id_genre
LEFT JOIN db_azavrazh.distrib
    ON db_azavrazh.distrib.id_distrib = db_azavrazh.film.id_distrib
WHERE db_azavrazh.film.id_genre
    BETWEEN 4
        AND 8;