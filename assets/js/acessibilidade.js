/* ══════════════════════════════════════════════
   ACESSIBILIDADE — MathGame
   Alternador de modo claro/escuro + selo institucional.
   Roda em todas as páginas que carregam este arquivo.
══════════════════════════════════════════════ */
(function () {
  "use strict";

  var STORAGE_KEY = "mathgame_theme";

  function aplicarTemaSalvo() {
    var salvo = null;
    try { salvo = localStorage.getItem(STORAGE_KEY); } catch (e) {}
    if (salvo === "light") {
      document.documentElement.setAttribute("data-theme", "light");
    } else {
      document.documentElement.setAttribute("data-theme", "dark");
    }
  }

  function alternarTema() {
    var atual = document.documentElement.getAttribute("data-theme");
    var novo = atual === "light" ? "dark" : "light";
    document.documentElement.setAttribute("data-theme", novo);
    try { localStorage.setItem(STORAGE_KEY, novo); } catch (e) {}
    atualizarIconeBotao();
  }

  function atualizarIconeBotao() {
    var btn = document.getElementById("mg-a11y-toggle");
    if (!btn) return;
    var claro = document.documentElement.getAttribute("data-theme") === "light";
    btn.textContent = claro ? "🌙" : "☀️";
    btn.setAttribute("aria-pressed", claro ? "true" : "false");
    btn.setAttribute("aria-label", claro ? "Mudar para modo escuro" : "Mudar para modo claro");
  }

  function criarBotaoAcessibilidade() {
    if (document.getElementById("mg-a11y-toggle")) return;
    var btn = document.createElement("button");
    btn.id = "mg-a11y-toggle";
    btn.type = "button";
    btn.title = "Alternar contraste claro/escuro";
    btn.setAttribute("aria-label", "Mudar para modo claro");
    btn.addEventListener("click", alternarTema);
    document.body.appendChild(btn);
    atualizarIconeBotao();
  }

  function criarSeloInstitucional() {
    if (document.getElementById("mg-selo-pic")) return;
    var selo = document.createElement("div");
    selo.id = "mg-selo-pic";
    selo.setAttribute("role", "img");
    selo.setAttribute(
      "aria-label",
      "Projeto de Iniciação Científica - Universidade Iguaçu UNIG"
    );
    selo.innerHTML =
      '<span class="mg-selo-icone">🔬</span>' +
      '<span class="mg-selo-texto">Projeto de Iniciação Científica<br>Universidade Iguaçu — UNIG</span>';
    document.body.appendChild(selo);
  }

  function iniciar() {
    aplicarTemaSalvo();
    criarBotaoAcessibilidade();
    criarSeloInstitucional();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", iniciar);
  } else {
    iniciar();
  }
})();
