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

	// Mobile sub-menu toggles
	menu.querySelectorAll('.rpd-menu > li > a').forEach((link) => {
		const subMenu = link.nextElementSibling;

		if (!subMenu || !subMenu.classList.contains('sub-menu')) {
			return;
		}

		// Add chevron button
		const chevron = document.createElement('button');
		chevron.className = 'rpd-mobile-sub-toggle';
		chevron.setAttribute('aria-expanded', 'false');
		chevron.setAttribute('aria-label', 'Toggle sub-menu');
		chevron.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>';

		link.parentElement.appendChild(chevron);
		subMenu.hidden = true;

		const toggleSub = () => {
			const isOpen = chevron.getAttribute('aria-expanded') === 'true';
			chevron.setAttribute('aria-expanded', String(!isOpen));
			subMenu.hidden = isOpen;
			link.parentElement.classList.toggle('is-open', !isOpen);
		};

		chevron.addEventListener('click', (e) => {
			e.preventDefault();
			toggleSub();
		});
	});
})();
