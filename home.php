<?php

	//Permite o include de arquivos que não podem ser abertos no navegador
	define('__INCLUDED_BY_OTHER_FILE__', true);

	include 'controladores/controller.php';
	include 'controladores/classes.php';

	// Verifica se há sessão aberta.
	verificarSessao();

    $dados = listaUltimosAlunos();

    // Para debug
    // print_r($dados);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<title>Home - Fábio Madruga Concursos</title>

	
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
									<a href="#" class="text-muted">Mensagens</a>
								</div>
							</div>
						</li>
						
						<li class="nav-item dropdown ms-lg-2">
							<a class="nav-link dropdown-toggle position-relative" href="#" id="userDropdown" data-bs-toggle="dropdown">
								<i class="align-middle fas fa-cog"></i>
							</a>
								<!-- Barra de configurações -->
								<?php echo barraConfi() ?>
						</li>
					</ul>
				</div>
			</nav>
				<div class="container-fluid">
					<div class="header">
						<h1 class="header-title">
							Bem-Vindo, <?php echo $_SESSION['nome_usuario']?>
						</h1>
						<p class="header-subtitle"></p>
					</div>

					<div class="row">
						<div class="col-md-6 col-lg-3 col-xl">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Todos os Alunos &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
										</div>

										<div class="col-auto">
											<div class="avatar">
												<div class="avatar-title rounded-circle bg-primary-dark">
													<i class="align-middle" data-feather="users"></i>
												</div>
											</div>
										</div>
									</div>
									<h1 class="display-5 mt-1 mb-3"><?php echo contaAlunos() ?></h1>
									<div class="mb-0">
										<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i></span>

									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 col-xl">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Alunos Ativos &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
										</div>

										<div class="col-auto">
											<div class="avatar">
												<div class="avatar-title rounded-circle bg-primary-dark">
													<i class="align-middle" data-feather="user-check"></i>
												</div>
											</div>
										</div>
									</div>
									<h1 class="display-5 mt-1 mb-3"><?= contaAlunosAtivos() ?></h1>
									<div class="mb-0">
										<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> </span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 col-xl">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Alunos Inativos &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
										</div>

										<div class="col-auto">
											<div class="avatar">
												<div class="avatar-title rounded-circle bg-primary-dark">
													<i class="align-middle" data-feather="user-x"></i>
												</div>
											</div>
										</div>
									</div>
									<h1 class="display-5 mt-1 mb-3"><?= contaAlunosInativos() ?></h1>
									<div class="mb-0">
										<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> </span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 col-xl">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Mensalidades em Aberto/Atrasadas</h5>
										</div>

										<div class="col-auto">
											<div class="avatar">
												<div class="avatar-title rounded-circle bg-primary-dark">
													<i class="align-middle" data-feather="dollar-sign"></i>
												</div>
											</div>
										</div>
									</div>
									<h1 class="display-5 mt-1 mb-3"><?= mensalidadesAtrasadas() ?></h1>
									<div class="mb-0">
										<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> </span>
									</div>
								</div>
							</div>
						</div>
					</div>

                    <center><span class="badge bg-info">Últimos Alunos Cadastrados</span></center></br>

					<div class="row">
						<div class="col-12 col-lg-12 d-flex">
							<div class="card flex-fill">
								<table id="datatables-dashboard-products" class="table table-striped my-0">
                                    
									<thead>
										<tr>
											<th>Nome Completo</th>
											<th class="d-none d-xl-table-cell">id</th>
											<th class="d-none d-xl-table-cell">Contato</th>
											<th class="d-none d-xl-table-cell">E-mail</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
                                        <?php foreach($dados as $consulta){ ?>
                                        <tr>
                                            <td><?= $consulta['nome_aluno'] ?></td>
											<td class="d-none d-xl-table-cell"><?= $consulta['id_aluno']?></td>
											<td><span class="badge bg-success"><?= $consulta['contato_aluno']?></span></td>
											<td class="d-none d-xl-table-cell"><?= $consulta['email_aluno']?></td>
											<td class="d-none d-xl-table-cell"></td>
                                        </tr>
                                        <?php }?>
											
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
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
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables with Buttons
			var datatablesButtons = $("#datatables-buttons").DataTable({
				responsive: true,
				lengthChange: !1,
				// buttons: ["copy", "print"]
			});
			datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
		});
	</script>
</body>

</html>