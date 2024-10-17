const imagensMID = [
  "./imagens/pagina_principal/Kyrie.jpeg",
  "./imagens/pagina_principal/Kyrie2.jpg",
  "./imagens/pagina_principal/Kyrie3.webp",
  "./imagens/pagina_principal/Lebron15HUD.jpg",
];
const imagensLEFT = [
  "./imagens/pagina_principal/KyrieCorpo1.jpg",
  "./imagens/pagina_principal/KyrieCorpo2.jpg",
  "./imagens/pagina_principal/KyrieCorpo3.jpg",
  "./imagens/pagina_principal/LebronHUD.jpg",
];
const imagensRIGHT = [
  "./imagens/pagina_principal/KyrieGame1.webp",
  "./imagens/pagina_principal/KyrieGame2.jpg",
  "./imagens/pagina_principal/KyrieGame3.jpg",
  "./imagens/pagina_principal/Lebron2HUD.webp",
];

const textoHUD = ["Kyrie 5", "Kyrie 5", "Kyrie 7", "Lebron 15"];

let indice = 0;

const textElement = document.getElementById("textHUD");
const imgElement = document.getElementById("imgHUD_LEFT");
const img2Element = document.getElementById("imgHUD_MID");
const img3Element = document.getElementById("imgHUD_RIGHT");

function mudaImagem() {
  textElement.textContent = textoHUD[indice];
  imgElement.src = imagensLEFT[indice];
  img2Element.src = imagensMID[indice];
  img3Element.src = imagensRIGHT[indice];

  indice = (indice + 1) % imagensMID.length;
}

mudaImagem();

setInterval(mudaImagem, 5000);
