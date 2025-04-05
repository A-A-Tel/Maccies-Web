// In order for flex aligning to work this is needed for proper alignment

function resizeHeaderItems() {

    const socials = document.getElementById("socials");
    const copyright = document.getElementById("credit");

    const boundCopyright = copyright.getBoundingClientRect();
    const boundSocials = socials.getBoundingClientRect();

    if (boundSocials.width < boundCopyright.width) {
        socials.style.margin = "0 " + ((boundCopyright.width - boundSocials.width) / 2) + "px";
        copyright.style.margin = "0";

    } else {
        socials.style.margin = "0";
        copyright.style.margin = "0px " + ((boundSocials.width - boundCopyright.width) / 2) + "px";
    }
}

resizeHeaderItems();
window.addEventListener("resize", resizeHeaderItems);

function showModal(modalPath) {
    disableScroll();
    fetch(modalPath)
        .then(response => response.text())
        .then(html => {
            document.body.innerHTML += html;
        });
}

function disableScroll() {

    const scrollTop = document.documentElement.scrollTop;

    const scrollLeft = document.documentElement.scrollLeft;

    window.onscroll = function () {
        window.scrollTo(scrollLeft, scrollTop);
    };
}

const contactDateElement = document.getElementById("contact-date");

if (contactDateElement != null) {

    let now = new Date();
    now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
    contactDateElement.value = now.toISOString().slice(0, 16);
}

const menuItems = document.getElementsByClassName("item");

for (let i = 0; i < menuItems.length; i++) {
    const menuItem = menuItems[i];

    menuItem.style.backgroundImage = "url(/images/items/" + menuItem.id + ".png)";
}