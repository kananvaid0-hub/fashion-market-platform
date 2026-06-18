document.addEventListener('DOMContentLoaded', function () {
    const deleteForms = document.querySelectorAll('.delete-form');
    const filterButtons = document.querySelectorAll('.filter-button');
    const activeRecords = document.getElementById('active-records');
    const archivedRecords = document.getElementById('archived-records');
    const archivedSearch = document.getElementById('archived-search');

    deleteForms.forEach(form => {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            const actionInput = form.querySelector('input[name="action"]');
            const action = actionInput ? actionInput.value : 'archive';
            const label = action === 'restore' ? 'restore' : 'archive';
            const confirmed = confirm(`Are you sure you want to ${label} this record?`);
            if (confirmed) {
                form.submit();
            }
        });
    });

    filterButtons.forEach(button => {
        button.addEventListener('click', function () {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            const filter = this.getAttribute('data-filter');
            if (filter === 'archived') {
                activeRecords.classList.add('hidden');
                if (archivedRecords) archivedRecords.classList.remove('hidden');
            } else {
                activeRecords.classList.remove('hidden');
                if (archivedRecords) archivedRecords.classList.add('hidden');
            }
        });
    });

    if (archivedSearch) {
        archivedSearch.addEventListener('keyup', function () {
            const searchValue = this.value.toLowerCase();
            if (archivedRecords) {
                const tables = archivedRecords.querySelectorAll('table.data-table');
                tables.forEach(table => {
                    const rows = table.querySelectorAll('tbody tr');
                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(searchValue) ? '' : 'none';
                    });
                });
            }
        });
    }
});
