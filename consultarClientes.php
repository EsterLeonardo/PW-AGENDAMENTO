<?php
require_once("controller/ControllerCadastro.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="format-detection" content="telephone=no"> <meta name="msapplication-tap-highlight" content="no">
	<meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover"> <meta name="color-scheme" content="light dark"> 
	<link rel="stylesheet" href="css/estilo.css">	
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css"> 
	<script src="js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script>
		function confirmDelete(delUrl) {
			if (confirm("Deseja apagar o registro?")) {
				document.location = delUrl;
			}  
		}
	</script>
	<title>WEB AGENDAMENTOS</title>
</head> 
<body> 
	<div class="container">
		<div class="row">
			<nav class="navbar navbar-expand-lg navbar-dark bg-secondary col-12" >
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="index.php">Cadastrar</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="consultarClientes.php">Consultar</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="row" style="background-color: #CCC;">
			<div class="card mb-3 col-12">
				<div class="card-body" style="margin: auto;">
					<h5 class="card-title">Consultar</h5>
					<table class="table table-responsive" style="width: auto;">
						<thead class="table-active bg-primary">
							<tr style="background-color: #CCC;">
								<th scope="col">ID</th>
								<th scope="col">Nome</th>
								<th scope="col">Telefone</th>
								<th scope="col">origem</th>
								<th scope="col">Contato</th>
								<th scope="col">observacao</th>
								<th scope="col">Ação</th>
							</tr>
						</thead>
						<tbody id="TableData">
						<?php
							$controller = new ControllerCadastro();
							$resultado = $controller->listar(0);
							//print_r($resultado);
							for($i=0;$i<count($resultado);$i++){ 
						?>
								<tr>
									<td scope="col"><?php echo $resultado[$i]['id']; ?></td>
									<td scope="col"><?php echo $resultado[$i]['nome']; ?></td>
									<td scope="col"><?php echo $resultado[$i]['telefone']; ?></td>
									<td scope="col"><?php echo $resultado[$i]['origem']; ?></td>
									<td scope="col"><?php echo $resultado[$i]['data_contato']; ?></td>
									<td scope="col"><?php echo $resultado[$i]['observacao']; ?></td>
									<td scope="col">
										<button type="button" class="btn btn btn-danger" onclick="location.href='editarClientes.php?id=<?php echo $resultado[$i]['id']; ?>'" style="width: 72px;">Editar</button>
										<button type="button" class="btn btn btn-danger" onclick="javascript:confirmDelete('excluirClientes.php?id=<?php echo $resultado[$i]['id']; ?>')" style="width: 72px;">Excluir</button>
									</td>
								</tr>
						<?php
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
