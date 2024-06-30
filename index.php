<?php

class Experiencia
{
	public $empresa;
	public $foto;
	public $dataInicio;
	public $dataFim;
	public $descricao;
	public $tecnologiasEmpregadas;

	function __construct($empresa, $foto, $dataInicio, $dataFim, $descricao, $tecnologiasEmpregadas)
	{
		$this->empresa = $empresa;
		$this->foto = $foto;
		$this->dataInicio = $dataInicio;
		$this->dataFim = $dataFim;
		$this->descricao = $descricao;
		$this->tecnologiasEmpregadas = $tecnologiasEmpregadas;
	}
}

class Formacao
{
	public $instituicao;
	public $foto;
	public $dataInicio;
	public $dataFim;
	public $curso;
	public $descricao;

	function __construct($instituicao, $foto, $dataInicio, $dataFim, $curso, $descricao)
	{
		$this->instituicao = $instituicao;
		$this->foto = $foto;
		$this->dataInicio = $dataInicio;
		$this->dataFim = $dataFim;
		$this->curso = $curso;
		$this->descricao = $descricao;
	}
}

class Curriculo
{
	public $nome;
	public $cargo;
	public $email;
	public $telefone;
	public $linkedin;
	public $github;
	public $sobreMim;
	public $ultimasExperiencias;
	public $formacoes;

	function __construct($nome, $cargo, $email, $telefone, $linkedin, $github, $sobreMim, $ultimasExperiencias, $formacoes)
	{
		$this->nome = $nome;
		$this->cargo = $cargo;
		$this->email = $email;
		$this->telefone = $telefone;
		$this->linkedin = $linkedin;
		$this->github = $github;
		$this->sobreMim = $sobreMim;
		$this->ultimasExperiencias = $ultimasExperiencias;
		$this->formacoes = $formacoes;
	}
}

$ultimasExperiencias = [];

foreach ($_POST['experiencias'] as $experiencia) {
	$exp = new Experiencia(
		$experiencia['empresa'],
		$experiencia['foto'],
		$experiencia['dataInicio'],
		$experiencia['dataFim'],
		$experiencia['descricao'],
		explode(", ", $experiencia['tecnologiasEmpregadas'])
	);

	$ultimasExperiencias[] = $exp;
}

$formacoes = [];

foreach ($_POST['formacoes'] as $formacao) {
	$form = new Formacao(
		$formacao['instituicao'],
		$formacao['foto'],
		$formacao['dataInicio'],
		$formacao['dataFim'],
		$formacao['curso'],
		$formacao['descricao']
	);

	$formacoes[] = $form;
}

$curriculo = new Curriculo(
	$_POST['nome'],
	$_POST['cargo'],
	$_POST['email'],
	$_POST['telefone'],
	$_POST['linkedin'],
	$_POST['github'],
	$_POST['sobreMim'],
	$ultimasExperiencias,
	$formacoes
);
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<title>Currículo</title>
	<style>
		.h1-custom {
			color: #DE2863;
		}

		.h2-custom {
			color: #000000;
		}

		.text-custom {
			color: #979EB6;
		}
	</style>
</head>

<body class="bg-white text-custom">
	<header class="p-4">
		<div class="flex justify-between items-center">
			<div>
				<h1 class="h1-custom text-3xl font-bold"><?= $curriculo->nome; ?></h1>
				<p><?= $curriculo->cargo; ?></p>
			</div>
			<div>
				<div class="flex items-center space-x-4">
					<p><?= $curriculo->email; ?></p>
				</div>
				<div class="flex items-center space-x-4 mt-2">
					<p><?= $curriculo->telefone; ?></p>
				</div>
				<div class="flex items-center space-x-4 mt-2">
					<p><?= $curriculo->linkedin; ?></p>
				</div>
			</div>
		</div>
	</header>
	<main class="p-4">
		<div class="border-t-2 border-gray-300 my-4"></div>
		<section>
			<h1 class="h1-custom text-2xl font-bold">Sobre mim</h1>
			<p class="mt-2"><?= $curriculo->sobreMim; ?></p>
		</section>
		<div class="border-t-2 border-gray-300 my-4"></div>
		<section>
			<h1 class="h1-custom text-2xl font-bold">Últimas Experiências</h1>
			<?php foreach ($curriculo->ultimasExperiencias as $experiencia) : ?>
				<div class="flex mt-4">
					<img class="w-20 h-20 rounded-lg mr-4" src="<?= $experiencia->foto; ?>" alt="foto">
					<div>
						<h2 class="h2-custom text-xl font-semibold"><?= $experiencia->empresa; ?></h2>
						<p><?= $experiencia->dataInicio; ?> - <?= $experiencia->dataFim; ?></p>
						<p class="mt-2"><?= $experiencia->descricao; ?></p>
						<p class="mt-2"><?= implode(", ", $experiencia->tecnologiasEmpregadas); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</section>
		<div class="border-t-2 border-gray-300 my-4"></div>
		<section>
			<h1 class="h1-custom text-2xl font-bold">Educação e Certificações</h1>
			<?php foreach ($curriculo->formacoes as $formacao) : ?>
				<div class="flex mt-4">
					<img class="w-20 h-20 rounded-lg mr-4" src="<?= $formacao->foto; ?>" alt="foto">
					<div>
						<h2 class="h2-custom text-xl font-semibold"><?= $formacao->instituicao; ?></h2>
						<p><?= $formacao->dataInicio; ?> - <?= $formacao->dataFim; ?></p>
						<p class="mt-2"><?= $formacao->curso; ?></p>
						<p class="mt-2"><?= $formacao->descricao; ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</section>
		<div class="border-t-2 border-gray-300 my-4"></div>
	</main>
	<footer class="p-4 text-center">
		<p>Desenvolvido por <?= $curriculo->nome; ?></p>
	</footer>
</body>
<script>
	window.print();
</script>

</html>