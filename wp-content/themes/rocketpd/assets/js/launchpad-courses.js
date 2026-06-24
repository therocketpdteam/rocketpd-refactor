(function () {
	'use strict';

	const root = document.querySelector('[data-rpd-lp-courses]');

	if (!root) {
		return;
	}

	const search = root.querySelector('[data-rpd-lp-courses-search]');
	const filters = Array.from(root.querySelectorAll('[data-rpd-lp-course-filter]'));
	const cards = Array.from(root.querySelectorAll('[data-rpd-lp-course-card]'));
	const statusEl = root.querySelector('[data-rpd-lp-courses-status]');
	const emptyEl = root.querySelector('[data-rpd-lp-courses-empty]');
	const clearBtns = Array.from(root.querySelectorAll('[data-rpd-lp-courses-clear]'));
	const inlineClear = root.querySelector('[data-rpd-lp-courses-clear-inline]');
	const activeCountEl = root.querySelector('[data-rpd-lp-courses-active-count]');
	const loadMoreWrap = root.querySelector('[data-rpd-lp-courses-load-more]');

	const PAGE_SIZE = 8;
	let activeFilter = 'all';
	let showAll = false;

	const normalize = (v) => String(v || '').trim().toLowerCase();

	const setFilter = (next) => {
		activeFilter = next || 'all';

		filters.forEach((btn) => {
			const active = btn.dataset.rpdLpCourseFilter === activeFilter;
			btn.classList.toggle('is-active', active);
			btn.setAttribute('aria-pressed', active ? 'true' : 'false');
		});
	};

	const isFiltered = () => activeFilter !== 'all' || normalize(search ? search.value : '').length > 0;

	const update = () => {
		const query = normalize(search ? search.value : '');
		const filtered = isFiltered();
		let matched = 0;
		let visible = 0;
		const activeFilters = (query ? 1 : 0) + (activeFilter !== 'all' ? 1 : 0);

		cards.forEach((card) => {
			const formatMatch = activeFilter === 'all' || card.dataset.topic === activeFilter;
			const queryMatch = !query || normalize(card.dataset.search).includes(query);

			if (formatMatch && queryMatch) {
				matched++;
				const show = filtered || showAll || matched <= PAGE_SIZE;
				card.hidden = !show;
				if (show) visible++;
			} else {
				card.hidden = true;
			}
		});

		if (statusEl) {
			statusEl.textContent = `Showing ${visible} of ${cards.length} courses`;
		}

		if (emptyEl) {
			emptyEl.hidden = matched > 0;
		}

		if (loadMoreWrap) {
			loadMoreWrap.hidden = filtered || showAll || matched <= PAGE_SIZE;
		}

		if (inlineClear) {
			inlineClear.hidden = activeFilters < 1;
		}

		if (activeCountEl) {
			activeCountEl.textContent = activeFilters > 0 ? `(${activeFilters})` : '';
		}
	};

	filters.forEach((btn) => {
		btn.addEventListener('click', () => {
			showAll = false;
			setFilter(btn.dataset.rpdLpCourseFilter);
			update();
		});
	});

	if (search) {
		search.addEventListener('input', () => {
			showAll = false;
			update();
		});
	}

	clearBtns.forEach((btn) => {
		btn.addEventListener('click', () => {
			if (search) {
				search.value = '';
			}
			showAll = false;
			setFilter('all');
			update();
			if (search) {
				search.focus({ preventScroll: true });
			}
		});
	});

	if (loadMoreWrap) {
		const loadMoreBtn = loadMoreWrap.querySelector('button');

		if (loadMoreBtn) {
			loadMoreBtn.addEventListener('click', () => {
				showAll = true;
				update();
			});
		}
	}

	setFilter('all');
	update();
})();
