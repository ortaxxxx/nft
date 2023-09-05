/* Add Columns email_verify,phone_verify, kyc_verify in dbt_setting */
ALTER TABLE `dbt_setting` 
    ADD `email_verify` TINYINT NULL DEFAULT 0 COMMENT '0_for_not, 1_for_yes',
    ADD `phone_verify` TINYINT NULL DEFAULT  0 COMMENT '0_for_not, 1_for_yes',
    ADD `kyc_verify` TINYINT NULL DEFAULT 0 COMMENT '0_for_not, 1_for_yes';
    /* Add Columns email_verify,phone_verify, kyc_verify in dbt_user */
ALTER TABLE `dbt_user` 
    ADD `email_verify` TINYINT NULL DEFAULT 0 COMMENT '0_not_verify,1_for_processing, 2_for_verify',
    ADD `phone_verify` TINYINT NULL DEFAULT 0 COMMENT '0_not_verify,1_for_processing, 2_for_verify',
    ADD `kyc_verify` TINYINT NULL DEFAULT 0 COMMENT '0_not_verify,1_for_processing, 2_for_verify';
    /* Add  dbt_user_verify_doc Table */
CREATE TABLE `dbt_user_verify_doc`(
    `id` INT NOT NULL,
    `user_id` VARCHAR(100) NOT NULL,
    `verify_type` VARCHAR(100) NOT NULL,
    `first_name` VARCHAR(100) NOT NULL,
    `last_name` VARCHAR(100) NOT NULL,
    `gender` TINYINT(1) NOT NULL,
    `id_number` VARCHAR(300) NOT NULL,
    `document1` VARCHAR(300) NOT NULL,
    `document2` VARCHAR(300) NOT NULL,
    `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;
 ALTER TABLE `dbt_user_verify_doc` ADD PRIMARY KEY (`id`);
 ALTER TABLE `dbt_user_verify_doc` MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;  


/* Add Columns sid,token, number in dbt_email_sms_gateway */
ALTER TABLE `dbt_email_sms_gateway` 
    ADD `sid` VARCHAR(100) DEFAULT NULL,
    ADD `token` VARCHAR(100) DEFAULT NULL,
    ADD `number` VARCHAR(100) DEFAULT NULL;
    /* INSERT Value in dbt_email_sms_gateway */
INSERT INTO `dbt_email_sms_gateway`(
    `gatewayname`,
    `title`,
    `user`,
    `password`,
    `api`,
    `sid`,
    `token`,
    `number`
)
VALUES(
    'twilio',
    'NFT BOX',
    '+14073262789',
    'TCtz6dx6s3G4nVQ1',
    '633b7084',
    'ACe3e73f0bfd115ccaf47a359443b795eb',
    'b90e84d51b78a45ca64af0e54108a3fe',
    '+14073262789'
);
/* INSERT Value in dbt_sms_email_template */
INSERT INTO `dbt_sms_email_template`(
    `sms_or_email`,
    `template_name`,
    `subject_en`,
    `subject_fr`,
    `template_en`,
    `template_fr`
)
VALUES(
    'email',
    'profile_verification',
    'Verify phone number',
    'Vérifier le numéro de téléphone',
    'Welcome to the NFT BOX.  You are about to verify your phone number. Your Verification Code is %varify_code%',
    'Welcome to the NFT BOX.  You are about to verify your phone number. Your Verification Code is %varify_code%'
),(
    'sms',
    'profile_verification',
    'Verify phone number',
    'Vérifier le numéro de téléphone',
    'Welcome to the NFT BOX.  You are about to verify your phone number. Your Verification Code is %varify_code%',
    'Welcome to the NFT BOX.  You are about to verify your phone number. Your Verification Code is %varify_code%'
);

 
 
CREATE TABLE `dbt_verify_tbl` (
  `id` int NOT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `session_id` varchar(32) DEFAULT NULL,
  `verify_code` varchar(20) DEFAULT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `data` text,
  `verify_type` varchar(30) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
ALTER TABLE `dbt_verify_tbl` ADD PRIMARY KEY (`id`);
ALTER TABLE `dbt_verify_tbl` MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32; 