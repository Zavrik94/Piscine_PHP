SELECT datediff(max(`date`), min(`date`)) AS `uptime`
FROM db_azavrazh.member_history;