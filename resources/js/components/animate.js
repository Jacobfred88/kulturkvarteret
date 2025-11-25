import Alpine from "alpinejs";
import gsap from "gsap";
import SplitText from "gsap/SplitText";
const Animate = () => {
  Alpine.data("animate", (key) => ({
    init() {
      document.fonts.ready.then(() => {
        gsap.set(this.$root, { opacity: 1 });
        console.log("ready!");
        if (key == "revealchar") {
          this.revealChar();
        }

        if (key == "revealchildren") {
          this.revealChildren();
        }
      });
    },
    revealChildren() {
      console.log("reveal children", this.$root);
      var elm = this.$root;
      gsap.fromTo(
        elm.children,
        { opacity: 0 },
        {
          opacity: 1,
          ease: "power2.out",
          stagger: 0.03,
          scrollTrigger: {
            once: true,
            trigger: elm,
            start: "top 75%",
          },
        },
      );
    },
    revealChar() {
      var elm = this.$root;
      const split = new SplitText(elm, { type: "chars,words" });
      gsap.fromTo(
        split.chars,
        { opacity: 0 },
        {
          opacity: 1,
          ease: "power2.out",
          stagger: 0.03,
          scrollTrigger: {
            once: true,
            trigger: elm,
            start: "top 75%",
          },
        },
      );
    },
  }));
};

export { Animate };
