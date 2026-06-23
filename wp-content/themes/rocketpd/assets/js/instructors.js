(() => {
	const page = document.querySelector('.rpd-instructors-page');

	if (!page) {
		return;
	}

	const topicButtons = Array.from(page.querySelectorAll('[data-rpd-instructor-topics] button'));
	const searchInput = page.querySelector('[data-rpd-instructor-search]');
	const cards = Array.from(page.querySelectorAll('[data-rpd-instructor-card]'));
	const status = page.querySelector('[data-rpd-instructor-status]');
	const emptyState = page.querySelector('[data-rpd-instructor-empty]');
	const showMoreBtn = page.querySelector('[data-rpd-instructor-show-more]');
	const portraitImages = Array.from(page.querySelectorAll('.rpd-instructors-collage__tile img, .rpd-instructor-card__image img'));

	if (!cards.length) {
		return;
	}

	const PAGE_SIZE = 6;
	let activeTopic = 'all';
	let visibleLimit = PAGE_SIZE;

	const normalize = (value) => String(value || '').toLowerCase().trim();
	const parseTopics = (value) => String(value || '').split('|').filter(Boolean);

	const updateCards = () => {
		const query = normalize(searchInput ? searchInput.value : '');
		let matchCount = 0;

		cards.forEach((card) => {
			const topics = parseTopics(card.dataset.topics || card.dataset.tags);
			const haystack = normalize(card.dataset.search || card.textContent);
			const matchesTopic = activeTopic === 'all' || topics.includes(activeTopic);
			const matchesQuery = !query || haystack.includes(query);
			const matches = matchesTopic && matchesQuery;

			if (matches) {
				card.hidden = matchCount >= visibleLimit;
				matchCount++;
			} else {
				card.hidden = true;
			}
		});

		if (showMoreBtn) {
			showMoreBtn.style.display = matchCount > visibleLimit ? '' : 'none';
		}

		if (status) {
			const shown = Math.min(visibleLimit, matchCount);
			status.textContent = `Showing ${shown} of ${matchCount} instructor${matchCount === 1 ? '' : 's'}.`;
		}

		if (emptyState) {
			emptyState.hidden = matchCount > 0;
		}
	};

	topicButtons.forEach((button) => {
		button.addEventListener('click', () => {
			activeTopic = button.dataset.topic || 'all';
			visibleLimit = PAGE_SIZE;

			topicButtons.forEach((topicButton) => {
				const isActive = topicButton === button;
				topicButton.classList.toggle('is-active', isActive);
				topicButton.setAttribute('aria-pressed', isActive ? 'true' : 'false');
			});

			updateCards();
		});
	});

	if (searchInput) {
		searchInput.addEventListener('input', () => {
			visibleLimit = PAGE_SIZE;
			updateCards();
		});
	}

	if (showMoreBtn) {
		showMoreBtn.addEventListener('click', () => {
			visibleLimit += PAGE_SIZE;
			updateCards();
		});
	}

	updateCards();

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
