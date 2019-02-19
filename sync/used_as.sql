update room_types_tb set used_as= '[""]' where used_as='None';
update room_types_tb set used_as= concat('["',used_as,'"]')  where used_as != 'None' and used_as NOT LIKE "[%";

ALTER table booking_tb add column prepared_by INT(11) NOT NULL default 0;
ALTER TABLE invoice_template_tb add COLUMN invoice_design  varchar(80) NOT NULL DEFAULT 'inv1';
