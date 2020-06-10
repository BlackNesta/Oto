-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2020 at 02:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comenzi`
--

CREATE TABLE `comenzi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `data` date NOT NULL,
  `total` float NOT NULL,
  `status` varchar(15) NOT NULL,
  `plata` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comenzi`
--

INSERT INTO `comenzi` (`id`, `id_user`, `data`, `total`, `status`, `plata`) VALUES
(1, 3, '2020-05-01', 100, 'Livrat', 'card'),
(2, 3, '2020-05-07', 200, 'Livrat', 'cash'),
(3, 3, '2020-06-10', 629.97, 'procesare', 'card'),
(4, 0, '2020-06-10', 222.98, 'procesare', 'cash'),
(5, 0, '2020-06-10', 222.98, 'procesare', 'card'),
(6, 0, '2020-06-10', 202.98, 'procesare', 'card'),
(7, 0, '2020-06-10', 222.98, 'procesare', 'card'),
(8, 0, '2020-06-10', 222.98, 'procesare', 'cash'),
(9, 0, '2020-06-10', 299.98, 'procesare', 'card'),
(10, 0, '2020-06-10', 275.97, 'procesare', 'card');

-- --------------------------------------------------------

--
-- Table structure for table `imagini_produs`
--

CREATE TABLE `imagini_produs` (
  `id` int(11) NOT NULL,
  `id_produs` int(11) NOT NULL,
  `img1` varchar(15) NOT NULL,
  `img2` varchar(15) DEFAULT NULL,
  `img3` varchar(15) DEFAULT NULL,
  `img4` varchar(15) DEFAULT NULL,
  `img5` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imagini_produs`
--

INSERT INTO `imagini_produs` (`id`, `id_produs`, `img1`, `img2`, `img3`, `img4`, `img5`) VALUES
(1, 1, 'toy1img1.png', 'toy1img2.png', 'toy1img3.png', 'toy1img4.png', 'toy1img5.png'),
(2, 2, 'toy2img1.png', 'toy2img2.png', 'toy2img1.png\r\n', NULL, NULL),
(3, 3, 'toy3img1.png', NULL, NULL, NULL, NULL),
(4, 4, 'toy4img1.png', 'toy4img2.png', 'toy4img3.png', NULL, NULL),
(5, 5, 'toy5img1.png', 'toy5img2.png', 'toy5img3.png', 'toy5img4.png', NULL),
(6, 6, 'toy6img1.png', 'toy6img2.png', 'toy6img3.png', 'toy6img4.png', 'toy6img5.png'),
(7, 7, 'toy7img1.png', 'toy7img2.png', 'toy7img3.png', 'toy7img4.png', 'toy7img5.png'),
(8, 8, 'toy8img1.png', 'toy8img2.png', 'toy8img3.png', 'toy8img4.png', 'toy8img5.png'),
(9, 9, 'toy9img1.png', 'toy9img2.png', 'toy9img3.png', 'toy9img4.png', NULL),
(10, 10, 'toy10img1.png', 'toy10img2.png', 'toy10img3.png', 'toy10img4.png', 'toy10img5.png'),
(11, 11, 'toy11img1.png', 'toy11img2.png', 'toy11img3.png', 'toy11img4.png', NULL),
(12, 12, 'toy12img1.png', NULL, NULL, NULL, NULL),
(13, 13, 'toy13img1.png', NULL, NULL, NULL, NULL),
(14, 14, 'toy14img1.png', NULL, NULL, NULL, NULL),
(15, 15, 'toy15img1.png', 'toy15img2.png', 'toy15img3.png', 'toy15img4.png', NULL),
(16, 16, 'toy16img1.png', 'toy16img2.png', 'toy16img3.png', NULL, NULL),
(17, 17, 'toy17img1.png', NULL, NULL, NULL, NULL),
(18, 18, 'toy18img1.png', NULL, NULL, NULL, NULL),
(19, 19, 'toy19img1.png', 'toy19img2.png', 'toy19img3.png', 'toy19img4.png', 'toy19img5.png'),
(20, 20, 'toy20img1.png', 'toy20img2.png', 'toy20img3.png', NULL, NULL),
(21, 21, 'toy21img1.png', 'toy21img2.png', 'toy21img3.png', 'toy21img4.png', 'toy21img5.png'),
(22, 22, 'toy22img1.png', 'toy22img2.png', 'toy22img3.png', 'toy22img4.png', 'toy22img5.png'),
(23, 23, 'toy23img1.png', 'toy23img2.png', 'toy23img3.png', 'toy23img4.png', 'toy23img5.png'),
(24, 24, 'toy24img1.png', 'toy24img2.png', 'toy24img3.png', 'toy24img4.png', 'toy24img5.png'),
(25, 25, 'toy25img1.png', 'toy25img2.png', 'toy25img3.png', 'toy25img4.png', 'toy25img5.png'),
(26, 26, 'toy26img1.png', 'toy26img2.png', 'toy26img3.png', 'toy26img4.png', 'toy26img5.png');

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

CREATE TABLE `produse` (
  `id` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `pret` float NOT NULL,
  `stoc` int(11) NOT NULL,
  `vandute` int(11) NOT NULL DEFAULT 0,
  `categorie` varchar(20) NOT NULL,
  `destinatar` varchar(15) NOT NULL,
  `varsta` varchar(35) NOT NULL,
  `descriere` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produse`
--

INSERT INTO `produse` (`id`, `nume`, `pret`, `stoc`, `vandute`, `categorie`, `destinatar`, `varsta`, `descriere`) VALUES
(1, 'Jucarie de plus Mappy Fluffy Friends', 149.99, 50, 17, 'plus', 'baieti,fete', 'vprescolari, vscolari, vadolescenti', 'Ursul cu pui Mappy Fluffy Friends, maro, 130 cm poate sa fie o mascota, un cadou sau un prieten de joaca al copilului dumneavoastra, in acelasi timp stimuland creativitatea si dezvoltarea sa personala'),
(2, 'Tractor John Deere cu lumini si sunete', 77.99, 50, 2, 'masini', 'baieti', 'vprescolari, vscolari', 'Acest vehicul este pregatit sa faca fata oricarui obstacol care ii sta in cale. Tractorul dispune de lumini si actiune sonora.\r\n\r\nFunctioneaza cu 3 baterii LR44 (AG13)- incluse.'),
(3, 'Papusa Truli, multicolor', 74.99, 50, 4, 'papusi', 'fete', 'vprescolari', 'Papusa Truli 45cm , cel mai nou produs Zurli. Completeaza-ti colectia de papusi cu cele doua noi personaje: Truli si Clopotel. '),
(4, 'LEGO City Police - Centru de comanda mobil ', 143.99, 50, 5, 'creative', 'baieti', 'vscolari', 'Din centrul de comanda mobil LEGO City a evadat un infractor periculos. Toti membrii echipei de politie, adica micii constructori cu varsta cuprinsa intre 6 si 12 ani, sunt rugati sa se prezinte la datorie pentru a prinde evadatul.\r\n\r\nEchipamentul din dotare – cabina de camion detasabila, biroul celor doi ofiteri, camerele de monitorizare cu ecrane mari, antena-satelit, acoperisul cu deschidere larga, usile laterale, rampa din spatele statiei, motocicletele si ATV-urile'),
(5, 'Set cuburi Baby Clemmy – Farm animals', 64.99, 50, 5, 'bebelusi', 'baieti,fete', 'vprescolari', 'Setul de joaca Clemmy este ideal pentru cei mici. Include 6 cuburi moi printre care 3 animalute cu puiutii lor si o brosura de ilustratii pentru a stimula inventivitatea copiilor.\r\n\r\nDa frau liber imaginatiei cu setul Ferma Animalelor si carte de ilustratii de la Clemmy. Produsul stimuleaza dexteritatea, imaginatia si emotia.'),
(6, 'LEGO DUPLO Town - Animalele de la ferma', 34.99, 50, 13, 'creative', 'baieti,fete', 'vprescolari', 'Animalele de la ferma este un set de jucarii pentru copiii de 2 ani, maxim 5 ani. Acesta este compus din doar 16 piese dragute, printre care si patru figurine animale: un vitel, un purcelus, un pui si o pisica.\r\n\r\nSi cum micutul tau iubeste animalele, cu siguranta va fi incantat de aceasta inedita ferma cu animale de jucarie. Ajuta-l sa puna puisorul in cuibar, sa hraneasca purcelul si vitelul in spatiul special amenajat in acest sens si, nu in ultimul rand, sa aiba grija de pisicuta iubitoare!'),
(7, 'LEGO Creator Expert - Ford Mustang', 329.99, 50, 14, 'creative', 'baieti', 'vadolescenti', 'Construieste-ti propriul tau Ford Mustang, completat cu caroserie albastru-inchis, dungi de curse albe, priza de aer agresiva si jante grozave cu 5 spite cu anvelope aderente la sol! Dezvoltat in parteneriat cu Ford, acest model formidabil surprinde vraja automobil american din anii 1960, si vine cu o colectie de accesorii optionale pentru personalizare, incluzand un supra-alimentator, un spoiler posterior ridicat, tevi de esapament masive, o masca frontala si un rezervor de protoxid de azot.'),
(8, 'LEGO Friends - Casa Miei', 129.99, 50, 15, 'creative', 'fete', 'vscolari', 'O vizita linistita in natura, acasa la familia Miei, intr-un weekend relaxat, il va incarca pe micul tau aventurier cu multa energie pozitiva. Nu-i de mirare ca aceasta casa de jucarie este numita de mai toata lumea Casa Prieteniei!\r\n\r\nLocalizata in apropierea padurii, casuta de jucarie este dotata cu bucatarie, baie, sufragerie, dar si cu un dormitor special, pentru momentele in care Mia vrea sa se relaxeze singura, in care se poate ajunge urcand pe o scara exterioara.\r\n'),
(9, 'Jucarie Clementoni Autobuz de sortat forme Mickey', 54.99, 50, 5, 'bebelusi', 'baieti,fete', 'vprescolari', 'Autobuzul Mickey Mouse pentru sortat forme include 9 cuburi noi, colorate, prezente in 6 forme diferite. Autobuzul Mickey are un capac de sortat forme, perfect pentru dezvoltarea capacitatii manuale si pentru predarea diferitelor forme si culori.\r\n\r\nPovestea Clementoni incepe in 1963 si astazi au peste 50 de ani de cand pun la dispozitia clientilor o gama variata de produse.\r\n\r\nMisiunea Clementoni este aceea de a-i conduce pe micuti catre un viitor mai bun prin dedicatie, creativitate si pasiune'),
(10, 'Jucarie Tomy - Cofrajul cu oua colorate', 59.99, 50, 2, 'bebelusi', 'baieti,fete', 'vprescolari', 'Ascunzandu-se in interiorul casutei lor puternice si stralucitoare, acum ouale prezinta nuante de roz, mov, verde, galben si portocaliu. \r\nFiecare ou va piui atunci cand bebelusul apasa. Dar asta nu e tot, copiii pot potrivi cochilii dupa culoarea fetelor sau dupa culoarea bazelor. \r\nSau amestecati culorile pentru o varietate infinita de combinatii. Apoi pot face alte descoperiri, fiecare ou isi are locul desemnat in cutie, cu o baza care se potriveste unei forme diferite.'),
(11, 'Jucarie Tomy - Gaseste puiul', 54.99, 50, 5, 'bebelusi', 'baieti,fete', 'vprescolari', ' Fiecare ou are o dimensiune si o culoare diferita. Exista un ou tatic, mamica, frate, sora si un bebelus, fiecare cu un chip fericit diferit. In mijloc se afla puiul galben care piuie cand apesi pe el. Cuibareste bazele si apoi partile de sus pentru a forma un ou mare care sa le includa pe toate celelalte. Cu aceste jucarii va puteti juca si in baie.\r\n\r\nCaracteristici: joc de rol; sortare forme; potrivire culori; ascultare sunete; joc de stivuire.'),
(12, 'Jucarie de sortat forme Clementoni, Mickey Mouse', 92.9, 50, 3, 'bebelusi', 'baieti,fete', 'vprescolari', 'Joaca este calea naturala prin care copiii invata. Aceste jucarii sunt gandite astfel incat, prin joaca sa ajute la dezvoltarea abilitatilor viitoare ale micutului. Cu ajutorul jucariei, copiii vor putea invata formele, culorile si numerele.\r\n\r\nPentru ca distractia sa fie completa casuta are o usita care se deschide si un soare ce se poate invarti.\r\n\r\nAjuta la dezvoltarea perceptiei vizuale si tactile si la dezvoltarea coordonarii dintre maini si ochi.'),
(13, 'Jucarie de sortat Roben Toys, Cubul educativ cu 24', 25, 50, 4, 'bebelusi', 'baieti,fete', 'vprescolari', 'O jucarie clasica ce nu trebuie sa-i lipseasca niciunui copil. Ea este compusa din cubul viu colorat cu 3 sabloane diferite decupate pe fiecare din cele 6 fete si 18 piese divers colorate, cu forme diferite (stea, dreptunghi, triunghi, cerc, oval, semiluna, romb, patrat, poligon, semnul plus, paralelipiped), usor de prins si de manevrat de catre copil.\r\n\r\nDupa asamblarea cubului cei mici vor fi incantati sa introduca piesele prin sablonul cu aceeasi forma.\r\n'),
(14, 'Jucarie de plus Vtech, ursulet', 194.99, 50, 6, 'bebelusi', 'baieti,fete', 'vprescolari', 'Testat in totalitate pentru normele de siguranta. Trei butoane de apasat introduc forme, culori si numere, copiilor. Expresii de joaca pentru a incuraja copilul sa se tarasca impreuna cu ursuletul. Aprinde-ti lumina buburuzei si ea va reda muzica Include 10 melodii vesele si cinci cantece de karaoke.'),
(15, 'Jucarie muzicala Lamaze, Omida', 74.99, 50, 3, 'bebelusi', 'baieti,fete', 'vprescolari', '- Omida muzicala este prietenul ideal al fiecarui bebelus;\r\n- Ofera un maxim de distractie datorita zornaitorilor, clopoteilor si chitaitorilor;\r\n- Apasa omida pe nas si ea va canta;\r\n- Burtica este gradata;\r\n- Dezvolta simtul vizual, auditiv, tactil si motor;\r\n- Omida este viu colorata astfel atrage atentia copilului;\r\n- Atunci cand copilul prinde o sectiune din omida ea scoate un sunet;\r\n- Varsta Recomandata:  0 luni+.'),
(16, 'Jucarie zornaitoare cu inel Elefantul Elmer, 12 cm', 50.99, 50, 4, 'bebelusi', 'baieti,fete', 'vprescolari', 'Elmer este putin diferit fata de alti elefanti… Nu este gri, ci multi-color. Parca este iesit din povestile incantatoare cu elefantul Elmer, povesti care celebreaza individualitatea si puterea rasului.\r\n\r\nJucaria zornaitoare din plus are un inel de prindere, perfect pentru micile manute cu degetele iscoditoare. Este realizata dintr-un plus moale si foarte colorat, cu detalii frumos brodate. Zornaitoarea capteaza cu usurinta atentia copiilor, ajuta la dezvoltarea coordonarii ochi-mana.\r\n'),
(17, 'Buchet de margele curcubeu pentru bebelusi', 75, 50, 2, 'bebelusi', 'baieti,fete', 'vprescolari', 'Margele curcubeu - un buchet delicios de bilute colorate, utile pentru exersarea abilitatilor de prindere si coordonare a bebelusilor. \r\nCulorile vii, impreuna cu forma rotunda si textura specifica lemnului natur, toate reprezinta stimulii potriviti pentru curiozitatea crescanda a micilor exploratori! \r\nVopselurile non toxice ofera siguranta chiar si pentru ducerea jucariei la gura. Dimensiuni: diametrul jucariei 11cm, diametrul fiecarei bilute 3cm'),
(18, 'Jucarie zornaitoare lemn bebe,  model Arici', 39.99, 54, 8, 'bebelusi', 'baieti,fete', 'vprescolari', 'Jucariile zornaitoare sunt indispensabile pentru micuti. Ele declanseaza reflexul de apucare si sporeste procesul de dezvoltare. Ele transmit senzatii care ajuta copilul sa descopere mediul.'),
(19, 'LEGO City - Tren de calatori', 354.99, 50, 12, 'creative', 'baieti', 'vscolari', 'Porneste spre gara pentru o calatorie distractiva!\r\n\r\nUrca-te in elegantul Tren de calatori 60197 LEGO City si du-te in vagonul cafenea pentru o gustare in timpul calatoriei. Uita-te pe fereastra la peisaj, apoi ia loc ca sa tragi un pui de somn.\r\n\r\nDing ding!\r\n\r\nTrezeste-te, trenul intra in gara.\r\n\r\nEste timpul sa pornesti in urmatoarea aventura din LEGO City!'),
(20, 'LEGO DUPLO - Camion si excavator pe senile', 79.99, 50, 9, 'creative', 'baieti', 'vprescolari', 'Micii sapatori vor adora sa manevreze aceste masini de lucrari usor de construit. Deplaseaza Excavatorul pe sine pe teren neregulat si excaveaza cu cupa sa mare. Demonteaza bratul sau flexibil si functional pentru a-l scurta, apoi incarca Camionul cu functia de basculare pentru a cara molozul! Caramizile LEGO DUPLO sunt concepute special pentru a fi lipsite de risc pentru manutele mici. Include 2 figurine muncitori constructori DUPLO.\r\n\r\nProdusul nu necesita baterii.'),
(21, 'LEGO Speed Champions - McLaren Senna', 72.99, 50, 18, 'creative', 'baieti', 'vscolari', 'LEGO masinuta McLaren Senna V29, este reinterpretare la scara mai mica a automobilului care face furori in circuitele de curse din viata reala, este o piesa must-have pentru orice mic colectionar (si nu numai, am spune noi)!\r\n\r\nAceasta masinuta de curse este inspirata de legendarul pilot de Formula 1 Ayrton Senna si vine la pachet cu o superba caroserie aerodinamica, cu jante intersanjabile, parbriz detasabil si discuri de franare, care le imita pe cele reale pana in cele mai mici detalii.'),
(22, 'LEGO DUPLO - Petrecerea lui Minnie', 79.99, 50, 7, 'creative', 'fete', 'vprescolari', 'Micuta ta tocmai a primit o invitatie la ziua lui Minnie Mouse, insa aceasta o roaga sa o ajute putin la partea de organizare. Ce spui, o lasi sa-i dea o mana de ajutor si sa-i organizeze o super petrecere lui Minnie Mouse?\r\n\r\nFetitele care sunt fane Disney vor adora sa se joace cu setul de jucarii pentru fete din gama DUPLO, mai ales ca toate piesele sunt colorate in roz, o culoare care stim cat de mult le place micutelor domnisoare.'),
(23, 'LEGO DUPLO - Primul meu camion cu litere', 96.99, 50, 6, 'creative', 'baieti,fete', 'vprescolari', 'Inspira copiii sa construiasca, sa se joace si sa invete cu Camionul cu alfabet LEGO DUPLO… Construieste! Ai 26 de caramizi litere de sortat, stivuit si transportat cu camionul. Joaca-te! Copiii impart aventuri cu baiatul, fata si ursul simpatic, transportand blocurile in camion. Invata! Prescolarii se familiarizeaza cu toate literele alfabetului si invata repede sa scrie cuvinte scurte (J-O-C)!'),
(24, 'LEGO Friends - Salonul de coafura', 69.99, 50, 5, 'creative', 'fete', 'vscolari', 'Te-ai plictisit sa arati mereu la fel? Mergi la salonul de coafura din orasul Heartlake pentru a-ti reinventa coafura! Alatura-te Emmei LEGO Friends cand aceasta o viziteaza pe stilista Nina pentru un nou „look”. Spala-i mai intai parul in chiuveta in forma de scoica, apoi ia foarfeca pentru a o ajuta la tuns. Bea o cafea impreuna cu ea in timp ce asteapta sa i se fixeze coafura. Adauga o funda pentru a-i completa infatisarea. Este un loc elegant unde poti zabovi cu prietenii!\r\n'),
(25, 'LEGO Creator Expert - London Bus', 359.99, 50, 15, 'creative', 'baieti', 'vadolescenti', 'Urcati cu totii in autobuzul londonez! Porneste intr-o calatorie nostalgica cu aceasta replica LEGO Creator Expert a faimosului autobuz londonez cu etaj. \r\nApuca bara de sprijin si urca pe platforma de imbarcare deschisa din spate, completata cu o cutie pentru bilete folosite si un extinctor. Apoi ia-o pe scarile in spirala spre puntea de vizionare, unde vei gasi o zona cu scaune confortabile si un numar de alte obiecte'),
(26, 'LEGO Creator Expert - Winter Village Fire Station', 344.99, 50, 13, 'creative', 'baieti,fete', 'vadolescenti', 'Bine ai venit in cladirea pompierilor din satul de iarna (10263 – Winter Village Fire Station), unde pompierii se bucura de linistea sezonului de sarbatori. Acest set LEGO incantator contine o cladire cu 2 niveluri, decorata pentru Craciun. La etaj are o bucatarie cu telefon rosu, masa, pat si o caramida LEGO luminoasa. In spatele usilor mari si rosii ale statiei vei descoperi echipament de pompieri si o bara, iar afara se afla un patinoar cu o statuie decorativa din gheata.');

-- --------------------------------------------------------

--
-- Table structure for table `produse_comanda`
--

CREATE TABLE `produse_comanda` (
  `id` int(11) NOT NULL,
  `id_comanda` int(11) NOT NULL,
  `id_produs` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `pret` float NOT NULL,
  `cantitate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produse_comanda`
--

INSERT INTO `produse_comanda` (`id`, `id_comanda`, `id_produs`, `nume`, `pret`, `cantitate`) VALUES
(1, 1, 1, 'Jucarie de plus Mappy Fluffy Friends', 150, 2),
(2, 1, 2, 'Tractor John Deere cu lumini si sunete', 78, 1),
(3, 2, 19, 'LEGO City - Tren de calatori', 150, 1),
(4, 3, 1, 'Jucarie de plus Mappy Fluffy Friends', 149.99, 2),
(5, 3, 7, 'LEGO Creator Expert - Ford Mustang', 329.99, 1),
(6, 4, 21, 'LEGO Speed Champions - McLaren Senna', 72.99, 2),
(7, 4, 8, 'LEGO Friends - Casa Miei', 129.99, 1),
(8, 5, 21, 'LEGO Speed Champions - McLaren Senna', 72.99, 2),
(9, 5, 8, 'LEGO Friends - Casa Miei', 129.99, 1),
(10, 6, 21, 'LEGO Speed Champions - McLaren Senna', 72.99, 1),
(11, 6, 8, 'LEGO Friends - Casa Miei', 129.99, 1),
(12, 7, 21, 'LEGO Speed Champions - McLaren Senna', 72.99, 2),
(13, 7, 8, 'LEGO Friends - Casa Miei', 129.99, 1),
(14, 8, 21, 'LEGO Speed Champions - McLaren Senna', 72.99, 1),
(15, 8, 8, 'LEGO Friends - Casa Miei', 129.99, 1),
(16, 9, 1, 'Jucarie de plus Mappy Fluffy Friends', 149.99, 2),
(17, 10, 21, 'LEGO Speed Champions - McLaren Senna', 72.99, 2),
(18, 10, 8, 'LEGO Friends - Casa Miei', 129.99, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produse_cos`
--

CREATE TABLE `produse_cos` (
  `id_user` int(11) NOT NULL,
  `id_produs` int(11) NOT NULL,
  `cantitate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produse_cos`
--

INSERT INTO `produse_cos` (`id_user`, `id_produs`, `cantitate`) VALUES
(1, 8, 1),
(1, 21, 1),
(3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produse_favorite`
--

CREATE TABLE `produse_favorite` (
  `id_user` int(11) NOT NULL,
  `id_produs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produse_favorite`
--

INSERT INTO `produse_favorite` (`id_user`, `id_produs`) VALUES
(1, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `recenzii_produs`
--

CREATE TABLE `recenzii_produs` (
  `id` int(11) NOT NULL,
  `id_produs` int(11) NOT NULL,
  `autor` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recenzii_produs`
--

INSERT INTO `recenzii_produs` (`id`, `id_produs`, `autor`, `data`, `text`) VALUES
(1, 1, 'Harriett Mcdowell', '2020-05-01', 'Cel mai bun cadou indiferent de varsta.'),
(2, 1, 'Damian Hubbard', '2020-05-02', 'Thanks to toys, we\'ve just launched our 5th website!'),
(3, 1, 'Hetty Shaw', '2020-05-03', 'It\'s incredible. I love your system. We can\'t understand how we\'ve been living without toys.'),
(4, 1, 'Kailum Plant', '2020-05-04', 'Wow what great service, I love it! I would be lost without toys.'),
(5, 1, 'Timur Franco', '2020-05-05', 'I would gladly pay over 600 dollars for toys.'),
(6, 1, 'Aaryan Pickett', '2020-05-06', 'I would also like to say thank you to all your staff.'),
(7, 1, 'Haidar Mcmillan', '2020-05-07', 'Toys is the real deal! Very easy to use. Thanks guys, keep up the good work! Toys was the best investment I ever made. Toys is great. You guys rock! Thank you so much for your help. I love your system. Since I invested in toys I made over 100,000 dollars profits. I made back the purchase price in just 48 hours! It\'s exactly what I\'ve been looking for. You won\'t regret it. I wish I would have thought of it first. I would also like to say thank you to all your staff.'),
(8, 1, 'Tayler Benjamin', '2020-05-08', 'Great job, I will definitely be ordering again!'),
(9, 1, 'Matias Mohammed', '2020-05-09', 'Toys is worth much more than I paid. I wish I would have thought of it first.'),
(10, 1, 'Wil Barnett', '2020-05-10', 'Toy saved my business. Great job, I will definitely be ordering again! Toy did exactly what you said it does.'),
(11, 1, 'Shivam Fulton', '2020-05-11', 'This toy impressed me on multiple levels. Best. Product. Ever!'),
(12, 1, 'Archibald Hayward', '2020-05-12', 'Very easy to use.'),
(13, 1, 'Kerry Derrick', '2020-05-13', 'I love this toy. I would like to personally thank you for your outstanding product. This toy is the most valuable business resource we have EVER purchased. This toy has got everything I need.'),
(14, 1, 'Zara Jackson', '2020-05-14', 'Thanks to this toy, we\'ve just launched our 5th website! This toy was worth a fortune to my company. Definitely worth the investment. Buy this now. '),
(15, 1, 'Oriana Stamp', '2020-05-15', 'Definitely worth the investment. No matter where you go, this toy is the coolest, most happening thing around! I love this toy. I couldn\'t have asked for more than this.'),
(16, 1, 'Isabell Munoz', '2020-05-16', 'Best. Product. Ever! I have gotten at least 50 times the value from this toy.'),
(17, 1, 'Edward Glover', '2020-05-17', 'I was amazed at the quality of this toy. Without this toy, we would have gone bankrupt by now. This toy is the real deal! '),
(18, 1, 'Yahya Rice', '2020-05-18', 'I would also like to say thank you to all your staff. You won\'t regret it.'),
(19, 1, 'Danila Stefan', '2020-06-10', 'Recenzia mea');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `parola` varchar(260) NOT NULL,
  `nume` varchar(30) NOT NULL,
  `prenume` varchar(50) NOT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `adresa` varchar(150) DEFAULT NULL,
  `poza` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `parola`, `nume`, `prenume`, `telefon`, `email`, `adresa`, `poza`) VALUES
(0, 'vizitator', 'vizitator', 'vizitator', 'vizitator', NULL, 'vizitator', NULL, NULL),
(1, 'admin', '$2y$10$aZy7v1kVed5fwQflTmyOl.lO/8/7vFni6chL2Q48UaeslcKUOP7YS', 'admin', 'admin', NULL, 'admin@admin.com', NULL, NULL),
(2, 'stefanxd', '$2y$10$/pC3qTppX0rFM5FtlkZM/eU3S1k4Clbq8cEy60vt8v9pJBXzPXAj.', 'Danila', 'Stefan', '0747306795', 'stefan_danila2001@yahoo.com', 'str castanilor nr 63 C vaslui', NULL),
(3, 'stefanxdan', '$2y$10$vtSXu3P/xE7B.rORIMeEN.Z2vBlabths2uLkNr4HAA9SWM.9YmqtW', 'Danila', 'Stefan', '0747306796', 'stefandanila67@gmail.com', 'str castanilor nr 63 C vaslui', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comenzi`
--
ALTER TABLE `comenzi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `imagini_produs`
--
ALTER TABLE `imagini_produs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produs` (`id_produs`);

--
-- Indexes for table `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produse_comanda`
--
ALTER TABLE `produse_comanda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_comanda` (`id_comanda`),
  ADD KEY `id_produs` (`id_produs`);

--
-- Indexes for table `produse_cos`
--
ALTER TABLE `produse_cos`
  ADD PRIMARY KEY (`id_user`,`id_produs`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produs` (`id_produs`);

--
-- Indexes for table `produse_favorite`
--
ALTER TABLE `produse_favorite`
  ADD PRIMARY KEY (`id_user`,`id_produs`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produs` (`id_produs`);

--
-- Indexes for table `recenzii_produs`
--
ALTER TABLE `recenzii_produs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produs` (`id_produs`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comenzi`
--
ALTER TABLE `comenzi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `imagini_produs`
--
ALTER TABLE `imagini_produs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `produse`
--
ALTER TABLE `produse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `produse_comanda`
--
ALTER TABLE `produse_comanda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `recenzii_produs`
--
ALTER TABLE `recenzii_produs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comenzi`
--
ALTER TABLE `comenzi`
  ADD CONSTRAINT `fk_comenzi` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `imagini_produs`
--
ALTER TABLE `imagini_produs`
  ADD CONSTRAINT `fk_imagini` FOREIGN KEY (`id_produs`) REFERENCES `produse` (`id`);

--
-- Constraints for table `produse_comanda`
--
ALTER TABLE `produse_comanda`
  ADD CONSTRAINT `fk_comanda` FOREIGN KEY (`id_comanda`) REFERENCES `comenzi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produs` FOREIGN KEY (`id_produs`) REFERENCES `produse` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produse_cos`
--
ALTER TABLE `produse_cos`
  ADD CONSTRAINT `id_produs_fk` FOREIGN KEY (`id_produs`) REFERENCES `produse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_user_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produse_favorite`
--
ALTER TABLE `produse_favorite`
  ADD CONSTRAINT `favorite_id_produs_fk` FOREIGN KEY (`id_produs`) REFERENCES `produse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_id_user_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recenzii_produs`
--
ALTER TABLE `recenzii_produs`
  ADD CONSTRAINT `fk_recenzii` FOREIGN KEY (`id_produs`) REFERENCES `produse` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
