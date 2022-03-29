-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: paneldb
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teams` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Team_ID` varchar(255) NOT NULL,
  `Techie1` varchar(255) NOT NULL,
  `Techie2` varchar(255) NOT NULL,
  `Region` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Team_ID` (`Team_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,'ZMM-1','Techie 1','Techie 2','ZMM','$2y$10$peKWuC/5Dum2B/myp7Ocj.Y803xFlcXZr715nAuX7p8C5iRMnboGC'),(2,'ZMM-2','Joseph Gachora','Edward Njanja','ZMM','$2y$10$iONFs5TR9y.iKTMvHfyQHO7lJV3HXvaD8ZNzfnSa4gCEq58dE6Pkq'),(3,'ZMM-3','Solomon Ledama','Dennis Madoya','ZMM','$2y$10$ulAihwz9OtYqrMP8tGow0.48rwKHZjE.P97BCTOc8eZmw1i9p0hVq'),(4,'ZMM-4','Branton Masibo','Jackson Mbindyo','ZMM','$2y$10$5d.qCCK/WoMq1MpB2pNunOKq2VxMLiTnvhAGZDwTyfO.HDpQr8Aku'),(5,'ZMM-5','Moses Ngugi','Francis Kihia','ZMM','$2y$10$XJ6aDgCOhV1ye.3XX93uAODHrQ1vQRHXUhL1MfnCWuNjWL9DBZJ7a'),(6,'ZMM-7','Jared Swanya','David Okemwa','ZMM','$2y$10$bHlWUu1kevbg.D0TYzCDs.Tp/wMVL2mYah42DZyIOSLdeH5svtKBW'),(7,'R&M-1','Joseph Maina','Paul Omondi','R&M','$2y$10$fS9nulnrBKLJHARHEkRKEO2vsoZCE9okxzCXCc7MUIsHnE572JYIq'),(8,'R&M-5','Solomon Ledama','Dennis Madoya','R&M','$2y$10$2KUHDy5cTBiVK.sKtWmzLepwaB/n8lwrwgmqFE8bTfClVWf8HpuYK'),(9,'R&M-3','Dadius Charana','Kelvine Githaiga','R&M','$2y$10$h/pk6pfNUPftY/lXeDY/WeP2xIUdjL/YfR324zcP5xd0cv.7LeZvG'),(10,'R&M-4','David Mbao','Danmark Simon','R&M','$2y$10$LzwaYXVQgyN0xcJ7O6yve.6xgnAcoecPY1h9QrMR1hlK763toTCfa'),(11,'KWT-1','Kennedy Mwangi','Joseph Wambugu','KWT','$2y$10$48VHKd2VmdP8T2wZ0QUpQ.Suik8dyPGPhp2Lsdgxzg.yUWCYWILn6'),(12,'KWT-2','Peter Mugo','Duncan Oyugi','KWT','$2y$10$VyIP/BEpIK4Q1mKGjun.3.kUIUNe4AIxAc0xZE/6Iv1yj7C7fNsZu'),(13,'KWT-3','Jackson Wainaina','Jackson Maina','KWT','$2y$10$fmodyNA.OTRxLr8.vU6KGOFJznTh4E.xvkN5ODYdhFCAE9TSiHLUu'),(14,'KWT-4','Billy Ogolla','Samuel Kihara','KWT','$2y$10$EESFwfv4DVbsRflnVO5XcuMoPPqRHR5zeHC9Ot.dKf1QsHMk7BVXa'),(15,'KWT-5','Gidraph kambo Wagituh','Kamande Mburu','KWT','$2y$10$PplUUOnzF4j1bEClQQgWZeIewpZ2Uiug5RUkLRhkRWOPbPrluMrZ.'),(16,'KWT-6','Alex Kanjuki','Kelvin Munene','KWT','$2y$10$9EUN8./JwDVVe8iDkGTZMuZFxrejr3WCvP7iXyMmr8VR2fmZm/pW.'),(17,'KWT-7','Solomon Ledama','Dennis Madoya','KWT','$2y$10$dWytorQlrkhsDOB9XONV8.kTGbmkxTB7HxFspHkONlSvEWvPiqV2a'),(18,'G44-01','Hecton Musabi','Angelo Kimathi','G44','$2y$10$uY.tZ0EIyTZ5B19WvOrgVe5iAopdRNd7h.SVE2.nCelLVwB52JZhO'),(19,'G44-02','Simon Mbugua','Weldon Kirui','G44','$2y$10$dCnhqQkGPZn2kDqz5rP5Yeb8tbTQ/pyd/5iGrLGl1BuWx4yPGsuVS'),(20,'G44-03','Emmanuel Kabogo','Tyrus Oduori','G44','$2y$10$RR3pGEUOTAeMbG/C.9KxbOpym69srzfppW2fTQDhFmZ09oeb/sWB2'),(21,'G44-04','Geylord Shilaho','Pius Chesum','G44','$2y$10$hNrPVJErc1tWeSmBn6Q63e2X9XSwOVGlg3e7spqq.a1JoBAYHkyG.'),(22,'G44-05','Brandon Ochieng','Dominic Musau','G44','$2y$10$rvoV5x3g05od3xEwIw8PwOdNJTzdNAM53zwLL3Pb6/1psMwijIdHm'),(23,'G45N-1A','Martin Maina','Kelvin Njoroge','G45N','$2y$10$HE9eZzbbj7yM3hayVsQQrO5fKWn.Wz03UBVwzQcWS7LOL5Q26JDV2'),(24,'G45N-2A','Alext Kibe','Kelvin Munene','G45N','$2y$10$/NMWGIE3FEHaiHCexS8Laemk44UNMuerZmQiKrgqYAyH.IyftyoG.'),(25,'G45N-3A','Alex Kanjuki','Nathan Gichuhi','G45N','$2y$10$sD95dh02uhftpk5anKTkHeltE0xmtbBzKAlywrgN6NUuPN3UtQO2W'),(26,'G45N-4A','Solomon Ledama','Dennis Madoya','G45N','$2y$10$aR5Sxlzy/2A7rpH8T8Xn.Opd6DvB3kY.5OJhhkwdcJoy0en6NeIde'),(27,'G45N-5A','Anthony Wanjau','Mukuhi Karanja','G45N','$2y$10$Z.m8Yy9mXqT/sUQrLV4Hw.MX4MpwtEzkVdaLUaNzivva1fvnkThhq'),(28,'G45N-6A','Duncan Madaga','Kelvin Kingori','G45N','$2y$10$7SwrdmbpR7PYk.fZZ8n6h.I6QGo3lozof0CmAbtdUGj997ZXoE3Da'),(29,'G45N-7A','John Muhigo','Charles Thomas','G45N','$2y$10$15heWauhGdP7GEkdOnWNOulWDVRdwd/MlJtWSemY5WsHtSHqKN5NO'),(30,'G45S-1A','Martin Maina','Kelvin Njoroge','G45S','$2y$10$VqTN3cU5tn130/VDNlAql.mBpve9qzOZPxE3rlWSxbVZlUB/joDgG'),(31,'G45S-2A','Alext Kibe','Kelvin Munene','G45S','$2y$10$3.rIVROa3KK3QPkv5xjueuOGoFFfo72RtsdgCVn0qWi9j53LKqizW'),(32,'G45S-3A','Alex Kanjuki','Nathan Gichuhi','G45S','$2y$10$QtB/KqbpB5BIMreqeTNyOO5M4yg9rbBggfoo8/XLxH4rXaeSBd7wK'),(33,'G45S-4A','Solomon Ledama','Dennis Madoya','G45S','$2y$10$a0l8grUogYQNlD1haZJbK.LRNX8ZekvSs0Z9OpiM53IsxSmAB3zxy'),(34,'G45S-5A','Anthony Wanjau','Mukuhi Karanja','G45S','$2y$10$9yWouE8a7FJnsbyzR040O.FW3DEmz1xKaJwvA7bEyR9/8Le7U/vqG'),(35,'G45S-6A','Duncan Madaga','Joseph Kingori','G45S','$2y$10$iNFv93.NGbI.lMdTsiYx/OHQfbQG7XUdNocHS41BXWg9o9xpipLki'),(36,'G45S-7A','John Muhigo','Charles Thomas','G45S','$2y$10$6ndEeFYLJfni8SYY7FGDkO39PfdjIplmGKqrCXVhEy2g8UmC60872'),(37,'G44-06','Duncan Byron','Peter Mugo','G44','$2y$10$rPRaxtgwyORflCs1hVP/be/gTN3C8szmvHi6csBFdVWsWVMqlfqki'),(38,'G44-07','Gidraph kambo','Alex kambo','G44','$2y$10$rhAX2puFSEh2dIYwAY4JYuxENeQrKVdqWxJIywnsHA7nrXEXcrKeO'),(39,'KWT-1b','Joseph Wambugu','Moses	 odhiambo','KWT','$2y$10$09TXzltzc0Z57thNRFSDvugVgXDg098ZxefoCKkFOgUrupcrivzO2'),(40,'KWT-1A','Joseph Wambugu','Moses	 odhiambo','KWT','$2y$10$h09Gnoyvk3DnrbOqhWAVYeWD881Ped0HxGlCibHS1DtscTp2L71rW'),(41,'KWT-2A','Duncan Oyugi','Alex	Kamande Mburu','KWT','$2y$10$bk0aL10c0J8NcFbL3WQz5uBgICEJsVEHV7xQ0csShKSCrFYOMrMeq'),(42,'KWT-3A','Samuel Kihara','Francis	Muriithi','KWT','$2y$10$8kwmgBq4c5PRg0qw00ylIeUBVoU/cpSCFxm8TgxTYOvg/joBAi2OW'),(43,'KWT-4A','Kelvin Munene','Jackson Wainaina','KWT','$2y$10$ZWUiiSxpNlSKMbR4NoiPGOtSvcoYhY2LLBlHromqvqE7M.Ntfh5oi'),(44,'ZMM-8','dadius','kennedy','ZMM','$2y$10$dq15npwSS2OGLQ5XYgXzp.SfFyBLcTModL4nlBzXebpta3qvZrdJ2'),(45,'ZMM-9','brantone masibo','edward njanja','ZMM','$2y$10$B/xlFDsX4OUcMZ9AkVldH.u2ior5DESaoQjTZZkIy4wbBGmdOucy2'),(46,'G45N-1B','Charles Thomas','Kelvin Njoroge','G45N','$2y$10$l6.SEa8oSwygnK1WuNR/5.J45dGPgAAoiNudlmJm5BndpkCbJcObi'),(47,'G45N-2B','Nathan Gichuhi','Nicholas Nganga','G45N','$2y$10$sV5u.j.E6mqBs6EOapCB3OV4EFoVNFSkm0JoXFPIVQi1KAXy/VDPK'),(48,'G45N-5B','Mukuhi Karanja','Nicholas Nganga','G45N','$2y$10$.2rjuaM64A6zliv4m5GWOe7LKDND9cDMU7MWulYqQ9sPGNFY5EQKO'),(49,'G45N-2C','Nathan Gichuhi','Samuel Wambui','G45N','$2y$10$.0GwAFgYusiBkFXOyDOA/u.N8.hmzeITveZHtZoUcp1ykvh/dehfC'),(50,'G45N-7B','John Muhingo','Chege','G45N','$2y$10$Ou30uEUA84W98fTv3pci2uS.rlK7edxdQPKp1mcb2AMvxABA.3YKi'),(51,'G45N-6B','Madaga Dancun','Omondi Chris','G45N','$2y$10$lR7G2StpgkfZ9vF/OvGxtOLkKoyAMYpqJNhaoniLa1W8vM2lR2.se'),(52,'G45N-3B','Antony Wanjau','Kelvin Kingori','G45N','$2y$10$ZOfZtYhGeRUO9TqnZnfj/ep0wAKlX6Sc4rDctltD0a1hdxxIVLm0O'),(53,'G45S-5B','Mukuhi Karanja','Nicholas Nganga','G45S','$2y$10$89Xidw9FSa35YraZdzCJAezlTZxcXqQ0hLLi9yJ.Sgzqg6LWRlDKy'),(54,'G45S-2C','Nathan Gichuhi','Samuel Wambui','G45S','$2y$10$kh3hD8YA6JKcFmS9yetX9uEGXHSa9RR40/eHyPN1HS01.KvzfuiE.'),(55,'G45S-1B','Kelvin Njoroge','Charles Thomas','G45S','$2y$10$6P4IuNGUlQfYbHCxBtMy4uE/SFk3A26ytqDZWSNPP5j86imrFSv9a'),(56,'G45S-7B','John Muhingo','Chege','G45S','$2y$10$U5IKVTYzDwEkMnAoE30h4.27sdjG4nN3RkEYSnN323y9K1AWYCRKK'),(57,'G45S-6B','Madaga Dancun','Omondi Chris','G45S','$2y$10$UCePPWq2Dy1i1050YN5FKufQiREdTgL68OhvMWxMHszUdMsrsYtpy'),(58,'G45S-3B','Antony Wanjau','Kelvin Kingori','G45S','$2y$10$SMRICARZ6G.pUf0isCfph.mXZljFvnzGoGN8DGXc8upH8gBn8wyM2'),(59,'ZMM-10','joseph maina','alex kanjuki','ZMM','$2y$10$CVzEayKgYd3HrXsPwXbcPOf.5XDKF1DT17.uwlwhDXmWslrPDw6gy'),(60,'ZMM-11','Moses ngugi ','Nathan gichuhi','ZMM','$2y$10$jNyLS3cT7JPnpb3RQmr7vucQgxXth87OBIiBHDYT7Hw5XzV93RsW6'),(61,'G44-08','hecton musambi','gidraph kambo','G44','$2y$10$RQ4yNTHPtkPNsz5efsjt5uuiBjiaXeBQmYEKC57.xCw.SeHkHpNP2'),(62,'G44-09','pius chesum ','angelo kimathi','G44','$2y$10$mvg95z1lYUroxxXAfi7QjuUz8yOWwH4kpgv8ZkFYXd3PpvF2Cqu22'),(63,'G44-10','dominic musau','weldon kirai','G44','$2y$10$tJ4Eroci9tv66.8QB0UYGe9FoafbznJaitSRf46BA2Earf6kMl3lO'),(64,'G44-11','billy ogola','jackson macharia','G44','$2y$10$0ePnnuL1kGKum69o4D1dk.mMxQrrn5TNS0qZ.39ZlF/gSjEv2ngfC'),(65,'ZMM-20','moses ngugi','joseph wambugu','ZMM','$2y$10$4iWXLkCwDUB9KLlcHKpF.OjRpJikzoJZy9/fU1VyIEv5RWu9BE8by'),(66,'ZMM-21','francis nderitu','moses odhiambo','ZMM','$2y$10$vG6TLhaLBV9ga79PXLoMv.567VM2BCMa4p/bZn3d7NjnbL0TXAcZy'),(67,'ZMM-22','kelvin githaiga','danmark simon','ZMM','$2y$10$GfzAjfSfIkYxShiG.Z7wBe028X/tXUMhwPvkjUYdxv19QCsxpZluC'),(68,'G45N-3C','Antony Wanjau','Samuel Wambui','G45N','$2y$10$I.eqxmPw8/dl6rIYwnLrqenR1uW2JPFHXuHwuTLYpPRwRBZ/lHpNu'),(69,'G45S-','Antony Wanjau','Samuel Wambui','G45S','$2y$10$gFe9R6TbKvxILESYLqywF.Ho1Qm5dvgTlDNC3CBaHdCwmS.Zb70aO');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-18 10:51:27
