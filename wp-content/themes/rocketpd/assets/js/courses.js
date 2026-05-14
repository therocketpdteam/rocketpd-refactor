(() => {
	const page = document.querySelector('.rpd-courses-page');

	if (!page) {
		return;
	}

	const root = page.querySelector('[data-rpd-courses]');

	if (!root) {
		return;
	}

	const formatButtons = Array.from(root.querySelectorAll('[data-rpd-format-filter]'));
	const searchInput = root.querySelector('[data-rpd-course-search]');
	const selects = Array.from(root.querySelectorAll('[data-rpd-course-select]'));
	const status = root.querySelector('[data-rpd-course-status]');
	const statusText = root.querySelector('[data-rpd-course-status-text]');
	const clearButtons = Array.from(root.querySelectorAll('[data-rpd-course-clear]'));
	const groupsWrap = root.querySelector('[data-rpd-course-groups]');
	const flatGrid = root.querySelector('[data-rpd-course-flat-grid]');
	const emptyState = root.querySelector('[data-rpd-course-empty]');
	const groupedCards = Array.from(groupsWrap ? groupsWrap.querySelectorAll('[data-rpd-course-card]') : []);
	const flatCards = Array.from(flatGrid ? flatGrid.querySelectorAll('[data-rpd-course-card]') : []);
	const allCards = groupedCards.concat(flatCards);

	if (!allCards.length) {
		return;
	}

	const state = {
		format: 'all',
		topic: 'all',
		instructor: 'all',
		audience: 'all',
		query: '',
	};

	const normalize = (value) => String(value || '').toLowerCase().trim();

	const matches = (card) => {
		const query = normalize(state.query);
		const audiences = String(card.dataset.audiences || '').split('|');
		const haystack = normalize(card.dataset.search || card.textContent);

		return (
			(state.format === 'all' || card.dataset.format === state.format) &&
			(state.topic === 'all' || card.dataset.topic === state.topic) &&
			(state.instructor === 'all' || card.dataset.instructor === state.instructor) &&
			(state.audience === 'all' || audiences.includes(state.audience)) &&
			(!query || haystack.includes(query))
		);
	};

	const getActiveFilterCount = () => {
		return ['format', 'topic', 'instructor', 'audience'].filter((key) => state[key] !== 'all').length + (state.query ? 1 : 0);
	};

	const update = () => {
		let visibleCount = 0;
		const showGroups = state.format === 'all';

		if (groupsWrap) {
			groupsWrap.hidden = !showGroups;
		}

		if (flatGrid) {
			flatGrid.hidden = showGroups;
		}

		if (showGroups) {
			const groups = Array.from(root.querySelectorAll('[data-rpd-course-group]'));

			groups.forEach((group) => {
				let groupCount = 0;
				const cards = Array.from(group.querySelectorAll('[data-rpd-course-card]'));

				cards.forEach((card) => {
					const visible = matches(card);
					card.hidden = !visible;

					if (visible) {
						groupCount += 1;
						visibleCount += 1;
					}
				});

				const count = group.querySelector('[data-rpd-course-group-count]');

				if (count) {
					count.textContent = String(groupCount);
				}

				group.hidden = groupCount === 0;
			});
		} else {
			flatCards.forEach((card) => {
				const visible = matches(card);
				card.hidden = !visible;

				if (visible) {
					visibleCount += 1;
				}
			});
		}

		const activeFilterCount = getActiveFilterCount();

		if (status && statusText) {
			status.hidden = activeFilterCount === 0;
			statusText.textContent = `${visibleCount} course${visibleCount === 1 ? '' : 's'} matching ${activeFilterCount} filter${activeFilterCount === 1 ? '' : 's'}.`;
		}

		if (emptyState) {
			emptyState.hidden = visibleCount !== 0;
		}
	};

	formatButtons.forEach((button) => {
		button.addEventListener('click', () => {
			state.format = button.dataset.rpdFormatFilter || 'all';

			formatButtons.forEach((formatButton) => {
				const active = formatButton === button;
				formatButton.classList.toggle('is-active', active);
				formatButton.setAttribute('aria-pressed', active ? 'true' : 'false');
			});

			update();
		});
	});

	if (searchInput) {
		searchInput.addEventListener('input', () => {
			state.query = searchInput.value;
			update();
		});
	}

	selects.forEach((select) => {
		select.addEventListener('change', () => {
			state[select.dataset.rpdCourseSelect] = select.value || 'all';
			update();
		});
	});

	clearButtons.forEach((button) => {
		button.addEventListener('click', () => {
			state.format = 'all';
			state.topic = 'all';
			state.instructor = 'all';
			state.audience = 'all';
			state.query = '';

			if (searchInput) {
				searchInput.value = '';
			}

			selects.forEach((select) => {
				select.value = 'all';
			});

			formatButtons.forEach((formatButton) => {
				const active = formatButton.dataset.rpdFormatFilter === 'all';
				formatButton.classList.toggle('is-active', active);
				formatButton.setAttribute('aria-pressed', active ? 'true' : 'false');
			});

			update();
		});
	});

	allCards.forEach((card) => {
		const image = card.querySelector('img');

		if (!image) {
			return;
		}

		image.addEventListener(
			'error',
			() => {
				card.classList.add('is-image-missing');
				image.hidden = true;
			},
			{ once: true }
		);
	});

	update();
})();
