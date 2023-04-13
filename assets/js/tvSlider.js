const banner = document.querySelector("#banner");
const trailer = document.querySelector("#trailer");

const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get("id") || "1";

async function iniciarSlider() {
  let filmes = [
    {
      id: "",
      banner: "",
      trailer: "",
    },
  ];

  const filmesRequest = await fetch(`api/GET/getFilmes.php`);
  filmes = await filmesRequest.json();

  let filmeAtual = 0;

  filmes.forEach((filme, index) => {
    if (!trailer.src.includes(filme.trailer)) return;
    filmeAtual = index;
  });

  function setarFilme() {
    banner.src = `./uploads/${filmes[filmeAtual].banner}`;
    trailer.src = `./uploads/${filmes[filmeAtual].trailer}`;

    trailer.play();
  }

  trailer.addEventListener("ended", () => {
    if (filmeAtual === filmes.length - 1) {
      filmeAtual = 0;
    } else {
      filmeAtual++;
    }
    setarFilme();
  });
}

async function definirTv() {
  const tvRequest = await fetch(`api/GET/getTv.php?id=${id}`);
  const tvResponse = await tvRequest.json();

  if (tvResponse.filme != "SLIDER") return (trailer.loop = true);
  iniciarSlider();
}
definirTv();
