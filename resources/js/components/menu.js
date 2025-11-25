import Alpine from "alpinejs";
import gsap from "gsap";
const Menu = () => {
  Alpine.data("menu", () => ({
    init() {
      gsap.set(this.$el, { autoAlpha: 0 });
      console.log("Menu init!");

      this.timeline = this.createTimeline();
      this.$watch("$store.menu.open", (value) => {
        console.log("Menu watch:", value, this.timeline);

        if (value) {
          this.timeline.timeScale(1);
          this.timeline.play();
        } else {
          this.timeline.timeScale(2);
          this.timeline.reverse();
        }
      });
    },
    createTimeline() {
      const tl = gsap.timeline({ paused: true });

      tl.to(this.$el, { autoAlpha: 1, duration: 0.7, ease: "power2.out" });
      tl.fromTo(
        this.$el.children[0],
        {
          opacity: 0,
        },
        {
          opacity: 1,
          y: 0,
          duration: 0.7,
          ease: "power2.out",
        },
        "-=90%",
      );

      return tl;
    },
  }));
};

export { Menu };
