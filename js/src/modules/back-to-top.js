export function initBackToTop() {
  const backToTop = document.querySelector(".back-to-top");
  const toggleButton = document.getElementById("accessibility-toggle");

  if (!toggleButton && backToTop) {
    backToTop.classList.add("back-to-top--solo");
  }

  if (!backToTop) return;

  window.addEventListener("scroll", () => {
    if (window.scrollY > 300) {
      backToTop.classList.add("show");
      backToTop.removeAttribute("aria-hidden");
      backToTop.removeAttribute("tabindex");
    } else {
      backToTop.classList.remove("show");
      backToTop.setAttribute("aria-hidden", "true");
      backToTop.setAttribute("tabindex", "-1");
    }
  });

  backToTop.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
    document.getElementById("top").focus();
  });
}
