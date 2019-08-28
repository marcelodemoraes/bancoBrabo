<?php
	if(!defined('BASE_PATH')) { exit('Acesso não autorizado!'); } 
?>

<head>
	<title>Formulário de Cadastro</title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/src/css/style.css">

</head>

<body>
	<form class="form-cadastro" method="POST">
		<h1>Formulário de Cadastro</h1>
		<input type="text"   name="nome"      placeholder="Insira seu nome!"/>
		<input type="text"   name="sobrenome" placeholder="Insira seu sobrenome!"/>
		<input type="submit" name="btn-cadastrar" value="Enviar Cadastro"/ >
	</form>

	<!-- A verificação abaixo é necessária para saber se o array de dados da view foi utilizado. -->
	<?php if(array_key_exists('nome', $viewData)): ?>
		<p>Seja muito bem vindo <strong><?php echo $viewData['nome'].' '.$viewData['sobrenome']?></strong></p>
	<?php endif; ?>
	
</body>


