<noindex>
<div id="landingpage">
	<center>
	<div class="slogantop">Возникли проблемы по дому,<br>хочешь начать ремонт, но<br>не знаешь где найти хорошего мастера?</div>
	<img class="mainlogo" src="/images/mainlogo.png">
	<div class="slogantop">Социальная сеть, которая объединяет вас<br>и ваших домашних мастеров</div>
	<div class="btnblock">

		<button type="button" class="regbtn btn" data-toggle="modal" data-target="#myModal">Зарегистрироваться</button>
	 
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<img src="/images/logosmall2.png">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Регистрация</h4>
			  </div>
			  <form action="/profile?from=registration" method="post">
				<div class="modal-body">
				  <div class="form-group">
					<label for="Email">Напишите ваш Email</label>
					<input type="email" class="form-control" name="email" placeholder="Email">
					<img src="/images/forreg.jpg"><br>
				    <input type="submit" class="regbtn btn" value="Зарегистрироваться">
				  </div>
				</div>
			  </form>
			</div>
		  </div>
		</div>
		
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
			    <img src="/images/logosmall2.png">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel2">Увійти</h4>
			  </div>
			  <form action="/profile?from=signin" method="post">
				<div class="modal-body">
				  <div class="form-group">
					<!--<label for="Email">Email address</label>-->
					<input type="email" class="form-control" name="email" placeholder="Email">
				    <!--<label for="Password">Password</label>-->
					<input type="password" class="form-control" name="password" placeholder="Password">
					<input type="submit" class="regbtn btn" value="Увійти">
				  </div>
				</div>
			  </form>
			</div>
		  </div>
		</div>
	
	</div>

	<p class="hero">Або <a href="#" data-toggle="modal" data-target="#myModal2">увійти</a>, якщо вже зареєстрований</p>
	</center>
</div>
</noindex>