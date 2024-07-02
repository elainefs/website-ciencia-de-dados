// Validação de busca
function validaBusca() {
  if (document.querySelector("#buscaSearch").value == "") {
    document.querySelector("#form-busca").style.background = "red";
    document.querySelector("#buscaSearch").style.border = "1px solid red";
    return false;
  }
}

document.querySelector("#form-busca").onsubmit = validaBusca;

// Definição automática do ano atual
let anoAtual = document.getElementById("anoAtual");
anoAtual.innerHTML = new Date().getFullYear();

// Banner Rotativo
const banners = [
  "img/banner01.jpeg",
  "img/banner02.jpg",
];
let bannerAtual = 0;

function trocarBanner() {
  bannerAtual = (bannerAtual + 1) % banners.length;
  const banner = document.querySelector("#banner");
  banner.style.backgroundImage = `url(${banners[bannerAtual]})`;
}

setInterval(trocarBanner, 1500);
