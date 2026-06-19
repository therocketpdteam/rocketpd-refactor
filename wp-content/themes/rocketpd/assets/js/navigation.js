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

	// Mobile sub-menu toggles — inject chevron buttons, mirroring how the WP primary nav worked.
	menu.querySelectorAll('.rpd-menu > li').forEach((li) => {
		const subMenu = li.querySelector(':scope > .sub-menu');

		if (!subMenu) {
			return;
		}

		const chevron = document.createElement('button');
		chevron.type = 'button';
		chevron.className = 'rpd-mobile-sub-toggle';
		chevron.setAttribute('aria-expanded', 'false');
		chevron.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>';

		li.insertBefore(chevron, subMenu);

		chevron.addEventListener('click', () => {
			const isOpen = chevron.getAttribute('aria-expanded') === 'true';
			chevron.setAttribute('aria-expanded', String(!isOpen));
			subMenu.classList.toggle('is-open', !isOpen);
			li.classList.toggle('is-open', !isOpen);
		});
	});
})();
