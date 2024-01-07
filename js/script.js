const styleToggle = document.getElementById("style-toggle");
const styleLink = document.getElementById("style-link");
const toggleImage = document.getElementById("img");

document.addEventListener("DOMContentLoaded", () => {
    // Verifique se já há uma escolha armazenada no Local Storage
    const storedStyle = localStorage.getItem("selectedStyle");
    if (storedStyle === "dark") {
        styleToggle.checked = true;
        styleLink.href = "./css/style-escuro.css";
        toggleImage.src = toggleImage.getAttribute("data-dark-image");
    }

    document.body.style.display = "block";
});

styleToggle.addEventListener("change", () => {
    if (styleToggle.checked) {
        styleLink.href = "./css/style-escuro.css";
        toggleImage.src = toggleImage.getAttribute("data-dark-image");
        localStorage.setItem("selectedStyle", "dark"); // Armazene a escolha no Local Storage
    } else {
        styleLink.href = "./css/style.css";
        toggleImage.src = "./img/modo-escuro.png"; // Imagem do modo claro
        localStorage.removeItem("selectedStyle"); // Remova a escolha do Local Storage
    }
});

// Habilitado

// styleLink.href = "../css/style-escuro.css";
// toggleImage.src = toggleImage.getAttribute("data-dark-image");

// Desabilitado

// styleLink.href = "../css/style.css";
// toggleImage.src = "../img/modo-escuro.png";

// Adicionando botões de atalho na textarea

function adicionarAtalho(atalho) {
    var editor = document.getElementById("assunto");
    var textoAtual = editor.value;
    var selecaoInicio = editor.selectionStart;
    var selecaoFim = editor.selectionEnd;

    var textoAntes = textoAtual.substring(0, selecaoInicio);
    var textoDepois = textoAtual.substring(selecaoFim);

    var novoTexto = textoAntes + atalho + textoDepois;

    editor.value = novoTexto;

    // Atualize a posição do cursor após a inserção do atalho
    var novaPosicaoCursor = selecaoInicio + atalho.length;
    editor.setSelectionRange(novaPosicaoCursor, novaPosicaoCursor);
}

// Script do PESQUISAR

var search = document.getElementById("pesquisar");

search.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        searchData();
    }
});

function searchData() {
    var Caminho = window.location.pathname;
    window.location = Caminho + "?search=" + search.value;
}

// Limpa o campo de pesquisa e remove o parâmetro da URL quando a página é recarregada.
if (!window.location.search.includes("search=")) {
    search.value = "";
}

// Script do butão de like
function likePost(button) {
    button.classList.toggle("liked");
}
