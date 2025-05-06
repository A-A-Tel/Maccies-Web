class ShoppingCart extends HTMLElement {

    constructor() {
        super();
        this._shadow = this.attachShadow({mode: "closed"});
    }

    connectedCallback() {
        let numOfItems = this.getAttribute('num-of-items');
        if (numOfItems == null) numOfItems = 'X';

        this._shadow.innerHTML = `
            <img src="/images/cart.svg" alt="cart image">
            <div>${numOfItems}</div>
            <style>
                :host {
                    align-self: flex-end;
                }
                :host img {
                    width: 5vw;
                }
                :host div {
                    width: 2.7vw;
                    height: 2.7vw;
                    border-radius: 50%;
                    background: #FFAD00;
                    position: relative;
                    margin: -2.3vw 1vw 2.3vw -1vw;
                    display: grid;
                    place-items: center;
                    user-select: none;
                    font-family: 'poppins-regular', 'sans-serif';
                    font-size: 1.5vw;
                }
            </style>
        `;
    }
}

customElements.define('shopping-cart', ShoppingCart);
