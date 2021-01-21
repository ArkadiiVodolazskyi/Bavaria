window.addEventListener("load", () => {
  // Hide page content while loading
  document.body.classList.remove("loading");

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
    const hamb = document.querySelector(".hamb");
    const expandedMenu = document.querySelector("#expandedMenu");
    if (expandedMenu) {
      const closeExpanded = document.querySelector(
        "#expandedMenu .closeOverlay",
      );

      hamb.addEventListener("click", () => {
        expandedMenu.classList.add("expanded");
      });
      closeExpanded.addEventListener("click", () => {
        expandedMenu.classList.remove("expanded");
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

      // Default
      vacancies[0].classList.add("active");

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
    }
  })();

  // connect_form - open form, open overlay
  (function () {
    const connect_wrapper = document.getElementById("connect_wrapper");

    if (connect_wrapper) {
      const connectBtn = document.querySelectorAll(".openConnect");
      const overlay = document.getElementById("overlay");
      const closeConnect = document.getElementById("closeConnect");

      connectBtn.forEach((btn) => {
        btn.addEventListener("click", () => {
          overlay.classList.add("active");
          connect_wrapper.classList.add("active");
        });
      });
      closeConnect.addEventListener("click", () => {
        connect_wrapper.classList.remove("active");
        overlay.classList.remove("active");
      });
      overlay.addEventListener("click", () => {
        connect_wrapper.classList.remove("active");
        overlay.classList.remove("active");
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
          let currentTransf = 0;
          const transDif = 170;
          imageIndex = 0;
          images[imageIndex].classList.add("active");
          bigImages[imageIndex].classList.add("active");

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
          const tape_prev = galleries[i].querySelector(".tape_prev");
          const tape_next = galleries[i].querySelector(".tape_next");

          tape_prev.addEventListener("click", () => {
            imageIndex--;
            if (imageIndex < 0) {
              imageIndex = 0;
            } else {
              currentTransf += transDif;
              tape.style.transform = `matrix(1, 0, 0, 1, 0, ${transDif})`;
            }
            console.log(imageIndex, currentTransf);
          });
          tape_next.addEventListener("click", () => {
            imageIndex++;
            if (imageIndex > bigImages.length - 1) {
              imageIndex = bigImages.length - 1;
            } else {
              currentTransf -= transDif;
              tape.style.transform = `matrix(1, 0, 0, 1, 0, ${transDif})`;
            }
            console.log(imageIndex, currentTransf);
          });
        }
      }
    }
  })();
});
