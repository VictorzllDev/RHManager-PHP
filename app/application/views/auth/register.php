    <style>
      body {
        font-family: Arial, sans-serif;
        max-width: 500px;
        margin: auto;
        padding: 20px;
      }

      form {
        display: flex;
        flex-direction: column;
      }

      label {
        font-weight: bold;
        margin-top: 10px;
      }

      input,
      select,
      button {
        padding: 8px;
        margin-top: 5px;
      }

      button {
        background-color: #28a745;
        color: white;
        border: none;
        cursor: pointer;
        margin-top: 20px;
      }

      button:hover {
        background-color: #218838;
      }
    </style>

    <body>

      <h2>Cadastro de Funcionário</h2>
      <form action="<?= base_url('/register') ?>" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="name" required>

        <label for="cargo">Cargo:</label>
        <input type="text" id="cargo" name="position" required>

        <label for="setor">Setor:</label>
        <input type="text" id="setor" name="department" required>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" maxlength="14" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="phone">

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="password" required>

        <label for="tipo">Tipo:</label>
        <select id="tipo" name="role">
          <option value="comum">Comum</option>
          <option value="gestor">Gestor</option>
        </select>

        <label for="alerta_treinamento">Alerta de Treinamento:</label>
        <textarea id="alerta_treinamento" name="alerta_treinamento"></textarea>

        <button type="submit">Cadastrar</button>
      </form>
