    const filterCard = document.getElementById("filterCard");
    const collapseBtn = document.getElementById("collapseBtn");

    collapseBtn.addEventListener("click", () => {
      filterCard.classList.toggle("collapsed");
    });