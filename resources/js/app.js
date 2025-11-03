import.meta.glob(["../images/**", "../fonts/**"]);

import Alpine from "alpinejs";
import gsap from "gsap";

import ScrollTrigger from "gsap/ScrollTrigger";
import ScrollToPlugin from "gsap/ScrollToPlugin";

gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

document.addEventListener("DOMContentLoaded", function () {
  Alpine.start();
});
