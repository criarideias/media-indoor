// Botões do menu
const tvsBtn = document.querySelector("#tvs-btn");
const createAdBtn = document.querySelector("#create-ad-btn");
const addMovieBtn = document.querySelector("#add-movie-btn");

const buttons = [tvsBtn, createAdBtn, addMovieBtn];

const tvsContainer = document.querySelector(".tvs-online");
const createAdContainer = document.querySelector(".add-ads");
const addMovieContainer = document.querySelector(".add-film");

const containers = [tvsContainer, createAdContainer, addMovieContainer];

buttons.forEach((btn, indexBtn) => {
  btn.addEventListener("click", () => {
    containers.forEach((container, indexContainer) => {
      if (indexContainer !== indexBtn)
        return (container.style.display = "none");
      container.style.display = "flex";
    });
  });
});

// Leitor da URL que verifica se um painel deverá ser aberto automaticamente
const url = window.location.href;

if (url.includes("adicionarFilme")) {
  addMovieBtn.click();
} else if (url.includes("adicionarAnunciante")) {
  createAdBtn.click();
}

// Triggar os botões de editar para abrir a area de edição
const editArea = document.querySelector(".edit-area");
const editarBtns = document.querySelectorAll("#editar-btn");
const fecharBtn = document.querySelector("#fechar-btn");

editarBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    editArea.style.display = "flex";
  });
});

fecharBtn.addEventListener("click", () => {
  editArea.style.display = "none";
});
