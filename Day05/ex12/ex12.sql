SELECT `last_name`,
       `first_name`
FROM db_azavrazh.user_card
WHERE db_azavrazh.user_card.last_name LIKE '%-%'
      OR db_azavrazh.user_card.first_name LIKE '%-%'
ORDER BY  db_azavrazh.user_card.last_name ASC, db_azavrazh.user_card.first_name ASC;