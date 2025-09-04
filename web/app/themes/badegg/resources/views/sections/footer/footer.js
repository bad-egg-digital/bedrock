export default function Footer() {
  const body = document.querySelector("body");
  const footer = document.querySelector(".js-footer");
  const links = footer.querySelectorAll("a");
  const currentURL = location.protocol + '//' + location.host + location.pathname;

  links.forEach(link => {
    const hash = link.hash;
    const href = link.href;

    link.addEventListener("click", () => {
      if(href.includes(currentURL)) {
        body.classList.remove("menu-open");
      }
    });
  });
}
