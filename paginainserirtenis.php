<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./estilos/paginainserirtenis.css" rel="stylesheet">
</head>
<body>
    <form id="inserir" action="inserir_dados.php" method="get" onsubmit="return validateForm(event)">
        <input name="codigo" type="text" placeholder="Código do Tênis" required>
        <input name="nome" type="text" placeholder="Nome do Tênis" required>
        <input name="valor" type="number" placeholder="Valor do Tênis" required>
        <input name="descricao" type="text" placeholder="Descrição do Tênis" required>
        <input name="url-imagem[]" type="file" placeholder="URL da imagem 1" multiple required>
        <div id="container-tamanhos">
            <input name="tamanhos[]" type="text" placeholder="Tamanho Disponível" onblur="addNewInput(this)" required>
        </div>

        <input type="submit" value="Inserir">
    </form>

    <script>
        function addNewInput(input) {
            const container = document.getElementById("container-tamanhos");
            const inputs = container.querySelectorAll("input[name='tamanhos[]']");
            if (input.value.trim() !== "" && !input.nextElementSibling) {
                const newInput = document.createElement('input');
                newInput.type = 'text';
                newInput.name = 'tamanhos[]';
                newInput.placeholder = 'Tamanho Disponível';
                newInput.onblur = function() {
                    addNewInput(newInput);
                };

                container.appendChild(newInput);
            }
            if (inputs.length > 1) {
                const penultimoInput = inputs[inputs.length - 2];
                const ultimoInput = inputs[inputs.length - 1];

                if (penultimoInput.value.trim() === "" && input === penultimoInput) {
                    container.removeChild(ultimoInput);
                }
            }
        }

        function validateForm(){
            const inputs = document.querySelectorAll('input[name="tamanhos[]"]')

            for (let input of inputs) {
                if (input.value.trim() === "") {
                    input.remove();
                }
            }

            return true;
        }
    </script>
</body>
</html>