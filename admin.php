<?php
// Conexão com o banco
include "db/conexao_variaveis.php";
include "db/Banco.php";

// Verificação de Login
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  header("Location: login.php");
  exit();
}

// Instancia da classe Banco
$banco = new Banco($servername, $username, $password, $dbname);

// Consulta para obter as mensagens
$result = $banco->select("SELECT * FROM chamado");
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
    <h2 class="titulo-da-pagina">Mensagens Recebidas</h2>

    <?php if ($result && mysqli_num_rows($result) > 0) : ?>
      <div class="table-responsive">
        <table class="table">
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Assunto</th>
            <th>Mensagem</th>
          </tr>
          <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
              <td><?= $row["id"]; ?></td>
              <td><?= $row["nome"]; ?></td>
              <td><?= $row["email"]; ?></td>
              <td><?= $row["assunto"]; ?></td>
              <td><?= $row["mensagem"]; ?></td>
            </tr>
          <?php endwhile; ?>
        </table>
      </div>
    <?php else : ?>
      <p>Nenhuma mensagem recebida ainda.</p>
    <?php endif; ?>

    <a href="logout.php" class="btn-saiba-mais my-3">Sair</a>

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