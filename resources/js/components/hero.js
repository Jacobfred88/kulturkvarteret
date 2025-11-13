import Alpine from "alpinejs";
import gsap from "gsap";
const Hero = () => {
  Alpine.data("hero", () => ({
    init() {
      const tl = gsap.timeline({
        defaults: { duration: 0.8, ease: "power4.out" },
      });

      if (this.$refs.gradient) {
        tl.fromTo(
          this.$refs.gradient,
          { opacity: 0 },
          { opacity: 1, delay: 0.75 },
        );
      }

      if (this.$refs.media) {
        tl.fromTo(
          this.$refs.media,
          { scale: 1.1 },
          { scale: 1, duration: 1.6, delay: this.$refs.gradient ? 0 : 0.4 },
          this.$refs.gradient ? "-=80%" : undefined,
        );
      }

      if (this.$refs.text) {
        tl.fromTo(
          this.$refs.text,
          { opacity: 0 },
          { opacity: 1, ease: "power1.out" },
          "-=105%",
        );
      }

      if (this.$refs.nudge) {
        tl.fromTo(
          this.$refs.nudge,
          { opacity: 0 },
          {
            opacity: 1,
            ease: "power1.out",
          },
          "-=20%",
        );
      }

      if (this.$refs.media) {
        gsap.fromTo(
          this.$refs.media,
          { yPercent: 0 },
          {
            yPercent: 10,
            scrollTrigger: {
              trigger: this.$root,
              start: "top top",
              end: "bottom top",
              scrub: true,
            },
          },
        );
      }

      if (this.$refs.nudge) {
        gsap.fromTo(
          this.$refs.nudge.children,
          { opacity: 1 },
          {
            opacity: 0,
            scrollTrigger: {
              trigger: this.$root,
              start: "top top",
              end: "bottom top",
              scrub: true,
            },
          },
        );
      }
    },
    scrollDown() {
      const nextSection = this.$root.nextElementSibling;
      if (nextSection) {
        gsap.to(window, {
          duration: 1,
          scrollTo: window.innerHeight,
          ease: "power2.inOut",
        });
      }
    },
  }));
};

export { Hero };
