const form = document.querySelector('form');
const allergies = document.querySelectorAll('input[name="allergies"]');

form.addEventListener('submit', (e) => {
	e.preventDefault();
	const mainDish = form.querySelector('input[name="maindish"]:checked').value;
	const dessert = form.querySelector('input[name="dessert"]:checked').value;
	const allergens = Array.from(allergies)
		.filter(input => input.checked)
		.map(input => input.value);
	alert(`Your selected meal: ${mainDish} with ${dessert}\nAllergies: ${allergens.join(', ')}`);
});
