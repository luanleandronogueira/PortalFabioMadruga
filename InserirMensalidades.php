<?php 

	include 'controladores/controller.php';
	//include 'controladores/conexao.php';
    include 'controladores/gravaMensalidades.php';

	// Verifica se há sessão aberta.
	verificarSessao();

    $conexao = new Conexao();
    $conn = $conexao->Conectar();

    $id_aluno = $_GET['id'];

    // Verificar se o ID do aluno foi passado via GET
    if (isset($_GET['id'])) {
        $id_aluno = $_GET['id'];

        $query = 'SELECT * FROM alunos WHERE id_aluno = :id_aluno';
        $stmt = $conn->prepare($query);
        $stmt->bindValue(":id_aluno", $id_aluno);
        $stmt->execute();
    
        // Fetch the data
        $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

        //para fins de debug
		//print_r($aluno);

    } else {

        header("Location: alunos.php");

    }

    $mesesAnuais = [
					'' => '0',
					'Janeiro' => '01',
                    'Fevereiro' => '02',
                    'Março' => '03',
                    'Abril' => '04',
                    'Maio' => '05',
                    'Junho' => '06',
                    'Julho' => '07',
                    'Agosto' => '08',
                    'Setembro' => '09',
                    'Outubro' => '10',
                    'Novembro' => '11',
                    'Dezembro' => '12'
				];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Modern, flexible and responsive Bootstrap 5 admin &amp; dashboard template">
	<meta name="author" content="Bootlab">

	<title>Cadastrar Novo Aluno - Fábio Madruga Concursos</title>


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
	</script>
</head>

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
                        Gerenciar Mensalidades
						</h1>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0"></h5>
								</div>

								    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div>
                                                    <strong>Aluno:</strong> <?=$aluno['nome_aluno'] ?>
                                                </div>
                                                <hr>
                                                <form action="CadastraMensalidades.php" method="post">

                                                    <!-- Input escondidos -->
                                                    <!-- Id do Aluno -->
                                                    <input type="hidden" name="id_aluno" value="<?=$id_aluno?>">
                                                    <!-- Status do pagamento -->
                                                    <input type="hidden" name="status_pagamento" value="aberto">
													<!-- Comprovante pagamento -->
													<input type="hidden" name="comprovante_pagamento" value=" ">

                                                    <div>
                                                        <strong>Selecione o Ano</strong>
                                                        <select class="form-control" name="ano">
                                                            <?php
                                                            $anoAtual = date("Y");
                                                            
                                                            // Defina o número de anos anteriores e futuros que você deseja incluir
                                                            $anosAnteriores = 0;
                                                            $anosFuturos = 5;
                                                            
                                                            // Loop para criar as opções com anos anteriores
                                                            for ($i = $anoAtual - $anosAnteriores; $i <= $anoAtual + $anosFuturos; $i++) {
                                                                echo "<option name='ano' value='$i'>$i</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div> <br>

                                                    <div class="mt-2">
                                                        <strong>Selecione os Meses </strong><br>
                                                        <?php foreach ($mesesAnuais as $m => $i) { 
															if ($m !== '') { // Verifica se $m não está vazio
														?>
															<div class="form-check" style="display: inline-block; margin-right: 10px;">
																<input class="form-check-input" type="checkbox" name="mes[]" value="<?=$i?>">
																<label class="form-check-label">
																	<?php echo $m ?>
																</label>
															</div>
														<?php 
															}
														}?>
                                                    </div><br>

                                                    <div class="mt-2">
                                                        <div class="col-xl-3">
                                                            <strong><label for="">Valor da Mensalidade:</label></strong>
                                                            <input class="form-control" required type="text" name="valor" id="">
                                                        </div>  
                                                    </div>
                                                            

                                                    <button type='submit' class="btn btn-block btn-info mt-2" type="submit">Cadastrar Mensalidades</button>
                                                
                                                </form>
                                               

                                            </div>
                                        </div>
                                   
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
    <script src="js/jquery.mask.js"></script>
    <script src="js/jquery.mask.min.js"></script>

</body>

</html>