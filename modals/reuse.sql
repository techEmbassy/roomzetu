select `rt`.`company_id` AS `company_id`,`rt`.`property_id` AS `property_id`,`b`.`id` AS `booking_id`,ifnull(`b`.`booking_status`,'nd') AS `booking_status`,`b`.`agent_id` AS `agent_id`,`b`.`booking_source` AS `booking_source`,ifnull(`b`.`check_in_date`,'1970-01-01') AS `check_in_date`,ifnull(`b`.`check_out_date`,'1970-01-01') AS `check_out_date`,`rt`.`id` AS `room_type_id`,`rm`.`id` AS `room_id`,`rm`.`room_name` AS `room_name`,`rt`.`name` AS `room_type_name`,`rt`.`number_of_beds` AS `number_of_beds`,`rt`.`bed_size` AS `bed_size`,`rt`.`maximum_guests_adults` AS `maximum_guests_adults`,`rt`.`maximum_guests_children` AS `maximum_guests_children`,`rt`.`specifications` AS `specifications`,`rt`.`price_per_night` AS `price_per_night` from ((`reservations_db`.`room_tb` `rm` left join (`reservations_db`.`booking_tb` `b` join `reservations_db`.`booking_rooms_tb` `br` on((`br`.`booking_id` = `b`.`id`))) on((`rm`.`id` = `br`.`room_id`))) join `reservations_db`.`room_types_tb` `rt` on((`rm`.`room_type_id` = `rt`.`id`)))