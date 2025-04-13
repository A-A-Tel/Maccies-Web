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

function showModal(modalPath, edit = false, values = ['']) {
    disableScroll();
    fetch(modalPath)
        .then(response => response.text())
        .then(html => {
            document.body.insertAdjacentHTML("beforeend", html);
        });
    if (edit) {
        setTimeout(() => fillEditMenuModal(values), 100);
    }
}

function disableScroll() {

    const scrollTop = document.documentElement.scrollTop;

    const scrollLeft = document.documentElement.scrollLeft;

    window.onscroll = function () {
        window.scrollTo(scrollLeft, scrollTop);
    };
}

const dateElement = document.getElementById("datetime");
if (dateElement != null) {

    let now = new Date();
    now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
    dateElement.value = now.toISOString().slice(0, 16);
}

const menuItems = document.getElementsByClassName("item");
for (let i = 0; i < menuItems.length; i++) {
    const menuItem = menuItems[i];

    menuItem.style.backgroundImage = "url(/images/items/" + menuItem.id + ")";
}




function setValue(id, value) {
    document.getElementById(id).value = value;
}

function fillEditMenuModal(values = ['']) {

    setValue('item-id', values[0]);
    setValue('item-name', values[1]);
    setValue('item-description', values[2]);
    setValue('item-price', values[3]);
    document.getElementById('item-image').classList.add('no-render');
    document.getElementById('modal-form').action = '/php/edit_menu.php';
}