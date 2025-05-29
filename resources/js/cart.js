// cart.js
class Cart {
    constructor() {
        this.items = this.loadCart();
        this.updateCartUI();
    }

    loadCart() {
        const cart = localStorage.getItem('cart');
        return cart ? JSON.parse(cart) : [];
    }

    saveCart() {
        localStorage.setItem('cart', JSON.stringify(this.items));
        this.updateCartUI();
    }

    addItem(product) {
        const existingItem = this.items.find(item => item.id === product.id);

        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            this.items.push({
                id: product.id,
                name: product.name,
                artisan: product.artisan,
                category: product.category,
                price: product.price,
                image: product.image,
                quantity: 1
            });
        }

        this.saveCart();
    }

    removeItem(productId) {
        this.items = this.items.filter(item => item.id !== productId);
        this.saveCart();
    }

    updateQuantity(productId, quantity) {
        const item = this.items.find(item => item.id === productId);
        if (item) {
            item.quantity = quantity;
            this.saveCart();
        }
    }

    clearCart() {
        this.items = [];
        this.saveCart();
    }

    getTotalItems() {
        return this.items.reduce((total, item) => total + item.quantity, 0);
    }

    getSubtotal() {
        return this.items.reduce((total, item) => total + (item.price * item.quantity), 0);
    }

    updateCartUI() {
        // Mettre à jour le badge du panier
        const cartBadges = document.querySelectorAll('.cart-badge');
        if (cartBadges) {
            const itemCount = this.getTotalItems();
            cartBadges.forEach(badge => {
                badge.textContent = itemCount;
                badge.style.display = itemCount > 0 ? 'block' : 'none';
            });
        }
    }

    renderCartItems() {
        const cartContent = document.getElementById('cart-content');
        if (!cartContent) return;

        if (this.items.length === 0) {
            cartContent.innerHTML = '<div class="text-center py-4"><p>Votre panier est vide</p></div>';
            return;
        }

        let html = '';
        this.items.forEach(item => {
            html += `
            <div class="row align-items-center mb-3 cart-item" data-id="${item.id}">
                <div class="col-3 col-md-2">
                    <img src="${item.image}" class="img-fluid rounded" alt="${item.name}">
                </div>
                <div class="col-6 col-md-5">
                    <h3 class="h6 mb-1">${item.name}</h3>
                    <p class="small text-muted mb-1">Artisan : ${item.artisan}</p>
                    <div class="d-flex align-items-center">
                        <button class="btn btn-sm btn-outline-secondary p-1 remove-from-cart" data-id="${item.id}">
                            <i class="fas fa-trash-alt small"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-vert-benin ms-2 p-1 move-to-wishlist" data-id="${item.id}">
                            <i class="far fa-heart small"></i>
                        </button>
                    </div>
                </div>
                <div class="col-3 col-md-2">
                    <div class="input-group input-group-sm">
                        <button class="btn btn-outline-secondary decrease-quantity">-</button>
                        <input type="text" class="form-control text-center quantity-input" value="${item.quantity}">
                        <button class="btn btn-outline-secondary increase-quantity">+</button>
                    </div>
                </div>
                <div class="col-12 col-md-3 text-md-end mt-2 mt-md-0">
                    <p class="mb-0 fw-bold text-success">${(item.price * item.quantity).toLocaleString()} FCFA</p>
                </div>
            </div>
        `;
        });

        cartContent.innerHTML = html;
        this.updateSummary();
        this.setupCartEventListeners();
    }

    updateSummary() {
        const subtotal = this.getSubtotal();
        const taxes = subtotal * 0.18;
        const total = subtotal + taxes;

        document.querySelector('.subtotal').textContent = `${subtotal.toLocaleString()} FCFA`;
        document.querySelector('.taxes').textContent = `${taxes.toLocaleString()} FCFA`;
        document.querySelector('.total').textContent = `${total.toLocaleString()} FCFA`;
    }

    setupCartEventListeners() {
        // Boutons pour supprimer un article
        document.querySelectorAll('.remove-from-cart').forEach(button => {
            button.addEventListener('click', (e) => {
                const productId = e.target.closest('button').dataset.id;
                this.removeItem(productId);
                this.renderCartItems();
            });
        });

        // Boutons pour augmenter la quantité
        document.querySelectorAll('.increase-quantity').forEach(button => {
            button.addEventListener('click', (e) => {
                const row = e.target.closest('.cart-item');
                const productId = row.dataset.id;
                const input = row.querySelector('.quantity-input');
                const newQuantity = parseInt(input.value) + 1;
                input.value = newQuantity;
                this.updateQuantity(productId, newQuantity);
            });
        });

        // Boutons pour diminuer la quantité
        document.querySelectorAll('.decrease-quantity').forEach(button => {
            button.addEventListener('click', (e) => {
                const row = e.target.closest('.cart-item');
                const productId = row.dataset.id;
                const input = row.querySelector('.quantity-input');
                let newQuantity = parseInt(input.value) - 1;

                if (newQuantity < 1) newQuantity = 1;

                input.value = newQuantity;
                this.updateQuantity(productId, newQuantity);
            });
        });

        // Changement manuel de quantité
        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('change', (e) => {
                const row = e.target.closest('.cart-item');
                const productId = row.dataset.id;
                let newQuantity = parseInt(e.target.value);

                if (isNaN(newQuantity)) newQuantity = 1;
                if (newQuantity < 1) newQuantity = 1;

                e.target.value = newQuantity;
                this.updateQuantity(productId, newQuantity);
            });
        });

        // Boutons pour déplacer vers la wishlist
        document.querySelectorAll('.move-to-wishlist').forEach(button => {
            button.addEventListener('click', (e) => {
                const productId = e.target.closest('button').dataset.id;
                // Implémentez cette fonctionnalité si nécessaire
                console.log('Move to wishlist:', productId);
            });
        });

        // Bouton pour passer commande
        const checkoutBtn = document.getElementById('checkout-btn');
        if (checkoutBtn) {
            checkoutBtn.addEventListener('click', () => this.proceedToCheckout());
        }
    }

    proceedToCheckout() {
        if (this.items.length === 0) {
            alert('Votre panier est vide');
            return;
        }

        fetch('/checkout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    items: this.items
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = data.redirect_url;
                    this.clearCart();
                } else {
                    alert('Erreur lors de la commande: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Une erreur est survenue lors du passage de commande');
            });
    }
}

// Initialiser le panier
const cart = new Cart();

// Exposer le panier globalement
function addToCart(product) {
    cart.addItem(product);
    const toast = new bootstrap.Toast(document.getElementById('cart-toast'));
    toast.show();
}

// Expose la fonction globalement
window.addToCart = addToCart;