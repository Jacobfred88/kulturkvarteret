import.meta.glob(["../images/**", "../fonts/**"]);

import Alpine from "alpinejs";
import gsap from "gsap";

import ScrollTrigger from "gsap/ScrollTrigger";
import ScrollToPlugin from "gsap/ScrollToPlugin";

gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

document.addEventListener("DOMContentLoaded", function () {
  Alpine.store("menu", {
    open: false,

    toggle() {
      this.open = !this.open;
      if (this.open) {
        gsap.to(window, { duration: 0.5, scrollTo: 0 });
        document.body.style.overflow = "hidden";
      } else {
        document.body.style.overflow = "";
      }
    },
  });
  Alpine.start();
});
