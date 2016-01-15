<noindex>
<div class="main">
	<center>
	<img class="mainlogo" src="/images/mainlogo.png">
	<div class="slogantop">Социальная сеть, которая объединяет вас<br>и ваших домашних мастеров</div>
	<p class="margin">Выбери свой город</p>
	
	<?php require_once("ipgeobase/ipgeobase.php");
	$gb = new IPGeoBase();
	$data = $gb->getRecord($_SERVER["REMOTE_ADDR"]);

	$region = $data['region'];
	$city = $data['city'];

	?>
	
	<div class="searchform">
		<input type="text" id="search_from_place" class="search_form" value="<?php echo($city); ?>">
	</div>
	
	<p class="margin">Выберите специализацию, в которой вы ищете мастера</p>
	
	<div class="iconsblock">		
		<div class="icon">
			<a href="#">
				<img class="floatleft" src="/images/santehnik-1.png">
			</a>
			<!--<a href="#">
			<img class="iconhover"  src="/images/santehnik-hover.png">
			</a>-->
			<p class="icontitle">Сантехник</p>						
		</div>
		
		<div class="icon">
			<a href="#">
				<img class="floatleft" src="/images/elektrik-1.png">
			</a>
			<!--<a href="#">
			<img class="iconhover"  src="/images/elektrik-hover.png">
			</a>-->
			<p class="icontitle">Электрик</p>
		</div>
		<div class="icon">
			<a href="#">
				<img class="floatleft" src="/images/mebel-1.png">	
			</a>
			<!--<a href="#">
			<img class="iconhover"  src="/images/mebel-hover.png">
			</a>-->
			<p class="icontitle">Столяр</p>
		</div>	
		<div class="icon">
			<a href="#">
				<img class="floatleft" src="/images/gruzchik-1.png">			
			</a>
			<!--<a href="#">
			<img class="iconhover"  src="/images/gruzchik-hover.png">
			</a>-->
			<p class="icontitle">Грузчик</p>
		</div>			
	</div>
	<br>
	<div class="iconsblock2">
		<div class="icon">
			<a href="#">
				<img class="floatleft" src="/images/remont-1.png">			
			</a>
			<!--<a href="#">
			<img class="iconhover"  src="/images/remont-hover.png">
			</a>-->
			<p class="icontitle">строитель и ремонтник</p>						
		</div>
		
		<div class="icon">
			<a href="#">
				<img class="floatleft" src="/images/technik-1.png">	
			</a>
			<!--<a href="#">
			<img class="iconhover"  src="/images/technik-hover.png">
			</a>-->
			<p class="icontitle">специалист в технике</p>
		</div>
		<div class="icon">
			<a href="#">
				<img class="floatleft" src="/images/myjnachas-1.png">	
			</a>
			<!--<a href="#">
			<img class="iconhover"  src="/images/myjnachas-hover.png">
			</a>-->
			<p class="icontitle">мастер на<br>все руки</p>
		</div>	
	</div>		
	
	<p class="margin">Или, если вы мастер, то <a href="#" data-toggle="modal" data-target="#myModal"><span class="underline">предложить услугу</span></a></p>
	
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<img src="/images/logosmall2.png">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Реєстрація</h4>
			</div>
			  <form action="/profile?from=registration" method="post">
				<div class="modal-body">
				  <div class="form-group">
					<label for="Email">Напишіть вашу поштову скриньку в інтернеті:</label>
					<input type="email" class="form-control" name="email" placeholder="Email">
				    <input type="submit" class="regbtn btn" value="Зареєструватися">
				  </div>
				</div>
			  </form>
			</div>
		  </div>
		</div>

	<div class="videoblock">
		<div class="slogantop">Посмотреть видео</div>
		<a href="#"><img src="/images/play.png"></a>
	</div>	
		<div class="main-content">	
			<div class="container">
				<img src="/images/logosmall2.png">
				<h1>Муж на час</h1>
				<div class="homepage-img"><img src="/images/homepage-img.png" class=""></div>
				<p>Мы - всеукраинская организация, объединяющая всех домашних мастеров на одном сайте!
				Вдохновившись зарубежным опытом, мы создали по настоящему удобный и простой сервис, на котором, всего лишь в два клика решается любая домашняя проблема, а благодаря удобному фильтру, найти нужного специалиста стало еще проще и быстрее.<br>
				Мы стараемся лично проверять каждого мастера, изучаем его резюме и портфолио, для того, чтобы вы могли работать только с наиболее квалифицированными специалистами. Кроме того мы старательно изучаем каждый негативный отзыв, оставленный тому или иному мастеру, для повышения качества предоставляемых им услуг.<br>
				Благодаря нашему сервису стало возможным сэкономить на проведении комплексных ремонтных работ, так как вы лично связываетесь с исполнителем без посредников и третьих лиц. Что безусловно экономит ваше время и деньги.
				Сайт оснащен мобильным приложением для удобства и дополнительной экономии вашего времени!<br>
				Хорошая новость для мастеров! Теперь нет необходимости расклеивать объявления на столбах, которые никто не читает, вы получайте ваших клиентов легко, просто, а главное абсолютно бесплатно прямо из сайта!
				Европейский сервис "Муж на Час" предоставит такую возможность!
				Ну а если вдруг у вас возникли, какие-либо проблемы по дому или Вы хотите сделать ремонт, нужно лишь выбрать специалиста из списка по следующим категориям: <a>сантехник,</a> <a>электрик,</a> <a>столяр (мебельщик),</a> <a>грузчик,</a> <a>строитель и ремонтник,</a> <a>специалист в технике,</a> <a>мастер на все руки</a>
				и сайт сам подберет вам самых лучших домашних мастеров из вашего города. И это далеко не полный список преимуществ, которые отличают "Муж на Час" от других сайтов! Проверьте сами!</p>
			</div>
		</div>
	</center>
	<div class="mobileapp">
		<div class="container">
			<div class="col-md-6">
				<h2>Устанавливайте мобильное приложение "Муж на час"</h2>
				<p>на свой мобильный телефон!</p>
				<div class="appplatform">
					<img src="/images/gplay.png"><img src="/images/appstore.png">
				</div>
			</div>
			<img class="iphone" src="/images/iphone.jpg" art="mobile app">
		</div>
	</div>	
</div>
</noindex>
