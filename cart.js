const cartItems = JSON.parse(localStorage.getItem('cartItems'));

const cartItemsContainer = document.getElementById('cart-items');
const cartTotal = document.getElementById('cart-total');

let total = 0;

cartItems.forEach(item => {
	const tr = document.createElement('tr');
	tr.innerHTML = `
		<td>${item.name}</td>
		<td>${item.quantity}</td>
		<td>$${item.price.toFixed(2)}</td>
	`;
	cartItemsContainer.appendChild(tr);
	total += item.price * item.quantity;
});

cartTotal.textContent = `$${total.toFixed(2)}`;
