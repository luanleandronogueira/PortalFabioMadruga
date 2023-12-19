<?php 

	//Permite o include de arquivos que não podem ser abertos no navegador
	define('__INCLUDED_BY_OTHER_FILE__', true);
	
	include 'controladores/controller.php';
	include 'controladores/classes.php';

	// Verifica se há sessão aberta.
	verificarSessao();

	$conn = $conexao->Conectar();

	 $query = "SELECT alunos.id_aluno, alunos.nome_aluno, mensalidades.mes, mensalidades.ano, mensalidades.valor, mensalidades.status_pagamento
				FROM alunos
				LEFT JOIN mensalidades ON alunos.id_aluno = mensalidades.id_aluno
				WHERE mensalidades.status_pagamento = 'aberto'";


	$stmt = $conn->prepare($query);

	$stmt->execute();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Modern, flexible and responsive Bootstrap 5 admin &amp; dashboard template">
	
	<title>Configurações - Fábio Madruga Concursos</title>


	<style>
		body {
			opacity: 0;
		}
	</style>
	<script src="js/settings.js"></script>
	<!-- END SETTINGS -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="gtag/js?id=UA-120946860-7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120946860-7');
</script></head>

<body>
	<div class="splash active">
		<div class="splash-icon"></div>
	</div>

	<div class="wrapper">
	
		<!-- Barra administrativa lateral -->
		<?php echo sideBarAdm() ?>

		<div class="main">
			<nav class="navbar navbar-expand navbar-theme">
				<a class="sidebar-toggle d-flex me-2">
					<i class="hamburger align-self-center"></i>
				</a>

				<form class="d-none d-sm-inline-block">
					<input class="form-control form-control-lite" type="text" placeholder="Search projects...">
				</form>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav ms-auto">
						<li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle position-relative" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<i class="align-middle fas fa-envelope-open"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<!-- Dados inserir aqui -->
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						
						<li class="nav-item dropdown ms-lg-2">
							<a class="nav-link dropdown-toggle position-relative" href="#" id="userDropdown" data-bs-toggle="dropdown">
								<i class="align-middle fas fa-cog"></i>
							</a>
							<?php barraConfi() ?>
						</li>
					</ul>
				</div>
			</nav>
			<main class="content">
				<div class="container-fluid">

					<div class="header">
						<h1 class="header-title">
							Configurações e Parâmetros
						</h1>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Parâmetros </h5>
								</div>
								<div class="card-body">
                                <?php if(isset($_GET['usuario']) == 'Ja_Cadastrado') { ?>
                                                
                                                <div class="alert alert-danger alert-outline alert-dismissible" role="alert">
                                                    <div class="alert-icon">
                                                        <i class="far fa-fw fa-bell"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <h4>Já Existe um Usuário com esse CPF</h4>
                                                    </div>

												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>

                                <?php } ?>

                                <?php if(isset($_GET['usuarioCadastrado']) == 'Sucesso') { ?>
                                                
                                                <div class="alert alert-success alert-outline alert-dismissible" role="alert">
                                                    <div class="alert-icon">
                                                        <i class="far fa-fw fa-bell"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <h4>Novo Usuário Cadastrado com Sucesso</h4>
                                                    </div>

												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>

                                <?php } ?>

								<?php if(isset($_GET['host']) == 'Atualizado') { ?>
                                                
                                                <div class="alert alert-success alert-outline alert-dismissible" role="alert">
                                                    <div class="alert-icon">
														<i class="align-middle me-2 fas fa-fw fa-check-circle"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <h4>Configurações do Host Atualizados com Sucesso</h4>
                                                    </div>

												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>

                                <?php } ?>

                                <?php if(isset($_GET['erro']) == 'Erro_Senha') { ?>
                                                
                                                <div class="alert alert-warning alert-outline alert-dismissible" role="alert">
                                                    <div class="alert-icon">
                                                        <i class="far fa-fw fa-bell"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <h4>Erro ao cadastrar, tente mais tarde!</h4>
                                                    </div>

												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>

                                            <?php } ?>
                                    <div class="col-lg-4 col-sm-12 col-md-4">
                                        <form action="controladores/cadastrarUsuario.php" method="post">
                                            <h5 class="card-title">Novo Usuário </h5> 

                                            <label for="">Nome Completo:</label>
                                            <input class="form-control" type="text" name="nome_usuario" id="">

                                            <label for="">CPF:</label>
                                            <input class="form-control" id="cpf" name="cpf_usuario" type="text">

                                            <label for="">Senha:</label>
                                            <input class="form-control" id="cpf" name="senha_usuario" type="password">
                                            <input type="hidden" name="tipo_usuario" value="0">
        </br>
                                            <button type="submit" class="btn btn-warning">Cadastrar</button></br></br>
                                            <h5 class="card-title"><a class="mt-2" href="ListarUsuariosCadastrados.php">Ver usuarios já cadastrados</a></h5>
                                        </form>
                                    </div>
                                    
                                    <hr>

                                    <div class="col-lg-4 col-sm-12 col-md-4">
                                      <form action="controladores/AtualizaHost.php" method="post">
                                        <h5 class="card-title">Configurações de Envio de E-mail</h5>
                                            <label for="">Host</label>
                                            <input class="form-control" required type="text" name="host" id="">

                                            <label for="">Username:</label>
                                            <input class="form-control" required type="text" name="username" id="">

                                            <label for="">Password:</label>
                                            <input class="form-control" required type="text" name="senhapassword" id="">

                                            <label for="">SMTPSecure</label>
                                            <input class="form-control" required type="text" name="smtpsecure" id="">

                                            <label for="">Port</label>
                                            <input class="form-control" required type="text" name="port" id=""></br>

                                            <label for="">SetFrom Email:</label>
                                            <input class="form-control" required type="text" name="setfromemail">

                                            <label for="">SetFrom Título:</label>
                                            <input class="form-control" required type="text" name="setfromtitulo" id=""></br>
                                            <label for="">SetAddAddress:</label>
                                            <input class="form-control" required type="text" name="setaddaddress"></br>

                                            <button type="submit" class="btn btn-warning">Cadastrar</button>

                                      </form>
                                    </div>
                                    <hr>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>
			<footer class="footer">

				<!-- Rodapé -->
				<?php echo footer()?>
				
			</footer>
		</div>
	</div>

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