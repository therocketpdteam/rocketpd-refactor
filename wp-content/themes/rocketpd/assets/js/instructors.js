(() => {
	const page = document.querySelector('.rpd-instructors-page');

	if (!page) {
		return;
	}

	const topicButtons = Array.from(page.querySelectorAll('[data-rpd-instructor-topics] button'));
	const searchInput = page.querySelector('[data-rpd-instructor-search]');
	const cards = Array.from(page.querySelectorAll('[data-rpd-instructor-card]'));
	const status = page.querySelector('[data-rpd-instructor-status]');
	const portraitImages = Array.from(page.querySelectorAll('.rpd-instructors-collage__tile img, .rpd-instructor-card__image img'));

	if (!cards.length) {
		return;
	}

	let activeTopic = 'All Experts';

	const normalize = (value) => String(value || '').toLowerCase().trim();

	const updateCards = () => {
		const query = normalize(searchInput ? searchInput.value : '');
		let visibleCount = 0;

		cards.forEach((card) => {
			const tags = String(card.dataset.tags || '').split('|');
			const haystack = normalize(card.dataset.search || card.textContent);
			const matchesTopic = activeTopic === 'All Experts' || tags.includes(activeTopic);
			const matchesQuery = !query || haystack.includes(query);
			const visible = matchesTopic && matchesQuery;

			card.hidden = !visible;

			if (visible) {
				visibleCount += 1;
			}
		});

		if (status) {
			status.textContent = `${visibleCount} instructor${visibleCount === 1 ? '' : 's'} shown.`;
		}
	};

	topicButtons.forEach((button) => {
		button.addEventListener('click', () => {
			activeTopic = button.dataset.topic || 'All Experts';

			topicButtons.forEach((topicButton) => {
				const isActive = topicButton === button;
				topicButton.classList.toggle('is-active', isActive);
				topicButton.setAttribute('aria-pressed', isActive ? 'true' : 'false');
			});

			updateCards();
		});
	});

	if (searchInput) {
		searchInput.addEventListener('input', updateCards);
	}

	portraitImages.forEach((image) => {
		const container = image.closest('.rpd-instructors-collage__tile, .rpd-instructor-card__image');

		if (!container) {
			return;
		}

		const showFallback = () => {
			container.classList.add('is-image-missing');
			image.setAttribute('aria-hidden', 'true');
		};

		image.addEventListener('error', showFallback, { once: true });

		if (image.complete && image.naturalWidth === 0) {
			showFallback();
		}
	});
})();
