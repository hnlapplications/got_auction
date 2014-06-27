--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `gotauction_address` (
  `id` int(11) NOT NULL,
  `street_number` int(11) NOT NULL,
  `street_name` varchar(100) NOT NULL,
  `suburb` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `post_code` int(11) NOT NULL,
  `gps_x` float NOT NULL,
  `gps_y` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE IF NOT EXISTS `gotauction_auction` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `auction_id` int(11) NOT NULL,
  `auction_type` int(11) NOT NULL,
  `auctioneer` varchar(100) NOT NULL,
  `auction_category` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `address` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `viewing` int(1) NOT NULL DEFAULT '0',
  `viewing_date` date NOT NULL,
  `viewing_time` time NOT NULL,
  `terms` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auctioneer`
--

CREATE TABLE IF NOT EXISTS `gotauction_auctioneer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auction_category`
--

CREATE TABLE IF NOT EXISTS `gotauction_auction_category` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auction_type`
--

CREATE TABLE IF NOT EXISTS `gotauction_auction_type` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lot`
--

CREATE TABLE IF NOT EXISTS `lot` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `auction_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `lot_type` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `vat` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lot_type`
--

CREATE TABLE IF NOT EXISTS `gotauction_lot_type` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `gotauction_settings` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `director` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `address` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

