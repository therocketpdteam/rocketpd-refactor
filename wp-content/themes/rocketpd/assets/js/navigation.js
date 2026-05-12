(() => {
	const toggle = document.querySelector('[data-rpd-menu-toggle]');
	const menu = document.querySelector('[data-rpd-mobile-menu]');

	if (!toggle || !menu) {
		return;
	}

	toggle.addEventListener('click', () => {
		const isOpen = toggle.getAttribute('aria-expanded') === 'true';

		toggle.setAttribute('aria-expanded', String(!isOpen));
		menu.hidden = isOpen;
	});
})();

