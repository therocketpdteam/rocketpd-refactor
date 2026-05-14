(() => {
	const page = document.querySelector('.rpd-course-detail-page');

	if (!page) {
		return;
	}

	const faq = page.querySelector('[data-rpd-course-faq]');

	if (!faq) {
		return;
	}

	const buttons = Array.from(faq.querySelectorAll('button[aria-controls]'));

	buttons.forEach((button) => {
		button.addEventListener('click', () => {
			const panel = document.getElementById(button.getAttribute('aria-controls'));
			const isOpen = button.getAttribute('aria-expanded') === 'true';

			if (!panel) {
				return;
			}

			button.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
			panel.hidden = isOpen;
		});
	});
})();
