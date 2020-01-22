-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 22, 2020 at 12:49 AM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discography_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

DROP TABLE IF EXISTS `artists`;
CREATE TABLE IF NOT EXISTS `artists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(60) DEFAULT NULL,
  `lastName` varchar(60) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `firstName`, `lastName`, `birthday`) VALUES
(4, 'Marshal', 'Mathers', NULL),
(5, 'Lil', 'Pump', NULL),
(6, 'Lil', 'Peep', NULL),
(7, 'Adam', 'Levine', NULL),
(8, 'KUKU$', '', NULL),
(10, 'Travis', 'Scott', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `genreTitle` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genreTitle`) VALUES
(1, 'Trap'),
(2, 'Pop-Rock'),
(3, 'Rap'),
(4, 'Emo Rap'),
(5, 'ZG-Trap');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `pageID` int(11) NOT NULL AUTO_INCREMENT,
  `pageTitle` varchar(32) NOT NULL,
  `isRoot` tinyint(1) NOT NULL,
  `pageContent` text NOT NULL,
  PRIMARY KEY (`pageID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pageID`, `pageTitle`, `isRoot`, `pageContent`) VALUES
(1, 'Home', 0, '<p> Homepage Content </p>'),
(2, 'Songs', 1, '<p> Songs content page </p>'),
(3, 'Artists', 1, '<p> Artists content page </p>'),
(4, 'Genres', 1, '<p> Genres content page </p>');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

DROP TABLE IF EXISTS `songs`;
CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `songTitle` varchar(32) DEFAULT NULL,
  `songLyrics` text,
  `aid` int(11) NOT NULL,
  `released` date DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `genre` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `songTitle`, `songLyrics`, `aid`, `released`, `length`, `genre`) VALUES
(1, 'Gucci Gang', 'Gucci Gang, ooh, yeah, Lil Pump, yeah, Gucci Gang, ooh Gucci gang, Gucci gang, Gucci gang, Gucci gang Gucci gang, Gucci gang, Gucci gang (Gucci gang!) Spend ten racks on a new chain My bitch love do cocaine, ooh I fuck a bitch, I forgot her name I can\'t buy a bitch no wedding ring Rather go and buy Balmains Gucci gang, Gucci gang, Gucci gang (Gucci gang!) Gucci gang, Gucci gang, Gucci gang, Gucci gang Gucci gang, Gucci gang, Gucci gang (Gucci gang!) Spend ten racks on a new chain My bitch love do cocaine, ooh I fuck a bitch, I forgot her name, yeah I can\'t buy no bitch no wedding ring Rather go and buy Balmains, aye Gucci gang, Gucci gang, Gucci gang My lean cost more than your rent, ooh Your mama still live in a tent, yeah Still slanging dope in the jets, huh Me and my grandma take meds, ooh None of this shit be new to me Fucking my teacher, call it tutory Bought some red bottoms, cost hella Gs Fuck your airline, fuck your company Bitch, your breath smell like some cigarettes I\'d rather fuck a bitch from the', 5, '2017-03-23', 2, 1),
(2, 'Whiskey', 'Leaves are fallin\', it\'s September The night came in and made her shiver I told her she could have my jacket Wrapped it tight around her shoulders And I was so young \'til she kissed me Like a whiskey, like a whiskey I never knew that love was blind \'Til I was hers, but she was never mine Yeah, I was reckless But I let it burn, I let it burn, yeah The feeling, it was bittersweet Realizing I was into deep She was a lesson I had to learn, I had to learn, yeah I used to try to forget her But now I smile when I remember Leaves are fallin\', it\'s September The night came in and made her shiver I told her she could have my jacket Wrapped it tight around her shoulders And I was so young \'til she kissed me Like a whiskey, like a whiskey, whoa Would\'ve left this world behind Just to wake up by your side Every mornin\' I Would\'ve sold my soul for a little more time mmm Would\'ve waited a thousand nights If she never said goodbye I admit that I Would\'ve sold my soul for a little more time I used to try to forget her But now', 7, '2017-07-23', 3, 2),
(3, 'The way I am', 'Man, whatever Dre just let it run Ayo, turn the beat up a little bit Ayo, this song is for anyone Fuck it, just shut up and listen, ayo I sit back with this pack of Zig-Zag\'s and this bag Of this weed, it gives me the shit needed to be The most meanest MC on this—on this Earth And since birth I\'ve been cursed with this curse to just curse And just blurt this berserk and bizarre shit that works And it sells and it helps in itself to relieve all this tension Dispensing these sentences, getting this stress That\'s been eating me recently off of this chest And I rest again peacefully But at least have the decency in you To leave me alone, when you freaks see me out In the streets when I\'m eating or feeding my daughter To not come and speak to me, I don\'t know you And no, I don\'t owe you a mothafuckin\' thing I\'m not Mr. N\'Sync, I\'m not what your friends think I\'m not Mr. Friendly, I can be a prick if you tempt me My tank is on empty, no patience is in me And if you offend me, I\'m lifting you ten feet in the air I don\'t care who was there and who saw me just jaw you Go call you a lawyer, file you a lawsuit I\'ll smile in the courtroom and buy you a wardrobe I\'m tired of all you, I don\'t mean to be mean But that\'s all I can be, it\'s just me And I am whatever you say I am If I wasn\'t, then why would I say I am? In the paper, the news, every day I am Radio won\'t even play my jam \'Cause I am whatever you say I am If I wasn\'t, then why would I say I am? In the paper, the news, every day I am I don\'t know, it\'s just the way I am Sometimes I just feel like my father I hate to be bothered with all of this nonsense It\'s constant, and, ', 4, '2000-02-04', 5, 3),
(4, 'Awful Things', 'Bother me, tell me awful things You know I love it when you do that Helps me get through this without you Bother me, tell me awful things You know I love it when you do that Helps me get through this without you Bother me, tell me awful things You know I love it when you move that on me Love it when you do that on me You like attention, I find it obvious She makes it obvious for me She feels the tension It\'s just the two of us, it\'s just the two of us tonight Burn me down \'til I\'m nothin\' but memories I get it, girl (I get it, girl) I get it, girl Burn me down \'til I\'m nothin\' but memories I get it, girl (I get it, girl) I\'m not the one Bother me, tell me awful things You know I love it when you do that Helps me get through this without you Bother me, tell me awful things You know I love it when you move that on me Love it when you do that on me Don\'t you turn your back on me Let your teardrops fall on me Speeding away, the city in the rear view Heart racing whenever I\'m near you Goth Boi jumpin\' on stage Car', 6, '2016-09-30', 3, 4),
(5, 'Medalje', 'Zlato oko vrata, al nisu medalje Drzim rekord u stafeti s 4 baklje Trcim ko Usain Bolt kad me svinje traze Puppy-i su nas htjeli srusit kod garaze Opet sam se udimio ko terme Catez Ako si sa Vrbika, Snjevke, znas me, znam te Jer zagrebacke ulice nas kmico pamte U glavi mi je party, jebes tvoj after  [Verse 1]: Over auragia sve nas pere munchies A svena nema sa delicijama vec satima Probali smo mnogo vrsta Indica i Sativa Flexam in da club, pijan svima rundu platim 33 ape escape jer majmuni su vani Rade pije powerade da bude jos jaci Na nisanu Snajpera je nazi Kada te nacilja morati ces ti pasti (bang) 12.7x99 .50 CAL Ora et labora, molim boga, radim trap Iz grada di je svet 1986 Roden 92 goca ti je 94 Do smrti repam 33, od rođenja 36 Sjebem te u glavu kao jako lose vjesti Sve se promjenilo zbog Mandela efekta Neamo o cemu pricat, ak ne pricas ceski  [Hook]: Zlato oko vrata, al nisu medalje Drzim rekord u stafeti s 4 baklje Trcim ko Usain Bolt kad me svinje traze Puppy-i su nas htjeli srusit kod garaze Opet sa', 8, '2018-04-03', 3, 5),
(6, 'Highest in the Room', 'I got room In my fumes (yeah) She fill my mind up with ideas I\'m the highest in the room (it\'s lit) Hope I make it outta here (let\'s go) She saw my eyes, she know I\'m gone (ah) I see some things that you might fear I\'m doing a show, I\'ll be back soon (soon) That ain\'t what she wanna hear (nah) Now I got her in my room (ah) Legs wrapped around my beard Got the fastest car, it zoom (skrrt) Hope we make it outta here (ah) When I\'m with you, I feel alive You say you love me, don\'t you lie (yeah) Won\'t cross my heart, don\'t wanna die Keep the pistol on my side (yeah) Case it\'s fumes (smoke) She fill my mind up with ideas (straight up) I\'m the highest in the room (it\'s lit) Hope I make it outta here (let\'s go, yeah) We ain\'t stressin\' \'bout the loot (yeah) My block made of queseria This not the Molly, this the boot Ain\'t no comin\' back from here Live the life of La Familia It\'s so much gang that I can\'t see ya (yeah) Turn it up \'til they can\'t hear (we can\'t) Runnin\', runnin\' \'round for the thrill Yeah, dawg, dawg, \'round my real (gang) Raw, raw, I been pourin\' to the real (drank) Nah, nah, nah, they not back of the VIP (in the VIP) Gorgeous, baby, keep me hard as steel Ah, this my life, I did not choose Uh, been on this since we was kids We gon\' stay on top and break the rules Uh, I fill my mind up with ideas Case it\'s fumes She fill my mind up with ideas (straight up) I\'m the highest in the room (I\'m the highest, it\'s lit) Hope I make it outta here I\'m the highest, you might got the Midas Touch, what the vibe is? And my bitch the vibiest, yeah Everyone excited, everything I do is exciting, yeah now Play with the giants, little bit too extravagant, yeah now Night, everyone feel my vibe, yeah In the broad day, everyone hypnotizing, yeah I\'m okay and I take the cake, yeah', 10, '2019-10-10', 3, 1),
(7, 'SICKO MODE', 'Astro, yeah Sun is down, freezin\' cold That\'s how we already know winter\'s here My dawg would prolly do it for a Louis belt That\'s just all he know, he don\'t know nothin\' else I tried to show \'em, yeah I tried to show \'em, yeah, yeah Yeah, yeah, yeah Gone on you with the pick and roll Young LaFlame, he in sicko mode Woo, made this here with all the ice on in the booth At the gate outside, when they pull up, they get me loose Yeah, Jump Out boys, that\'s Nike boys, hoppin\' out coupes This shit way too big, when we pull up give me the loot (Gimme the loot!) Was off the Remy, had a Papoose Had to hit my old town to duck the news Two-four hour lockdown, we made no moves Now it\'s 4AM and I\'m back up poppin\' with the crew I just landed in, Chase B mixes pop like Jamba Juice Different colored chains, think my jeweler really sellin\' fruits And they chokin\', man, know the crackers wish it was a noose Some-some-some, someone said To win the retreat, we all in too deep P-p-playin\' for keeps, don\'t play us for weak (someone said) To win the retreat, we all in too deep P-p-playin\' for keeps, don\'t play us for weak (yeah) This shit way too formal, y\'all know I don\'t follow suit Stacey Dash, most of these girls ain\'t got a clue All of these hoes I made off records I produced I might take all my exes and put \'em all in a group Hit my esés, I need the bootch \'Bout to turn this function to Bonnaroo Told her, \"Hop in, you comin\' too\" In the 305, bitches treat me like I\'m Uncle Luke (Don\'t stop, pop that pussy!) Had to slop the top off, it\'s just a roof (uh) She said, \"Where we goin\'?\" I said, \"The moon\" We ain\'t even make it to the room She thought it was the ocean, it\'s just the pool Now I got her open, it\'s just the Goose Who put this shit together? I\'m the glue (someone said) Shorty FaceTimed me out the blue Someone said (playin\' for keeps) Someone said, motherfuck what someone said (Don\'t play us for weak) Yeah Astro Yeah, yeah Tay Keith, fuck these niggas up (Ay, ay) She\'s in love with who I am Back in high school, I used to bus it to the dance (yeah) Now I hit the FBO with duffles in my hands I did half a Xan, thirteen hours \'til I land Had me out like a light, ayy, yeah Like a light, ayy, yeah Like a light, ayy Slept through the flight, ayy Knocked for the night, ayy, 767, man This shit got double bedroom, man I still got scores to settle, man I crept down the block (down the block), made a right (yeah, right) Cut the lights (yeah, what?), paid the price (yeah) Niggas think it\'s sweet (nah, nah), it\'s on sight (yeah, what?) Nothin\' nice (yeah), baguettes in my ice (aww, man) Jesus Christ (yeah), checks over stripes (yeah) That\'s what I like (yeah), that\'s what we like (yeah) Lost my respect, you not a threat When I shoot my shot, that shit wetty like I\'m Sheck (bitch!) See the shots that I took (ayy), wet like I\'m Book (ayy) Wet like I\'m Lizzie, I be spinnin\' Valley Circle blocks \'til I\'m dizzy (yeah, what?) Like where is he? (Yeah, what?) No one seen him (yeah, yeah) I\'m tryna clean \'em (yeah) She\'s in love with who I am Back in high school, I used to bus it to the dance Now I hit the FBO with duffles in my hand (woo!) I did half a Xan, thirteen hours \'til I land Had me out like a light, like a light Like a light, like a light Like a light (yeah), like a light Like a light Yeah, passed the dawgs a celly Sendin\' texts, ain\'t sendin\' kites, yeah He said, \"Keep that on lock\" I said, \"You know this shit, it\'s stife\", yeah It\'s absolute (yeah), I\'m back reboot (it\'s lit!) LaFerrari to Jamba Juice, yeah (skrrt, skrrt) We back on the road, they jumpin\' off, no parachute, yeah Shawty in the back She said she workin\' on her glutes, yeah (oh my God) Ain\'t by the book, yeah This how it look, yeah \'Bout a check, yeah Just check the foots, yeah Pass this to my daughter, I\'ma show her what it took (yeah) Baby mama cover Forbes, got these other bitches shook, yeah Ye-ah', 10, '2018-03-04', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
