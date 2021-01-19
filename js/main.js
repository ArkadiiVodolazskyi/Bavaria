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
});

// ! remove to page load while code is fully ready

// + page-vacancies - expand
// (function () {
//   const vacancies = [...document.querySelectorAll(".vacancy")];
//   const vacExpands = [...document.querySelectorAll(".expand")];

//   // Default
//   vacancies[0].classList.add("active");

//   for (let i = 0; i < vacExpands.length; i++) {
//     vacExpands[i].addEventListener("click", () => {
//       if (vacancies[i].classList.contains("active")) {
//         vacancies[i].classList.remove("active");
//       } else {
//         for (let j = 0; j < vacancies.length; j++) {
//           vacancies[j].classList.remove("active");
//         }

//         vacancies[i].classList.add("active");
//       }
//     });
//   }
// })();

// + page-about - master slider
// (function () {
//   const masterPrev = document.querySelector(".master_prev");
//   const masterNext = document.querySelector(".master_next");

//   const masterNames = [...document.querySelectorAll(".master_name .name")];
//   const masterImgs = [...document.querySelectorAll(".master_img img")];

//   // Default
//   masterIndex = 0;
//   masterNames[masterIndex].classList.add("active");
//   masterImgs[masterIndex].classList.add("active");
//   masterPrev.classList.remove("active");
//   masterNext.classList.add("active");

//   function masterChange(masterIndex) {
//     if (masterIndex < 0) {
//       masterIndex = 0;
//       masterPrev.classList.remove("active");
//     } else if (masterIndex > masterNames.length - 1) {
//       masterIndex = masterNames.length - 1;
//       masterNext.classList.remove("active");
//     } else {
//       masterPrev.classList.add("active");
//       masterNext.classList.add("active");
//     }

//     if (masterIndex - 1 < 0) {
//       masterPrev.classList.remove("active");
//     }
//     if (masterIndex + 1 > masterNames.length - 1) {
//       masterNext.classList.remove("active");
//     }

//     for (let i = 0; i < masterNames.length; i++) {
//       masterNames[i].classList.remove("active");
//       masterImgs[i].classList.remove("active");
//     }

//     masterNames[masterIndex].classList.add("active");
//     masterImgs[masterIndex].classList.add("active");
//   }

//   masterPrev.addEventListener("click", () => {
//     masterIndex--;

//     masterChange(masterIndex);
//   });

//   masterNext.addEventListener("click", () => {
//     masterIndex++;

//     masterChange(masterIndex);
//   });
// })();

// page-service_post - expand nav
(function () {
  const navPoints = [...document.querySelectorAll("aside .list > li")];

  for (let i = 0; i < navPoints.length; i++) {
    navPoints[i].addEventListener("click", (e) => {
      e.preventDefault();
      navPoints[i].classList.toggle("active");
    });
  }
})();
