-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: moe
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activities_and_events`
--

DROP TABLE IF EXISTS `activities_and_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activities_and_events` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `activitie_name` varchar(45) NOT NULL,
  `activitie_start` datetime NOT NULL,
  `activitie_end` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities_and_events`
--

LOCK TABLES `activities_and_events` WRITE;
/*!40000 ALTER TABLE `activities_and_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `activities_and_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `book_name` varchar(45) NOT NULL,
  `book_subject` int DEFAULT NULL,
  `book_grade` int DEFAULT NULL,
  `term` int DEFAULT NULL,
  `book_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `book_subject` (`book_subject`),
  KEY `book_grade` (`book_grade`),
  CONSTRAINT `books_ibfk_1` FOREIGN KEY (`book_subject`) REFERENCES `subjects` (`ID`),
  CONSTRAINT `books_ibfk_2` FOREIGN KEY (`book_grade`) REFERENCES `grades` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `complaints_suggestions_inquiries`
--

DROP TABLE IF EXISTS `complaints_suggestions_inquiries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `complaints_suggestions_inquiries` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `send_date` date DEFAULT NULL,
  `e_mail` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complaints_suggestions_inquiries`
--

LOCK TABLES `complaints_suggestions_inquiries` WRITE;
/*!40000 ALTER TABLE `complaints_suggestions_inquiries` DISABLE KEYS */;
/*!40000 ALTER TABLE `complaints_suggestions_inquiries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `directorates`
--

DROP TABLE IF EXISTS `directorates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `directorates` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `directorate` varchar(45) NOT NULL,
  `governorate` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `governorate` (`governorate`),
  CONSTRAINT `directorates_ibfk_1` FOREIGN KEY (`governorate`) REFERENCES `governorates` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `directorates`
--

LOCK TABLES `directorates` WRITE;
/*!40000 ALTER TABLE `directorates` DISABLE KEYS */;
INSERT INTO `directorates` VALUES (1,'المنصورة',1),(2,'الشيخ عثمان',1),(3,'نهم',2),(4,'همدان',2);
/*!40000 ALTER TABLE `directorates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_auth`
--

DROP TABLE IF EXISTS `employee_auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee_auth` (
  `ID` int NOT NULL,
  `username` varchar(45) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  CONSTRAINT `employee_auth_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `employees` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_auth`
--

LOCK TABLES `employee_auth` WRITE;
/*!40000 ALTER TABLE `employee_auth` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_auth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(45) NOT NULL,
  `job_type` int DEFAULT NULL,
  `workplace` int DEFAULT NULL,
  `certificate` varchar(255) DEFAULT NULL,
  `salary` int DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `job_type` (`job_type`),
  KEY `workplace` (`workplace`),
  CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`job_type`) REFERENCES `job_types` (`ID`),
  CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`workplace`) REFERENCES `schools` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genders`
--

DROP TABLE IF EXISTS `genders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genders` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `gender` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genders`
--

LOCK TABLES `genders` WRITE;
/*!40000 ALTER TABLE `genders` DISABLE KEYS */;
INSERT INTO `genders` VALUES (1,'ذكور'),(2,'إناث'),(3,'مختلط'),(4,'منفصل');
/*!40000 ALTER TABLE `genders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `governorates`
--

DROP TABLE IF EXISTS `governorates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `governorates` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `governorate` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `governorates`
--

LOCK TABLES `governorates` WRITE;
/*!40000 ALTER TABLE `governorates` DISABLE KEYS */;
INSERT INTO `governorates` VALUES (1,'عدن'),(2,'صنعاء');
/*!40000 ALTER TABLE `governorates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grades` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `grade` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
INSERT INTO `grades` VALUES (1,'اول ابتدائي'),(2,'ثاني ابتدائي'),(3,'ثالث ابتدائي'),(4,'رابع ابتدائي'),(5,'خامس ابتدائي'),(6,'سادس ابتدائي'),(7,'اول اعدادي'),(8,'ثاني اعدادي'),(9,'ثالث اعدادي'),(10,'اول ثانوي'),(11,'ثاني ثانوي'),(12,'ثالث ثانوي');
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grievances`
--

DROP TABLE IF EXISTS `grievances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grievances` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `result` int NOT NULL,
  `request_status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  KEY `result` (`result`),
  KEY `request_status` (`request_status`),
  CONSTRAINT `grievances_ibfk_1` FOREIGN KEY (`result`) REFERENCES `students_results` (`ID`),
  CONSTRAINT `grievances_ibfk_2` FOREIGN KEY (`request_status`) REFERENCES `statuses` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grievances`
--

LOCK TABLES `grievances` WRITE;
/*!40000 ALTER TABLE `grievances` DISABLE KEYS */;
/*!40000 ALTER TABLE `grievances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `high_school_majors`
--

DROP TABLE IF EXISTS `high_school_majors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `high_school_majors` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `major` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `high_school_majors`
--

LOCK TABLES `high_school_majors` WRITE;
/*!40000 ALTER TABLE `high_school_majors` DISABLE KEYS */;
INSERT INTO `high_school_majors` VALUES (1,'علمي'),(2,'أدبي');
/*!40000 ALTER TABLE `high_school_majors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_types`
--

DROP TABLE IF EXISTS `job_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_types` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `job_type` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_types`
--

LOCK TABLES `job_types` WRITE;
/*!40000 ALTER TABLE `job_types` DISABLE KEYS */;
INSERT INTO `job_types` VALUES (1,'معلم'),(2,'موظف مكتبي');
/*!40000 ALTER TABLE `job_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nationalities`
--

DROP TABLE IF EXISTS `nationalities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nationalities` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `nationality` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nationalities`
--

LOCK TABLES `nationalities` WRITE;
/*!40000 ALTER TABLE `nationalities` DISABLE KEYS */;
INSERT INTO `nationalities` VALUES (1,'يمنية'),(2,'سعودية'),(3,'مصرية'),(4,'اردنية');
/*!40000 ALTER TABLE `nationalities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `post_date` datetime DEFAULT NULL,
  `content` text NOT NULL,
  `cover` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'وزير التربية يشدد على ضرورة تنفيذ خطط وبرامج التغذية المدرسية وفقا للاحتياج الميداني','2021-11-16 16:09:30','شدد وزير التربية والتعليم الأستاذ طارق سالم العكبري، على ضرورة تنفيذ خطط وبرامج الوحدة التنفيذية للتغذية المدرسية وفقا لاحتياج الميدان، والتنسيق المشترك مع الفروع بالمحافظات، لضمان الاستفادة من مشروع التغذية المدرسية وفقا الإمكانات المتاحة، والعمل على تحسين تنفيذها بصورة أوسع. جاء ذلك لدى زيارته، بالعاصمة المؤقتة عدن إلى مقر الوحدة التنفيذية للتغذية المدرسية، ضمن نزولاته الميدانية لتفقد الأوضاع التعليمية، حيث اطلع خلالها على الخطط والبرامج الجاري تنفيذها في مجال التغذية المدرسية في المحافظات المستهدفة من المنحة المقدمة من برنامج الأغذية العالمي، وسبل تطويرها بما يسهم في معالجة الإشكاليات والعراقيل التي تواجهها. وأكد الوزير العكبري على أهمية الانضباط الوظيفي، والعمل بصورة مستمرة من الميدان، من خلال رفع تقارير الإنجاز ومستوى النشاط، مشيرا إلى الدور الريادي لوحدة التغذية المدرسية من خلال تقديمها العديد من الخدمات في تأمين الغذاء الصحي لطلاب المدارس، والحفاظ عليها في ظل تراجع الدعم العالمي، لافتا إلى ضرورة تفعيل هذا الدور بصورة أكبر ومعالجة الاختلالات وتصحيحها خلال الفترة المقبلة. ووجه وزير التربية بدراسـة وتقييم الأداء لبرنامج التغذية المدرسية في المحافظات المستهدفة ومعرفة الصعوبات والتحديات والمقترحات المطلوبة لتجاوزها، والعمل وفقاً لخطط الاحتياج الفعلي للميدان التعليمي بهذا الشأن. واستعرض مدير عام الوحدة التنفيذية للتغذية المدرسية الأستاذ فضل صالح قحطان ومعه مديرو الإدارات والأقسام، لمحة عامة حول مشروع التغذية المدرسية الذي يدعمه برنامج الأغذية العالمي ودور الوحدة في تنفيذ مشاريع التغذية وأبرز الأنشطة التكاملية التي تقوم بها الوحدة.','00.jpg'),(2,'وكيل قطاع التعليم لملس يلتقي بمديري الإدارات العامة بالقطاع','2022-05-18 12:23:23','التقى وكيل قطاع التعليم الأستاذ محمد لملس صباح اليوم في ديوان وزارة التربية والتعليم في العاصمة المؤقتة عدن بمدينة الشعب بمديري الإدارات العامة بالقطاع. في البدء رحب الوكيل لملس بالحاضرين شاكرا حضورهم ونقل لهم تحيات وزير التربية والتعليم أ / طارق سالم العكبري وعقد الاجتماع للاطلاع على استعراض نتائج ومخرجات محضر الاجتماع السابق والوقوف على الالتزام بتنفيذ القرارات والتكاليف والمهام المطلوبة من مدراء عموم الإدارات العامة بالقطاع التي تم إقرارها كل فيما يخصه. كما استعرض الاجتماع مناقشة مخرجات ورشة العمل المنعقدة الأسبوع المنصرم في مجال التخطيط عن كيفية اعداد الخطط والبرامج والتقارير السنوية مع شرح لنموذج كيفية التعامل مع بيانات الحقول الواردة فيها. وبعد ذلك ناقش الاجتماع استعراض تقارير الإنجاز التي اعدها مدراء الادارات العامة بالقطاع كل فيما يخص ادراته التي تم رفعها للربعين الأول والثاني من العام 2022م وفقا لنموذج مصفوفة المتابعة والتقييم الجديد المعمم به، ومناقشتها واتخاذ القرار المناسب إزاء ذلك . كما جرى الاستماع الى تقرير معلمات الريف، ومناقشة وضع المدرسة اليمنية في جيبوتي، وتقرير الأنشطة المدرسية. وفي نهاية الإجتماع اكد الأستاذ لملس وكيل قطاع التعليم على مساعدة معالجة اي صعوبات تواجه مدراء العموم وفق اللوائح والنظم التابعة للوزارة .','02.jpg'),(3,'قطاع المناهج والتوجيه بوزارة التربية يسلم منظمة كريتيف كتاب التلميذ (أقرأ وأتعلم) و(دليل المعلم للصف الاول أساسي) في نسخته النهائية لغرض طباعته.','2022-11-08 19:42:42','سلمت الإدارة العامة للمناهج التابعة لقطاع المناهج والتوجيه بوزارة التربية والتعليم كتاب التلميذ (أقرأ وأتعلم) و ( دليل المعلم للصف الاول أساسي ) الى منظمة كريتيف لغرض التكفل بالطباعة للمحافظات المستهدفة (عدن – لحج – الضالع )الخميس الموافق 3/ 11/ 2022م ، حيث تم تسليمهم الكتب من قبل الدكتور عصام الصبيحي مدير إدارة المناهج القائم بأعمال مدير عام المناهج في مكتب الادارة العامة للمناهج بوزارة التربية عن قطاع المناهج ، وممثلين عن منظمة كريتيف د. محمد الدقري مسؤول اول المناهج بالمنظمة ، والدكتور عارف القطيبي مدير عام التعليم التعويضي بوزارة التربية ومسؤول تطوير مواد القرائية بمنظمة كريتيف . ومن جانبه أوضح الدكتور عصام الصبيحي مدير إدارة المناهج والقائم بأعمال مدير عام المناهج بوزارة التربية والتعليم قبيل تسليمه الكتاب للجهة التي ستتكفل بطباعته بأن كتاب التلميذ أقرا واتعلم يتكون من جزأين وكذلك الحال بدليل المعلم ، مؤكدا بأنه تمت مراجعة كتاب التلميذ اقرأ واتعلم بجزئيه الأول والثاني وكذا ودليل المعلم بجزئيه من قبل فريق فني متخصص وهذه النسخة المسلمة هي النسخة الاخيرة المعدلة والتي تم توقيعها من قبل رئيس وأعضاء الفريق ومن ثم تم تسليمها للادارة العامة للمناهج والتي بدورها قامت هي الاخرى بتوقيعها و وتسليمها لوكيل قطاع المناهج والتوجيه بالوزارة وهناك تم تعميد الكتب وختمها وصولا الى المرحلة الاخيرة وهي تسليم نسخة منها لمنظمة كريتيف لطباعتها وتوزيعها على تلاميذ الصف الاول في المحافظات المستهدفة من قبل المنظمة في مشروع تدريب معلمي نهج القراءة المبكرة لمعرفة ما تم من تعديلات واضافات في هذه المواد بعد مراجعتها.','01.jpg');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programs_and_courses`
--

DROP TABLE IF EXISTS `programs_and_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `programs_and_courses` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `program_name` varchar(45) DEFAULT NULL,
  `discription` varchar(600) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `lenght` int DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `program_start` date DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `google_map` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programs_and_courses`
--

LOCK TABLES `programs_and_courses` WRITE;
/*!40000 ALTER TABLE `programs_and_courses` DISABLE KEYS */;
/*!40000 ALTER TABLE `programs_and_courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reject_types`
--

DROP TABLE IF EXISTS `reject_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reject_types` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `rejection_type` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reject_types`
--

LOCK TABLES `reject_types` WRITE;
/*!40000 ALTER TABLE `reject_types` DISABLE KEYS */;
INSERT INTO `reject_types` VALUES (1,'تسجيل طالب');
/*!40000 ALTER TABLE `reject_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rejects`
--

DROP TABLE IF EXISTS `rejects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rejects` (
  `request_id` int NOT NULL,
  `rejection_type` int NOT NULL,
  `massage` text NOT NULL,
  `rejection_source` varchar(45) DEFAULT NULL,
  KEY `rejection_type` (`rejection_type`),
  CONSTRAINT `rejects_ibfk_1` FOREIGN KEY (`rejection_type`) REFERENCES `reject_types` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rejects`
--

LOCK TABLES `rejects` WRITE;
/*!40000 ALTER TABLE `rejects` DISABLE KEYS */;
/*!40000 ALTER TABLE `rejects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_certificate_equation`
--

DROP TABLE IF EXISTS `request_certificate_equation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `request_certificate_equation` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `request_status` int DEFAULT '1',
  `seat_numbers_image` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `student_id` (`student_id`),
  KEY `request_status` (`request_status`),
  CONSTRAINT `request_certificate_equation_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`ID`),
  CONSTRAINT `request_certificate_equation_ibfk_2` FOREIGN KEY (`request_status`) REFERENCES `statuses` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_certificate_equation`
--

LOCK TABLES `request_certificate_equation` WRITE;
/*!40000 ALTER TABLE `request_certificate_equation` DISABLE KEYS */;
/*!40000 ALTER TABLE `request_certificate_equation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_high_school_certificate`
--

DROP TABLE IF EXISTS `request_high_school_certificate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `request_high_school_certificate` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `seat_number_id` int NOT NULL,
  `request_status` int NOT NULL DEFAULT '1',
  `seat_numbers_image` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `seat_number_id` (`seat_number_id`),
  KEY `request_status` (`request_status`),
  CONSTRAINT `request_high_school_certificate_ibfk_1` FOREIGN KEY (`seat_number_id`) REFERENCES `seat_numbers` (`ID`),
  CONSTRAINT `request_high_school_certificate_ibfk_2` FOREIGN KEY (`request_status`) REFERENCES `statuses` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_high_school_certificate`
--

LOCK TABLES `request_high_school_certificate` WRITE;
/*!40000 ALTER TABLE `request_high_school_certificate` DISABLE KEYS */;
/*!40000 ALTER TABLE `request_high_school_certificate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_scholarship`
--

DROP TABLE IF EXISTS `request_scholarship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `request_scholarship` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `passport_image` varchar(255) NOT NULL,
  `certificate_of_good_conduct` varchar(255) NOT NULL,
  `request_status` int NOT NULL DEFAULT '1',
  `seat_numbers_image` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `student_id` (`student_id`),
  KEY `request_status` (`request_status`),
  CONSTRAINT `request_scholarship_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`ID`),
  CONSTRAINT `request_scholarship_ibfk_2` FOREIGN KEY (`request_status`) REFERENCES `statuses` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_scholarship`
--

LOCK TABLES `request_scholarship` WRITE;
/*!40000 ALTER TABLE `request_scholarship` DISABLE KEYS */;
/*!40000 ALTER TABLE `request_scholarship` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_to_move_student`
--

DROP TABLE IF EXISTS `request_to_move_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `request_to_move_student` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `student` int NOT NULL,
  `old_school` int NOT NULL,
  `old_school_respond` int NOT NULL DEFAULT '1',
  `new_school` int NOT NULL,
  `new_school_respond` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  KEY `student` (`student`),
  KEY `old_school` (`old_school`),
  KEY `new_school` (`new_school`),
  KEY `old_school_respond` (`old_school_respond`),
  KEY `new_school_respond` (`new_school_respond`),
  CONSTRAINT `request_to_move_student_ibfk_1` FOREIGN KEY (`student`) REFERENCES `students` (`ID`),
  CONSTRAINT `request_to_move_student_ibfk_2` FOREIGN KEY (`old_school`) REFERENCES `schools` (`ID`),
  CONSTRAINT `request_to_move_student_ibfk_3` FOREIGN KEY (`new_school`) REFERENCES `schools` (`ID`),
  CONSTRAINT `request_to_move_student_ibfk_4` FOREIGN KEY (`old_school_respond`) REFERENCES `statuses` (`ID`),
  CONSTRAINT `request_to_move_student_ibfk_5` FOREIGN KEY (`new_school_respond`) REFERENCES `statuses` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_to_move_student`
--

LOCK TABLES `request_to_move_student` WRITE;
/*!40000 ALTER TABLE `request_to_move_student` DISABLE KEYS */;
/*!40000 ALTER TABLE `request_to_move_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school_types`
--

DROP TABLE IF EXISTS `school_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `school_types` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `school_type` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_types`
--

LOCK TABLES `school_types` WRITE;
/*!40000 ALTER TABLE `school_types` DISABLE KEYS */;
INSERT INTO `school_types` VALUES (1,'حكومي'),(2,'خاص');
/*!40000 ALTER TABLE `school_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schools` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `school_name` varchar(45) NOT NULL,
  `directorate` int NOT NULL,
  `gender` int DEFAULT NULL,
  `school_type` int DEFAULT NULL,
  `nationality` int DEFAULT NULL,
  `e_mail` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `google_map` varchar(255) DEFAULT NULL,
  `primary_school` int DEFAULT NULL,
  `middle_school` int DEFAULT NULL,
  `secondary_school` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `directorate` (`directorate`),
  KEY `gender` (`gender`),
  KEY `school_type` (`school_type`),
  KEY `nationality` (`nationality`),
  CONSTRAINT `schools_ibfk_1` FOREIGN KEY (`directorate`) REFERENCES `directorates` (`ID`),
  CONSTRAINT `schools_ibfk_2` FOREIGN KEY (`gender`) REFERENCES `genders` (`ID`),
  CONSTRAINT `schools_ibfk_3` FOREIGN KEY (`school_type`) REFERENCES `school_types` (`ID`),
  CONSTRAINT `schools_ibfk_4` FOREIGN KEY (`nationality`) REFERENCES `nationalities` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schools`
--

LOCK TABLES `schools` WRITE;
/*!40000 ALTER TABLE `schools` DISABLE KEYS */;
INSERT INTO `schools` VALUES (1,'مدرسة النورس',1,4,2,1,'nn@gmail.com','b-23','77777777777','google.map/232323',100000,200000,300000),(2,'ردفان',2,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,8000),(3,'الإمام زيد',3,1,1,1,NULL,NULL,NULL,NULL,5000,9000,NULL);
/*!40000 ALTER TABLE `schools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seat_numbers`
--

DROP TABLE IF EXISTS `seat_numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seat_numbers` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `student_ID` int NOT NULL,
  `seat_number` varchar(45) NOT NULL,
  `exam_center` int DEFAULT NULL,
  `academic_year` year DEFAULT NULL,
  `high_school_major` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `student_ID` (`student_ID`),
  KEY `exam_center` (`exam_center`),
  KEY `high_school_major` (`high_school_major`),
  CONSTRAINT `seat_numbers_ibfk_1` FOREIGN KEY (`student_ID`) REFERENCES `students` (`ID`),
  CONSTRAINT `seat_numbers_ibfk_2` FOREIGN KEY (`exam_center`) REFERENCES `schools` (`ID`),
  CONSTRAINT `seat_numbers_ibfk_3` FOREIGN KEY (`high_school_major`) REFERENCES `high_school_majors` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seat_numbers`
--

LOCK TABLES `seat_numbers` WRITE;
/*!40000 ALTER TABLE `seat_numbers` DISABLE KEYS */;
/*!40000 ALTER TABLE `seat_numbers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sex`
--

DROP TABLE IF EXISTS `sex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sex` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `sex` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sex`
--

LOCK TABLES `sex` WRITE;
/*!40000 ALTER TABLE `sex` DISABLE KEYS */;
INSERT INTO `sex` VALUES (1,'ذكر'),(2,'انثى');
/*!40000 ALTER TABLE `sex` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `statuses` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `request_status` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` VALUES (1,'قيد المراجعة'),(2,'مقبول'),(3,'مرفوض');
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_auth`
--

DROP TABLE IF EXISTS `student_auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student_auth` (
  `ID` int NOT NULL,
  `username` varchar(45) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `student_auth_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `students` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_auth`
--

LOCK TABLES `student_auth` WRITE;
/*!40000 ALTER TABLE `student_auth` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_auth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `student_name` varchar(45) NOT NULL,
  `nationality` int DEFAULT NULL,
  `sex` int NOT NULL,
  `school` int DEFAULT NULL,
  `birth_certificate` varchar(45) NOT NULL,
  `grade` int DEFAULT NULL,
  `residence` int DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `student_photo` varchar(255) NOT NULL,
  `e_mail` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `clearance_letters` tinyint DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `nationality` (`nationality`),
  KEY `sex` (`sex`),
  KEY `school` (`school`),
  KEY `grade` (`grade`),
  KEY `residence` (`residence`),
  CONSTRAINT `students_ibfk_1` FOREIGN KEY (`nationality`) REFERENCES `nationalities` (`ID`),
  CONSTRAINT `students_ibfk_2` FOREIGN KEY (`sex`) REFERENCES `sex` (`ID`),
  CONSTRAINT `students_ibfk_3` FOREIGN KEY (`school`) REFERENCES `schools` (`ID`),
  CONSTRAINT `students_ibfk_4` FOREIGN KEY (`grade`) REFERENCES `grades` (`ID`),
  CONSTRAINT `students_ibfk_5` FOREIGN KEY (`residence`) REFERENCES `directorates` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students_request_to_register`
--

DROP TABLE IF EXISTS `students_request_to_register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students_request_to_register` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `student_name` varchar(255) NOT NULL,
  `nationality` int NOT NULL,
  `sex` int NOT NULL,
  `school` int NOT NULL,
  `birth_certificate` varchar(255) NOT NULL,
  `grade` int NOT NULL,
  `residence` int NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `student_photo` varchar(255) NOT NULL,
  `e_mail` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `request_status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  KEY `nationality` (`nationality`),
  KEY `sex` (`sex`),
  KEY `school` (`school`),
  KEY `grade` (`grade`),
  KEY `residence` (`residence`),
  KEY `request_status` (`request_status`),
  CONSTRAINT `students_request_to_register_ibfk_1` FOREIGN KEY (`nationality`) REFERENCES `nationalities` (`ID`),
  CONSTRAINT `students_request_to_register_ibfk_2` FOREIGN KEY (`sex`) REFERENCES `sex` (`ID`),
  CONSTRAINT `students_request_to_register_ibfk_3` FOREIGN KEY (`school`) REFERENCES `schools` (`ID`),
  CONSTRAINT `students_request_to_register_ibfk_4` FOREIGN KEY (`grade`) REFERENCES `grades` (`ID`),
  CONSTRAINT `students_request_to_register_ibfk_5` FOREIGN KEY (`residence`) REFERENCES `directorates` (`ID`),
  CONSTRAINT `students_request_to_register_ibfk_6` FOREIGN KEY (`request_status`) REFERENCES `statuses` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students_request_to_register`
--

LOCK TABLES `students_request_to_register` WRITE;
/*!40000 ALTER TABLE `students_request_to_register` DISABLE KEYS */;
/*!40000 ALTER TABLE `students_request_to_register` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students_results`
--

DROP TABLE IF EXISTS `students_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students_results` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `student_ID` int NOT NULL,
  `result_subject` int NOT NULL,
  `grade` int NOT NULL,
  `term` int DEFAULT NULL,
  `book` int DEFAULT NULL,
  `mark` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `student_ID` (`student_ID`),
  KEY `result_subject` (`result_subject`),
  KEY `grade` (`grade`),
  KEY `book` (`book`),
  CONSTRAINT `students_results_ibfk_1` FOREIGN KEY (`student_ID`) REFERENCES `students` (`ID`),
  CONSTRAINT `students_results_ibfk_2` FOREIGN KEY (`result_subject`) REFERENCES `subjects` (`ID`),
  CONSTRAINT `students_results_ibfk_3` FOREIGN KEY (`grade`) REFERENCES `grades` (`ID`),
  CONSTRAINT `students_results_ibfk_4` FOREIGN KEY (`book`) REFERENCES `books` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students_results`
--

LOCK TABLES `students_results` WRITE;
/*!40000 ALTER TABLE `students_results` DISABLE KEYS */;
/*!40000 ALTER TABLE `students_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subjects` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `studying_subject` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'القرآن الكريم'),(2,'التربية الاسلامية'),(3,'اللغة العربية'),(4,'اللغة الانجليزية'),(5,'الرياضيات'),(6,'الفيزياء'),(7,'الكيمياء'),(8,'الاحياء');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-29 21:28:26
