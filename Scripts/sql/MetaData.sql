INSERT INTO `profile_login_data`(`ACCOUNT_ID`, `USER_NAME`, `USER_EMAIL`, `USER_PASS`, `USER_CREATE_DATE`) VALUES ('123456', 'Chandra', 'venigallanaani@gmail.com', 'password', '11-24-2017');

INSERT INTO `travian_servers`(`SRVRID`, `SRVRURL`, `SRVRVER`, `SRVRCNTRY`, `SRVRSTATUS`, `SRVRSRTDATE`) VALUES ('ts1us','http://ts1.travian.us','ts1','us','active','08-11-2017');
INSERT INTO `travian_servers`(`SRVRID`, `SRVRURL`, `SRVRVER`, `SRVRCNTRY`, `SRVRSTATUS`, `SRVRSRTDATE`) VALUES ('ts19us','http://ts19.travian.us','ts19','us','active','09-11-2017');
INSERT INTO `travian_servers`(`SRVRID`, `SRVRURL`, `SRVRVER`, `SRVRCNTRY`, `SRVRSTATUS`, `SRVRSRTDATE`) VALUES ('ts2uk','http://ts2.travian.uk','ts2','uk','active','10-11-2017');

INSERT INTO `player_server`(`ACCOUNT_ID`, `USER_NM`, `SERVER_ID`, `LDR_STS`, `DEF_STS`, `OFF_STS`, `ART_STS`, `STATUS_DT`) VALUES ('123456','IKR','ts1us',TRUE,TRUE,TRUE,TRUE,'11-24-2017');