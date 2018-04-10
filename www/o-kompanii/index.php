<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("page_class", "content");
$APPLICATION->SetTitle("О компании");
?><?if($_GET['DEV'] != 'Y'){?> <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"company",
	Array(
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "Y",
		"IBLOCK_ID" => "9",
		"IBLOCK_TYPE" => "novosti",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array("NAME","DESCRIPTION","PICTURE",""),
		"SECTION_ID" => "",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array("UF_TEMPLATE_VIEW",""),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "2",
		"VIEW_MODE" => "LINE"
	)
);?>
	<img src="<?=SITE_TEMPLATE_PATH;?>/assets/img/cups1.jpg" alt="" style="max-width: 600px">
<?}else{?>
	<style>
		.diplom{
			display: flex;
			align-items: flex-start;
			justify-content: space-between;
			flex-direction: row;
			flex-wrap: wrap;
		}
		.diplom a{
			display: block;
			width: 180px;
			margin:5px;
		}
		.diplom img{
			width: 180px;
		}
		.main-content__wrap .main-content_block .digits_block .digit_item .description{
			min-height: 80px;
		}
		.history img{
			width: 250px;
		}
	</style> <br>
<p>
	 Добро пожаловать в мир чистоты! Вас приветствует «Европейская химчистка Apetta»!
</p>
<p>
 <br>
</p>
<p>
	 15 апреля 2017 года нам исполнилось двадцать лет. В 1997 году Apetta начиналась с единственного цеха, открывшегося в Приморском районе Санкт-Петербурга, а сегодня «Европейская химчистка Apetta» - это целая сеть, которая чистит, стирает и ремонтирует в общей сложности более миллиона вещей в год! Нам доверяют жители Санкт-Петербурга, Москвы и Московской области, Ростова-на-Дону – и это только начало!
</p>
<p>
 <br>
</p>
<p>
 <img width="98%" src="/bitrix/templates/apetta/assets/img/corp/zeh_german.jpg" height="100%"><br>
</p>
<h3>
История компании </h3>
<p>
	 Учредители компании, Лариса Минаева и Елена Сопина, открывали первый цех в конце девяностых, когда сфера услуг была в плачевном состоянии: бытовые услуги горожанам оказывались в минимальном объеме, а их качество было условным. Поэтому химчистку европейского уровня, оснащенную самым современным итальянским оборудованием Renzacci, работающую по стандартам цивилизованного общества, жители Петербурга сразу оценили по достоинству: несмотря на единственный цех на Планерной, 47, ее посещали клиенты из всех уголков города.
</p>
<p>
 <br>
</p>
<p>
	 Уже через три года учредители начали развивать сеть, чтобы горожанам было удобно пользоваться услугами химчистки недалеко от дома или работы.
</p>
<p>
 <br>
</p>
<p>
	 В 2002 году новый цех химчистки открылся в гипермаркете «О'КЕЙ», и с этого момента рост сети стал стремительным – цехи открывались один за другим в сети «О'КЕЙ» и других торговых центрах. А в 2006 году «Европейская химчистка Apetta» вышла в регионы – первый цех, работающий по стандартам сети, был открыт в Ростове-на-Дону. Следующим пунктом наступления Apetta стали Москва и Московская область: в 2009 году открылся первый региональный цех в Ногинске.
</p>
<div class="img_block history" style="margin-top: 15px">
 <img src="/bitrix/templates/apetta/assets/img/corp/о компании_1.jpg" height="168"> <img src="/bitrix/templates/apetta/assets/img/corp/10-26380-1183021-L.jpg" height="168"> <img src="/bitrix/templates/apetta/assets/img/corp/10-26380-1183019-L.jpg" height="168">
</div>
<p>
</p>
<h3>
Сегодня «Европейская химчистка Apetta» - это: </h3>
<div class="main-content__wrap">
	<div class="main-content_block">
		<div class="digits_block">
			<div class="digit_item" style="width: 127px">
 <img width="60" src="/bitrix/templates/apetta//assets/img/corp/country.jpg " alt="">
				<div class="description">
					 26 производственных цеха в 3-х городах России
				</div>
			</div>
			<div class="digit_item" style="width: 127px">
 <img width="60" src="/bitrix/templates/apetta//assets/img/corp/15re_house.svg " alt="">
				<div class="description">
					 6 приемных пунктов в Санкт-Петербурге и 8 в Москве и Ростове-на-Дону
				</div>
			</div>
			<div class="digit_item" style="width: 127px">
 <img width="60" src="/bitrix/templates/apetta//assets/img/corp/14ht_washingmachine.svg " alt="">
				<div class="description">
					 Современная фабрика-прачечная
				</div>
			</div>
			<div class="digit_item" style="width: 127px">
 <img width="60" src="/bitrix/templates/apetta//assets/img/corp/3st_van.svg " alt="">
				<div class="description">
					 Экипажи выездных услуг
				</div>
			</div>
		</div>
	</div>
</div>
<h3>Мы оказываем квалифицированную помощь вашим вещам!</h3>
<p>
	 «Европейская химчистка Apetta» придет на помощь, если вам нужно постирать, почистить, освежить, отремонтировать вещи – будь то повседневная одежда или деликатные ткани, меха, кожа или замша, шторы, текстиль или ковры, экипировка, театральные костюмы или спецодежда.
</p>
<p>
 <br>
</p>
<p>
	 Мы не собираемся сбавлять обороты – напротив, у нас большие планы по развитию сети в других регионах России. Позиции лидера в своей сфере мы сохраняем благодаря высоким технологиям, особому подходу к нашим клиентам и основным преимуществам:
</p>
<p>
 <br>
</p>
<p>
</p>
<ul>
	<li>
	<p>
		 профессиональное оборудование: для обработки ваших вещей в цехах и на фабрике-прачечной мы используем современное оборудование производства Германии
	</p>
 </li>
	<li>
	<p>
		 современные очистители: специальные средства последнего поколения позволяют удалять даже самые сложные загрязнения и бережно очищать самые деликатные ткани
	</p>
 </li>
	<li>
	<p>
		 команда: опыт и высокая квалификация наших сотрудников позволяют нам гарантировать, что ваш заказ будет выполнен безупречно и точно в срок.
	</p>
 </li>
</ul>
<div>
 <br>
</div>
<div class="img_block item3">
 <img src="/bitrix/templates/apetta/assets/img/corp/10-26380-1183023-L.jpg"><img src="/upload/2.jpg"><img src="/upload/apettaru_20150417_16.jpg" height="183">
</div>
 <br>
<h3>
Мы освобождаем вас от забот </h3>
<p>
	 Каждый из нас в обычной жизни имеет дело с сотнями вещей – повседневной одеждой и праздничными нарядами, мехами и кожей, униформой и экипировкой, домашним текстилем, шторами, коврами, мягкими игрушками – перечислять можно долго. Все эти вещи регулярно нужно освежать, избавлять от пыли или спасать от всевозможных загрязнений.
</p>
<p>
 <br>
</p>
<p>
	 Далеко не всё можно постирать дома – эта процедура часто требует времени, усилий, специальных средств и технологий, недоступных в обычном быту. Самый цивилизованный (и самый простой!) выход – передать свои заботы профессионалам. Все наши ресурсы - опыт, технологии, оборудование, спецсредства, команда – к вашим услугам!
</p>
<p>
 <br>
</p>
<p>
	 Если вы закажете выездную услугу, мы готовы избавить вас даже от таких хлопот, как снятие и развешивание штор! Мы сохраняем ваши силы и хорошее настроение, чтобы вы занимались любимыми делами и семьей.
</p>
<p>
 <br>
</p>
<h3>Мы бережем ваше время</h3>
 <br>
<p>
	 Мы хорошо знаем, как ценно для вас время, поэтому делаем все, чтобы экономить его на всех этапах вашего заказа.
</p>
<p>
 <br>
</p>
<p>
 <b>SMS-оповещение</b>
</p>
<p>
	 Выполнив ваш заказ, мы отправим вам SMS-уведомление о том, что вы можете получить свои вещи. Вам не нужно беспокоиться и тратить время на звонки – просто дождитесь SMS и приезжайте в химчистку за готовыми вещами.
</p>
<p>
 <br>
</p>
<p>
 <b>Чистка во время шопинга</b>
</p>
<p>
	 Множество наших пунктов расположены на территории гипермаркетов и торговых центров. Вы можете воспользоваться услугой «Срочный заказ» - и пока вы будете заниматься покупками, мы почистим, постираем и отремонтируем ваши вещи. Современное оборудование и высокие технологии позволяют нам сократить время обработки без потери качества: чистка или стирка занимают 1 час, ремонт – 20 минут. Закончив шопинг, вы получите готовые вещи из химчистки!
</p>
<p>
 <br>
</p>
<p>
 <b>Нет времени на поездку в химчистку? Закажите выездную услугу!</b>
</p>
<p>
	 Мы можем забрать ваши вещи в чистку или ремонт из дома или офиса и доставить их назад чистыми и отремонтированными. Для этого вам достаточно заказать услугу по телефону, или в чате на нашем сайте, или заполнив форму «Заказ в один клик».
</p>
<p>
 <br>
</p>
<p>
 <b>Мы используем чистые технологии</b>
</p>
<p>
	 Благодаря партнерам – Koblenz&amp;Partner и «Текскепро» – в нашем распоряжении самые свежие разработки в области чистящих и моющих средств. Мы используем экологичные и безопасные составы, которые не разрушают окружающую среду и бережно работают даже с самыми деликатными тканями.
</p>
<p>
	 Один из наших хитов – услуга озонирования – тоже относится к «чистым» технологиям, потому что позволяет уничтожать не только запахи, но и все виды бактерий и микроорганизмов при помощи обработки чистым озоном.
</p>
<p>
 <br>
</p>
<p>
 <b>Корпоративные и частные заказы</b>
</p>
<p>
	 Мы работаем и с частными, и с большими корпоративными заказами. Среди наших постоянных клиентов – компании H&amp;M, Mercedes-benz, ресторанные сети и крупнейшие сети гостиниц – Radisson, Kempinski, ParkInn и многие другие. У каждого корпоративного клиента в силу особенностей его сферы свои требования, поэтому мы используем индивидуальный подход к каждому, предлагая самые удобные условия.
</p>
<p>
	 Очень важное для частных клиентов примечание: белье корпоративных клиентов обрабатывается в отдельном цехе, с использованием специального оборудования. Мы стираем белье каждого клиента индивидуально – это наше правило.
</p>
<p>
 <br>
</p>
<h3>География присутствия<br>
 </h3>
<p>
	 Мы продолжаем развиваться даже в кризисные времена, и сегодня по составу услуг и размеру сети в Санкт-Петербурге мы впереди всех коллег-конкурентов.
</p>
<div class="questions-answers__wrapper">
	<div class="questions-answers__content">
		<div id="questions-answers__content_block-all" class="content_block">
			<ul class="accordion">
				<li> <a href="">Санкт-Петербург – 27 адресов</a>
				<p>
					 Сеть гипермаркетов «О'КЕЙ» - 18 химчисток
				</p>
				<p>
					 Сеть гипермаркетов Prisma - 3 химчистки
				</p>
				<p>
					 Гипермаркет «Карусель» - 1 химчистка
				</p>
				<p>
					 ТК «Невский центр» - 1 химчистка
				</p>
				<p>
					 Другие торговые центры - 4 химчистки
				</p>
				<p>
 <a href="/nashi-adresa/">Полный список адресов</a>
				</p>
 </li>
				<hr>
				<li> <a href="">Москва и Московская область – 6 адресов </a>
				<p>
					 Москва, гипермаркет «О'КЕЙ», Путилково, 71 км МКАД
				</p>
				<p>
					 Москва, ТЦ «Ленинский 101», пр. Ленинский, 101
				</p>
				<p>
					 Москва, ТЦ «Мандарин», Пятницкое шоссе, 39
				</p>
				<p>
					 Ногинск, гипермаркет «О'КЕЙ»
				</p>
				<p>
					 Ногинск, ул. Ак. Королева, 13, стр. 1
				</p>
				<p>
					 Химки, квартал Клязьма, Набережный проезд, 27
				</p>
 </li>
				<hr>
				<li> <a href="">Ростов-на-Дону - 5 адресов</a>
				<p>
					 Сеть гипермаркетов «О'КЕЙ» - 2 химчистки
				</p>
				<p>
					 ТК «Горизонт»
				</p>
				<p>
					 ТЦ «МИР»
				</p>
				<p>
					 Wolrd Class, ул. Красноармейская, 133/117, 1-й эт.
				</p>
 </li>
				<hr>
			</ul>
		</div>
	</div>
</div>
<h2> Наши дипломы</h2>
<ul>
	<li>Российский торговый Олимп - Главная общественная премия в области торговли, услуг и сервиса. В номинации «Безупречное качество».</li>
	<li>Диплом «За большой вклад в развитие сферы бытового обслуживания населения СПб» выдан комитетом экономического развития, промышленной политики и торговли.</li>
	<li>Диплом «За вклад в развитие сферы бытового обслуживания населения СПб» выдан Ассоциацией химчисток и прачечный 2007 год.</li>
	<li>Диплом 3 степени за 1 место в ежегодном конкурсе «Золотой Гермес» в СПб за 2007 г. В номинации «Лучшая организация по оказанию услуг химической чистки и стирки СПб».</li>
	<li>Диплом 3 степени за 1 место в ежегодном конкурсе «Золотой Гермес» в СПб за 2008 г. В номинации «Лучшая организация по оказанию услуг химической чистки и стирки СПб».</li>
	<li>Диплом 2 степени за 1 место в ежегодном конкурсе «Золотой Гермес» в СПб за 2010 г. В номинации «Лучшая организация по оказанию услуг химической чистки и стирки СПб».</li>
</ul>
<div class="img_block diplom">
 <a href="/bitrix/templates/apetta/assets/img/corp/diplom_1.jpg" class="fancybox"> <img src="/bitrix/templates/apetta/assets/img/corp/diplom_1.jpg"> </a> <a href="/bitrix/templates/apetta/assets/img/corp/diplom_2.jpg" class="fancybox"> <img src="/bitrix/templates/apetta/assets/img/corp/diplom_2.jpg"> </a> <a href="/bitrix/templates/apetta/assets/img/corp/diplom_3.jpg" class="fancybox"> <img src="/bitrix/templates/apetta/assets/img/corp/diplom_3.jpg"> </a> <a href="/bitrix/templates/apetta/assets/img/corp/diplom_4.jpg" class="fancybox"> <img src="/bitrix/templates/apetta/assets/img/corp/diplom_4.jpg"> </a> <a href="/bitrix/templates/apetta/assets/img/corp/diplom_5.jpg" class="fancybox"> <img src="/bitrix/templates/apetta/assets/img/corp/diplom_5.jpg"> </a>
</div>
<h2><br>
 </h2>
<h2>Участие в конкурсах</h2>
<p>
	 2012 год. Городской ежегодный Конкурс «Лучший по профессии» в сфере потребительского рынка Санкт – Петербурга в номинации «Лучший гладильщик».
</p>
<p>
	 Победитель конкурса:
</p>
<ul>
	<li>3 место Андриянова Марина Александровна</li>
</ul>
<p>
	 2011 год. Городской ежегодный Конкурс «Лучший по профессии» в сфере потребительского рынка Санкт – Петербурга в номинации «Лучший гладильщик».
</p>
<p>
	 Победители конкурса:
</p>
<ul>
	<li>1 место Панфилова Светлана Викторовна компания Европейская химчистка Apetta</li>
	<li>3 место Кравченко Елена Георгиевна ОАО «Лотос»</li>
</ul>
<p>
	 2010&nbsp;год.&nbsp;Городской ежегодный Конкурс «Лучший по профессии» в сфере потребительского рынка Санкт – Петербурга в номинации «Лучший аппаратчик».
</p>
<p>
	 Победители конкурса:
</p>
<ul>
	<li>2 место Калкутина Е. В. ООО «Элерон» ; 3 место Дробышевская С.А. ООО «Элерон».</li>
</ul>
<p>
	 2009&nbsp;год.&nbsp;Городской ежегодный Конкурс «Лучший по профессии» в сфере потребительского рынка Санкт – Петербурга в номинации «Лучший аппаратчик».
</p>
<p>
	 Победитель конкурса:
</p>
<ul>
	<li>2 место Садыков Ильдар Шарипович ООО «Монблан».</li>
</ul>
<p>
	 2008&nbsp;год.&nbsp;Городской ежегодный конкурс "Лучший по профессии" в сфере потребительского рынка Санкт-Петербурга в номинации "Лучший приемщик".
</p>
<p>
	 Победитель:
</p>
<ul>
	<li>1 место Маслова Нина Васильевна</li>
</ul>
<p>
	 2007&nbsp;год.&nbsp;Всероссийский конкурс «Лучший приемщик России – 2007» (7 ноября Москва СК «Олимпийский»), в рамках 6-й международной специализированной выставки «Химчистка и Прачечная».
</p>
<p>
	 Победитель:
</p>
<ul>
	<li>Белохвостова Татьяна Николаевна.</li>
</ul>
<p style="text-align: center;">
 <br>
</p>
 <?}?> <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>