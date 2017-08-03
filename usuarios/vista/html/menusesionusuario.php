	<!-- Inicia El Menú Sesión-->
	<div class="navbar-right">
	<ul class="nav navbar-nav navbar-rigth">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
				<?php echo $_SESSION['usuario']?>
				<span class="caret">
				</span>
			</a>
			<ul class="dropdown-menu"style="padding: 0px">
				<li class="well well-sm" style="margin: 0px !important;">
					<form class="form" role="form" method="post" action="/usuarios/" accept-charset="UTF-8">
						<div class="form-group">
							<input type="hidden" class="form-control" name="id" value="">
							<input type="hidden" class="form-control" name="formulario" value="usuario">
						</div>
						<div class="form-group text-center">
							<button type="submit" class="btn btn-danger" name="metodo" value="Salir">Salir</button>
						</div>
					</form>
				</li>
			</ul>
		</li>
	</ul>
</div>
<!-- Fin El Menú Sesión-->
