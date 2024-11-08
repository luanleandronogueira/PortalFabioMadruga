<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>Área do Aluno - Fábio Madruga Concursos</title>


	<style>
		body {
			opacity: 0;
		}
	</style>
	<script src="js/settings.js"></script>

	<!-- Quando carregar a página não retornar avisos -->
	<script>
        // Verifique se a página foi recarregada (atualizada)
        if (performance.navigation.type === 1) {
            // Redirecione para a URL desejada
            window.location.href = 'index.php';
        }
    </script>

	<script async="" src="gtag/js?id=UA-120946860-7"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-120946860-7');
	</script>

</head>
<!-- SET YOUR THEME -->

<body class="theme-blue" style="background-color:#016430">
	<div class="splash active">
		<div class="splash-icon"></div>
	</div>

	<main class="main h-100 w-100">
		<div class="container h-100">
			<div class="row h-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center text-white mt-4">
							<h1 class="text-white">Fábio Madruga Concursos</h1>
							<p class="lead">
								Esse nome aprova!!
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="img/avatars/logo.jpeg" class="img-fluid rounded-circle" width="132" height="132">
									</div>
									<form action="controladores/AutenticaLogin.php" method="post">
										<div class="mb-3">
											<label>Login</label>
											<input class="form-control form-control-lg" id="cpf" type="text" maxlength="14" name="usuario_aluno" required placeholder="Digite seu Login">
										</div>
										<div class="mb-3">
											<label>Senha</label>
											<input required class="form-control form-control-lg" type="password" name="senha_aluno" placeholder="Digite sua Senha">
										</div>

                                        <!-- Verificação de Autenticidade do Login -->
                                        <?php if(isset($_GET['erro']) == "1") { 

                                            $mensagem ='Usuário ou Senha inválidos'; ?>
											<div class="alert alert-danger alert-outline alert-dismissible" role="alert">
												<div class="alert-icon">
													<i class="far fa-fw fa-bell"></i>
												</div>
												<div class="alert-message">
													<h4><?php echo $mensagem ?></h4>
												</div>

												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>

                                       	<?php } ?>

										<!-- Verificação de Autenticidade do Login -->
                                        <?php if(isset($_GET['usuario']) == "negado") {

											$_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!	</p>";;
											echo '<h3>' . $_SESSION['msg'] . '</h3>';

										} ?>

								
										<div class="text-center mt-3">
											<button type="submit" name="enviar_requisicao" class="btn btn-lg btn-success">Entrar</button>
											
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>
	<svg width="0" height="0" style="position:absolute">
		<defs>
			<symbol viewbox="0 0 512 512" id="ion-ios-pulse-strong">
				<path d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z">
				</path>
			</symbol>
		</defs>
	</svg>
	<script src="js/app.js"></script>
    <script>
        
        $(document).ready(function(){
            $('#cpf').mask('000.000.000-00');
        });
        
    </script>

</body>

</html>