document.addEventListener("DOMContentLoaded", () => {
  // text - smooth appear
  (function () {
    const textHolders = [...document.querySelectorAll(".textAppear")];

    if (textHolders.length) {
      for (let i = 0; i < textHolders.length; i++) {
        const textSplice = [...textHolders[i].innerText];
        textHolders[i].innerText = "";

        const delay = parseInt(textHolders[i].getAttribute("data-delay")) || 0;

        // Init
        let word = document.createElement("span");
        word.classList.add("word");

        for (let j = 0; j < textSplice.length; j++) {
          if (textSplice[j] === " ") {
            textHolders[i].innerHTML += " ";
            textHolders[i].appendChild(word);
            word = document.createElement("span"); // new word
          } else if (/[\n\r]+/g.test(textSplice[j])) {
            textHolders[i].innerHTML += " ";
            textHolders[i].appendChild(word);
            word = document.createElement("span"); // new word
            const br = document.createElement("br");
            textHolders[i].appendChild(br);
          } else {
            const letter = document.createElement("span");
            letter.innerText = textSplice[j];
            letter.classList.add("wow", "fadeInRight", "letter");
            letter.setAttribute(
              "data-wow-delay",
              `${(j * 0.005 + delay).toFixed(2)}s`,
            );
            word.appendChild(letter);
          }
        }
        textHolders[i].innerHTML += " ";
        textHolders[i].appendChild(word);
      }
    }
  })();
});

window.addEventListener("load", () => {

  // Global variables and functions
  const body = document.body;
  const overlay = document.getElementById("overlay");
  const closeOverlay = document.getElementById("closeOverlay");
  const expandedMenu = document.querySelector("#expandedMenu");
  const header = document.querySelector("header");

  // Hide page content while loading
  const spinner = document.getElementById("spinner");
  setTimeout(() => {
    body.classList.add("loaded");
    spinner.classList.add("loaded");
  }, 500);

  overlay.addEventListener("click", () => {
    const activeOverlays = document.querySelectorAll(".activeOverlay");
    activeOverlays.forEach((activeOverlay) => {
      activeOverlay.classList.remove("activeOverlay");
    });
    body.classList.remove("discroll");
  });
  closeOverlay.addEventListener("click", () => {
    closeOverlay.classList.remove("red");
    const activeOverlays = document.querySelectorAll(".activeOverlay");
    body.classList.remove("discroll")
    activeOverlays.forEach((activeOverlay) => {
      activeOverlay.classList.remove("activeOverlay");
    });
  });

  function openOverlay(element) {
    overlay.classList.add("activeOverlay");
    closeOverlay.classList.add("activeOverlay");
    body.classList.add("discroll")
    element.classList.add("activeOverlay");
  }

  function closeOverlays(element) {
    element.addEventListener("click", () => {
      const activeOverlays = document.querySelectorAll(".activeOverlay");
      activeOverlays.forEach((activeOverlay) => {
        activeOverlay.classList.remove("activeOverlay");
      });
      body.classList.remove("discroll");
    });
  }

  // Adapt nav for scrolling
  window.addEventListener("scroll", () => {
    if (window.pageYOffset > 0) {
      header.classList.add("roll");
    } else if (window.pageYOffset === 0) {
      header.classList.remove("roll");
    }
  });

  // Close all on overlay click
  overlay.addEventListener("click", () => {
    const activeOverlays = document.querySelectorAll(".activeOverlay");
    activeOverlays.forEach((activeOverlay) => {
      activeOverlay.classList.remove("activeOverlay");
    });
  });

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

  // open resume form
  (function () {
    const resume_wrapper = document.getElementById("resume_wrapper");
    const sendBtns = [...document.querySelectorAll(".resume")];

    if (sendBtns.length && resume_wrapper) {
      const closeResume = document.getElementById("closeResume");

      for (let i = 0; i < sendBtns.length; i++) {
        sendBtns[i].addEventListener("click", () => {
          openOverlay(resume_wrapper);
        });
      }

      closeOverlays(closeResume);

      // Move label up
      const gf2 = document.getElementById("gform_2");
      const inputs = [...gf2.querySelectorAll("#input_2_2")]; // msg
      const labels = [...gf2.querySelectorAll("#field_2_2 > .gfield_label")]; // msg

      for (let i = 0; i < inputs.length; i++) {
        // On focus move label up
        inputs[i].addEventListener("focus", () => {
          labels[i].classList.add("focused");
        });
        inputs[i].addEventListener("blur", () => {
          if (inputs[i].value === "") {
            labels[i].classList.remove("focused");
          }
        });
      }

      // Validate - field is not empty
      const subWrapper = gf2.querySelector(".gform_footer"); // send
      const submit = gf2.querySelector("#gform_submit_button_2"); // send
      subWrapper.classList.add("invalid");
      submit.disabled = true;

      const fileInput = gf2.querySelector("#input_2_1");
      fileInput.addEventListener("change", () => {
        const fileFormat = fileInput.value.match(/\.([^\.]+)$/)[1];
        if (fileFormat === "pdf" || fileFormat === "docx") {
          subWrapper.classList.remove("invalid");
          submit.disabled = false;
        } else {
          subWrapper.classList.add("invalid");
          submit.disabled = true;
        }
      });

      // If inputs are valid
      const imgs = resume_wrapper.querySelectorAll(
        ".connect_img, .connect_figure",
      );
      gf2.addEventListener("submit", () => {
        if (!subWrapper.classList.contains("invalid")) {
          imgs.forEach((img) => {
            img.style.display = "none";
          });
          console.log("Form submitted");
        }
      });
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
    const navBtns = [...document.querySelectorAll("aside .list > li .arrow")];

    if (navPoints.length) {
      for (let i = 0; i < navPoints.length; i++) {
        navBtns[i].addEventListener("click", (e) => {
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
          serviceTape.style.transform = `matrix(1, 0, 0, 1, ${currentTransf}, -50%)`;
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
          serviceTape.style.transform = `matrix(1, 0, 0, 1, ${currentTransf}), -50%)`;
          serviceCards[firstActiveIndex].classList.remove("active");
          firstActiveIndex++;
        }
      });

      // Show all cards on 1000- screens
      if (window.innerWidth < 1000) {
        serviceTape.style.transform = `matrix(1, 0, 0, 1, 0, 0)`;
        serviceCards.forEach(card => {
          card.classList.add("active");
        });
      }
    }
  })();

  // connect_form - open form, open overlay
  (function () {
    const connect_wrapper = document.getElementById("connect_wrapper");

    if (connect_wrapper) {
      const connectBtn = document.querySelectorAll(
        ".openConnect, .smallCheckupBtn",
      );
      const closeConnect = document.getElementById("closeConnect");

      connectBtn.forEach((btn) => {
        btn.addEventListener("click", () => {
          openOverlay(connect_wrapper);
        });
      });
      closeOverlays(closeConnect);
    }
  })();

  // page-news_post - gallery interaction
  (function () {
    const galleries = [...document.querySelectorAll(".gallery")];

    if (galleries.length) {
      for (let i = 0; i < galleries.length; i++) {
        const images = [...galleries[i].querySelectorAll(".tape img")];

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

      // Accent on close btn to find
      video.addEventListener("click", () => {
        closeOverlay.classList.add("accent");
        setTimeout(() => {
          closeOverlay.classList.remove("accent");
        }, 500);
      });
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
          clonedImg.classList.remove("wow", "fadeInRight");
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
            closeOverlay.classList.add("red");

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

        // Accent on close btn to find
        // clonedTape, clonedLightbox
        clonedTape.addEventListener("click", () => {
          closeOverlay.classList.add("accent");
          setTimeout(() => {
            closeOverlay.classList.remove("accent");
          }, 500);
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
      for (let i = 0; i < 2; i++) {
        quotes[i].classList.add("active");
      }

      quotePrev.addEventListener("click", () => {
        quoteIndex--;
        if (quoteIndex < 0) {
          quoteIndex = 0;
        }
        quotes.forEach((quote) => {
          quote.classList.remove("active");
        });
        quotes[quoteIndex].classList.add("active");
      });
      quoteNext.addEventListener("click", () => {
        quoteIndex++;
        if (quoteIndex > quotes.length - 1) {
          quoteIndex = quotes.length - 1;
        }
        quotes.forEach((quote) => {
          quote.classList.remove("active");
        });
        quotes[quoteIndex].classList.add("active");
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

  // Share btns
  (function () {
    // copyLink button
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

  // Styling Gravity Forms
  (function () {
    const gf1 = document.getElementById("gform_1");

    const inputs = [
      ...gf1.querySelectorAll("#input_1_1, #input_1_5, #input_1_4"),
    ]; // name, tel, msg
    const labels = [...gf1.querySelectorAll(".gfield_label")]; // name, tel, msg
    const subWrapper = gf1.querySelector(".gform_footer"); // send wrapper (bg)
    const submit = gf1.querySelector("#gform_submit_button_1"); // send
    const imgs = document.querySelectorAll(".connect_img, .connect_figure");

    const telRegex = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})?([ .-]?)([0-9]{4})/;

    for (let i = 0; i < inputs.length; i++) {
      // On focus move label up
      inputs[i].addEventListener("focus", () => {
        labels[i].classList.add("focused");
      });
      inputs[i].addEventListener("blur", () => {
        if (inputs[i].value === "") {
          labels[i].classList.remove("focused");
        }
      });
      inputs[i].addEventListener("keyup", () => {
        if (inputs[0].value === "") {
          inputs[0].classList.add("invalid");
          subWrapper.classList.add("invalid");
          submit.disabled = true;
        } else {
          inputs[0].classList.remove("invalid");
        }

        if (telRegex.test(inputs[1].value) === false) {
          inputs[1].classList.add("invalid");
          subWrapper.classList.add("invalid");
          submit.disabled = true;
        } else {
          inputs[1].classList.remove("invalid");
        }

        if (
          inputs[0].value !== "" &&
          telRegex.test(inputs[1].value) !== false
        ) {
          subWrapper.classList.remove("invalid");
          submit.disabled = false;
        }
      });
    }

    // If inputs are valid
    gf1.addEventListener("submit", () => {
      imgs.forEach((img) => {
        img.style.display = "none";
      });
      console.log("Form submitted");
    });

    // Custom wow js- appear
    (function () {
      const heightToShow = 150;

      const appears = [...document.querySelectorAll(".appear")];

      // Also on load
      for (let i = 0; i < appears.length; i++) {
        if (
          !(
            appears[i].getBoundingClientRect().top + heightToShow >
              innerHeight ||
            appears[i].getBoundingClientRect().bottom - heightToShow < 0
          )
        ) {
          appears[i].classList.add("appeared");
        }
      }
      window.addEventListener("scroll", () => {
        for (let i = 0; i < appears.length; i++) {
          if (
            !(
              appears[i].getBoundingClientRect().top + heightToShow >
                innerHeight ||
              appears[i].getBoundingClientRect().bottom - heightToShow < 0
            )
          ) {
            appears[i].classList.add("appeared");
          }
        }
      });
    })();

    // folio-main - change work types
    (function () {
      const navBtns = [
        ...document.querySelectorAll(".portfolio_main nav button"),
      ];

      if (navBtns.length) {
        // Mutate to dropdown on 960- screens
        const nav = document.querySelector(".portfolio_main nav:not(.pagination)");
        const navExpand = nav.querySelector(".nav_arrow");

        navExpand.addEventListener("click", () => {
          nav.classList.toggle("expanded");
        });

        // Default
        navBtns[0].classList.add("active");
        const folioPosts = document.querySelectorAll(".other .card");
        const noPosts = document.querySelector(".other .noPosts");
        let serviceType = "all";
        reorder();

        for (let i = 0; i < navBtns.length; i++) {
          navBtns[i].addEventListener("click", (e) => {
            for (let j = 0; j < navBtns.length; j++) {
              navBtns[j].classList.remove("active");
            }
            navBtns[i].classList.add("active");
            if (nav.classList.contains("expanded")) {
              nav.classList.remove("expanded");
            }

            // Reorder posts
            serviceType = navBtns[i].getAttribute("data-term");
            reorder();
          });
        }

        // Reorder posts
        function reorder() {
          noPosts.classList.remove("active");
          let count = 0;

          for (let i = 0; i < folioPosts.length; i++) {
            if (serviceType === "all") {
              folioPosts[i].classList.add("active");
              count++;
            } else {
              if (folioPosts[i].getAttribute("data-term") === serviceType) {
                folioPosts[i].classList.add("active");
                count++;
              } else {
                folioPosts[i].classList.remove("active");
              }
            }
          }

          if (count === 0) {
            noPosts.classList.add("active");
          }
        }
      }
    })();

    // Styling Gravity Forms
    (function () {
      const gf1 = document.getElementById("gform_1");

      const inputs = [
        ...gf1.querySelectorAll("#input_1_1, #input_1_5, #input_1_4"),
      ]; // name, tel, msg
      const labels = [...gf1.querySelectorAll(".gfield_label")]; // name, tel, msg
      const subWrapper = gf1.querySelector(".gform_footer"); // send wrapper (bg)
      const submit = gf1.querySelector("#gform_submit_button_1"); // send
      const imgs = document.querySelectorAll(".connect_img, .connect_figure");

      const telRegex = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})?([ .-]?)([0-9]{4})/;

      for (let i = 0; i < inputs.length; i++) {
        // On focus move label up
        inputs[i].addEventListener("focus", () => {
          labels[i].classList.add("focused");
        });
        inputs[i].addEventListener("blur", () => {
          if (inputs[i].value === "") {
            labels[i].classList.remove("focused");
          }
        });
        inputs[i].addEventListener("keyup", () => {
          if (inputs[0].value === "") {
            inputs[0].classList.add("invalid");
            subWrapper.classList.add("invalid");
            submit.disabled = true;
          } else {
            inputs[0].classList.remove("invalid");
          }

          if (telRegex.test(inputs[1].value) === false) {
            inputs[1].classList.add("invalid");
            subWrapper.classList.add("invalid");
            submit.disabled = true;
          } else {
            inputs[1].classList.remove("invalid");
          }

          if (
            inputs[0].value !== "" &&
            telRegex.test(inputs[1].value) !== false
          ) {
            subWrapper.classList.remove("invalid");
            submit.disabled = false;
          }
        });
      }

      // If inputs are valid
      gf1.addEventListener("submit", () => {
        imgs.forEach((img) => {
          img.style.display = "none";
        });
        console.log("Form submitted");
      });

      // Custom wow js- appear
      (function () {
        const heightToShow = 150;

        const appears = [...document.querySelectorAll(".appear")];

        // Also on load
        for (let i = 0; i < appears.length; i++) {
          if (
            !(
              appears[i].getBoundingClientRect().top + heightToShow >
                innerHeight ||
              appears[i].getBoundingClientRect().bottom - heightToShow < 0
            )
          ) {
            appears[i].classList.add("appeared");
          }
        }
        window.addEventListener("scroll", () => {
          for (let i = 0; i < appears.length; i++) {
            if (
              !(
                appears[i].getBoundingClientRect().top + heightToShow >
                  innerHeight ||
                appears[i].getBoundingClientRect().bottom - heightToShow < 0
              )
            ) {
              appears[i].classList.add("appeared");
            }
          }
        });
      })();

      // service_request form
      (function () {
        const gf3 = document.getElementById("gform_3");

        if (gf3) {
          const inputs = [
            ...gf3.querySelectorAll("#input_3_1, #input_3_5"),
          ]; // name, tel
          const labels = [...gf3.querySelectorAll(".gfield_label")]; // name, tel
          const subWrapper = gf3.querySelector(".gform_footer"); // send wrapper (bg)
          const submit = gf3.querySelector("#gform_submit_button_3"); // send
          const imgs = document.querySelectorAll(".right_form .connect_img, .right_form .connect_figure");

          const telRegex = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})?([ .-]?)([0-9]{4})/;

          for (let i = 0; i < inputs.length; i++) {
            // On focus move label up
            inputs[i].addEventListener("focus", () => {
              labels[i].classList.add("focused");
            });
            inputs[i].addEventListener("blur", () => {
              if (inputs[i].value === "") {
                labels[i].classList.remove("focused");
              }
            });
            inputs[i].addEventListener("keyup", () => {
              if (inputs[0].value === "") {
                inputs[0].classList.add("invalid");
                subWrapper.classList.add("invalid");
                submit.disabled = true;
              } else {
                inputs[0].classList.remove("invalid");
              }

              if (telRegex.test(inputs[1].value) === false) {
                inputs[1].classList.add("invalid");
                subWrapper.classList.add("invalid");
                submit.disabled = true;
              } else {
                inputs[1].classList.remove("invalid");
              }

              if (
                inputs[0].value !== "" &&
                telRegex.test(inputs[1].value) !== false
              ) {
                subWrapper.classList.remove("invalid");
                submit.disabled = false;
              }
            });
          }

          // If inputs are valid
          gf3.addEventListener("submit", () => {
            imgs.forEach((img) => {
              img.style.display = "none";
            });
            console.log("Form submitted");
          });
        }
      })();
    })();

  })();
});
