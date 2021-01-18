window.addEventListener("load", () => {
  // Hide page content while loading
  document.body.classList.remove("loading");
  console.log("Window loaded.");

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

  // Initialize GMaps
  (function () {
    function initMap() {
      const coordinates = { lat: 46.480810812052994, lng: 30.730663527352412 };
      const map = new google.maps.Map(
        document.querySelector(".footer-main__map"),
        {
          center: coordinates,
          zoom: 17,
          disableDefaultUI: false,
          scrollwheel: true,
        },
      );
      const marker = new google.maps.Marker({
        position: coordinates,
        map: map,
      });
    }
  })();
});
