(() => {
	const page = document.querySelector('.rpd-cohorts-page');

	if (!page) {
		return;
	}

	const root = page.querySelector('[data-rpd-cohorts]');
	const faq = page.querySelector('[data-rpd-cohorts-faq]');

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

	if (!root) {
		return;
	}

	const PAGE_SIZE = 6;

	const cards = Array.from(root.querySelectorAll('[data-rpd-cohort-card]'));
	const search = root.querySelector('[data-rpd-cohort-search]');
	const selects = Array.from(root.querySelectorAll('[data-rpd-cohort-select]'));
	const pillButtons = Array.from(root.querySelectorAll('[data-rpd-cohort-filter]'));
	const clearButtons = Array.from(root.querySelectorAll('[data-rpd-cohort-clear]'));
	const status = root.querySelector('[data-rpd-cohort-status]');
	const empty = root.querySelector('[data-rpd-cohort-empty]');
	const loadMoreBtn = root.querySelector('[data-rpd-cohort-load-more]');

	let showAll = false;

	const state = {
		query: '',
		topic: 'all',
		audience: 'all',
		status: 'all',
		length: 'all',
		price: 'all',
	};

	const normalize = (value) => String(value || '').toLowerCase().trim();

	const matches = (card) => {
		const audienceList = String(card.dataset.audiences || '').split('|');
		const price = card.dataset.price === 'sponsored' ? 'free' : card.dataset.price;
		const haystack = normalize(card.dataset.search || card.textContent);
		const query = normalize(state.query);

		return (
			(state.topic === 'all' || card.dataset.topic === state.topic) &&
			(state.audience === 'all' || audienceList.includes(state.audience)) &&
			(state.status === 'all' || card.dataset.status === state.status) &&
			(state.length === 'all' || card.dataset.length === state.length) &&
			(state.price === 'all' || price === state.price) &&
			(!query || haystack.includes(query))
		);
	};

	const activeCount = () => Object.keys(state).filter((key) => state[key] && state[key] !== 'all').length;

	const isFiltered = () => activeCount() > 0 || normalize(state.query).length > 0;

	const update = () => {
		let matched = 0;
		let shown = 0;

		cards.forEach((card) => {
			const isMatch = matches(card);

			if (isMatch) {
				matched += 1;
				// When unfiltered, limit to PAGE_SIZE unless showAll
				const withinPage = isFiltered() || showAll || matched <= PAGE_SIZE;
				card.hidden = !withinPage;
				if (withinPage) shown += 1;
			} else {
				card.hidden = true;
			}
		});

		if (status) {
			status.textContent = `Showing ${shown} of ${cards.length} cohorts`;
		}

		if (loadMoreBtn) {
			loadMoreBtn.hidden = isFiltered() || showAll || matched <= PAGE_SIZE;
		}

		clearButtons.forEach((button) => {
			button.hidden = !isFiltered();
		});

		if (empty) {
			empty.hidden = matched !== 0;
		}
	};

	if (search) {
		search.addEventListener('input', () => {
			state.query = search.value;
			update();
		});
	}

	selects.forEach((select) => {
		select.addEventListener('change', () => {
			state[select.dataset.rpdCohortSelect] = select.value || 'all';
			update();
		});
	});

	pillButtons.forEach((button) => {
		button.addEventListener('click', () => {
			const key = button.dataset.rpdCohortFilter;
			state[key] = button.dataset.value || 'all';

			pillButtons.filter((item) => item.dataset.rpdCohortFilter === key).forEach((item) => {
				const active = item === button;
				item.classList.toggle('is-active', active);
				item.setAttribute('aria-pressed', active ? 'true' : 'false');
			});

			update();
		});
	});

	clearButtons.forEach((button) => {
		button.addEventListener('click', () => {
			state.query = '';
			state.topic = 'all';
			state.audience = 'all';
			state.status = 'all';
			state.length = 'all';
			state.price = 'all';
			showAll = false;

			if (search) {
				search.value = '';
			}

			selects.forEach((select) => {
				select.value = 'all';
			});

			pillButtons.forEach((item) => {
				const active = item.dataset.value === 'all';
				item.classList.toggle('is-active', active);
				item.setAttribute('aria-pressed', active ? 'true' : 'false');
			});

			update();
		});
	});

	if (loadMoreBtn) {
		loadMoreBtn.addEventListener('click', () => {
			showAll = true;
			update();
		});
	}

	cards.forEach((card) => {
		const image = card.querySelector('img');

		if (image) {
			image.addEventListener('error', () => {
				image.hidden = true;
				card.classList.add('is-image-missing');
			}, { once: true });
		}
	});

	update();
})();
