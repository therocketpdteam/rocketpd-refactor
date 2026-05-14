(function () {
	'use strict';

	const root = document.querySelector('[data-rpd-topics]');

	if (!root) {
		return;
	}

	const search = root.querySelector('[data-rpd-topics-search]');
	const heroSearch = document.querySelector('[data-rpd-topics-hero-search]');
	const filters = Array.from(root.querySelectorAll('[data-rpd-topic-filter]'));
	const cards = Array.from(root.querySelectorAll('[data-rpd-topic-card]'));
	const status = root.querySelector('[data-rpd-topics-status]');
	const empty = root.querySelector('[data-rpd-topics-empty]');
	const clearButtons = Array.from(document.querySelectorAll('[data-rpd-topics-clear]'));
	const faq = document.querySelector('[data-rpd-topics-faq]');
	let activeFilter = 'all';

	const normalize = (value) => String(value || '').trim().toLowerCase();

	const setFilter = (nextFilter) => {
		activeFilter = nextFilter || 'all';

		filters.forEach((button) => {
			const isActive = button.dataset.rpdTopicFilter === activeFilter;
			button.classList.toggle('is-active', isActive);
			button.setAttribute('aria-pressed', isActive ? 'true' : 'false');
		});
	};

	const matchesFilter = (card) => {
		if ('all' === activeFilter) {
			return true;
		}

		if ('featured' === activeFilter) {
			return card.dataset.featured === 'true';
		}

		if ('newest' === activeFilter) {
			return card.dataset.newest === 'true';
		}

		return card.dataset.category === activeFilter;
	};

	const updateGallery = () => {
		const query = normalize(search ? search.value : '');
		let visibleCount = 0;

		cards.forEach((card) => {
			const haystack = normalize(card.dataset.search);
			const isVisible = matchesFilter(card) && (!query || haystack.includes(query));

			card.hidden = !isVisible;
			card.classList.toggle('is-hidden', !isVisible);

			if (isVisible) {
				visibleCount += 1;
			}
		});

		if (status) {
			status.textContent = `Showing ${visibleCount} of ${cards.length} topics`;
		}

		if (empty) {
			empty.hidden = visibleCount > 0;
		}
	};

	filters.forEach((button) => {
		button.addEventListener('click', () => {
			setFilter(button.dataset.rpdTopicFilter);
			updateGallery();
		});
	});

	if (search) {
		search.addEventListener('input', updateGallery);
	}

	if (heroSearch && search) {
		heroSearch.addEventListener('input', () => {
			search.value = heroSearch.value;
			updateGallery();
		});
	}

	clearButtons.forEach((button) => {
		button.addEventListener('click', () => {
			if (search) {
				search.value = '';
			}

			if (heroSearch) {
				heroSearch.value = '';
			}

			setFilter('all');
			updateGallery();

			if (search) {
				search.focus({ preventScroll: true });
			}
		});
	});

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

	setFilter(activeFilter);
	updateGallery();
})();
