// function to delete extra slides on smaller screens
function deleteExtraSlides(width = 600, sliderSelector, leaveSlides = 4) {
  let slidesLength = document.querySelector(sliderSelector).querySelectorAll(".slick-slide").length;
  if (window.innerWidth <= width) {
    for (let i = slidesLength - 1; i >= leaveSlides; i--) {
      $(sliderSelector).slick('slickRemove', i);
    }
  }
  window.addEventListener("scroll", () => {
    if (window.innerWidth <= width) {
      for (let i = slidesLength - 1; i >= leaveSlides; i--) {
        $(sliderSelector).slick('slickRemove', i);
      }
    }
  });
}

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
              `${(j * 0.002 + delay).toFixed(2)}s`,
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
  let YOffset = null;
  const videoPlayer = document.querySelector("#video video");

  // Hide page content while loading
  const spinner = document.getElementById("spinner");
  setTimeout(() => {
    body.classList.add("loaded");
    spinner.classList.add("loaded");
  }, 500);

  closeOverlays(overlay);

  closeOverlay.addEventListener("click", () => {
    closeOverlay.classList.remove("red");

    // Close hamb menu tabs
    const expandedMenuTabs = document.querySelectorAll("#expandedMenu > .expanded");
    if (expandedMenuTabs.length) {
      setTimeout(() => {
        expandedMenuTabs.forEach(tab => {
          tab.classList.remove("expanded");
        });
      }, 0);
    }

    // Animate on close
    closeOverlay.classList.add("closing");
    setTimeout(() => {
      closeOverlay.classList.remove("closing");
    }, 1000);
    setTimeout(() => {
      // Other stuff
      const activeOverlays = document.querySelectorAll(".activeOverlay");
      activeOverlays.forEach((activeOverlay) => {
        activeOverlay.classList.remove("activeOverlay");
      });
      closeOverlay.classList.remove("playVideo");
      if (videoPlayer) {
        videoPlayer.pause();
      }

      body.classList.remove("discroll");
      body.style.top = "unset";
      window.scrollTo(0, YOffset);
      body.style.width = `100%`;
    }, 200);
  });


  function openOverlay(element, withClose = true) {
    // Disable scroll
    YOffset = window.pageYOffset;

    overlay.classList.add("activeOverlay");
    iWidth = window.innerWidth;
    body.classList.add("discroll");
    body.style.top = `${-YOffset}px`;
    body.style.width = `${window.innerWidth}px`;

    element.classList.add("activeOverlay");
    if (withClose) {
      closeOverlay.classList.add("activeOverlay");
    }
  }

  function closeOverlays(element) {
    element.addEventListener("click", () => {
      const activeOverlays = document.querySelectorAll(".activeOverlay");
      activeOverlays.forEach((activeOverlay) => {
        activeOverlay.classList.remove("activeOverlay");
      });
      closeOverlay.classList.remove("playVideo");
      if (videoPlayer) {
        videoPlayer.pause();
      }

      body.classList.remove("discroll");
      body.style.top = "unset";
      window.scrollTo(0, YOffset);
      body.style.width = `100%`;
    });
  }

  // Adapt nav for scrolling
  if (window.pageYOffset > 0) {
    header.classList.add("roll");
  }
  window.addEventListener("scroll", () => {
    if (window.pageYOffset > 0) {
      header.classList.add("roll");
    } else if (window.pageYOffset === 0) {
      header.classList.remove("roll");
    }
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
      offset: -100,
      mobile: true,
      live: true,
    });
    wow.init();

    // Change duration to all the elements
    const wows = document.querySelectorAll(".wow");

    if (wows.length) {
      for (let i = 0; i < wows.length; i++) {

        wows[i].setAttribute("data-wow-duration", "0.5s");

      }
    }
  })();

  // ---------------Other -----------------------

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
          openOverlay(resume_wrapper, false);
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
      gf2.addEventListener("submit", () => {
        if (!subWrapper.classList.contains("invalid")) {
          const imgs = document.querySelectorAll("#resume_wrapper > img, #resume_wrapper > svg");
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
          openOverlay(connect_wrapper, false);
        });
      });
      closeOverlays(closeConnect);
    }
  })();

  // single-blog - gallery interaction
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
    const triangle = document.querySelector(".openVideo");

    if (video && openVideo) {
      openVideo.addEventListener("click", () => {
        openOverlay(video);
        videoPlayer.load();
        videoPlayer.autoplay = true;
        closeOverlay.classList.add("playVideo");
      });

      // Accent on close btn to find
      video.addEventListener("click", () => {
        closeOverlay.classList.add("accent");
        setTimeout(() => {
          closeOverlay.classList.remove("accent");
        }, 500);
      });
    }

    if (triangle) {
      triangle.addEventListener("click", () => {
        openOverlay(video);
        videoPlayer.load();
        videoPlayer.autoplay = true;
        closeOverlay.classList.add("playVideo");
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

  // Styling Gravity Forms
  (function () {
    const gf1 = document.getElementById("gform_1");

    const inputs = [
      ...gf1.querySelectorAll("#input_1_1, #input_1_5, #input_1_4"),
    ]; // name, tel, msg
    const labels = [...gf1.querySelectorAll(".gfield_label")]; // name, tel, msg
    const subWrapper = gf1.querySelector(".gform_footer"); // send wrapper (bg)
    const submit = gf1.querySelector("#gform_submit_button_1"); // send

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
      const imgs = document.querySelectorAll("#connect_wrapper > img, #connect_wrapper > svg");
      imgs.forEach((img) => {
        img.style.display = "none";
      });
      console.log("Form submitted");
    });

    // Custom wow js- appear
    (function () {
      const heightToShow = -80; // lesser => earlier

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

  // Expand footer menus
  (function () {
    const footerMenus = document.querySelectorAll(
      "footer .clients, footer .services",
    );

    if (footerMenus.length) {
      const expandArrows = document.querySelectorAll("footer .arrow");

      for (let i = 0; i < expandArrows.length; i++) {
        expandArrows[i].addEventListener("click", () => {
          footerMenus.forEach(footerMenu => {
            footerMenu.classList.remove("expanded");
          });
          footerMenus[i].classList.add("expanded");
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
    const expandMenuH5s = [...expandedMenu.querySelectorAll("h5")];

    if (expandMenuH5s.length) {

      for (let i = 0; i < expandMenuH5s.length; i++) {
        expandMenuH5s[i].addEventListener("click", () => {
          if (expandedLists[i].classList.contains("expanded")) {
            expandedMenu.style.overflow = "hidden";
            expandedLists[i].classList.remove("expanded");
            if (i == 2) {
              expandedLists[3].classList.remove("expanded");
            }
          } else {
            for (let j = 0; j < expandedLists.length; j++) {
              expandedLists[j].classList.remove("expanded");
            }
            expandedMenu.style.overflow = "hidden";
            expandedLists[i].classList.add("expanded");
            if (i == 2) {
              expandedLists[3].classList.add("expanded");
              expandedMenu.style.overflow = "scroll";
            }
          }
        });
      }

    }


  })();

  // services-inner - adv expand
  (function() {
    const advTextBlock = document.querySelector("section.adv .left_text");
    const adv_expand = document.querySelector("section.adv .adv_expand");

    if (adv_expand) {
      if (advTextBlock.offsetHeight > 300) {
        adv_expand.style.display = "block";
        advTextBlock.classList.add("wrapped");

        adv_expand.addEventListener("click", (e) => {
          advTextBlock.classList.toggle("wrapped");
          // html.style.scrollBehavior = "smooth";
          // setTimeout(() => {
          //   html.style.scrollBehavior = "unset";
          // }, 500);
          if (advTextBlock.classList.contains("wrapped")) {
            adv_expand.innerText = "Развернуть";
          } else {
            adv_expand.innerText = "Свернуть";
            adv_expand.href = "#wrapBack";
          }
        });
      }
    }
  })();

  // archive-folio, archive-blog - manually add prev/last arrow if there is no any
  (function() {
    const pagesUl = document.querySelector(".page-numbers");

    if (pagesUl) {

      if (!pagesUl.querySelector("li:first-child > *").classList.contains("prev")) {
        const newPrev = document.createElement("li");
        newPrev.innerHTML = `
          <a class="prev inactive page-numbers" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="7.996" viewBox="0 0 14 7.996" class="img-svg replaced-svg">
              <path fill="transparent" d="M-692 165l-7-8h2.406l4.594 5.247 4.594-5.247H-685l-7 8z" transform="translate(699 -157)"></path>
            </svg>
          </a>
        `;
        pagesUl.prepend(newPrev);
      }

      if (!pagesUl.querySelector("li:last-child > *").classList.contains("next")) {
        const newNext = document.createElement("li");
        newNext.innerHTML = `
          <a class="next inactive page-numbers" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="7.996" viewBox="0 0 14 7.996" class="img-svg replaced-svg">
              <path fill="transparent" d="M-692 165l-7-8h2.406l4.594 5.247 4.594-5.247H-685l-7 8z" transform="translate(699 -157)"></path>
            </svg>
          </a>
        `;
        pagesUl.append(newNext);
      }

    }
  })();

});


$(document).ready(function(){


  $( ".arm_head_callback" ).click(function(){
   $( "#callback_form" ).addClass('activeOverlay');
   $( "#overlay" ).addClass('activeOverlay');
  });
  $( "#closeCallBack" ).click(function(){
   $( "#callback_form" ).removeClass('activeOverlay');
   $( "#overlay" ).removeClass('activeOverlay');
  });

  $('li.gfield input').on('focus',function(){
    $( this ).parents('li').find('.gfield_label').addClass('focused');
  });

  (function () {
    const gf4 = document.getElementById("gform_4");

    if (gf4) {
      const inputs = [
        ...gf4.querySelectorAll("#input_4_1_3, #input_4_2"),
      ]; // name, tel
      const labels = [...gf4.querySelectorAll(".gfield_label")]; // name, tel
      const subWrapper = gf4.querySelector(".gform_footer"); // send wrapper (bg)
      const submit = gf4.querySelector("#gform_submit_button_4"); // send

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
      gf4.addEventListener("submit", () => {
        imgs.forEach((img) => {
          img.style.display = "none";
        });
        console.log("Form submitted");
      });
    }
  })();


});