SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `miechv_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--


CREATE TABLE IF NOT EXISTS `parent` (
 `parent_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
`enrollment_date` date NOT NULL, 
`last_name` varchar(20) NOT NULL,
 `first_name` varchar(20) NOT NULL,
 `middle_name` varchar(20) NOT NULL,
`dob` date NOT NULL,
 `age` smallint(3) unsigned NOT NULL,
`sex`  enum('Male','Female') NOT NULL,
`marital_status` enum('Divorced','Married','Single', 'Never Married','Widowed','Unknown') NOT NULL,
`race` enum('American Indian / Alaska Native ','Asian','Black / African American','Hawaiin Native / Other Pacific Islander','White','Enrollee Refused','Unknown','Other') NOT NULL,
`ethnicity` enum('Hispanic / Latino','Non Hispanic / Latino','Enrollee Refused','Unknown') NOT NULL,
`street_address` varchar(50) NOT NULL,
`city` varchar(20) NOT NULL,
`zip_code` smallint(5)unsigned NOT NULL,
`social_security` varchar(11),
`home_phone` varchar(13),
`cell_phone` varchar(13),
`last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (`parent_id`))
ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Table structure for table `household_record`
--


CREATE TABLE IF NOT EXISTS `household_record` (
`record_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
`parent_id` smallint(5) unsigned NOT NULL, 
 `household_income` smallint(6) unsigned NOT NULL,
`adults_in_household` smallint(2) unsigned NOT NULL,
`employment_status` enum('Employed Full Time','Employed Part-Time','Not Employed','Unknown') NOT NULL,
`lost_job` enum('Yes','No') NOT NULL,
`tanf` enum('Yes','No') NOT NULL,
`food_stamps` enum('Yes','No') NOT NULL,
`arrests` enum('Yes','No') NOT NULL,
`quit smoking` enum('Yes','No','Unsure') NOT NULL,
`parent_stress` enum('Very Well','Somewhat Well','Not Very Well','Not Very Well At All','Unknown') NOT NULL,
`support_system` enum('Very Well','Somewhat Well','Not Very Well','Not Very Well At All','Unknown') NOT NULL,
`epsdt` enum('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
`needing_services` enum('Yes','No') NOT NULL,
`safe_sleeping` enum('Yes','No') NOT NULL,
`shaken_baby_syndrome` enum('Yes','No') NOT NULL,
`passenger_safety` enum('Yes','No') NOT NULL,
`poisonings` enum('Yes','No') NOT NULL,
`fire_safety` enum('Yes','No') NOT NULL,
`water_safety` enum('Yes','No') NOT NULL,
`playground_safety` enum('Yes','No') NOT NULL,
PRIMARY KEY (`record_id`)) 
ENGINE=MyISAM DEFAULT CHARSET=utf8;

