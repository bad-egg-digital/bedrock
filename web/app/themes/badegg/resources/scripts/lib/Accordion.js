export default function Accordion()
{
  const accordions = document.querySelectorAll(".js-accordion");

  if(!accordions) return;

  accordions.forEach(accordion => {
    const question = accordion.querySelector(".js-accordion-toggle");

    question.addEventListener("click", function(e) {
      e.preventDefault();
      accordion.classList.toggle("open");
    });
  });
}
