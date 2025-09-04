export default function Header() {
  const body = document.querySelector("body");
  const wrapper = document.querySelector(".wrapper");
  const menuToggle = document.querySelector(".js-menu-toggle");
  const menuClose = document.querySelector(".js-menu-close");

  if(!menuToggle) return;

  menuToggle.addEventListener("click", (e) => {
    e.preventDefault();
    body.classList.toggle("menu-open");

    if(menuToggle.ariaExpanded == 'true') {
      menuToggle.ariaExpanded = 'false';
    } else {
      menuToggle.ariaExpanded = 'true';
    }

    console.log(menuToggle.ariaExpanded);

  });

  menuClose.addEventListener("click", (e) => {
    e.preventDefault();
    body.classList.remove("menu-open");
    menuToggle.ariaExpanded = 'false';

    console.log(menuToggle.ariaExpanded);
  });

  document.addEventListener("keyup", function (event) {
    if (event.key === "Escape") {
      body.classList.remove("menu-open");
      menuToggle.ariaExpanded = 'false';
    }
  });

  document.addEventListener("scroll", () => {
    const scrolled = document.scrollingElement.scrollTop;
    const position = body.offsetTop;
    const header = document.querySelector(".site-header");

    if (scrolled > position + header.offsetHeight) {
      body.classList.add("scrolled");
    } else {
      body.classList.remove("scrolled");
    }
  });

  wrapper.addEventListener("click", (e) => {
    const target = e.target;

    if(!menuToggle.contains(target) && body.classList.contains("menu-open")) {
      body.classList.remove("menu-open");
    }
  });
}
