update room_types_tb set used_as= '[""]' where used_as='None';
update room_types_tb set used_as= concat('["',used_as,'"]')  where used_as != 'None' and used_as NOT LIKE "[%";
