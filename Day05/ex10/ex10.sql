SELECT `title` AS `Title`,
       `summary` AS `Summary`,
       `prod_year`
FROM db_azavrazh.film
INNER JOIN db_azavrazh.genre
    ON db_azavrazh.film.id_genre = db_azavrazh.genre.id_genre
WHERE db_azavrazh.genre.name = 'erotic'
ORDER BY  `prod_year` DESC;