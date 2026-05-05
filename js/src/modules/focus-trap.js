let activeFocusTrap = null;

const trapFocus = (container) => {
  const isVisible = (el) =>
    !!(el.offsetWidth || el.offsetHeight || el.getClientRects().length);

  const focusableSelectors =
    'a[href], button:not([disabled]), textarea, input, select, [tabindex]:not([tabindex="-1"])';

  const handleTrap = (e) => {
    if (e.key === "Tab") {
      const focusableEls = Array.from(
        container.querySelectorAll(focusableSelectors)
      ).filter((el) => !el.hasAttribute("disabled") && isVisible(el));

      const firstEl = focusableEls[0];
      const lastEl = focusableEls[focusableEls.length - 1];

      if (e.shiftKey && document.activeElement === firstEl) {
        e.preventDefault();
        lastEl.focus();
      } else if (!e.shiftKey && document.activeElement === lastEl) {
        e.preventDefault();
        firstEl.focus();
      }
    }
  };

  container.addEventListener("keydown", handleTrap);
  container.setAttribute("data-trap-bound", "true");

  return () => {
    container.removeEventListener("keydown", handleTrap);
    container.removeAttribute("data-trap-bound");
  };
};

export const activateTrap = (container) => {
  if (typeof activeFocusTrap === "function") {
    activeFocusTrap();
  }
  activeFocusTrap = trapFocus(container);
};

export const deactivateTrap = () => {
  if (typeof activeFocusTrap === "function") {
    activeFocusTrap();
    activeFocusTrap = null;
  }
};
