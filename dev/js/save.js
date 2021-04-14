function switchFavorite() {
    console.log("hi");
    let bookmark = document.getElementById("bookmark");
    if (bookmark.title == "save") {
        bookmark.src = "./img/icon/bookmark-ribbon.png";
        bookmark.title = "cancel";
    } else {
        bookmark.src = "./img/icon/bookmark-outline.png";
        bookmark.title = "save";
    }
}

function init() {
    let bookmark = document.getElementById("bookmark");
    bookmark.onclick = switchFavorite;
}

window.addEventListener("load", init, false);
