// Selectors

let followerName = document.querySelectorAll("follower-name"),

    perfilAnchor = document.querySelectorAll("perfil-anchor");

// Functions

function followerPersonalSpace(event) {
    event.target.nextElementSibling.click();
}

// EventListeners

for (item of followerName) {
    item.addEventListener('click', followerPersonalSpace);
}