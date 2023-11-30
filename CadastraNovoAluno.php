<?php 
	include 'controladores/controller.php';
	include 'controladores/conexao.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Modern, flexible and responsive Bootstrap 5 admin &amp; dashboard template">
	<meta name="author" content="Bootlab">

	<!-- Quando carregar a página não retornar avisos -->
	<script>
        // Verifique se a página foi recarregada (atualizada)
        if (performance.navigation.type === 1) {
            // Redirecione para a URL desejada
            window.location.href = 'CadastraNovoAluno.php';
        }
    </script>

	<title>Cadastrar Novo Aluno - Fábio Madruga Concursos</title>

	<!-- PICK ONE OF THE STYLES BELOW -->
	<!-- <link href="css/modern.css" rel="stylesheet"> -->
	<!-- <link href="css/classic.css" rel="stylesheet"> -->
	<!-- <link href="css/dark.css" rel="stylesheet"> -->
	<!-- <link href="css/light.css" rel="stylesheet"> -->

	<!-- BEGIN SETTINGS -->
	<!-- You can remove this after picking a style -->
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
		<nav id="sidebar" class="sidebar">
			<a class="sidebar-brand" href="index.html">
				<img>
				
				Portal Administrativo
			</a>
			<div class="sidebar-content">
				<div class="sidebar-user">
					<img src="img/avatars/logo.jpeg" class="img-fluid rounded-circle mb-2" alt="Linda Miller">
					<div class="fw-bold">Nome do Aluno</div>
					<small>Fábio Madruga Concursos</small>
				</div>
					
					<?php sideBarAdm() ?>


			</div>
		</nav>
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
								
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown ms-lg-2">
							<a class="nav-link dropdown-toggle position-relative" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<i class="align-middle fas fa-bell"></i>
								<span class="indicator"></span>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="ms-1 text-danger fas fa-fw fa-bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="ms-1 text-warning fas fa-fw fa-envelope-open"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">6h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="ms-1 text-primary fas fa-fw fa-building"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.1</div>
												<div class="text-muted small mt-1">8h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="ms-1 text-success fas fa-fw fa-bell-slash"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Anna accepted your request.</div>
												<div class="text-muted small mt-1">12h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown ms-lg-2">
							<a class="nav-link dropdown-toggle position-relative" href="#" id="userDropdown" data-bs-toggle="dropdown">
								<i class="align-middle fas fa-cog"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="#"><i class="align-middle me-1 fas fa-fw fa-user"></i> Meu Perfil</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1 fas fa-fw fa-cogs"></i> Alterar Senha</a>
							<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#"><i class="align-middle me-1 fas fa-fw fa-arrow-alt-circle-right"></i> Sair</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<main class="content">
				<div class="container-fluid">

					<div class="header">
						<h1 class="header-title">
                        Cadastrar Novo Aluno
						</h1>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0"></h5>
								</div>

								<?php if (isset($_GET['inclusao']) and $_GET['inclusao'] == 1){ ?>

									<center><h4><span class="badge bg-danger">Não Cadastrado, campos vazios.</span></h4></center>

								<?php	} ?>
								
								<?php if (isset($_GET['inclusao']) and $_GET['inclusao'] == 3){ ?>

										<center><h4><span class="badge bg-danger">Aluno já cadastrado anteriormente!</span></h4></center>

								<?php	} ?>
								

                                <form action="controladores/gravaAluno.php" method="post">
								    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-xl-8 mb-2">
                                                        <label for=""><strong>Nome Completo:<b class="text-danger">*</b></strong></label>
                                                        <input class="form-control" required type="text" name="nome_aluno" id="">
                                                    </div>

													<div class="col-xl-4 mb-2">
                                                        <label for=""><strong>Contato:<b class="text-danger">*</b></strong></label>
                                                        <input class="form-control" required type="text" name="contato_aluno" id="telefone">
                                                    </div>

                                                    <div class="col-xl-3 col-sm-12 col-lg-3 col-md-3 mb-2">
                                                        <label for=""><strong>CPF:<b class="text-danger">*</b></strong></label>
                                                        <input class="form-control" required type="text" maxlength="15" name="cpf_aluno" id="cpf">
                                                    </div>

                                                    <div class="col-xl-3 col-sm-12 col-lg-3 col-md-3 mb-2">
                                                        <label for=""><small><strong>Data de Nascimento:<b class="text-danger">*</b></strong></small></label>
                                                        <input class="form-control" required type="date" name="data_nascimento_aluno" id="">
                                                    </div>

                                                    <div class="col-xl-6 col-sm-12 col-lg-6 col-md-6 mb-2">
                                                        <label for=""><strong>E-mail:<b class="text-danger">*</b></strong></label>
                                                        <input class="form-control" type="email" required name="email_aluno" id="">
                                                    </div>

                                                    <div class="col-xl-12 col-sm-12 col-lg-12 col-md-12 mb-2">
                                                        <label for=""><strong>Endereço:<b class="text-danger">*</b></strong></label>
                                                        <textarea class="form-control" name="endereco_aluno" required maxlength="200" id="texto"></textarea>
                                                        <small><span id="contador">0</span> / 200 caracteres</small>
                                                    </div>

                                                    <div class="col-xl-3 col-sm-12 col-lg-3 col-md-3 mb-2">
                                                        <label for=""><strong>Senha de Acesso ao Portal:<b class="text-danger">*</b></strong></label>
                                                        <input class="form-control" maxlength="20" required type="password" name="senha_portal_aluno" id="">
														<small><em>Máximo 20 Caracteres</em></small>												

                                                    </div>

													<input type="hidden" name="status_aluno" value="0">

                                                    <button type="submit" class="btn btn-success btn-block">Cadastrar Novo Aluno</button>

                                            </div>
                                        </div>
                                    </form> 
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-4 text-end">
							<p class="mb-0">
								&copy; <?php echo date('Y') ?> - <span class="text-muted">Fábio Madruga Concursos</span>
							</p>
						</div>
					</div>
				</div>
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
    <script src="js/jquery.mask.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script>

        $(document).ready(function(){
            $('#cpf').mask('000.000.000-00');
        });

    </script>

	<script>

		$(document).ready(function(){
			$('#telefone').mask('(00) 00000-0000');
		});

	</script>

	<script>
        const textoArea = document.getElementById('texto');
        const contador = document.getElementById('contador');

        textoArea.addEventListener('input', () => {
            const comprimentoTexto = textoArea.value.length;
            contador.textContent = comprimentoTexto;

            // Se você quiser limitar o número máximo de caracteres, você pode usar o atributo "maxlength" no textarea.
            // Caso contrário, você pode remover o atributo "maxlength" e adicionar uma condição aqui para limitar.
            
        });
    </script>



</body>

</html>