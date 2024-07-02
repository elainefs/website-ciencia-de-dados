<?php
include "db/conexao_variaveis.php";
include "db/Banco.php";

$banco = new Banco($servername, $username, $password, $dbname);

// Processamento do formulário
$mensagem_enviada = false;
$erro_mensagem = '';

if (isset($_POST["BtEnviar"])) {
 
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $assunto = $_POST['assunto'];
  $mensagem = $_POST['mensagem'];

  // Validação dos campos
  if (empty($nome) || empty($email) || empty($assunto) || empty($mensagem)) {
      $erro_mensagem = "Por favor, preencha todos os campos.";
  } else {
    
      $sql = "INSERT INTO chamado (nome, email, assunto, mensagem)" . "VALUES ('$nome', '$email', '$assunto', '$mensagem')";
      if ($banco->SQL($sql)) {
          $mensagem_enviada = true;
      } else {
          $erro_mensagem = "Erro ao enviar a mensagem. Tente novamente mais tarde.";
      }
  }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <title>Ciência de Dados</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <header>
    <section class="menu-departamentos">
      <div class="container-header d-none d-sm-none d-md-none d-lg-flex">
        <div class="logo-header-uepa">
          <a href="https://www.uepa.br/" target="_blank">
            <img src="img/logo_uepa2023.png" alt="Logo UEPA">
          </a>
        </div>
        <form action="https://google.com.br/search" id="form-busca">
          <input type="search" name="buscaSearch" id="buscaSearch" placeholder="Pesquisar">
          <input type="submit" value="Buscar" id="busca">
        </form>
        <div class="logo-header-sicpa">
          <a href="https://www.sistemas.pa.gov.br/esic/public/main/index.xhtml" target="_blank">
            <img src="img/logo-sic.svg" alt="Logo SIC PA">
          </a>
        </div>
      </div>

      <nav class="menu-opcoes menu-cabecalho navabar navbar-expand-lg">
        <div class="container-fluid">
          <button type="button" class="navbar-toggler me-5" data-bs-toggle="collapse" data-bs-target="#menuNavbarDropdown" aria-controls="menuNavbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fs-1">
              <i class="fa-solid fa-bars"></i>
            </span>
          </button>
          <a href="index.html" class="navbar-brand d-inline-flex text-uppercase fw-bold fs-1 title-font d-lg-none">
            Ciência de Dados
          </a>
          <div class="collapse navbar-collapse" id="menuNavbarDropdown">
            <div class="navbar-nav mx-auto">
              <ul>
                <li><a href="index.html">INÍCIO</a></li>
                <li class="nav-item dropdown mx-4">
                  <a href="#" class="nav-link dropdown-toggle" id="navDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">INSTITUCIONAL</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a href="corpo-docente.html" class="dropdown-item">Corpo docente</a></li>
                    <li><a href="colegiado.html" class="dropdown-item">Colegiado do curso</a></li>
                    <li><a href="nde.html" class="dropdown-item">Núcleo docente estruturante</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown mx-4">
                  <a href="#" class="nav-link dropdown-toggle" id="navDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">CURSO</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a href="estrutura-curso.html" class="dropdown-item">ESTRUTURA DO CURSO</a></li>
                    <li><a href="estrutura-fisica.html" class="dropdown-item">ESTRUTURA FÍSICA</a></li>
                    <li><a href="sistema-avaliacao.html" class="dropdown-item">SISTEMA DE AVALIAÇÃO</a></li>
                  </ul>
                </li>
                <li><a href="fale-conosco.php">Fale Conosco</a></li>
                <li><a href="admin.php">Login</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </section>
  </header>

  <main class="container">
    <h2 class="titulo-da-pagina">Fale Conosco</h2>
    <section>
      <form id="contatoForm" names="contatoForm" action="fale-conosco.php" method="post">
        <div class="form-group">
          <label for="nome">Nome:</label>
          <input type="text" id="nome" name="nome" required>
        </div>
        <div class="form-group">
          <label for="email">E-mail:</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="assunto">Assunto:</label>
          <select id="assunto" name="assunto" required>
            <option value="">Selecione um assunto</option>
            <option value="duvida">Dúvida sobre o curso</option>
            <option value="matricula">Matrícula</option>
            <option value="outros">Outros</option>
          </select>
        </div>
        <div class="form-group">
          <label for="mensagem">Mensagem:</label>
          <textarea id="mensagem" name="mensagem" rows="5" required></textarea>
        </div>
        <button type="submit" id="BtEnviar" name="BtEnviar">Enviar Mensagem</button>
      </form>
    </section>
    <?php if ($mensagem_enviada): ?>
      <div class="alert alert-success">Mensagem enviada com sucesso!</div>
      <?php elseif (!empty($erro_mensagem)): ?>
        <div class="alert alert-danger"><?= $erro_mensagem ?></div>
    <?php endif; ?>
  </main>

  <footer id="rodape">
    <div class="container-footer">
      <div>
        <div class="logo-governo">
          <a href="https://www.uepa.br/" target="_blank">
            <img src="img/logo_gov.png" alt="Logo do Governo">
          </a>
        </div>

        <div class="info-institucional">
          <p>
            <a href="https://www.uepa.br/" target="_blank">UEPA</a> |
            <a href="http://ccnt.uepa.br/" target="_blank">CCNT</a>
          </p>
          <p>ccnt.uepa@gmail.com</p>
        </div>
      </div>

      <div class="midias-sociais">
        <ul class="social">
          <li><a href="https://www.youtube.com/@universidadedoestadodopara3606" target="_blank"><i class="fab fa-youtube"></i></a></li>
          <li><a href="https://twitter.com/uepaoficial" target="_blank"><i class="fab fa-twitter"></i></a></li>
          <li><a href="https://www.facebook.com/UepaOficial/" target="_blank"><i class="fab fa-facebook"></i></a></li>
          <li><a href="https://www.instagram.com/uepaoficial/" target="_blank"><i class="fab fa-instagram"></i></a></li>

        </ul>
      </div>

      <div class="endereco">
        <p>Universidade do Estado do Pará </p>
        <p>Rua do Una, nº 156 - Telégrafo</p>
        <p>Belém-Pará-Brasil | CEP: 66050-540</p>
      </div>
    </div>

    <div class="copyright">
      <p>Copyright &copy; <span id="anoAtual"></span> - Elaine Ferreira e Samily Mendes</p>
    </div>
  </footer>

  <script src="js/bootstrap.min.js.js"></script>
  <script src="js/script.js"></script>

  <!-- VLibras -->
  <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
</body>

</html>