<?php
print_r($_SESSION);
?>
				<form method='POST' action='/usuarios/'>
					<div class="row">
						<div class="col-sm-12">	
							<div class="form-group">
								Ingrese Cédula A Modificar
								<input type="hidden" name="formulario" 	value="humano">
								<input type="number" class="form-control"  value="" name="identificacion" placeholder="Identificación">
								<input type="submit" class="btn btn-danger" name="metodo" value="consultarcedula">
							</div> 
						</div>
					</div>
				</form>		
				<form method='POST' action='/usuarios/index.php'>
					<input type="hidden" name="idpersona" 	value="">
					<input type="hidden" name="formulario" 	value="humano">
					<div class="row">
						<div class="col-xs-6">
							<div class="form-group">
								<input type="text" class="form-control" value="" id="primernombre" name="primernombre" placeholder="Primer Nombre">
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
								<input type="text" class="form-control" value=""name="segundonombre" placeholder="Segundo Nombre">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<div class="form-group">
								<input type="text" class="form-control" value="" name="primerapellido" placeholder="Primer Apellido">
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
								<input type="text" class="form-control" value="" name="segundopellido" placeholder="Segundo Apellido">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-btn">
										<span class="btn btn-default">
											<span class="glyphicon glyphicon-barcode" aria-hidden="true"></span>
										</span>
									</span>
									<input type="number" class="form-control"  value="" name="identificacion" placeholder="Identificación">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-btn">
										<span class="btn btn-default">
											<span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
										</span>
									</span>
									<select name="tipodeidentificacion" class="form-control" >
										<option value="">Elija Tipo De Identificación</option>
				    					<option value="Cédula">Cédula</option>
				    					<option value="Tarjeta De Identidad">Tarjeta De Identidad</option>
				    					<option value="Cédula De Extranjería">Cédula De Extranjería</option>
				    					<option value="Pasaporte">Pasaporte</option>
				  					</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-btn">
										<span class="btn btn-default">
											<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
										</span>
									</span>
									<input type="email" class="form-control"  value="" name="correo" placeholder="Correo">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-btn">
										<span class="btn btn-default">
											<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
										</span>
									</span>
									<input type="tel" class="form-control" value="" name="telefono" placeholder="Teléfono">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
							<div class="form-group">
								<input type="text" class="form-control" value="" name="domicilio" placeholder="Domicilio">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-btn">
										<span class="btn btn-default">
											<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
										</span>
									</span>
									<select class="form-control" name="rol">
										<option value="">Elegir Rol</option>
										<option value="Usuario">Usuario</option>
				    					<option value="Administrador">Administrador</option>
				  					</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-btn">
										<span class="btn btn-default">
											<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
										</span>
									</span>
									<input type="text" class="form-control"  value="" name="usuario" placeholder="Usuario">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-btn">
										<span class="btn btn-default">
											<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
										</span>
									</span>
									<input type="password" class="form-control"  value="" name="clave" placeholder="Clave">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">	
							<div class="form-group">
								<input type="submit" class="btn btn-primary" name="metodo" value="Guardar">
							</div> 
						</div>
					</div>
				
				</form>
				<form method='POST' action='/usuarios/'>
					<div class="row">
						<div class="col-sm-12">	
							<div class="form-group">
								Ingrese Cédula A Eliminar
								<input type="hidden" name="formulario" 	value="persona">
								<input type="number" class="form-control"  value="" name="identificacion" placeholder="Identificación">
								<input type="submit" class="btn btn-danger" name="metodo" value="Eliminar">
							</div> 
						</div>
					</div>
				</form>			