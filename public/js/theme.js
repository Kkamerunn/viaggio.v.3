// Selectores

var body = document.body;

// Setting´s selectors

var theme1 = document.getElementById("theme1");

var theme2 = document.getElementById("theme2");

var theme3 = document.getElementById("theme3");

var theme4 = document.getElementById("theme4");

var tit = document.querySelector("p.text-center");

var header = document.querySelector("#header");

var mainContainer = document.querySelector("#main-container");

var footer = document.querySelector("footer");

// Functions

function changeBodyBackColor(event) {
    switch (event.currentTarget) {
        case theme1:
            mainContainer.style.backgroundColor = "#A3CB38";
            if (localStorage.length > 1) localStorage.clear();
            localStorage.setItem('theme1BgColor', '#A3CB38'); 
            break;
        case theme2:
            mainContainer.style.backgroundColor = "#1289A7";
            if (localStorage.lenght > 1) localStorage.clear();
            localStorage.setItem('theme2BgColor', '#1289A7');
            break;
        case theme3:
            mainContainer.style.backgroundColor = "#D980FA";
            if (localStorage.length > 1) localStorage.clear();
            localStorage.setItem('theme3BgColor', '#D980FA');
            break;
        case theme4:
            mainContainer.style.backgroundColor = "#EE5A24";
            if (localStorage.length > 1) localStorage.clear();
            localStorage.setItem('theme4BgColor', '#EE5A24');
            break;
    }
}

function storageAvailable(type) {
    try {
        var storage = window[type],
            x = '__storage_test__';
        storage.setItem(x, x);
        storage.removeItem(x);
        return true;
    }
    catch(e) {
        return e instanceof DOMException && (
            // everything except Firefox
            e.code === 22 ||
            // Firefox
            e.code === 1014 ||
            // test name field too, because code might not be present
            // everything except Firefox
            e.name === 'QuotaExceededError' ||
            // Firefox
            e.name === 'NS_ERROR_DOM_QUOTA_REACHED') &&
            // acknowledge QuotaExceededError only if there's something already stored
            storage.length !== 0;
    }
}

// Event Listeners

theme1.onclick = changeBodyBackColor;

theme2.onclick = changeBodyBackColor;

theme3.onclick = changeBodyBackColor;

theme4.onclick = changeBodyBackColor;

// Prueba

// tit.onclick = () => console.log("esto es una prueba");

window.addEventListener("load", () => {
    body.style.height = "100vh";
    if (storageAvailable('localStorage')) {
        console.log("LocalStorage está disponible");
      }
      else {
        console.log("LocalStorage no está disponible");
      }
});

