<noindex>
<div id="landingpage">
	<center>
	<div class="slogantop">Виникли проблеми по дому,<br>хочеш розпочати ремонт, але<br>не знаеш де знайти гідного майстра?</div>
	<img class="mainlogo" src="/images/mainlogo.png">
	<div class="slogantop">Ми об’єднуємо вас<br>та ваших домашніх майстрів</div>
	<div class="btnblock">

		<button type="button" class="regbtn btn" data-toggle="modal" data-target="#myModal">Зареєструватися</button>
	 
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Registration</h4>
			  </div>
			  <form action="/profile?from=registration" method="post">
				<div class="modal-body">
				  <div class="form-group">
					<label for="Email">Email address</label>
					<input type="email" class="form-control" name="email" placeholder="Email">
				    <input type="submit" class="btn btn-primary" value="Create account">
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
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel2">Sign in</h4>
			  </div>
			  <form action="/profile?from=signin" method="post">
				<div class="modal-body">
				  <div class="form-group">
					<label for="Email">Email address</label>
					<input type="email" class="form-control" name="email" placeholder="Email">
				    <label for="Password">Password</label>
					<input type="password" class="form-control" name="password" placeholder="Password">
					<input type="submit" class="btn btn-primary" value="Sign in">
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