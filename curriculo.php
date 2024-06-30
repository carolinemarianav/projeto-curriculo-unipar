<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Cadastro de Currículo</title>
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

<body class="bg-white text-custom p-16">
    <header class="p-4">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="h1-custom text-3xl font-bold">Cadastro de Currículo</h1>
            </div>
        </div>
    </header>
    <main class="p-4">
        <form action="curriculo.php" method="POST">
            <div class="mb-4">
                <label for="nome" class="block">Nome</label>
                <input type="text" id="nome" name="nome" class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="cargo" class="block">Cargo</label>
                <input type="text" id="cargo" name="cargo" class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="email" class="block">Email</label>
                <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="telefone" class="block">Telefone</label>
                <input type="text" id="telefone" name="telefone" class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="linkedin" class="block">LinkedIn</label>
                <input type="text" id="linkedin" name="linkedin" class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="github" class="block">GitHub</label>
                <input type="text" id="github" name="github" class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="sobreMim" class="block">Sobre Mim</label>
                <textarea id="sobreMim" name="sobreMim" class="w-full p-2 border border-gray-300 rounded"></textarea>
            </div>

            <h1 class="h1-custom text-2xl font-bold mt-4">Experiências</h1>
            <div id="experiencias"></div>
            <button type="button" onclick="addExperiencia()" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">+ Adicionar Experiência</button>

            <h1 class="h1-custom text-2xl font-bold mt-4">Formações</h1>
            <div id="formacoes"></div>
            <button type="button" onclick="addFormacao()" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">+ Adicionar Formação</button>

            <div class="mt-4 w-full flex justify-end">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Salvar Currículo</button>
            </div>
        </form>
    </main>
    <script>
        let experienciaCount = 0;
        let formacaoCount = 0;

        function addExperiencia() {
            experienciaCount++;
            const experienciasDiv = document.getElementById('experiencias');
            const experienciaDiv = document.createElement('div');
            experienciaDiv.className = 'mb-4';
            experienciaDiv.innerHTML = `
                <div class="border-t-2 border-gray-300 my-4"></div>
                <h2 class="h2-custom text-xl font-semibold">Experiência ${experienciaCount}</h2>
                <label for="empresa${experienciaCount}" class="block">Empresa</label>
                <input type="text" id="empresa${experienciaCount}" name="experiencias[${experienciaCount}][empresa]" class="w-full p-2 border border-gray-300 rounded">
                <label for="foto${experienciaCount}" class="block">Foto</label>
                <input type="text" id="foto${experienciaCount}" name="experiencias[${experienciaCount}][foto]" class="w-full p-2 border border-gray-300 rounded">
                <label for="dataInicio${experienciaCount}" class="block">Data de Início</label>
                <input type="text" id="dataInicio${experienciaCount}" name="experiencias[${experienciaCount}][dataInicio]" class="w-full p-2 border border-gray-300 rounded">
                <label for="dataFim${experienciaCount}" class="block">Data de Fim</label>
                <input type="text" id="dataFim${experienciaCount}" name="experiencias[${experienciaCount}][dataFim]" class="w-full p-2 border border-gray-300 rounded">
                <label for="descricao${experienciaCount}" class="block">Descrição</label>
                <textarea id="descricao${experienciaCount}" name="experiencias[${experienciaCount}][descricao]" class="w-full p-2 border border-gray-300 rounded"></textarea>
                <label for="tecnologias${experienciaCount}" class="block">Tecnologias Empregadas (separadas por vírgula)</label>
                <input type="text" id="tecnologias${experienciaCount}" name="experiencias[${experienciaCount}][tecnologiasEmpregadas]" class="w-full p-2 border border-gray-300 rounded">
            `;
            experienciasDiv.appendChild(experienciaDiv);
        }

        function addFormacao() {
            formacaoCount++;
            const formacoesDiv = document.getElementById('formacoes');
            const formacaoDiv = document.createElement('div');
            formacaoDiv.className = 'mb-4';
            formacaoDiv.innerHTML = `
                <div class="border-t-2 border-gray-300 my-4"></div>
                <h2 class="h2-custom text-xl font-semibold">Formação ${formacaoCount}</h2>
                <label for="instituicao${formacaoCount}" class="block">Instituição</label>
                <input type="text" id="instituicao${formacaoCount}" name="formacoes[${formacaoCount}][instituicao]" class="w-full p-2 border border-gray-300 rounded">
                <label for="foto${formacaoCount}" class="block">Foto</label>
                <input type="text" id="foto${formacaoCount}" name="formacoes[${formacaoCount}][foto]" class="w-full p-2 border border-gray-300 rounded">
                <label for="dataInicio${formacaoCount}" class="block">Data de Início</label>
                <input type="text" id="dataInicio${formacaoCount}" name="formacoes[${formacaoCount}][dataInicio]" class="w-full p-2 border border-gray-300 rounded">
                <label for="dataFim${formacaoCount}" class="block">Data de Fim</label>
                <input type="text" id="dataFim${formacaoCount}" name="formacoes[${formacaoCount}][dataFim]" class="w-full p-2 border border-gray-300 rounded">
                <label for="curso${formacaoCount}" class="block">Curso</label>
                <input type="text" id="curso${formacaoCount}" name="formacoes[${formacaoCount}][curso]" class="w-full p-2 border border-gray-300 rounded">
                <label for="descricao${formacaoCount}" class="block">Descrição</label>
                <textarea id="descricao${formacaoCount}" name="formacoes[${formacaoCount}][descricao]" class="w-full p-2 border border-gray-300 rounded"></textarea>
            `;
            formacoesDiv.appendChild(formacaoDiv);
        }
    </script>
</body>

</html>