SELECT upper(`last_name`) AS `NAME`,
       `first_name`,
       db_azavrazh.subscription.price
FROM db_azavrazh.user_card
INNER JOIN db_azavrazh.member
    ON db_azavrazh.member.id_user_card = db_azavrazh.user_card.id_user
INNER JOIN db_azavrazh.subscription
    ON db_azavrazh.subscription.id_sub = db_azavrazh.member.id_sub
WHERE db_azavrazh.subscription.price > 42
ORDER BY  db_azavrazh.user_card.last_name ASC, db_azavrazh.user_card.first_name ASC;