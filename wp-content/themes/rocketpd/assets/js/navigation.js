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

	// Mobile sub-menu toggles — delegate from document so SVG child clicks are caught.
	document.addEventListener('click', (e) => {
		const chevron = e.target.closest('.rpd-mobile-sub-toggle');

		if (!chevron || !menu.contains(chevron)) {
			return;
		}

		const li = chevron.closest('li');
		const subMenu = li && li.querySelector(':scope > .sub-menu');

		if (!subMenu) {
			return;
		}

		const isOpen = chevron.getAttribute('aria-expanded') === 'true';
		chevron.setAttribute('aria-expanded', String(!isOpen));
		subMenu.classList.toggle('is-open', !isOpen);
		li.classList.toggle('is-open', !isOpen);
	});
})();
