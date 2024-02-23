$(document).ready(function () {
  $("main#spapp > section").height($(document).height() - 60);

  var app = $.spapp({ pageNotFound: "error_404" }); // initialize
  app.route({
    view: "homePage",
    load: "homePage.html",
  });
  app.route({
    view: "menu",
    load: "menu.html",
  });

  // run app
  app.run();
});
