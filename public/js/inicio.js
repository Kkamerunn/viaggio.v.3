/*
---------
Selectors
---------
*/

var countrySelector = document.getElementById('exampleFormControlSelect1');

var countrySelectorImg = document.querySelector("#image-container [alt='bandera']");

var main = document.getElementById("principal");

var textAreaLabel = document.querySelector("[for='post-content']");

var textArea = document.getElementById("post-content");

/*
------------
Default flag
------------
*/

countrySelectorImg.src = '/storage/afghanistan_flag.png';

/*
-------------------
fetch de los paises
-------------------
*/

var flags = [];

fetch('https://restcountries.eu/rest/v2/all')
    .then(resp => resp.json())
    .then(data => {
        for (let i = 0; i < data.length; i++) {
            flags.push({name: `${ data[i].name }`, imgUrl: `${ data[i].flag }`});
            countrySelector.innerHTML += `<option value='${ data[i].name }'>${ data[i].name }</option>`;
        }
    })
    .catch(err => {
        console.log('hubo un ' + err.message);
    });

var selectorOptions = countrySelector.options;

/*
---------
Functions
---------
*/

function setSelectorImage(url) {
    countrySelectorImg.src = url;
}

function setBgColor() {
    main.style.backgroundColor = localStorage.getItem(localStorage.key(0));
}

/*
---------------
Event Listeners
---------------
*/

countrySelector.addEventListener('change', event => {
    let flag = flags.find(elem => elem.name === event.target.value);
    setSelectorImage(flag.imgUrl);
});

window.addEventListener('load', () => {
    setBgColor();
});

textAreaLabel.addEventListener('click', () => {
    textArea.classList.toggle('textarea');
});













