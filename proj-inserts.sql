use moe;
insert into Nationalities(nationality) values ('Yemeni'),('Saudi arabian'),('Egyptian'),('Jordanian');
insert into Sex(sex) values ('male'),('female');
insert into Governorates(governorate) values ('Aden'),('Sa\'dah');
insert into Directorates(directorate,governorate) values ('al mansoura',1),('sheikh uthman',1),('nhm',2),('hamadan',2);
insert into Subjects(studying_subject) values ('English'),('math'),('art');
insert into Stages(stage) values ('primary'),('middle-school'),('high-school');
insert into Grades(grade, stage) values ('first',1),('second',1),('third',1);
insert into Genders(gender) values ('males'),('females'),('both'),('sepatered');
insert into School_types(school_type) values ('Private school'),('State school');
insert into 
	Schools(school_name, directorate, gender, school_type, nationality, e_mail, address, google_map)
values
	('nawres',1,4,1,1,'mm@gmail.com','b35','google.map.com\4345'),
    ('radfan',2,1,2,1,'mtm@gmail.com','z45','google.map.com\4372'),
    ('imam zyd',3,1,2,1,'me@gmail.com','t5','google.map.com\4348');
insert into 

	Students(student_name, nationality, sex, school, birth_certificate, grade, residence, date_of_birth, address, student_photo, e_mail)
values
	('ahmed',2,1,2,'2349824.png',3,1,'2008-11-11','d45','234242.png','gg@gmail.com'),
    ('samer',1,1,3,'239824.png',1,3,'2010-12-6','y5','23242.png','gy@gmail.com'),
    ('noran',3,2,1,'234824.png',2,2,'2009-6-1','d57','23424.png','rr@gmail.com');
insert into 
	Books(book_name) 
values 
	('English for kids 1'),('English for kids 2'),('English for kids 3'),
    ('art for kids 1'),('art for kids 2'),('art for kids 3'),
    ('math for kids 1'),('math for kids 2'),('math for kids 3');
insert into 
	Students_results(student_ID, result_subject, grade, term, book, mark)
values
	(1,1,3,1,3,95),(1,1,3,2,3,96),(1,2,3,1,9,92),(1,2,3,2,9,93),(1,3,3,1,6,97),(1,3,3,2,6,99),
    (1,1,2,1,2,98),(1,1,2,2,2,92),(1,2,2,1,8,97),(1,2,2,2,8,95),(1,3,2,1,5,95),(1,3,2,2,5,97),
    (3,1,2,1,2,95),(3,1,2,2,2,96),(3,2,2,1,8,98),(3,2,2,2,8,92),(3,3,2,1,5,94),(3,3,2,2,5,94);
insert into 
	Student_auth(ID, username, student_password, session_id)
values
	(1, 'student1', md5('abc1'), uuid()),
    (2, 'student2', md5('abc2'), uuid()),
    (3, 'student3', md5('abc3'), uuid());

use moe;
delete from Grades;
alter table Grades auto_increment = 1;
    
INSERT INTO `sex` (`ID`, `sex`) VALUES (NULL, 'ذكر'), (NULL, 'انثى');
INSERT INTO `nationalities` (`ID`, `nationality`) VALUES (NULL, 'يمنية'), (NULL, 'سعودية'), (NULL, 'مصرية'), (NULL, 'اردنية');
INSERT INTO `governorates` (`ID`, `governorate`) VALUES (NULL, 'عدن'), (NULL, 'صنعاء');
INSERT INTO `directorates` (`ID`, `directorate`, `governorate`) VALUES (NULL, 'المنصورة', '1'), (NULL, 'الشيخ عثمان', '1'), (NULL, 'نهم', '2'), (NULL, 'همدان', '2');
INSERT INTO `subjects` (`ID`, `studying_subject`) VALUES (NULL, 'القرآن الكريم'), (NULL, 'التربية الاسلامية'), (NULL, 'اللغة العربية'), (NULL, 'اللغة الانجليزية'), (NULL, 'الرياضيات'), (NULL, 'الفيزياء'), (NULL, 'الكيمياء'), (NULL, 'الاحياء');
INSERT INTO `stages` (`ID`, `stage`) VALUES (NULL, 'إبتدائي'), (NULL, 'إعدادي'), (NULL, 'ثانوي');
INSERT INTO `grades` (`ID`, `grade`, `stage`) VALUES (NULL, 'اول ثانوي', '3'), (NULL, 'ثاني ثانوي', '3'), (NULL, 'ثالث ثانوي', '3');
INSERT INTO `genders` (`ID`, `gender`) VALUES (NULL, 'ذكور'), (NULL, 'إناث'), (NULL, 'مختلط'), (NULL, 'منفصل');
INSERT INTO `school_types` (`ID`, `school_type`) VALUES (NULL, 'حكومي'), (NULL, 'خاص');
INSERT INTO `schools` (`ID`, `school_name`, `directorate`, `gender`, `school_type`, `nationality`, `e_mail`, `address`, `phone`, `google_map`) VALUES (NULL, 'مدرسة النورس', '1', '4', '2', '1', 'nn@gmail.com', 'b-23', '77777777777', 'google.map/232323'), (NULL, 'ردفان', '2', '1', '1', '1', NULL, NULL, NULL, NULL), (NULL, 'الإمام زيد', '3', '1', '1', '1', NULL, NULL, NULL, NULL);
INSERT INTO `students` (`ID`, `student_name`, `nationality`, `sex`, `school`, `birth_certificate`, `grade`, `residence`, `date_of_birth`, `address`, `student_photo`, `e_mail`, `phone`, `clearance_letters`) VALUES (NULL, 'محمد عيسى احمد علي', '2', '1', '2', '1.png', '3', '1', '2005-11-14', 'b-45', '4.png', NULL, NULL, NULL), (NULL, 'منال احمد عيسى محمد', '2', '2', '1', '2.png', '1', '2', '2007-08-15', 'r-34', '', NULL, NULL, NULL);
insert into Student_auth (ID, username, student_password, session_id) values (1, 'sa12', md5('abc1'), uuid()), (2, 'se43', md5('abc2'), uuid());
INSERT INTO `school_fees` (`school_ID`, `primary_school`, `middle_school`, `secondary_school`) VALUES ('1', '100000', '200000', '330000'), ('2', '', '', '7000'), ('3', '5000', '5000', NULL);
UPDATE `schools` SET `primary_school` = '100000', `middle_school` = '200000', `secondary_school` = '300000' WHERE `schools`.`ID` = 1;
UPDATE `schools` SET `secondary_school` = '8000' WHERE `schools`.`ID` = 2;
UPDATE `schools` SET `primary_school` = '5000', `middle_school` = '9000' WHERE `schools`.`ID` = 3;
INSERT INTO `high_school_majors` (`ID`, `major`) VALUES (NULL, 'علمي'), (NULL, 'أدبي');
INSERT INTO `seat_numbers` (`ID`, `student_ID`, `seat_number`, `exam_center`, `academic_year`, `high_school_major`) VALUES (NULL, '1', 'abc12', '2', '2022', '1');
UPDATE `grades` SET `grade` = 'اول ابتدائي' WHERE `grades`.`ID` = 1;
UPDATE `grades` SET `grade` = 'ثاني ابتدائي' WHERE `grades`.`ID` = 2;
UPDATE `grades` SET `grade` = 'ثالث ابتدائي' WHERE `grades`.`ID` = 3;
INSERT INTO `grades` (`ID`, `grade`) VALUES (NULL, 'رابع ابتدائي'), (NULL, 'خامس ابتدائي'), (NULL, 'سادس ابتدائي'), (NULL, 'اول اعدادي'), (NULL, 'ثاني اعدادي'), (NULL, 'ثالث اعدادي'), (NULL, 'اول ثانوي'), (NULL, 'ثاني ثانوي'), (NULL, 'ثالث ثانوي');
UPDATE `students` SET `grade` = '12' WHERE `students`.`ID` = 1;
INSERT INTO `students_results` (`ID`, `student_ID`, `result_subject`, `grade`, `term`, `book`, `mark`) VALUES (NULL, '1', '1', '12', '2', NULL, '98'), (NULL, '1', '2', '12', '2', NULL, '98'), (NULL, '1', '3', '12', '2', NULL, '97'), (NULL, '1', '4', '12', '2', NULL, '97'), (NULL, '1', '5', '12', '2', NULL, '98'), (NULL, '1', '6', '12', '2', NULL, '95'), (NULL, '1', '7', '12', '2', NULL, '97'), (NULL, '1', '8', '12', '2', NULL, '94');
INSERT INTO `news` (`ID`, `title`, `post_date`, `content`, `cover`) VALUES (NULL, 'وزير التربية يشدد على ضرورة تنفيذ خطط وبرامج التغذية المدرسية وفقا للاحتياج الميداني', '2021-11-16 16:09:30', 'شدد وزير التربية والتعليم الأستاذ طارق سالم العكبري، على ضرورة تنفيذ خطط وبرامج الوحدة التنفيذية للتغذية المدرسية وفقا لاحتياج الميدان، والتنسيق المشترك مع الفروع بالمحافظات، لضمان الاستفادة من مشروع التغذية المدرسية وفقا الإمكانات المتاحة، والعمل على تحسين تنفيذها بصورة أوسع. جاء ذلك لدى زيارته، بالعاصمة المؤقتة عدن إلى مقر الوحدة التنفيذية للتغذية المدرسية، ضمن نزولاته الميدانية لتفقد الأوضاع التعليمية، حيث اطلع خلالها على الخطط والبرامج الجاري تنفيذها في مجال التغذية المدرسية في المحافظات المستهدفة من المنحة المقدمة من برنامج الأغذية العالمي، وسبل تطويرها بما يسهم في معالجة الإشكاليات والعراقيل التي تواجهها. وأكد الوزير العكبري على أهمية الانضباط الوظيفي، والعمل بصورة مستمرة من الميدان، من خلال رفع تقارير الإنجاز ومستوى النشاط، مشيرا إلى الدور الريادي لوحدة التغذية المدرسية من خلال تقديمها العديد من الخدمات في تأمين الغذاء الصحي لطلاب المدارس، والحفاظ عليها في ظل تراجع الدعم العالمي، لافتا إلى ضرورة تفعيل هذا الدور بصورة أكبر ومعالجة الاختلالات وتصحيحها خلال الفترة المقبلة. ووجه وزير التربية بدراسـة وتقييم الأداء لبرنامج التغذية المدرسية في المحافظات المستهدفة ومعرفة الصعوبات والتحديات والمقترحات المطلوبة لتجاوزها، والعمل وفقاً لخطط الاحتياج الفعلي للميدان التعليمي بهذا الشأن. واستعرض مدير عام الوحدة التنفيذية للتغذية المدرسية الأستاذ فضل صالح قحطان ومعه مديرو الإدارات والأقسام، لمحة عامة حول مشروع التغذية المدرسية الذي يدعمه برنامج الأغذية العالمي ودور الوحدة في تنفيذ مشاريع التغذية وأبرز الأنشطة التكاملية التي تقوم بها الوحدة.', '00.jpg'), (NULL, 'وكيل قطاع التعليم لملس يلتقي بمديري الإدارات العامة بالقطاع', '2022-05-18 12:23:23', 'التقى وكيل قطاع التعليم الأستاذ محمد لملس صباح اليوم في ديوان وزارة التربية والتعليم في العاصمة المؤقتة عدن بمدينة الشعب بمديري الإدارات العامة بالقطاع. في البدء رحب الوكيل لملس بالحاضرين شاكرا حضورهم ونقل لهم تحيات وزير التربية والتعليم أ / طارق سالم العكبري وعقد الاجتماع للاطلاع على استعراض نتائج ومخرجات محضر الاجتماع السابق والوقوف على الالتزام بتنفيذ القرارات والتكاليف والمهام المطلوبة من مدراء عموم الإدارات العامة بالقطاع التي تم إقرارها كل فيما يخصه. كما استعرض الاجتماع مناقشة مخرجات ورشة العمل المنعقدة الأسبوع المنصرم في مجال التخطيط عن كيفية اعداد الخطط والبرامج والتقارير السنوية مع شرح لنموذج كيفية التعامل مع بيانات الحقول الواردة فيها. وبعد ذلك ناقش الاجتماع استعراض تقارير الإنجاز التي اعدها مدراء الادارات العامة بالقطاع كل فيما يخص ادراته التي تم رفعها للربعين الأول والثاني من العام 2022م وفقا لنموذج مصفوفة المتابعة والتقييم الجديد المعمم به، ومناقشتها واتخاذ القرار المناسب إزاء ذلك . كما جرى الاستماع الى تقرير معلمات الريف، ومناقشة وضع المدرسة اليمنية في جيبوتي، وتقرير الأنشطة المدرسية. وفي نهاية الإجتماع اكد الأستاذ لملس وكيل قطاع التعليم على مساعدة معالجة اي صعوبات تواجه مدراء العموم وفق اللوائح والنظم التابعة للوزارة .', '02.jepg'), (NULL, 'قطاع المناهج والتوجيه بوزارة التربية يسلم منظمة كريتيف كتاب التلميذ (أقرأ وأتعلم) و(دليل المعلم للصف الاول أساسي) في نسخته النهائية لغرض طباعته.', '2022-11-08 19:42:42', 'سلمت الإدارة العامة للمناهج التابعة لقطاع المناهج والتوجيه بوزارة التربية والتعليم كتاب التلميذ (أقرأ وأتعلم) و ( دليل المعلم للصف الاول أساسي ) الى منظمة كريتيف لغرض التكفل بالطباعة للمحافظات المستهدفة (عدن – لحج – الضالع )الخميس الموافق 3/ 11/ 2022م ، حيث تم تسليمهم الكتب من قبل الدكتور عصام الصبيحي مدير إدارة المناهج القائم بأعمال مدير عام المناهج في مكتب الادارة العامة للمناهج بوزارة التربية عن قطاع المناهج ، وممثلين عن منظمة كريتيف د. محمد الدقري مسؤول اول المناهج بالمنظمة ، والدكتور عارف القطيبي مدير عام التعليم التعويضي بوزارة التربية ومسؤول تطوير مواد القرائية بمنظمة كريتيف . ومن جانبه أوضح الدكتور عصام الصبيحي مدير إدارة المناهج والقائم بأعمال مدير عام المناهج بوزارة التربية والتعليم قبيل تسليمه الكتاب للجهة التي ستتكفل بطباعته بأن كتاب التلميذ أقرا واتعلم يتكون من جزأين وكذلك الحال بدليل المعلم ، مؤكدا بأنه تمت مراجعة كتاب التلميذ اقرأ واتعلم بجزئيه الأول والثاني وكذا ودليل المعلم بجزئيه من قبل فريق فني متخصص وهذه النسخة المسلمة هي النسخة الاخيرة المعدلة والتي تم توقيعها من قبل رئيس وأعضاء الفريق ومن ثم تم تسليمها للادارة العامة للمناهج والتي بدورها قامت هي الاخرى بتوقيعها و وتسليمها لوكيل قطاع المناهج والتوجيه بالوزارة وهناك تم تعميد الكتب وختمها وصولا الى المرحلة الاخيرة وهي تسليم نسخة منها لمنظمة كريتيف لطباعتها وتوزيعها على تلاميذ الصف الاول في المحافظات المستهدفة من قبل المنظمة في مشروع تدريب معلمي نهج القراءة المبكرة لمعرفة ما تم من تعديلات واضافات في هذه المواد بعد مراجعتها.', '01.jpg');
UPDATE `news` SET `cover` = '02.jpg' WHERE `news`.`ID` = 2;
INSERT INTO `statuses` (`ID`, `request_status`) VALUES (NULL, 'قيد المراجعة'), (NULL, 'مقبول'), (NULL, 'مرفوض');
INSERT INTO `reject_types` (`ID`, `rejection_type`) VALUES (NULL, 'تسجيل طالب');
INSERT INTO `job_types` (`ID`, `job_type`) VALUES (NULL, 'معلم'), (NULL, 'موظف مكتبي');
INSERT INTO `employees` (`ID`, `employee_name`, `job_type`, `workplace`, `certificate`, `salary`) VALUES (NULL, 'خالد', '1', '2', NULL, '90000');
INSERT INTO `employee_auth` (`ID`, `username`, `employee_password`, `session_id`, `is_admin`) VALUES ('1', 'dd2', md5('e3'), 'ttt', '0');
UPDATE `students` SET `student_photo` = '4.jpg' WHERE `students`.`ID` = 1;

