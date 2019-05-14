drop table if exists billing_tb;

CREATE TABLE `billing_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `billing_plan_id` int(11) NOT NULL,
  `license` varchar(256) NOT NULL,
  `amount_paid` varchar(256) NOT NULL,
  `number_of_days` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `used_at` datetime  DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `license` (`license`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

ALTER TABLE company_tb add COLUMN send_mail_on_expiry_attempts INT(11) DEFAULT 0;


CREATE TABLE `admin_users_tb` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `image` text  NULL DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `locked` tinyint(4) NOT NULL DEFAULT 0,
  `logged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
