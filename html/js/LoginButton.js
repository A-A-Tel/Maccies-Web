class LoginButton extends HTMLElement {

    constructor() {
        super();
        this._shadow = this.attachShadow({mode: "closed"});
    }

    connectedCallback() {

        this._shadow.innerHTML = `
                Login
                <style>
                    :host {
                        display: grid;
                        place-items: center;
                        width: 4vw;
                        height: 2vw;
                        border-radius: 0.5vw;
                        position: absolute;
                        top: 3vw;
                        right: 5vw;
                        background: #319138;
                        color: #F5F5F5;
                        font-family: 'poppins-bold', 'sans-serif';
                        font-size: 0.9vw; 
                        cursor: pointer; }
                </style>
        `;
        this.addEventListener('click', this.onClick)
    }

    onClick(ev) {
        document.body.innerHTML += `
        
                <div id="modal" class='modal login-modal'>
                    <form action='/process/login.php' method='POST'>
                        <input required type='text' name='username' placeholder='Username'>
                        <input required type='password' name='password' placeholder='Password'>
                        <input class='cursor-pointer' type='submit' value='Inloggen'>
                    </form>
                </div>
        `;
        disableScroll();
    }
}

customElements.define('login-button', LoginButton);