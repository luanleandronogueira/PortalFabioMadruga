<?php 
	include 'controladores/controller.php';
	//include 'controladores/conexao.php';
    include 'controladores/classes.php';

    $conexao = new Conexao();
    $conn = $conexao->Conectar();
	$statusComprovante = '';

	// verifica se há status do comprovante
	if (isset($_GET['statusComprovante']) and $_GET['statusComprovante'] == 'arquivoInvalido'){

		$statusComprovante = $_GET['statusComprovante'];

	}	

    $anoAtual = date("Y");

    $id_aluno = $_GET['id'];

    // Verificar se o ID do aluno foi passado via GET
    if (isset($_GET['id'])) {

		$id_aluno = $_GET['id'];

        $query = 'SELECT A.id_aluno,
						A.nome_aluno,
						A.cpf_aluno,
						A.contato_aluno,
						A.data_nascimento_aluno,
						A.email_aluno,
						A.endereco_aluno,
						A.senha_portal_aluno,
						A.status_aluno,
						M.id_mensalidade,
						M.mes,
						M.ano,
						M.valor,
						M.status_pagamento,
						M.comprovante_pagamento 
				 FROM alunos A 

				 LEFT JOIN mensalidades M ON A.id_aluno = M.id_aluno
				 
				 WHERE A.id_aluno = :id_aluno';

        $stmt = $conn->prepare($query);
        $stmt->bindValue(":id_aluno", $id_aluno);
        $stmt->execute();

		$mensalidade = [];
    
        // Fetch the data
		while ($aluno = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$mensalidade[] = $aluno;

			foreach ($mensalidade as $info_alunos) {
				


			}
			
		}		
			// echo '<pre>';
			// 	print_r($mensalidade);
			// echo '</pre>';

    } else {

        header("Location: alunos.php");

    }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Modern, flexible and responsive Bootstrap 5 admin &amp; dashboard template">
	<meta name="author" content="Bootlab">

	<title>Financeiro do Aluno - Fábio Madruga Concursos</title>

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
							 <?php barraConfi() ?>
						</li>
					</ul>
				</div>
			</nav>
			<main class="content">
				<div class="container-fluid">

					<div class="header">
						<h1 class="header-title">
                          Financeiro do Aluno
						</h1>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0"></h5>
								</div>                                
								    <div class="card-body">
                                    <a class="btn btn-success" href="InserirMensalidades.php?id=<?=$id_aluno?>" type="button">Inserir Mensalidades</a> </br> <br>
                                        <div class="container">
                                            <div class="row">     
                                                <h4><strong>Aluno: <a href="EditarAluno.php?id=<?=$id_aluno?>"><?= $info_alunos['nome_aluno'] ?></a></strong></h4><hr>
                                                <center><h4><span class="badge bg-info">Mensalidades</span></h4></center>

												<?php if(isset($statusComprovante) and $statusComprovante == 'arquivoInvalido') { ?>
													

													</br>

														<p class="text-center"> Arquivo inválido, somente é aceito arquivo com extensão <strong>.pdf .jpeg e .jpg</strong></p>
													
												<?php } ?>

                                            </div>
                                        </div>


										<ul class="nav nav-tabs" id="myTab" role="tablist">
											<li class="nav-item" role="presentation">
												<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Ano Atual</button>
											</li>
											<li class="nav-item" role="presentation">
												<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Recibos de Pagamento</button>
											</li>
											<!-- <li class="nav-item" role="presentation">
												<button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
											</li> -->
										</ul>
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

								<div class="card-body">
	
									<table id="datatables-buttons" class="table table-striped mt-3" style="width:100%">
										<thead>
											<tr>
												<th>Mês</th>
												<th>Ano</th>
												<th>Valor</th>
												<th>Status</th>
												<th>Comprovante de Pagamento</th>
												<th>Atualizar Status de Pagamento</th>
											</tr>
										</thead>
									<tbody>
									<?php foreach ($mensalidade as $m) { 
										// Gere um ID exclusivo com base no ID da mensalidade
    									$modal_id = "modal_" . $m['id_mensalidade'];
										
										?>

										<?php if(date('m') <= $m['mes'] and $m['status_pagamento'] == 'aberto' and date('Y') == $m['ano']) { ?>

												
											<tr>
												<td><?php echo $m['mes']; ?></td>
												<td><?php echo $m['ano']; ?></td>
												<td><?php echo $m['valor']; ?></td>
												<td class="text-warning"><?php echo $m['status_pagamento']; ?></td>
												<td><?php echo $m['comprovante_pagamento']; ?></td>
												<td>
													
													<!-- Janela modal para enviar a atualização do status do pagamento -->
													<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?= $modal_id ?>">
														<i class="align-middle me-2 fas fa-fw fa-pen"></i> Editar</a>
													</button>

													
													<!-- Modal -->
													<div class="modal fade" id="<?= $modal_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
														<div class="modal-header">
															<h1 class="modal-title fs-5" id="exampleModalLabel">Atualizar Status do pagamento</h1>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<form action="controladores/DarBaixaPagamento.php" method="post" enctype="multipart/form-data">
														<div class="modal-body">
														
															<div class="modal-header">

																<!-- ID no campo Hidden -->
																<input type="hidden" name="id_mensalidade" value="<?= $m['id_mensalidade'] ?>">
																<input type="hidden" name="id_aluno" value="<?= $m['id_aluno'] ?>">
																<input type="hidden" name="nome_aluno" value="<?= $info_alunos['nome_aluno'] ?>">
																<input type="hidden" name="mes" value="<?=$m['mes'] ?>">
																<input type="hidden" name="ano" value="<?=$m['ano'] ?>">
														
															</div>
															<div class="modal-body">
																<div class="form-check">
																	<input class="form-check-input" type="radio" value="pago" name="status_pagamento">
																	<label class="form-check-label"  for="flexRadioDefault1">
																		Atualizar para <strong class="text-success">"PAGO"</strong> 
																	</label></br>
																	<label class="form-label">Inserir Comprovante de Pagamento</label></br>
																	<div>
																		<input type="file"  class="validation-file" name="comprovante">
																	</div>
																</div>
															</div>
															<div class="modal-footer">
															
															<button type="submit" class="btn btn-primary">Atualizar</button>
															<a href="controladores/excluirMensalidade.php?id=<?= $m['id_mensalidade']?>&&id_aluno=<?=$m['id_aluno']?>" type="button" class="btn btn-danger">Excluir Mensalidade</a>
														</form>
														</div>
														<div class="modal-footer">
															<!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
															<button type="button" class="btn btn-primary">Save changes</button> -->
														</div>
														</div>
													</div>
													</div>
												</td>
												<!-- <td><a href="DarBaixaPagamento.php?id=<?=$m['id_mensalidade']?>&&id_aluno=<?=$m['id_aluno'] ?>"><i class="align-middle me-2 fas fa-fw fa-pen"></i> Editar</a></td> -->
										    </tr>
											


										<?php } elseif ($m['status_pagamento'] == 'pago' and date('Y') == $m['ano']) { ?>

											<tr>
												
												<td class="text-success"><?php echo $m['mes']; ?></td>
												<td class="text-success"><?php echo $m['ano']; ?></td>
												<td class="text-success"><?php echo $m['valor']; ?></td>
												<td class="text-success"><strong><?php echo $m['status_pagamento']; ?></strong></td>
												<td> <a href="comprovantes/<?= $m['comprovante_pagamento'] ?>" target="_blank" rel="noopener noreferrer"><?php echo $m['comprovante_pagamento']; ?></a></td>
												<td>
												
													
													<!-- Janela modal para enviar a atualização do status do pagamento -->
													<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?= $modal_id ?>">
														<i class="align-middle me-2 fas fa-fw fa-pen"></i> Editar</a>
													</button>

													<!-- Modal -->
													<div class="modal fade" id="<?= $modal_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
														<div class="modal-header">
															<h1 class="modal-title fs-5" id="exampleModalLabel">Atualizar Status do pagamento</h1>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<form action="controladores/DarBaixaPagamento.php" method="post">
														<div class="modal-body">
														
															<div class="modal-header">

																<!-- ID no campo Hidden -->
																<input type="hidden" name="id_mensalidade" value="<?= $m['id_mensalidade'] ?>">
																<input type="hidden" name="id_aluno" value="<?= $m['id_aluno'] ?>">
														
															</div>
															<div class="modal-body">
																<div class="form-check">
																	<input class="form-check-input" type="radio" value="pago" name="status_pagamento">
																	<label class="form-check-label"  for="flexRadioDefault1">
																		Atualizar para <strong class="text-success">"PAGO"</strong> 
																	</label>
																</div>
															</div>
															<div class="modal-footer">
															
															<button type="submit" class="btn btn-primary">Atualizar</button>
														</form>
														</div>
														<div class="modal-footer">
															<!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
															<button type="button" class="btn btn-primary">Save changes</button> -->
														</div>
														</div>
													</div>
													</div>
												</td>
												
												
												
											</tr>

										<?php  } elseif (date('m') > $m['mes'] and $m['status_pagamento'] == 'aberto' and date('Y') == $m['ano']) {?>

											<tr>
											<!-- <td><?php echo $m['id_mensalidade']?></td> -->
												<?php $m['status_pagamento'] = 'ATRASADO' ?>
												<td class="text-danger"><?php echo $m['mes']; ?></td>
												<td class="text-danger"><?php echo $m['ano']; ?></td>
												<td class="text-danger"><?php echo $m['valor']; ?></td>
												<td class="text-danger"><em><strong><?php echo $m['status_pagamento']; ?></strong></em></td>
												<td class="text-danger"><?php echo $m['comprovante_pagamento']; ?></td>
												<td>
													
													<!-- Janela modal para enviar a atualização do status do pagamento -->
													<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?= $modal_id ?>">
														<i class="align-middle me-2 fas fa-fw fa-pen"></i> Editar</a>
													</button>

													<!-- Modal -->
													<div class="modal fade" id="<?= $modal_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
														<div class="modal-header">
															<h1 class="modal-title fs-5" id="exampleModalLabel">Atualizar Status do pagamento</h1>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<form action="controladores/DarBaixaPagamento.php" method="post" enctype="multipart/form-data">
														<div class="modal-body">
														
															<div class="modal-header">

																<!-- ID no campo Hidden -->
																<input type="hidden" name="id_mensalidade" value="<?= $m['id_mensalidade'] ?>">
																<input type="hidden" name="id_aluno" value="<?= $m['id_aluno'] ?>">
																<input type="hidden" name="nome_aluno" value="<?= $info_alunos['nome_aluno'] ?>">
																<input type="hidden" name="mes" value="<?=$m['mes'] ?>">
																<input type="hidden" name="ano" value="<?=$m['ano'] ?>">
														
															</div>
															<div class="modal-body">
																<div class="form-check">
																	<input class="form-check-input" type="radio" value="pago" name="status_pagamento">
																	<label class="form-check-label"  for="flexRadioDefault1">
																		Atualizar para <strong class="text-success">"PAGO"</strong> 
																	</label></br>
																	<label class="form-label">Inserir Comprovante de Pagamento</label></br>
																	<div>
																		<input type="file"  class="validation-file" name="comprovante">
																	</div>
																</div>
															</div>
															<div class="modal-footer">
															
															<button type="submit" class="btn btn-primary">Atualizar</button>
															<a href="controladores/excluirMensalidade.php?id=<?= $m['id_mensalidade']?>&&id_aluno=<?=$m['id_aluno']?>" type="button" class="btn btn-danger">Excluir Mensalidade</a>
														</form>
														</div>
														<!-- <div class="modal-footer">
															
															<button type="button" class="btn btn-primary">Save changes</button>
														</div> -->
														</div>
													</div>
													</div>
												</td>
												<!-- <td><a href="DarBaixaPagamento.php?id=<?=$m['id_mensalidade']?>&&id_aluno=<?=$m['id_aluno'] ?>"><i class="align-middle me-2 fas fa-fw fa-pen"></i> Editar</a></td> -->	
											</tr>

										<?php } ?>

									<?php } ?>
									</tbody>
									</table>
								</div>



									</div>

									<!-- Páginas do Recibo de Pagamento -->
									<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
									 <div class="mt-4">
											<?php foreach ($mensalidade as $recibo) { ?>
													
													<?php if ($recibo['status_pagamento'] == 'pago') { ?>
														
														
			
													<div class="alert alert-success alert-dismissible" role="alert">
														<div class="alert-icon">
															<i class="align-middle me-2 fas fa-fw fa-print"></i> <span class="align-middle"></span>
														</div>
														<div class="alert-message">
															<a class="text-white" href="GerarRecibo.php?nome=<?= $info_alunos['nome_aluno']?>&&valorMensalidade=<?=$m['valor']?>&&mesPago=<?= $recibo['mes']?>&&ano=<?=$recibo['ano']?>">
																Gerar recibo de pagamento referente ao mês	<strong><?php echo $recibo['mes']?></strong>
															</a>
														</div>
											</div>
			
													<?php }?>

													
											<?php } ?>
									 </div>

									</div>
									<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Atra</div>
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
    

<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables with Buttons
			var datatablesButtons = $("#datatables-buttons").DataTable({
				responsive: true,
				lengthChange: !1,
				buttons: ["copy", "print"]
			});
			datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
		});
	</script>



</body>

</html>