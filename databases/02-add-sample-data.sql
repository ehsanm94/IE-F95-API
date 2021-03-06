-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 28, 2016 at 08:52 AM
-- Server version: 10.0.23-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ie95`
--

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'تیراندازی'),
(2, 'اول شخص'),
(3, 'ورزشی'),
(4, 'اکشن'),
(5, 'سوم شخص'),
(6, 'فکری'),
(7, 'نقش آفرینی'),
(8, 'استراتژیک'),
(9, 'ماجراجویی');

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `player_id`, `game_id`, `rate`, `date`, `text`) VALUES
(1, 1, 1, '4.0', '2016-12-06 12:16:55', 'یک بازی ماجراجویی جذاب :)'),
(2, 7, 1, '5.0', '2016-12-06 12:16:55', 'فوق العاده'),
(3, 5, 1, '4.0', '2016-12-06 12:16:55', 'فوق العاده'),
(4, 10, 1, '5.0', '2016-12-06 12:16:55', 'باور نکردنی بود'),
(5, 3, 1, '1.0', '2016-12-06 12:16:55', 'افتضاح بود'),
(8, 4, 2, '4.0', '2016-12-06 21:44:23', 'بدک نبود!');

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `game_id`, `title`, `views`, `url`, `type`) VALUES
(1, 1, 'تریلر Last Guardian', 15, 'http://www.gamespot.com/videos/embed/6425430/', '1'),
(2, 1, 'Last Guardian', 5, 'http://static1.gamespot.com/uploads/scale_super/1197/11970954/2886481-tlg_e315_04.jpg', '0'),
(3, 1, 'Last Guardian', 36, 'http://static4.gamespot.com/uploads/scale_super/1197/11970954/2886480-tlg_e315_03.jpg', '0'),
(4, 1, 'Last Guardian', 55, 'http://static3.gamespot.com/uploads/original/mig/7/8/4/7/1667847-952634_20110302_003.jpg', '0'),
(5, 1, 'Last Guardian', 74, 'http://static3.gamespot.com/uploads/original/mig/6/1/9/5/1566195-952634_20100916_002.jpg', '0'),
(6, 2, 'بازی dishonored', 52, 'http://cdn.zoomg.ir/2016/11/a68e3bbc-fa7e-46cc-9f15-8c5b060fc1b0.jpg', '0'),
(7, 2, 'بازی dishonored', 6, 'http://cdn.zoomg.ir/2016/11/62b711a4-fa05-4c4f-a2b0-dc2ed44a18d6.jpg', '0'),
(8, 2, 'صحنه‌ای از بازی dishonored', 20, 'http://cdn.zoomg.ir/2016/11/d4fe9008-d951-42ac-b897-ffaeb3229599.jpg', '0'),
(9, 2, 'تریلر بازی Dishonored', 0, 'http://as4.tabriz.asset.aparat.com/aparat-video/33599344cedadecf865082b9c469cc6f5900322-360p__48466.mp4', '1');

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `title`, `abstract`, `info`, `big_image`, `small_image`) VALUES
(1, 'بازی The Last Guardian', 'هفت سال انتظار برای انتشار یک بازی که روند ساختش فراز و نشیب‌های بسیاری از سر گذارند اصلاً اتفاق رایجی در دنیای بازی‌های ویدیویی نیست. اما «آخرین نگهبان» هم یک بازی معمولی نیست...', '<p>هفت سال انتظار برای انتشار یک بازی که روند ساختش فراز و نشیب&zwnj;های بسیاری از سر گذارند اصلاً اتفاق رایجی در دنیای بازی&zwnj;های ویدیویی نیست. اما «آخرین نگهبان» هم یک بازی معمولی نیست، کافیست نگاهی به آثار پیشین سازندگان آن بیاندازیم تا ببینیم آن&zwnj;ها چه دنیاهایی خلق کرده&zwnj;اند. استودیوی&zwnj;های جن&zwnj;دیزاین و ژاپن استودیو به رهبری فومیتو اوئدا، بار دیگری اثری خلق کردند که تنها مشابهانش را در بازی&zwnj;های گذشته&zwnj;ش خودشان می&zwnj;تواند پیدا کرد. بن&zwnj;مایه&zwnj;ی بازی رابطه&zwnj;ی غیرمعمول پسر بچه و موجودی فرازمینی است که در طول آشنایی با یکدیگر، ماجراهای زیادی از سر می&zwnj;گذارنند.</p><p>اما شاید حالا که بازی منتشر شده، مهم&zwnj;ترین خبر در مورد بازی نظر منتقدین نسبت به بازی باشد. با توجه به نمره&zwnj;های منتشر شده، با یک بازی شاخص طرف هستیم که البته بازه&zwnj;ی نمرات از ۴ تا ۱۰ را در بر می&zwnj;گیرد. اینطور که از ابتدا هم به نظر می&zwnj;رسید، The Last Guardian یک بازی کاملاً سلیقه&zwnj;ای است که هرکسی نمی&zwnj;تواند با آن ارتباط برقرار کند. منتقدین در مجموع اتمسفر و دنیای بازی، شخصیت&zwnj;پردازی و گرافیک هنری بازی را تحسین کرده&zwnj;اند و از مشکلات فنی مانند کنترل دوربین نالیده&zwnj;اند. در ادامه می&zwnj;توانید خلاصه&zwnj;ی نقد چند وبسایت معتبر بازی&zwnj;های رایانه&zwnj;ای را مطالعه کنید و البته بررسی ویدیویی و متنی زومجی از The Last Guardian را هم هفته&zwnj;ی آینده از دست ندهید.</p><h3>The Last Guardian</h3><ul><li><strong><strong>سازنده: </strong></strong>جن&zwnj;دیزاین، ژاپن استودیو</li><li><strong><strong><strong>سبک: </strong></strong></strong>ماجراجویی</li><li><strong><strong>پلتفرم: </strong></strong>پلی&zwnj;استیشن 4<strong><strong><br></strong></strong></li><li><strong>تاریخ انتشار:</strong> ۱۶ آذر</li></ul><p><img src="http://cdn.zoomg.ir/2016/11/7b62a451-3ae4-46ec-b7f0-75a503cd26ea.jpg" alt="the last guardian"></p><h2>', 'http://cdn.zoomg.ir/2016/11/7b62a451-3ae4-46ec-b7f0-75a503cd26ea.jpg', 'http://cdn.zoomg.ir/2016/11/7b62a451-3ae4-46ec-b7f0-75a503cd26ea.jpg'),
(2, 'بازی Dishonored 2', 'Dishonored 2 مثل قسمت اولش بازی بی‌عیب و نقصی نیست، اما ویژگی‌های خوب بازی آن‌قدر بیشتر و شگفت‌انگیزتر هستند که آن را در جایگاه منحصربه‌فردی در صنعت بازی‌های ویدیویی این روزها قرار می‌دهند. وقتی Dishonored در سال ۲۰۱۲ با الهام از بازی‌های اول شخص مخفی‌کاری اولد-اسکول ساخته شد، کسانی که از اکشن‌‌های سرراست، بی‌چالش و تکراری تیر و طایفه‌ی ندای وظیفه خسته شده بودند، ناگهان با بازی‌ای روبه‌رو شدند که تقریبا وجودش در این دور و زمانه دسته‌کمی از معجزه نداشت. ', '<p>حقیقت این است که سابقه نشان داده مهم نیست چقدر بازی&zwnj;تان عجیب و غریب و تازه و چالش&zwnj;برانگیز است، فقط کافی است کارتان را به درستی انجام داده باشید، تا حتی پای یکی از وحشتناک&zwnj;ترین بازی&zwnj;های روز از لحاظ درجه&zwnj;ی سختی مثل دارک سولزها (Dark Souls) هم به جریان اصلی باز شود. وقتی پاش بیافتد، هیچ&zwnj;کس به اندازه&zwnj;ی گیمرها هوای بازیسازها را ندارد. جای سختی طاقت&zwnj;فرسا اما لذت&zwnj;بخش دارک سولز را با مخفی&zwnj;کاری&zwnj;های زیاد اما سرگرم&zwnj;کننده عوض کنید تا به Dishonored برسید. مخفی&zwnj;کاری برای خیلی از ما مساوی با یک&zwnj;عالمه صبر کردن، دندان روی جگر گذاشتن و نهایتا حوصله&zwnj; سر رفتن است. به خاطر همین است که دیگر بازی مخفی&zwnj;کاری واقعی نداریم و همه&zwnj;چیز به&zwnj;طرز احمقانه&zwnj;ای سرراست شده است و به خاطر همین است که سر و ته مراحل مخفی&zwnj;کاری بازی&zwnj;ها در عرض چند دقیقه به هم می&zwnj;آید. اما Dishonored تجربه&zwnj;ی واقعی مخفی&zwnj;کاری بود. محیط&zwnj;ها آن&zwnj;قدر بزرگ و پیچیده و قابلیت&zwnj;های ماوراطبیعه و مبارزه&zwnj;&zwnj;ای شخصیت اصلی آ&zwnj;ن&zwnj;قدر متنوع و نوآورانه بودند که مخفی&zwnj;کاری را به کاری حقیقا هیجان&zwnj;انگیز تبدیل کرده بود. به خاطر همین بود که حتی کسانی که در حالت عادی حوصله&zwnj;ی مخفی&zwnj;کاری ندارند Dishonored را بازی می&zwnj;کردند و این&zwnj;طوری قسمت دوم این بازی در حالی عرضه شد که دیگر یک بازی بی&zwnj;سروصدا نبود، بلکه بتسدا آن را به عنوان یک بلاک&zwnj;باستر تمام&zwnj;عیار پاییزی عرضه کرد.<div class="pullquote larticle">Dishonored 2 تمام ویژگی&zwnj;هایی که بازی اول را متفاوت و عمیق کرده بود را در خود دارد</div><p><p>Dishonored 2 تمام ویژگی&zwnj;هایی که بازی اول را متفاوت و عمیق کرده و تمام ضعف&zwnj;هایی که جلوی بازی اول را از تبدیل شدن به یک اثر بدون افسوس&zwnj; گرفته بود را در خود دارد. حالا اما همه&zwnj;چیز جذاب&zwnj;تر و مهندسی&zwnj;شده&zwnj;تر احساس می&zwnj;شود و مهم&zwnj;تر از همه استودیوی آرکین بازی&zwnj;ای ساخته است که نشان می&zwnj;دهد چیزی که بازی&zwnj;های ویدیویی را به مدیوم منحصربه&zwnj;فردی تبدیل می&zwnj;کند و چیزی که&nbsp;نسل بعدی را تعریف می&zwnj;کند، گرافیک&zwnj;های سرسام&zwnj;آور نیست، بلکه عنصر تعامل و گیم&zwnj;پلی است. اگر تعریف شما مثل من از بازی&zwnj;های ویدیویی پیشرفته چیزی بیشتر از کیفیت بالای سیبیل کاراکترها است، Dishonored 2 بازی شماست.<p>مهم&zwnj;ترین چیزی که در طول بازی کردن Dishonored 2 متوجه شدم این بود که فرو رفتن در قالب یک قاتل خاموش، خیلی به جراحی مغز و قلب شبیه است. آره، شاید این بهترین چیزی است که می&zwnj;توان برای توصیف تجربه&zwnj;ی Dishonored 2 گفت: حساسیتِ غرق&zwnj;شدن در یک ماموریت طولانی و خطرناک، مثل ساعت&zwnj;ها ایستادن در اتاق عمل برای جراحی می&zwnj;ماند. چند وقت پیش پژوهشگران گزارشی منتشر کردند که نشان می&zwnj;داد گیمرها جراح&zwnj;های ماهرتر و بادقت&zwnj;تری می&zwnj;شوند. در هنگام بازی کردن Dishonored 2 احساس می&zwnj;کردم جراحی هستم که باید با ابزارهای مختلف و ریز و درشتی که در اختیار دارم، یک ماموریت بسیار حساس، مثل برداشتن یک غده&zwnj;ی مغزی (ترور یک کودتاچی شرور) را عملی کنم.<p>همان&zwnj;طور که یک جراح باید برای ساعت&zwnj;ها تک&zwnj;تک حرکاتش را با دقت تمام انجام دهد، اعصاب قوی&zwnj;ای داشته باشد، آماده&zwnj;ی تصمیم&zwnj;گیری&zwnj;های صدم&zwnj;ثانیه&zwnj;ای باشد و هماهنگی نزدیکی بین ذهن و انگشتانش داشته باشد، من هم در هنگام خزیدن به عنوان یک قاتلِ حرفه&zwnj;ای در خیابان&zwnj;ها و پشت&zwnj;بام&zwnj;های شهر، برای اینکه به تمیزترین شکل ممکن خودم را به هدفم برسانم، باید تمام این ویژگی&zwnj;ها را می&zwnj;داشتم یا در طول بازی و تمرین به آنها دست پیدا می&zwnj;کردم. تنها تفاوت بازی کردن Dishonored 2 و جراحی این است که اگر برداشتن یک تومور مغزی معمولا یک راه&zwnj;حل عالی برای موفقیت دارد، در Dishonored 2 سازندگان این امکان را بهتان می&zwnj;دهند تا راه&zwnj;حل خودتان را پیدا کنید و با خلاقیت خودتان و با وجود تمام توانایی&zwnj;ها و محدودیت&zwnj;هایی که بازی جلوی رویتان قرار می&zwnj;دهد گلیم خودتان را هرطوری که خواستید از آب بیرون بکشید. این یعنی بعضی&zwnj;وقت&zwnj;ها می&zwnj;توانید بی&zwnj;خیال درآوردن ادای یک قاتل نامرئی شوید و برای حل کردن مشکلاتتان به خشونت و خون و خونریزی روی بیاورید و جوی آب خیابان&zwnj;ها را با خون دشمنانتان قرمز کنید.<p class=midmargin><img src=http://cdn.zoomg.ir/2016/11/81f0d840-b4c3-4566-b2e7-2e58195096b6.jpg alt=""><p>بازی&zwnj;کننده&zwnj;ها در قسمت دوم در نقش کوروو آتانو، قهرمان لال قسمت اول که خوشبختانه حالا زبان باز کرده قرار می&zwnj;گیرند یا می&zwnj;توانند امیلی کالدوین، ملکه&zwnj;ی دان&zwnj;وال و دختر کوروو را به عنوان شخصیت اصلی انتخاب کنند. ماجراهای این قسمت ۱۵ سال بعد از قسمت اول و از جایی شروع می&zwnj;شود که یک جادوگر شرور با کودتا، تاج و تخت امیلی را از او می&zwnj;گیرد. از اینجا ماجراجویی خونین &zwnj;بازی&zwnj;کننده برای فرار از دان&zwnj;وال و سفر به شهر جنوبی کارناکا برای برنامه&zwnj;ریزی انتقامش آغاز می&zwnj;شود. در هر مرحله بازی&zwnj;کننده وظیفه&zwnj;ی ترور و حذف کردن یکی از چرخ&zwnj;دهنده&zwnj;های قدرتمند کودتا را برعهده دارد تا بالاخره امیلی را به تاج و تختِ به حقش برگرداند.<p>اولین نکته&zwnj;ی شگفت&zwnj;انگیز Dishonored 2 این است که بله، استودیوی آرکین باری دیگر در ارائه&zwnj;ی جنس خاصی از تجربه&zwnj;ی اکشن/مخفی&zwnj;کاری که این روزها نمونه&zwnj;اش در جای دیگری یافت نمی&zwnj;شود موفق شده است و این موفقیت از دفعه&zwnj;ی اول ارزشمندتر است. چرا؟ چون بازی اول طوری کامل بود که به نظر نمی&zwnj;رسید جای پیشرفت داشته باشد. قسمت اول Dishonored منهای داستانگویی، در زمینه&zwnj;ی طراحی گیم&zwnj;پلی&zwnj;ای خارق&zwnj;العاده و ساخت دنیایی اوریجینال و غنی هیچ کم&zwnj;و&zwnj;کسری نداشت. بنابراین سوال این بود که سازندگان چگونه می&zwnj;خواهند روی دست خودشان بلند شوند. آیا قسمت دوم تکرار ویژگی&zwnj;&zwnj;های قسمت اول در محیطی تازه است یا سازندگان موفق می&zwnj;شوند دنباله&zwnj;ای عرضه کنند که روی پای خودش بیاستد و قابلیت&zwnj;های بازی اول را گسترش بدهد؟ خب، هنوز یکی-دو ساعت از بازی نگذشته بود که جواب مشخص شد. Dishonored 2 مثال تحسین&zwnj;برانگیز و معرکه&zwnj;ای از شکل درست دنباله&zwnj;سازی است. طبیعتا بازی دوم یک مجموعه نباید در حد قسمت اول تازه و غیرمنتظره باشد، اما یکی از اولین شگفتی&zwnj;های Dishonored 2 این است که اگرچه بازی به اندازه&zwnj;ی قسمت اول انقلابی نیست، اما سازندگان آن&zwnj;قدر روی صیقل دادن استخوان&zwnj;بندی بازی اول وقت گذاشته&zwnj;اند که بازی فوق&zwnj;العاده&zwnj;ی قبلی&zwnj;شان را به چیزی بی&zwnj;نقص&zwnj;تر و عمیق&zwnj;تر تبدیل کرده&zwnj;اند که اگر قبل از این از من می&zwnj;پرسیدید، می&zwnj;گفتم که چنین کاری امکان ندارد.<p class=midmargin><img src=http://cdn.zoomg.ir/2016/11/503bf415-c222-41db-9ae0-5f71a9d2f3b4.jpg alt=""><p>شما را نمی&zwnj;دانم، اما من هیچ چیزی را با یک بخش تک&zwnj;نفره&zwnj;ی درجه&zwnj;یک عوض نمی&zwnj;کنم و عاشق بازی&zwnj;هایی هستم که تمرکز اصلی&zwnj;شان را بر روی طراحی یک کمپین داستانی می&zwnj;گذارند. چون مهم نیست در فلان بازی تیراندازی چند نفر به&zwnj;صورت آنلاین به جان هم می&zwnj;افتند، چیزی که جایگاه بازی&zwnj;های ویدیویی را در میان مدیوم&zwnj;های شناخته&zwnj;شده&zwnj;تر باز می&zwnj;کند و چیزی که قابلیت&zwnj;های کشف&zwnj;نشده و منحصربه&zwnj;فرد بازی&zwnj;ها را فاش می&zwnj;کند، بخش داستانی آنها است. Dishonored 2 یکی از بازی&zwnj;هایی است که مطمئن باشید در آینده خیلی درباره&zwnj;ی جادوی کارگردانی مرحله&zwnj;اش خواهید شنید. این روزها تمام فکر و ذکر ناشرها و استودیوها به ارائه&zwnj;ی گرافیک&zwnj;های فک&zwnj;اندازتر و ساخت کنسول&zwnj;های قوی&zwnj;تر خلاصه شده است. یک روز نمی&zwnj;شود که خبری از دستیابی فلان بازی به فلان فریم ریت و قابلیت اجرای فلان بازی با رزولوشن 4K منتشر نشود. همه&zwnj;چیز به تکنیک خلاصه شده و خبری از صحبت درباره&zwnj;ی پیشبرد هنر طراحی یک بازی نیست.<p>استودیوی آرکین با قسمت اول Dishonored یکی از پیشگام&zwnj;ترین بازی&zwnj;هایی آن روزها در زمینه&zwnj;ی گیم&zwnj;پلی و اتمسفرسازی را منتشر کرد و چنین چیزی درباره&zwnj;ی Dishonored 2 هم صدق می&zwnj;کند. این بازی نشان می&zwnj;دهد که کارگردانی گیم&zwnj;پلی و طراحی مرحله یعنی چه و چرا ساختن مرحله&zwnj;ی سندباکسی که بازی&zwnj;کننده می&zwnj;تواند به ده&zwnj;ها نوع مختلف آن را به اتمام برساند کار بزرگی است. Dishonored 2 مثال بارزی از ساخت گیم&zwnj;پلی منسجمی سرشار از مکانیک&zwnj;ها و قابلیت&zwnj;های هیجان&zwnj;انگیز است که همه برای دادن آزادی عمل مطلق به بازی&zwnj;کننده طراحی شده&zwnj;اند. اشتباه نکنید، Dishonored 2 یکی از آن بازی&zwnj;هایی نیست که آزادی عملشان به دو گزینه&zwnj;ی اکشن و مخفی&zwnj;کاری خلاصه می&zwnj;شوند. در Dishonored 2 تعداد انتخاب&zwnj;ها و نوع طراحی مراحل آن&zwnj;قدر گسترده و پیچیده است که حتی اگر خودتان را هم بکشید، نمی&zwnj;توانید یک مرحله را دوبار به یک شکل به اتمام برسانید. شاید این تعریف برای کسانی که با مجموعه&zwnj;ی Dishonored آشنا نیستند خیلی گیچ&zwnj;کننده به نظر برسد، اما هنر کار سازندگان همین&zwnj;جاست. آنها موفق شده&zwnj;اند کاری کنند که بازی&zwnj;کننده&zwnj;ها با وجود محیط&zwnj;های وسیع و پیچیده&zwnj;ی بازی، هرگز گیج و گم نشوند.', 'http://cdn.zoomg.ir/2016/11/bf222635-75e2-4c6e-8635-9e5415dc9332.jpg', 'http://cdn.zoomg.ir/2016/11/bf222635-75e2-4c6e-8635-9e5415dc9332.jpg');

--
-- Dumping data for table `games_categories`
--

INSERT INTO `games_categories` (`game_id`, `category_id`) VALUES
(1, 4),
(1, 9),
(2, 1),
(2, 2),
(2, 4);

--
-- Dumping data for table `leaderboard`
--

INSERT INTO `leaderboard` (`game_id`, `player_id`, `level`, `score`, `displacement`) VALUES
(1, 1, 12, 10000, 1),
(1, 2, 3, 120, -2),
(1, 3, 41, 15204, 5),
(1, 4, 6, 1540, 1),
(1, 5, 6, 1535, -1),
(1, 6, 9, 2000, 3),
(1, 7, 2, 250, -5),
(1, 8, 1, 10, -5),
(1, 9, 4, 200, -3),
(1, 10, 7, 6000, 2);

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `avatar`) VALUES
(1, 'جو', 'http://semantic-ui.com/images/avatar/small/joe.jpg'),
(2, 'استیو', 'http://semantic-ui.com/images/avatar/small/steve.jpg'),
(3, 'هلن', 'http://semantic-ui.com/images/avatar/small/helen.jpg'),
(4, 'کریستین', 'http://semantic-ui.com/images/avatar/small/christian.jpg'),
(5, 'زو', 'http://semantic-ui.com/images/avatar/small/zoe.jpg'),
(6, 'ورونیکا', 'http://semantic-ui.com/images/avatar/small/veronika.jpg'),
(7, 'الیوت', 'http://semantic-ui.com/images/avatar/small/elliot.jpg'),
(8, 'نان', 'http://semantic-ui.com/images/avatar/small/nan.jpg'),
(9, 'آدرین', 'http://semantic-ui.com/images/avatar/small/ade.jpg'),
(10, 'استیو', 'http://semantic-ui.com/images/avatar/small/stevie.jpg');

--
-- Dumping data for table `related_games`
--

INSERT INTO `related_games` (`game_id`, `related_game`) VALUES
(1, 2),
(2, 1);

--
-- Dumping data for table `tutorials`
--

INSERT INTO `tutorials` (`id`, `game_id`, `title`, `date`) VALUES
(1, 1, 'راهنمای بازی The Last Guardian', '2016-12-06 16:04:41'),
(2, 2, 'راهنمای بازی Dishonored 2', '2016-12-06 16:04:41');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
