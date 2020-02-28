// Selectors

let followerName = document.querySelectorAll("follower-name"),

    perfilAnchor = document.querySelectorAll("perfil-anchor"),

    dropDownBlackBtn = document.getElementById("drop-drown-color-div-1"),

    dropDownWhiteBtn = document.getElementById("drop-drown-color-div-2"),

    header = document.querySelector('header'),

    headerAnchors = header.getElementsByTagName("a"),

    main = document.querySelector('main'),

    footer = document.querySelector('footer'),

    footerAnchors = footer.getElementsByTagName("a"),

    btnSiguiendo = document.querySelectorAll(".siguiendo"),

    btnPostLike = document.querySelectorAll("button[name=like_post]");

// Functions

function followerPersonalSpace(event) {
    event.target.nextElementSibling.click();
}

function setHeaderAndFooterColor() {
    header.style.backgroundColor = localStorage.getItem(localStorage.key(0));
    for (item of headerAnchors) {
        item.style.color = localStorage.getItem(localStorage.key(1));
    }
    footer.style.backgroundColor = localStorage.getItem(localStorage.key(0));
    for (foo of footerAnchors) {
        foo.style.color = localStorage.getItem(localStorage.key(1));
    }
}

function changeBodyBackColor(event) {
    switch (event.currentTarget) {
        case dropDownBlackBtn:
            localStorage.clear();
            localStorage.setItem('theme1BgColor', '#121212'); 
            localStorage.setItem('theme1Color', 'white'); 
            break;
        case dropDownWhiteBtn:
            localStorage.clear();
            localStorage.setItem('theme2BgColor', 'white');
            break;
    }

    setHeaderAndFooterColor();
}

// EventListeners

for (item of followerName) {
    item.addEventListener('click', followerPersonalSpace);
}

window.onload = setHeaderAndFooterColor;

dropDownBlackBtn.onclick = changeBodyBackColor;

dropDownWhiteBtn.onclick = changeBodyBackColor;



