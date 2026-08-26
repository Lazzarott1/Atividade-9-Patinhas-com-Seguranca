# Sistema AUmigos

Sistema para cadastro de clientes e seus animais de estimação.

## Como acessar

1. Abra o navegador (Chrome, Edge, Firefox, etc.).
2. Digite o endereço do sistema na barra de endereços, por exemplo:

   ```
   http://localhost:8080/lucas_lazzarotti_2026/Atividade-9-Patinhas-com-Seguranca/index.php
   ```

3. A página inicial será exibida, com os formulários de cadastro e as listas de clientes e animais.

## Como cadastrar um cliente

1. No formulário **"Cadastrar Cliente!"**, digite o nome do cliente no campo **Nome**.
2. Clique no botão **Cadastrar**.
3. Uma mensagem de confirmação será exibida. Clique em **Voltar** para retornar à página inicial.
4. O novo cliente aparecerá na tabela **"Clientes Cadastrados"**.

## Como cadastrar um animal

1. No formulário **"Cadastrar Animal!"**, preencha os campos:
   - **Nome** do animal
   - **Espécie** (ex.: cachorro, gato)
   - **Raça**
   - **Idade**
   - **Responsável**: selecione o cliente dono do animal na lista
2. Clique no botão **Cadastrar**.
3. Uma mensagem de confirmação será exibida. Clique em **Voltar** para retornar à página inicial.
4. O novo animal aparecerá na tabela **"Animais Cadastrados"**, junto com o nome do responsável.

> Se nenhum cliente aparecer na lista de responsáveis, cadastre um cliente primeiro.

## Como editar um cliente ou animal

1. Na tabela correspondente (**Clientes Cadastrados** ou **Animais Cadastrados**), clique em **Editar** na linha do registro desejado.
2. Altere os campos que quiser.
3. No caso de um animal, o cliente responsável já aparece pré-selecionado na lista — troque somente se quiser mudar o responsável.
4. Clique em **Atualizar**.
5. Clique em **Voltar** para retornar à página inicial e conferir a alteração.

## Como excluir um cliente ou animal

1. Na tabela correspondente, clique em **Excluir** na linha do registro desejado.
2. Uma mensagem confirmará a exclusão. Clique em **Voltar** para retornar à página inicial.

> **Atenção:** não é possível excluir um cliente que ainda tenha animais cadastrados em seu nome. Exclua ou transfira os animais desse cliente antes de tentar excluí-lo.