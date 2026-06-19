(() => {
	const toggle = document.querySelector('[data-rpd-menu-toggle]');
	const menu = document.querySelector('[data-rpd-mobile-menu]');
	const body = document.body;

	if (!toggle || !menu) {
		return;
	}

	const setMenuState = (isOpen) => {
		toggle.setAttribute('aria-expanded', String(isOpen));
		menu.hidden = !isOpen;
		body.classList.toggle('rpd-mobile-menu-open', isOpen);

		if (isOpen) {
			const firstLink = menu.querySelector('a, button');

			if (firstLink) {
				firstLink.focus();
			}
		}
	};

	toggle.addEventListener('click', () => {
		const isOpen = toggle.getAttribute('aria-expanded') === 'true';

		setMenuState(!isOpen);
	});

	document.addEventListener('keydown', (event) => {
		if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
			setMenuState(false);
			toggle.focus();
		}
	});

	window.addEventListener('resize', () => {
		if (window.matchMedia('(min-width: 900px)').matches) {
			setMenuState(false);
		}
	});

	// Mobile sub-menu toggles — buttons are already rendered by mobile-menu.php.
	menu.querySelectorAll('.rpd-mobile-sub-toggle').forEach((chevron) => {
		const subMenu = chevron.nextElementSibling;

		if (!subMenu || !subMenu.classList.contains('sub-menu')) {
			return;
		}

		chevron.addEventListener('click', () => {
			const isOpen = chevron.getAttribute('aria-expanded') === 'true';
			chevron.setAttribute('aria-expanded', String(!isOpen));
			subMenu.classList.toggle('is-open', !isOpen);
			chevron.closest('li').classList.toggle('is-open', !isOpen);
		});
	});
})();
