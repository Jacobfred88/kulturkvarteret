import Alpine from "alpinejs";
import Flickity from "flickity";

const Entries = () => {
  Alpine.data("entries", () => ({
    active: 0,
    flkty: null,
    init() {
      this.flkty = new Flickity(this.$el.querySelector(".images"), {
        // options
        cellAlign: "left",
        cellSelector: ".slide",
        pageDots: false,
        wrapAround: true,
        prevNextButtons: false,
      });

      this.flkty.on("select", (index) => {
        this.active = index;
      });

      this.flkty.on("resize", this.alignCards.bind(this));
      requestAnimationFrame(() => {
        this.alignCards();
      });
    },
    alignCards() {
      console.log("ready!", this.flkty.cells);

      this.setTallestHeight(this.flkty.cells);
    },

    setTallestHeight(cells) {
      const elements = cells;
      let maxHeightHeadline = 0;
      let maxHeightText = 0;
      elements.forEach((el) => {
        const headlineElm = el.element.querySelector(
          "[data-alignheight-headline]",
        );
        headlineElm.style.height = "auto";

        const h = headlineElm.offsetHeight;

        headlineElm.style.height = "";

        if (h > maxHeightHeadline) maxHeightHeadline = h;
      });

      elements.forEach((el) => {
        const textElm = el.element.querySelector("[data-alignheight-text]");
        textElm.style.height = "auto";

        const h = textElm.offsetHeight;

        textElm.style.height = "";

        if (h > maxHeightText) maxHeightText = h;
      });
      this.$el.style.setProperty("--alignheighttext", `${maxHeightText}px`);
      this.$el.style.setProperty(
        "--alignheightheadline",
        `${maxHeightHeadline}px`,
      );
    },

    next() {
      this.flkty.next();
    },
    prev() {
      this.flkty.previous();
    },
  }));
};

export { Entries };
