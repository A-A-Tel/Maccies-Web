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

    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    const scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;

    window.onscroll = function () {
        window.scrollTo(scrollLeft, scrollTop);
    };
}