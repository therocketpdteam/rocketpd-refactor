(function () {
	'use strict';

	const page = document.querySelector('.rpd-topic-detail-page');

	if (!page) {
		return;
	}

	const faq = page.querySelector('[data-rpd-topic-detail-faq]');

	if (faq) {
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
	}
})();
