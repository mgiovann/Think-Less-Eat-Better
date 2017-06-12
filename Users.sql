
-- Server version: 5.5.55
-- PHP Version: 5.2.6-1+lenny16

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `username` varchar(10) NOT NULL,
  `password` varchar(40) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `activity` int(11) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `breastfeeding` int(11) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`username`, `password`, `firstName`, `lastName`, `email`, `weight`, `height`, `age`, `activity`, `sex`, `breastfeeding`) VALUES
('gsmith', 'f1c06bb400656f146da09feb13868adc', 'joe', 'smith', 'gsmith@gmail.com', 0, 0, 0, 0, '', 0),
('andy', 'f1c06bb400656f146da09feb13868adc', 'andy', 'dwyer', 'andy@gmail.com', 600, 80, 34, 0, '', 0),
('lk', 'f1c06bb400656f146da09feb13868adc', 'lk', 'lk', 'lk', 0, 0, 0, 0, '', 0),
('po', 'f1c06bb400656f146da09feb13868adc', 'po', 'po', 'po', 0, 0, 0, 0, '', 0),
('oi', 'f1c06bb400656f146da09feb13868adc', 'oi', 'oi', 'oi', 0, 0, 0, 0, '', 0),
('mikey', 'f1c06bb400656f146da09feb13868adc', 'mike', 'jones', 'mikey@gmail.com', 0, 0, 0, 0, '', 0),
('tadams', 'f1c06bb400656f146da09feb13868adc', 'ty', 'adams', 'tadams@gmail.com', 0, 0, 0, 0, '', 0),
('iop', '7f91e8a4b648b0125b15dc5a3b6466f9f4906d92', 'test', 'test', 'iop', 0, 0, 0, 0, '', 0),
('mars', '76d80224611fc919a5d54f0ff9fba446', 'harold', 'mars', 'mars@gmail.com', 700, 98, 78, 0, '', 0),
('bmay', '76d80224611fc919a5d54f0ff9fba446', 'billy', 'may', 'bmay@gmail.com', 700, 90, 90, 0, '0', 0),
('mgiov', '76d80224611fc919a5d54f0ff9fba446', 'Michael', 'Giov', 'mgiov@gmail.com', 400, 80, 32, 0, '0', 0),
('test', '76d80224611fc919a5d54f0ff9fba446', 'test', 'test', 'test@gmail.com', 9999, 80, 80, 0, '0', 0),
('harris', '76d80224611fc919a5d54f0ff9fba446', 'harris', 'ford', 'harris@gmail.com', 400, 72, 70, 0, '0', 0),
('alfred', '76d80224611fc919a5d54f0ff9fba446', 'alfred', 'hitch', 'alfred@gmail.com', 180, 79, 34, 0, '1', 1),
('james', '76d80224611fc919a5d54f0ff9fba446', 'james', 'jones', 'mj@gmail.com', 130, 0, 45, 0, '0', 0),
('mjoney', '006d2143154327a64d86a264aea225f3', 'mike', 'joney', 'mjoney@gmail.com', 0, 0, 0, 0, '', 0),
('testing', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', 'test@gmail.com', 0, 0, 0, 0, '', 0),
('jones', 'f1c06bb400656f146da09feb13868adc', 'james', 'jones', 'jones@gmail.com', 12, 12, 12, 0, '', 0),
('albert', 'f1c06bb400656f146da09feb13868adc', 'albert', 'hitch', 'albert@gmail.com', 900, 89, 50, 0, '', 0),
('henry', 'f1c06bb400656f146da09feb13868adc', 'henry', 'caville', 'henry@gmail.com', 0, 0, 0, 0, '', 0),
('testphil', '827ccb0eea8a706c4c34a16891f84e7b', 'test456', 'last456', 'bro@aol.com', 0, 0, 0, 0, '', 0),
('testjohn', 'e7d018df684573ebd594af1dde874254', 'John', 'Smith', 'j@smith.cm', 0, 0, 0, 0, '', 0),
('harry', 'f1c06bb400656f146da09feb13868adc', 'henry', 'adams', 'harry@gmail.com', 900, 78, 34, 0, '', 0),
('testjoe', 'cc03e747a6afbbcbf8be7668acfebee5', 'test joe', 'joe', 'joe@smith.com', 180, 72, 30, 0, '', 0),
('smith', '098f6bcd4621d373cade4e832627b4f6', 'testbarb', 'barb', 'test@smith.com', 140, 60, 45, 0, '', 0),
('tested', '098f6bcd4621d373cade4e832627b4f6', 'ed', 'test', 'bro@aol.com', 140, 60, 45, 0, '', 0),
('testsue', '098f6bcd4621d373cade4e832627b4f6', 'sue', 'smith', 'test@aol.com', 140, 70, 35, 0, '', 0),
('qwe', '76d80224611fc919a5d54f0ff9fba446', 'qwe', 'qwe', 'qwe@gmail.com', 12, 12, 12, 0, '', 0),
('testbob', '098f6bcd4621d373cade4e832627b4f6', 'bob', 'test', 'joe@aol.com', 180, 72, 40, 0, '', 0),
('testbeth', '098f6bcd4621d373cade4e832627b4f6', 'beth', 'smith', 'beth@aol.com', 125, 60, 28, 0, '', 0),
('mnpo', 'f1c06bb400656f146da09feb13868adc', 'mn', 'mn', 'mnpo@gmail.com', 0, 0, 0, 0, '', 0);
