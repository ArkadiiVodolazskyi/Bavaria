window.addEventListener("load", () => {
  // Hide page content while loading
  document.body.classList.remove("loading");

  // Global variables and functions
  const overlay = document.getElementById("overlay");
  const closeOverlay = document.getElementById("closeOverlay");
  const expandedMenu = document.querySelector("#expandedMenu");

  function openOverlay(element) {
    overlay.classList.add("activeOverlay");
    closeOverlay.classList.add("activeOverlay");
    element.classList.add("activeOverlay");

    closeOverlay.addEventListener("click", () => {
      const activeOverlays = document.querySelectorAll(".activeOverlay");
      activeOverlays.forEach((activeOverlay) => {
        activeOverlay.classList.remove("activeOverlay");
      });
    });
    overlay.addEventListener("click", () => {
      activeOverlays.forEach((activeOverlay) => {
        activeOverlay.classList.remove("activeOverlay");
      });
    });
  }

  // Initialize GMaps
  (function () {
    function initMap() {
      const coordinates = { lat: 46.36541074235588, lng: 30.716028340841838 };
      const map = new google.maps.Map(document.querySelector(".map"), {
        center: coordinates,
        zoom: 17,
        disableDefaultUI: false,
        scrollwheel: true,
      });
      const marker = new google.maps.Marker({
        position: coordinates,
        map: map,
      });
    }

    const key = "AIzaSyAUP-_EwsSSdNItxU_gnpAfsC_rdGv_qsg";
  })();

  // Use .img-svg on image to remove it with svg version
  (function () {
    $("img.img-svg").each(function () {
      var $img = $(this);
      var imgClass = $img.attr("class");
      var imgURL = $img.attr("src");
      $.get(
        imgURL,
        function (data) {
          var $svg = $(data).find("svg");
          if (typeof imgClass !== "undefined") {
            $svg = $svg.attr("class", imgClass + " replaced-svg");
          }
          $svg = $svg.removeAttr("xmlns:a");
          if (
            !$svg.attr("viewBox") &&
            $svg.attr("height") &&
            $svg.attr("width")
          ) {
            $svg.attr(
              "viewBox",
              "0 0 " + $svg.attr("height") + " " + $svg.attr("width"),
            );
          }
          $img.replaceWith($svg);
        },
        "xml",
      );
    });
  })();

  // Initialize wow.js
  (function () {
    wow = new WOW({
      boxClass: "wow",
      animateClass: "animated",
      offset: 0,
      mobile: true,
      live: true,
    });
    wow.init();
  })();

  // header - expand hamb
  (function () {
    const hamb =
      document.querySelector(".hamb") ||
      document.querySelector(".hamb_animate");

    if (expandedMenu) {
      hamb.addEventListener("click", () => {
        openOverlay(expandedMenu);
      });
    }
  })();

  // page-home - change info pros
  (function () {
    const pros = [...document.querySelectorAll(".pro_card")];

    if (pros.length) {
      const pro_prev = document.querySelector(".pro_prev");
      const pro_next = document.querySelector(".pro_next");

      // Default
      let proIndex = 0;
      pros[proIndex].classList.add("active");
      for (let i = 1; i < pros.length; i++) {
        pros[i].style.transform = "translateX(100%)";
      }

      function changePros(proIndex) {}

      pro_prev.addEventListener("click", () => {
        proIndex--;
        if (proIndex < 0) {
          proIndex = 0;
        } else {
          pros[proIndex + 1].style.transform = "translateX(100%)";
          pros[proIndex + 1].classList.remove("active");
          pros[proIndex].classList.add("active");
          pros[proIndex].style.transform = "translateX(0%)";
        }
      });
      pro_next.addEventListener("click", () => {
        proIndex++;
        if (proIndex > pros.length - 1) {
          proIndex = pros.length - 1;
        } else {
          pros[proIndex - 1].style.transform = "translateX(-100%)";
          pros[proIndex - 1].classList.remove("active");
          pros[proIndex].classList.add("active");
          pros[proIndex].style.transform = "translateX(0%)";
        }
      });
    }
  })();

  // page-vacancies - expand
  (function () {
    const vacancies = [...document.querySelectorAll(".vacancy")];

    if (vacancies.length) {
      const vacExpands = [...document.querySelectorAll(".expand")];

      for (let i = 0; i < vacExpands.length; i++) {
        vacExpands[i].addEventListener("click", () => {
          if (vacancies[i].classList.contains("active")) {
            vacancies[i].classList.remove("active");
          } else {
            for (let j = 0; j < vacancies.length; j++) {
              vacancies[j].classList.remove("active");
            }

            vacancies[i].classList.add("active");
          }
        });
      }
    }
  })();

  // page-about - master slider
  (function () {
    const masterNames = [...document.querySelectorAll(".master_name .name")];

    if (masterNames.length) {
      const masterImgs = [...document.querySelectorAll(".master_img img")];
      const masterPrev = document.querySelector(".master_prev");
      const masterNext = document.querySelector(".master_next");

      // Default
      masterIndex = 0;
      masterNames[masterIndex].classList.add("active");
      masterImgs[masterIndex].classList.add("active");
      masterPrev.classList.remove("active");
      masterNext.classList.add("active");

      function masterChange(masterIndex) {
        if (masterIndex < 0) {
          masterIndex = 0;
          masterPrev.classList.remove("active");
        } else if (masterIndex > masterNames.length - 1) {
          masterIndex = masterNames.length - 1;
          masterNext.classList.remove("active");
        } else {
          masterPrev.classList.add("active");
          masterNext.classList.add("active");
        }

        if (masterIndex - 1 < 0) {
          masterPrev.classList.remove("active");
        }
        if (masterIndex + 1 > masterNames.length - 1) {
          masterNext.classList.remove("active");
        }

        for (let i = 0; i < masterNames.length; i++) {
          masterNames[i].classList.remove("active");
          masterImgs[i].classList.remove("active");
        }

        masterNames[masterIndex].classList.add("active");
        masterImgs[masterIndex].classList.add("active");
      }

      masterPrev.addEventListener("click", () => {
        masterIndex--;

        masterChange(masterIndex);
      });

      masterNext.addEventListener("click", () => {
        masterIndex++;

        masterChange(masterIndex);
      });
    }
  })();

  // page-service_post - expand nav
  (function () {
    const navPoints = [...document.querySelectorAll("aside .list > li")];

    if (navPoints.length) {
      for (let i = 0; i < navPoints.length; i++) {
        navPoints[i].addEventListener("click", (e) => {
          e.preventDefault();
          navPoints[i].classList.toggle("active");
        });
      }

      // Mutate on 360 screens
      const nav = document.querySelector(".workshop aside");
      const navExpand = nav.querySelector(".navExpand");

      navExpand.addEventListener("click", () => {
        nav.classList.toggle("expanded");
      });
    }
  })();

  // page-service_post - services slider
  (function () {
    const serviceTape = document.querySelector(".popular .cards");

    if (serviceTape) {
      const serviceCards = [...serviceTape.querySelectorAll(".card ")];
      const servicePrevBtn = document.querySelector(".popular .master_prev");
      const serviceNextBtn = document.querySelector(".popular .master_next");

      // Default
      let currentTransf = 0;
      const transDif = serviceCards[0].offsetWidth;
      let firstActiveIndex = 0;
      let lastActiveIndex = 3;
      for (let i = firstActiveIndex; i <= lastActiveIndex; i++) {
        serviceCards[i].classList.add("active");
      }

      servicePrevBtn.addEventListener("click", () => {
        firstActiveIndex--;
        if (firstActiveIndex < 0) {
          firstActiveIndex = 0;
        } else {
          serviceCards[firstActiveIndex].classList.add("active");
          currentTransf = currentTransf + transDif;
          serviceTape.style.transform = `matrix(1, 0, 0, 1, ${currentTransf}), -50%`;
          serviceCards[lastActiveIndex].classList.remove("active");
          lastActiveIndex--;
        }
      });
      serviceNextBtn.addEventListener("click", () => {
        lastActiveIndex++;
        if (lastActiveIndex > serviceCards.length - 1) {
          lastActiveIndex = serviceCards.length - 1;
        } else {
          serviceCards[lastActiveIndex].classList.add("active");
          currentTransf = currentTransf - transDif;
          serviceTape.style.transform = `matrix(1, 0, 0, 1, ${currentTransf}), -50%`;
          serviceCards[firstActiveIndex].classList.remove("active");
          firstActiveIndex++;
        }
      });
    }
  })();

  // connect_form - open form, open overlay
  (function () {
    const connect_wrapper = document.getElementById("connect_wrapper");

    if (connect_wrapper) {
      const connectBtn = document.querySelectorAll(".openConnect");
      const closeConnect = document.getElementById("closeConnect");

      connectBtn.forEach((btn) => {
        btn.addEventListener("click", () => {
          overlay.classList.add("activeOverlay");
          connect_wrapper.classList.add("activeOverlay");
        });
      });
      closeConnect.addEventListener("click", () => {
        connect_wrapper.classList.remove("activeOverlay");
        overlay.classList.remove("activeOverlay");
      });
      overlay.addEventListener("click", () => {
        connect_wrapper.classList.remove("activeOverlay");
        overlay.classList.remove("activeOverlay");
      });
    }
  })();

  // page-news_post - gallery interaction
  (function () {
    const galleries = [...document.querySelectorAll(".gallery")];

    if (galleries.length) {
      for (let i = 0; i < galleries.length; i++) {
        const images = [...galleries[i].querySelectorAll(".tape > img")];

        if (images.length) {
          // Copy all to the big one
          const tape = galleries[i].querySelector(".tape");
          let clonedTape = tape.cloneNode(true);
          clonedTape.classList = "big";
          galleries[i].appendChild(clonedTape);

          const bigImages = [...clonedTape.querySelectorAll("img")];

          // Default
          images[0].classList.add("active");
          bigImages[0].classList.add("active");

          // Change active on tape image click
          for (let i = 0; i < images.length; i++) {
            images[i].addEventListener("click", () => {
              for (let j = 0; j < images.length; j++) {
                images[j].classList.remove("active");
                bigImages[j].classList.remove("active");
              }
              images[i].classList.add("active");
              bigImages[i].classList.add("active");
            });
          }

          // Move tape with imgs
          let currentTransf = 0;
          const transDif = 170;
          let firstImgOnTape = 0;
          let lastImgOnTape = 3;

          const tape_prev = galleries[i].querySelector(".tape_prev");
          const tape_next = galleries[i].querySelector(".tape_next");

          tape_prev.addEventListener("click", () => {
            firstImgOnTape--;
            if (firstImgOnTape < 0) {
              firstImgOnTape = 0;
            } else {
              lastImgOnTape--;
              currentTransf = currentTransf + transDif;
              tape.style.transform = `matrix(1, 0, 0, 1, 0, ${currentTransf})`;
            }
          });
          tape_next.addEventListener("click", () => {
            lastImgOnTape++;
            if (lastImgOnTape > bigImages.length - 1) {
              lastImgOnTape = bigImages.length - 1;
            } else {
              firstImgOnTape++;
              currentTransf = currentTransf - transDif;
              tape.style.transform = `matrix(1, 0, 0, 1, 0, ${currentTransf})`;
            }
          });
        }
      }
    }
  })();

  // page-about - open fillscreen video
  (function () {
    const video = document.getElementById("video");
    const openVideo = document.getElementById("openVideo");

    if (video && openVideo) {
      openVideo.addEventListener("click", () => {
        openOverlay(video);
      });
      // Stop video on close
      // closeOverlay.addEventListener("click", () => {
      //   video.querySelector("iframe").getPlayerState(2);
      // });
    }
  })();

  // lightbox
  (function () {
    const lightboxes = [...document.querySelectorAll(".lightbox")];

    if (lightboxes.length) {
      for (let i = 0; i < lightboxes.length; i++) {
        const imgs = lightboxes[i].querySelectorAll("img");

        const clonedLightbox = document.createElement("div");
        clonedLightbox.classList = "clonedLightbox";
        const clonedTape = document.createElement("div");
        clonedTape.classList = "clonedTape";

        for (let k = 0; k < imgs.length; k++) {
          let clonedImg = imgs[k].cloneNode(false);
          clonedTape.appendChild(clonedImg);
        }

        const clonedPrevBtn = document.createElement("button");
        clonedPrevBtn.textContent = "<";
        clonedPrevBtn.classList = "clonedPrevBtn";
        const clonedNextBtn = document.createElement("button");
        clonedNextBtn.textContent = ">";
        clonedNextBtn.classList = "clonedNextBtn";

        clonedLightbox.appendChild(clonedTape);
        clonedLightbox.appendChild(clonedPrevBtn);
        clonedLightbox.appendChild(clonedNextBtn);
        document.body.appendChild(clonedLightbox);

        const clonedImgs = clonedLightbox.querySelectorAll("img");
        clonedImgIndex = 0;

        for (let j = 0; j < imgs.length; j++) {
          imgs[j].addEventListener("click", () => {
            openOverlay(clonedLightbox);

            clonedImgs.forEach((image) => {
              image.classList.remove("activeOverlay");
            });
            clonedImgs[j].classList.add("activeOverlay");
            clonedImgIndex = j;
          });
        }

        // Buttons
        clonedPrevBtn.addEventListener("click", () => {
          clonedImgIndex--;
          if (clonedImgIndex < 0) {
            clonedImgIndex = 0;
          } else {
            clonedImgs[clonedImgIndex + 1].classList = "";
            clonedImgs[clonedImgIndex].classList = "activeOverlay";
          }
        });
        clonedNextBtn.addEventListener("click", () => {
          clonedImgIndex++;
          if (clonedImgIndex > clonedImgs.length - 1) {
            clonedImgIndex = clonedImgs.length - 1;
          } else {
            clonedImgs[clonedImgIndex - 1].classList = "";
            clonedImgs[clonedImgIndex].classList = "activeOverlay";
          }
        });
      }
    }
  })();

  // page-service_post - change quote cards
  (function () {
    const quotes = [...document.querySelectorAll(".quote_card")];

    if (quotes.length) {
      const quotePrev = document.querySelector(".reviews .quote_prev");
      const quoteNext = document.querySelector(".reviews .quote_next");

      // Default
      let quoteIndex = 0;
      let perQuotes = 2;
      for (let i = quoteIndex; i < perQuotes; i++) {
        quotes[i].classList.add("active");
      }

      quotePrev.addEventListener("click", () => {
        quoteIndex -= perQuotes;
        if (quoteIndex < 0) {
          quoteIndex = 0;
        }
        quotes.forEach((quote) => {
          quote.classList.remove("active");
        });
        for (let i = quoteIndex; i < quoteIndex + perQuotes; i++) {
          quotes[i].classList.add("active");
        }
      });
      quoteNext.addEventListener("click", () => {
        quoteIndex += perQuotes;
        if (quoteIndex > quotes.length - 1) {
          quoteIndex = quotes.length - 1;
        }
        quotes.forEach((quote) => {
          quote.classList.remove("active");
        });
        for (let i = quoteIndex; i < quoteIndex + perQuotes; i++) {
          quotes[i].classList.add("active");
        }
      });
    }
  })();

  // page-main - navpages - change pages in news section
  (function () {
    const pages = [
      ...document.querySelectorAll("section.news:not(.blog_news) .pages .page"),
    ];
    const navpagesWrapper = document.querySelector("section.news .navpages");

    if (pages.length && navpagesWrapper) {
      for (let i = 0; i < pages.length; i++) {
        const newNavpage = document.createElement("li");
        navpagesWrapper.appendChild(newNavpage);
      }

      const navPages = [...navpagesWrapper.querySelectorAll("li")];

      // Default
      pages[0].classList.add("active");
      navPages[0].classList.add("active");

      for (let i = 0; i < navPages.length; i++) {
        navPages[i].addEventListener("click", () => {
          for (let j = 0; j < pages.length; j++) {
            pages[j].classList.remove("active");
            navPages[j].classList.remove("active");
          }
          pages[i].classList.add("active");
          navPages[i].classList.add("active");
        });
      }
    }
  })();

  // copyLink button
  (function () {
    const copyLinks = [...document.querySelectorAll(".copyLink")];

    if (copyLinks.length) {
      const copyMsgs = [...document.querySelectorAll(".savedMsg")];

      for (let i = 0; i < copyLinks.length; i++) {
        copyLinks[i].addEventListener("click", () => {
          const copyText = document.URL;
          navigator.clipboard.writeText(copyText);

          copyMsgs[i].classList.add("active");
          setTimeout(() => {
            copyMsgs[i].classList.remove("active");
          }, 1000);
        });
      }
    }
  })();

  // folio-main - change work types
  (function () {
    const navBtns = [
      ...document.querySelectorAll(".portfolio_main nav button"),
    ];

    if (navBtns.length) {
      // Mutate to dropdown on 360 screens
      const nav = document.querySelector(".portfolio_main nav");
      const navExpand = nav.querySelector(".nav_arrow");

      navExpand.addEventListener("click", () => {
        nav.classList.toggle("expanded");
      });

      // Default
      navBtns[0].classList.add("active");

      for (let i = 0; i < navBtns.length; i++) {
        navBtns[i].addEventListener("click", (e) => {
          for (let j = 0; j < navBtns.length; j++) {
            navBtns[j].classList.remove("active");
          }
          navBtns[i].classList.add("active");
          if (nav.classList.contains("expanded")) {
            nav.classList.remove("expanded");
          }
        });
      }
    }
  })();

  // make button fixed on scroll
  (function () {
    const navCheckupBtn = document.getElementById("navCheckupBtn");

    if (navCheckupBtn) {
      window.addEventListener("scroll", () => {
        if (window.pageYOffset > 250) {
          navCheckupBtn.classList.add("toBottom");
        } else {
          navCheckupBtn.classList.remove("toBottom");
        }
      });
    }
  })();

  // ========= Media =========

  // Expand footer menus
  (function () {
    const footerMenus = document.querySelectorAll(
      "footer .clients, footer .services",
    );

    if (footerMenus.length) {
      const expandArrows = document.querySelectorAll("footer .arrow");

      for (let i = 0; i < expandArrows.length; i++) {
        expandArrows[i].addEventListener("click", () => {
          footerMenus[i].classList.toggle("expanded");
        });
      }
    }
  })();

  // mobslider
  (function () {
    const mobsliders = [...document.querySelectorAll(".mobslider")];

    if (mobsliders.length) {
      for (let i = 0; i < mobsliders.length; i++) {
        const wrapper = mobsliders[i].closest(".mobwrapper");
        const cards = [...mobsliders[i].children];

        if (!wrapper.classList.contains("mobwrapper")) {
          console.error("No wrapper for: ", mobsliders[i]);
        }

        // Make mobslider dots
        const dotsWrapper = document.createElement("ul");
        dotsWrapper.classList.add("dotsWrapper");
        for (let j = 0; j < cards.length; j++) {
          const mobDot = document.createElement("li");
          mobDot.classList.add("mobDot");
          dotsWrapper.appendChild(mobDot);
        }
        wrapper.appendChild(dotsWrapper);

        const mobDots = wrapper.querySelectorAll(".dotsWrapper .mobDot");

        // Find cards widths
        const newCardsMargins = 8;
        const cardWidths = [];
        for (let j = 0; j < cards.length; j++) {
          cards[j].style.marginLeft = `${newCardsMargins}px`;
          cards[j].style.marginRight = `${newCardsMargins}px`;
          cardWidths.push(cards[j].offsetWidth + 2 * newCardsMargins);
        }

        // Link cards and mobDots together
        let cardsTranslate = 0;
        mobDots[0].classList.add("active");

        for (let j = 0; j < mobDots.length; j++) {
          mobDots[j].addEventListener("click", () => {
            for (let k = 0; k < j; k++) {
              cardsTranslate -= cardWidths[k];
            }
            mobsliders[
              i
            ].style.transform = `matrix(1, 0, 0, 1, ${cardsTranslate}, 0)`;
            mobDots.forEach((mobDot) => {
              mobDot.classList.remove("active");
            });
            mobDots[j].classList.add("active");
            cardsTranslate = 0;
          });
        }
      }
    }
  })();

  // expand expandedMenu menus
  (function () {
    const expandedLists = [
      ...expandedMenu.querySelectorAll(
        ".clients, .services, .phones, .contacts",
      ),
    ];
    const expandMenuBtns = [...expandedMenu.querySelectorAll(".arrow")];

    for (let i = 0; i < expandMenuBtns.length; i++) {
      expandMenuBtns[i].addEventListener("click", () => {
        expandedLists[i].classList.toggle("expanded");
        if (i == 2) {
          expandedLists[3].classList.toggle("expanded");
        }
      });
    }
  })();
});
