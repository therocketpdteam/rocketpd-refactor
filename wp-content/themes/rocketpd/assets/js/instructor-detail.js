(() => {
	const page = document.querySelector('.rpd-instructor-detail-page');

	if (!page) {
		return;
	}

	const faq = page.querySelector('[data-rpd-instructor-faq]');
	const portrait = page.querySelector('.rpd-instructor-portrait');
	const portraitImage = portrait ? portrait.querySelector('img') : null;

	if (portrait && portraitImage) {
		const markPortraitFallback = () => {
			portrait.classList.add('is-image-missing');
			portraitImage.setAttribute('aria-hidden', 'true');
			portraitImage.removeAttribute('alt');
		};

		if (portraitImage.complete && portraitImage.naturalWidth === 0) {
			markPortraitFallback();
		} else {
			portraitImage.addEventListener('error', markPortraitFallback, { once: true });
		}
	}

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
