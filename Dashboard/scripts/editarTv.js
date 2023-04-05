const filmeExibido = document.querySelector("#filme-exibido");
const mainAds = document.querySelector("#main-ads");
const ads = document.querySelector("#ads");
const adThumbs = document.querySelectorAll("#anunciante-thumb");

// Dados da URL
const urlAtual = window.location.href;
const urlSplit = urlAtual.split("/");
const parteIndex = urlSplit[urlSplit.length - 1];
const urlDashboard = urlAtual.replace(parteIndex, "");

// Variáel armazena todos os anunciantes que foram ou serão carregados
const anunciantes = {
  0: {
    id: "",
    nome: "",
    banner: "",
  },
};

// Função ativada quando um select de anunciantes é alterado
async function handleSelectChange(e) {
  const select = e.target;
  const idSelectSplit = select.id.split("-");
  const idAnunciante = select.options[select.selectedIndex].value;

  const posicao = parseInt(idSelectSplit[1]);

  if (idAnunciante == "null") {
    return (adThumbs[posicao].src = "");
  }

  // Caso o anunciante ainda não esteja salvo
  if (!anunciantes[idAnunciante]) {
    const anuncianteRequest = await fetch(
      `${urlDashboard}actions/GET/getAnunciante.php?id=${idAnunciante}`
    );

    if (anuncianteRequest.status !== 200) return;
    const anuncianteResponse = await anuncianteRequest.json();

    anunciantes[anuncianteResponse.id] = anuncianteResponse;
  }

  const anunciante = anunciantes[idAnunciante];

  adThumbs[posicao].src = `../uploads/${anunciante.banner}`;
}

// Armazena todas as options
const anunciosPrincipaisOptions = [];
const anunciosSecundariosOptions = [];

mainAds.childNodes.forEach((div) => {
  if (div.nodeName !== "DIV") return;

  anunciosPrincipaisOptions.push([]);
  const index = anunciosPrincipaisOptions.length - 1;

  div.childNodes.forEach((select) => {
    select.addEventListener("change", handleSelectChange);
    select.childNodes.forEach((option) => {
      if (option.nodeName !== "OPTION") return;

      if (option.textContent == "Nenhum") option.selected = true;
      anunciosPrincipaisOptions[index].push(option);
    });
  });
});

ads.childNodes.forEach((div) => {
  if (div.nodeName !== "DIV" || div.id === "main-ads") return;

  anunciosSecundariosOptions.push([]);
  const index = anunciosSecundariosOptions.length - 1;

  div.childNodes.forEach((select) => {
    select.addEventListener("change", handleSelectChange);
    select.childNodes.forEach((option) => {
      if (option.nodeName !== "OPTION") return;

      if (option.textContent == "Nenhum") option.selected = true;
      anunciosSecundariosOptions[index].push(option);
    });
  });
});

const tv = {
  id: 0,
  filme: {
    nome: "",
    banner: "",
    trailer: "",
  },
  anunciantes: {
    principais: [],
    secundarios: [],
  },
};

async function definirTv(id) {
  const tvRequest = await fetch(
    `${urlDashboard}actions/GET/getTv.php?id=${id}`
  );
  const tv = await tvRequest.json();

  // Puxar os dados do filme, caso setado
  if (tv["filme"] !== "SLIDER") {
    const filmeRequest = await fetch(
      `${urlDashboard}actions/GET/getFilme.php?id=${tv["filme"]}`
    );
    tv["filme"] = await filmeRequest.json();
  }

  // Limpa as thumbs dos ads
  adThumbs.forEach((img) => {
    img.src = "";
  });

  // Setar a opção selecionada de acordo com o filme/slider selecionado
  filmeExibido.childNodes.forEach((option) => {
    if (tv["filme"] === "SLIDER") {
      if (option.textContent === "SLIDER") option.selected = true;
      return;
    }
    if (option.textContent != tv["filme"]["nome"]) return;
    option.selected = true;
  });

  tv.anunciantes.principais.forEach(async (anunciante, index) => {
    const anuncianteRequest = await fetch(
      `${urlDashboard}actions/GET/getAnunciante.php?id=${anunciante}`
    );

    if (anuncianteRequest.status !== 200) return;
    const anuncianteResponse = await anuncianteRequest.json();

    anunciosPrincipaisOptions[index].forEach((option) => {
      if (option.textContent == anuncianteResponse.nome) option.selected = true;
    });
    adThumbs[index].src = `../uploads/${anuncianteResponse.banner}`;

    if (anunciantes[anuncianteResponse.id]) return;
    anunciantes[anuncianteResponse.id] = anuncianteResponse;
  });

  tv.anunciantes.secundarios.forEach(async (anunciante, index) => {
    const anuncianteRequest = await fetch(
      `${urlDashboard}actions/GET/getAnunciante.php?id=${anunciante}`
    );

    if (anuncianteRequest.status !== 200) return;
    const anuncianteResponse = await anuncianteRequest.json();

    anunciosSecundariosOptions[index].forEach((option) => {
      if (option.textContent == anuncianteResponse.nome) option.selected = true;
    });
    adThumbs[index + 2].src = `../uploads/${anuncianteResponse.banner}`;

    if (anunciantes[anuncianteResponse.id]) return;
    anunciantes[anuncianteResponse.id] = anuncianteResponse;
  });

  console.log(anunciantes);
}
