(() => {
	const page = document.querySelector('.rpd-cohort-detail-page');

	if (!page) {
		return;
	}

	const faq = page.querySelector('[data-rpd-cohort-faq]');

	if (!faq) {
		return;
	}

	faq.addEventListener('click', (event) => {
		const button = event.target.closest('button[aria-controls]');

		if (!button || !faq.contains(button)) {
			return;
		}

		const panel = document.getElementById(button.getAttribute('aria-controls'));
		const expanded = button.getAttribute('aria-expanded') === 'true';

		button.setAttribute('aria-expanded', expanded ? 'false' : 'true');

		if (panel) {
			panel.hidden = expanded;
		}
	});
})();
