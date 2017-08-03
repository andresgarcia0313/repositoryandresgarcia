	
					<!-- Inicia Login-->
					<div class="navbar-right">
						<ul class="nav navbar-nav navbar-rigth">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
									Acceder
									<span class="caret">
									</span>
								</a>
								<ul class="dropdown-menu"style="min-width: 260px; padding: 5px">
									<li class="well well-sm" style="margin: 0px !important;">
										<form class="form" role="form" method="post" action="/usuarios/" accept-charset="UTF-8">
											<div class="form-group">
												<input type="hidden" class="form-control" name="id" value="">
												<input type="hidden" class="form-control" name="formulario" value="usuario">
												<input type="text" class="form-control" name="usuario" placeholder="Usuario" required>
											</div>
											<div class="form-group">
												<input type="password" class="form-control" name="clave" placeholder="Clave" required>											
											</div>
											<div class="form-group">
												<div class="text-center">
													<button type="submit" class="btn btn-primary" name="metodo" value="acceder">Acceder</button>
												</div>
											</div>
										</form>
									</li>
								</ul>
							</li>
						</ul>
					</div>
					<!-- Fin Login-->
