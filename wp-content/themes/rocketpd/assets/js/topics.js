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
	const inlineClear = root.querySelector('[data-rpd-topics-clear-inline]');
	const activeCount = root.querySelector('[data-rpd-topics-active-count]');
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
		const activeFilters = (query ? 1 : 0) + (activeFilter !== 'all' ? 1 : 0);

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

		if (inlineClear) {
			inlineClear.hidden = activeFilters < 1;
		}

		if (activeCount) {
			activeCount.textContent = activeFilters > 0 ? `(${activeFilters})` : '';
		}
	};

	const focusGallerySearch = () => {
		if (!search) {
			return;
		}

		root.scrollIntoView({ behavior: 'smooth', block: 'start' });
		window.setTimeout(() => search.focus({ preventScroll: true }), 250);
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
		const heroForm = heroSearch.closest('form');

		heroSearch.addEventListener('input', () => {
			search.value = heroSearch.value;
			updateGallery();
		});

		if (heroForm) {
			heroForm.addEventListener('submit', (event) => {
				event.preventDefault();
				search.value = heroSearch.value;
				updateGallery();
				focusGallerySearch();
			});
		}
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

	document.querySelectorAll('a[href="#gallery"]').forEach((link) => {
		link.addEventListener('click', (event) => {
			event.preventDefault();
			focusGallerySearch();
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
