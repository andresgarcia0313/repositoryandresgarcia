		<!-- Inicia El Menú -->
		<nav class="navbar navbar-default navbar-inverse" style="margin-bottom: 0px;">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Gestor De Usuarios</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
								Modulos 
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="/usuarios">Usuarios</a></li>
							</ul>
						</li>
					</ul>			
					<?php
					if(isset($_SESSION)){
						include_once 'menusesionusuario.php';
					}
					else{
						include_once 'login.php';
					}				
					?>
				</div>
			</div>
		</nav>
		<!-- Fin Menú-->
