const filmeExibido = document.querySelector("#filme-exibido");
const mainAds = document.querySelector("#main-ads");
const ads = document.querySelector("#ads");
const adThumbs = document.querySelectorAll("#anunciante-thumb");

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
      `../api/GET/getAnunciante.php?id=${idAnunciante}`
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

const optionsGlobais = [anunciosPrincipaisOptions, anunciosSecundariosOptions];

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

// Variável que armazenará todos os dados úteis da TV
let tv = {
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

// Função ativada quando o usuário clica em Editar
async function definirTv(id) {
  const tvRequest = await fetch(`../api/GET/getTv.php?id=${id}`);
  const tvResponse = await tvRequest.json();

  tv = {
    ...tvResponse,
  };

  // Puxar os dados do filme, caso setado
  if (tv["filme"] !== "SLIDER") {
    const filmeRequest = await fetch(
      `../api/GET/getFilme.php?id=${tv["filme"]}`
    );
    tv["filme"] = await filmeRequest.json();
  }

  // Limpa as thumbs dos ads
  adThumbs.forEach((img) => {
    img.src = "";
  });

  // Limpa todas as opções
  optionsGlobais.forEach((categoria) => {
    categoria.forEach((select) => {
      select.forEach((option) => {
        if (option.textContent !== "Nenhum") return (option.selected = false);
        option.selected = true;
      });
    });
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
    if (anunciante === 0) return;
    const anuncianteRequest = await fetch(
      `../api/GET/getAnunciante.php?id=${anunciante}`
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
    if (anunciante === 0) return;
    const anuncianteRequest = await fetch(
      `../api/GET/getAnunciante.php?id=${anunciante}`
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
}

// Função que salva a TV
async function salvarTv() {
  const filmeSelecionado =
    filmeExibido.options[filmeExibido.selectedIndex].value;
  const anunciantesDefinidos = {
    principais: [],
    secundarios: [],
  };

  anunciosPrincipaisOptions.forEach((select) => {
    select.forEach((option) => {
      if (!option.selected) return;
      const idSalvo = option.value === "null" ? 0 : option.value;
      anunciantesDefinidos.principais.push(idSalvo);
    });
  });

  anunciosSecundariosOptions.forEach((select) => {
    select.forEach((option) => {
      if (!option.selected) return;
      const idSalvo = option.value === "null" ? 0 : option.value;
      anunciantesDefinidos.secundarios.push(idSalvo);
    });
  });

  const body = {
    filme: filmeSelecionado,
    anunciantes: anunciantesDefinidos,
  };

  const tvRequest = await fetch(`../api/POST/editarTv.php?id=${tv.id}`, {
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
    },
    body: JSON.stringify(body),
    method: "POST",
  });

  if (tvRequest.status === 200) {
    window.alert("TV salva com sucesso!");
  } else {
    window.alert("Ocorreu um erro ao tentar salvar essa tv");
  }

  window.location.href = "index.php";
}

fecharBtn.addEventListener("click", salvarTv);
