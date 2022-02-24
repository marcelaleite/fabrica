<?php
	include('funcoes.php');
	include('autoload.php');
	include('funcaoBanco.php');

	$vetor=explode(':', EditarPerfil($_SESSION['codigo']));

?>
<!DOCTYPE html>
	<html lang="pt-BR">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />

			<!-- Ícone -->
			<link rel="shortcut icon" type="imagem/x-icon" href="../assets/img/icon.png">
			
			<!-- CSS  -->
			<link href="../assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
			<link href="../assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
			<link href="../assets/css/css.css" type="text/css" rel="stylesheet" media="screen,projection">

			<!-- Fontes -->
			<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
			<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

			<!-- Título -->
			<title><?php echo $vetor[7] ?> | Editar Perfil</title>
		</head>
		<body>
			<header>
				<nav class="verdeIF">
					<div class="nav-wrapper black-text">
						<ul id="menu" class="sidenav">
							<li class="center" style="margin-bottom: 1rem"><a href="#!" style="color: #349A47">CONSELHO ONLINE</a></li>
							<?php 
								echo '<li><a href="'.$vetor[8].'.php"><i class="material-icons">dashboard</i>Perfil</a></li>';
							?>
							<div>
								<?php 
									if ($vetor[6]==2) {
								?>
								<li><a href="ocorrencia.php"><i class="material-icons">create</i>Ocorrências</a></li>
								<li><div class="divider" style="width: 100%"></div></li>
								<li style="background-color: rgba(0, 0, 0, 0.1);"><a href="editarPerfil.php" style="color: #349A47"><i class="material-icons" class="grey-text" style="color: #349A47">brightness_5</i>Editar Perfil</a></li>
								<li><a href="acaoLogin.php?acao=logout"><i class="material-icons" class="grey-text">power_settings_new</i>Sair</a></li>
								<?php 
									}
								?>
								<?php 
									if ($vetor[6]==3) {
								?>
								<li><a href=""><i class="material-icons">star</i>Notas</a></li>
								<li><div class="divider" style="width: 100%"></div></li>
								<li style="background-color: rgba(0, 0, 0, 0.1);"><a href="editarPerfil.php" style="color: #349A47"><i class="material-icons" class="grey-text" style="color: #349A47">brightness_5</i>Editar Perfil</a></li>
								<li><a href="acaoLogin.php?acao=logout"><i class="material-icons" class="grey-text">power_settings_new</i>Sair</a></li>
								<?php 
									}
								?>
							</div>
						</ul>

						<ul class="left">
							<div class="btn-floating" style="background-color: #FFF; margin-left: 2vw">
								<li><i class="material-icons sidenav-trigger" style="color: #349A47; top: -.5em; left: -.42em;" data-target="menu">menu</i></li>
							</div>
						</ul>
						<ul class="brand-logo center hide-on-small-only">
							<?php 
								echo '<li style="padding-right: 50em"><a href="'.$vetor[8].'.php" class="link-logo brand-logo center">Conselho Online</a></li>';
							?>
						</ul>
						<ul class="brand-logo hide-on-med-and-up">
							<li><a href="" class="texto link-logo">CONSELHO ONLINE</a></li>
						</ul>
					</div>
				</nav>
			</header>
			<br style="padding-top: 1em">
			<div class="container center">
				<h3 class="texto verdeIFtexto">Editar Perfil</h3>
				<?php 
					Erro(isset($_GET['erro'])?$_GET['erro']:0);
				?>
				<form action="acao.php" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="input-field col l4 m6 s12">
							<i class="material-icons prefix">person</i>
							<input id="icon_prefix" name="nome" type="text" class="validate" value="<?php echo $vetor[1] ?>" required>
							<label for="icon_prefix">Nome Completo</label>
						</div>
						<div class="input-field col l4 m6 s12">
							<i class="material-icons prefix">person_outline</i>
							<input id="user" type="text" class="validate" name="usuario" value="<?php echo $vetor[2] ?>" required>
							<label for="user">Usuário</label>
						</div>
						<div class="input-field col col l4 m6 s12">
							<i class="material-icons prefix">mail</i>
							<input id="email" type="email" class="validate" name="email" value="<?php echo $vetor[3] ?>" required>
							<label for="email">Email</label>
						</div>
						<div class="input-field col l4 m6 s12">
							<i class="material-icons prefix">date_range</i>
							<input type="text" class="datepicker grey-text text-darken-3" placeholder="Data de Nascimento" id="dtNascimento" name="dtNascimento" data-mask="00/00/0000"  value="<?php echo $vetor[4] ?>" required>
						</div>
						<div class="input-field col l4 m6 s12">
							<i class="material-icons prefix">lock</i>
							<input id="password" type="password" class="validate" name="senha" value="" minlength="6">
							<label for="password">Senha (mínimo 6 carácteres)</label>
						</div>
						<div class="input-field col l4 m6 s12">
							<i class="material-icons prefix">lock_outline</i>
							<input id="password2" type="password" class="validate" name="confirmacao" value="">
							<label for="password2">Confirmar Senha</label>
						</div>
						<div class="file-field input-field col m6 s12 offset-l3">
							<div class="btn verdeIF">
								<span>Foto</span>
								<input name="foto" id="foto" type="file" value="<?php echo $vetor[5] ?>">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate"  type="text" placeholder="Upload de foto" value="">
							</div>
						</div>
						<div class="input-field col l6 offset-l3 m6 s12">
							<button class="waves-effect waves-light btn verdeIF white-text" type="submit" value="alterar.1" name="acao">
								Editar
							</button>

							<input type="hidden" name="codigo" value="<?php echo $_SESSION['codigo'] ?>">
							<input type="hidden" name="matricula" value="<?php echo $vetor[0] ?>">
							<input type="hidden" name="pagina" value="editarPerfil.php">
							<input type="hidden" name="tabela" value="usuario">
							<input type="hidden" name="ocupacao" value="<?php echo $vetor[6] ?>">
						</div>
					</div>
				</form>
			</div>
			<!--<footer class="page-footer grey lighten-3 black-text" style="margin-bottom: -30em">
				<div class="container">
					<div class="right" style="padding-bottom: 1em">
						&copy;
						<script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script>, Desenvolvido para <a href="http://www.ifc-riodosul.edu.br/site/" class="verdeIFtexto">Instituto Federal Catarinense - Campus Rio do Sul</a>
					</div>
				</div>
			</footer>-->

			<!--  Scripts-->
			<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
			<script src="../assets/js/materialize.js"></script>
			<script src="../assets/js/init.js"></script>
			<script src="../assets/js/jquery.mask.min.js"></script>
			<script type="text/javascript">
				function goBack() {
					window.history.back();
				}
				$(document).ready(function() {
					$(".modal").modal();
					$("select").formSelect();
					$(".sidenav").sidenav();
					$(".datepicker").datepicker({
						format: "dd/mm/yyyy",
						yearRange: 60,
						i18n: {
							months: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
							monthsShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
							weekdays: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sabádo"],
							weekdaysShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
							weekdaysAbbrev: ["D", "S", "T", "Q", "Q", "S", "S"],
							today: "Hoje",
							clear: "Limpar",
							close: "Pronto",
							labelMonthNext: "Próximo mês",
							labelMonthPrev: "Mês anterior",
							labelMonthSelect: "Selecione um mês",
							labelYearSelect: "Selecione um ano",
							selectMonths: true,
							cancel: "Cancelar",
							clear: "Limpar"
						}
					});
					$(".chips").chips();
					  $(".chips-placeholder").chips({
						placeholder: "Enter a tag",
					    secondaryPlaceholder: "+Tag",
					  });
					  $(".chips-autocomplete").chips({
					    autocompleteOptions: {
						data: {
							"Apple": null,
							"Microsoft": null,
							"Google": null
						},
						limit: Infinity,
						minLength: 1
					    }
					  });
				});
			</script>
		</body>
	</html>