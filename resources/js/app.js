import.meta.glob(["../images/**", "../fonts/**"]);

import Alpine from "alpinejs";
import gsap from "gsap";

import ScrollTrigger from "gsap/ScrollTrigger";
import ScrollToPlugin from "gsap/ScrollToPlugin";

gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

import { Logo } from "./components/logo";
import { Hero } from "./components/hero";
import { Alignheight } from "./components/alignheight";
import { Entries } from "./components/entries";

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

  Logo();
  Hero();
  Alignheight();
  Entries();
  Alpine.start();
});
