<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            if (input.value.trim() !== "" && !input.nextElementSibling) {
                container = document.getElementById('container-tamanhos');
                const newInput = document.createElement('input');
                newInput.type = 'text';
                newInput.name = 'tamanhos[]';
                newInput.placeholder = 'Tamanho Disponível';
                newInput.onblur = function() {
                    addNewInput(newInput);
                };

                container.appendChild(newInput);

                input.parentNode.parentNode.appendChild(container);
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