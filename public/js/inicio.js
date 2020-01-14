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

var commentForm = document.querySelectorAll(".comments-form");

var comments = document.querySelectorAll(".comentar");

var commentButton = document.querySelectorAll(".submit-content"); 

var commentInput = document.querySelectorAll(".comment-content");

var commentDiv = document.querySelectorAll(".commentDiv");

var numOfLikes = document.querySelector("sup");

var likes = document.querySelectorAll(".likes");

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

function displayCommentInput(event) {
    if (event.target.nextElementSibling.style.display == "none") {
        setTimeout(() => {
            event.target.nextElementSibling.style.display = "block";
        }, 200);
    } else {
        setTimeout(() => {
            event.target.nextElementSibling.style.display = "none";
        }, 200);
    }
}

function displayLikes(event) {
    let num = 0;
    event.target.nextElementSibling.innerHTML = ++num; 
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

for (let i = 0; i < comments.length; i++) {
    comments[i].addEventListener('click', displayCommentInput);
}

for (let i = 0; i < likes.length; i++) {
    likes[i].addEventListener('click', displayLikes);
}











