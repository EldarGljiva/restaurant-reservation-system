var HashChange = function () {
  var hash = window.location.hash;
  if (hash.startsWith("#") && hash.length > 2) {
    hash = hash.replace("#", "");
    var file = "tpl/" + hash + ".html";
    $("#AppContainer").load(file);
  } else {
    var defaultFile = "tpl/home.html"; // Set the default file here
    $("#AppContainer").load(defaultFile);
  }
};
window.onhashchange = HashChange;
HashChange();
