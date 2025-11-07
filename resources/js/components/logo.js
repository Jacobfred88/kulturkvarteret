import Alpine from "alpinejs";
import gsap from "gsap";
const Logo = () => {
  Alpine.data("logo", () => ({
    init() {
      const mm = gsap.matchMedia();
      mm.add("(min-width: 1024px)", () => {
        gsap.fromTo(
          this.$el,
          {
            opacity: 1,
            display: "block",
          },
          {
            opacity: 0,
            display: "none",
            scrollTrigger: {
              // trigger: window,
              start: () => `top top-=${window.innerHeight * 0.6}px`,
              end: () => `start+=${window.innerHeight * 0.8}px`,
              scrub: true,
              invalidateOnRefresh: true,
            },
          },
        );
      });
    },
  }));
};

export { Logo };
