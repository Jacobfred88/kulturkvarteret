import Alpine from "alpinejs";
import gsap from "gsap";
import SplitText from "gsap/SplitText";
const Hero = () => {
  Alpine.data("hero", () => ({
    init() {
      document.fonts.ready.then(() => {
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
          gsap.set(this.$refs.text, { opacity: 1 });
          const split = new SplitText(this.$refs.text, { type: "chars,words" });
          tl.fromTo(
            split.chars,
            { opacity: 0 },
            { opacity: 1, ease: "power2.out", stagger: 0.03 },
            "-=50%",
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
            "-=50%",
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
      });
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
