document.addEventListener("DOMContentLoaded", () => {
    const faqItems = document.querySelectorAll(".faq-item");
  
    faqItems.forEach((item) => {
      const summary = item.querySelector("summary");
  
      summary.addEventListener("click", () => {
     
        faqItems.forEach((otherItem) => {
          if (otherItem !== item && otherItem.hasAttribute("open")) {
            otherItem.removeAttribute("open");
          }
        });
  
      
        if (item.hasAttribute("open")) {
          item.scrollIntoView({ behavior: "smooth", block: "center" });
        }
      });
    });
  });
  
