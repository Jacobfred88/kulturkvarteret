import Alpine from "alpinejs";
const Alignheight = () => {
  Alpine.data("alignheight", () => ({
    _alignheightResizeHandler: null,
    init() {
      const setTallestHeight = () => {
        const elements = this.$root.querySelectorAll("[data-alignheight-elm]");
        let maxHeight = 0;
        elements.forEach((el) => {
          el.style.removeProperty("height");
          const h = el.offsetHeight;
          if (h > maxHeight) maxHeight = h;
        });
        this.$el.style.setProperty("--alignheight", `${maxHeight}px`);
      };

      setTallestHeight();

      this._alignheightResizeHandler = () => setTallestHeight();
      window.addEventListener("resize", this._alignheightResizeHandler);

      this.$el._alignheightDestroy = () => {
        window.removeEventListener("resize", this._alignheightResizeHandler);
      };
    },
    destroy() {
      if (this.$el._alignheightDestroy) this.$el._alignheightDestroy();
    },
  }));
};

export { Alignheight };
