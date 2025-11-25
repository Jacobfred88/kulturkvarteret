import.meta.glob(["../images/**", "../fonts/**"]);

import Alpine from "alpinejs";
import gsap from "gsap";

import ScrollTrigger from "gsap/ScrollTrigger";
import ScrollToPlugin from "gsap/ScrollToPlugin";
import SplitText from "gsap/SplitText";

gsap.registerPlugin(ScrollTrigger, ScrollToPlugin, SplitText);

import { Logo } from "./components/logo";
import { Hero } from "./components/hero";
import { Alignheight } from "./components/alignheight";
import { Entries } from "./components/entries";
import { Animate } from "./components/animate";
import { Menu } from "./components/menu";

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
  Animate();
  Menu();
  Alpine.start();
});
