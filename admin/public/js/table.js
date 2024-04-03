function renderTable(data, columns, showAction, fieldStatus = 'confirm') {
    const table = document.querySelector('#table');

    if (table) {
        table.innerHTML = '';

        $('#total_item').text(data.length);

        let thead = table.querySelector('thead');
        if (!thead) {
            thead = document.createElement('thead');
            table.appendChild(thead);

            const headerRow = document.createElement('tr');
            columns.forEach((column, index) => {
                const th = document.createElement('th');
                th.textContent = column.title;
                if (column.width) {
                    th.style.width = column.width;
                }
                headerRow.appendChild(th);
            });

            if (showAction) {
                const th = document.createElement('th');
                th.textContent = 'Action';
                headerRow.appendChild(th);
            }

            thead.appendChild(headerRow);
        }

        let tbody = table.querySelector('tbody');
        if (!tbody) {
            tbody = document.createElement('tbody');
            table.appendChild(tbody);
        }

        const VND = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
        });

        const rowsHTML = data.map((rowData, rowIndex) => {
            const cellsHTML = columns.map((column, colIndex) => {
                const field = column.field;

                if (field === 'index') {
                    return `<td style="width: ${column.width}">${
                        rowIndex + 1
                    }</td>`;
                } else {
                    if (column.filter) {
                        let value;
                        column.filter.forEach((item) => {
                            if (item[rowData[field]]) {
                                value = item[rowData[field]];
                            }
                        });

                        let color = '#000';
                        if (value === 'Pending') {
                            color = 'orange';
                        } else if (value === 'Approved') {
                            color = 'green';
                        } else if (value === 'Canceled') {
                            color = '#ccc';
                        }

                        return `<td style="width: ${column.width}; text-align:${column.align};">
                                    <span style="background-color: ${color}; color: #fff; display:inline-block; border-radius:4px; font-size:12px; padding: 4px 8px">
                                        ${value}
                                    </span>
                                </td>`;
                    } else if (field === 'dob') {
                        const dateWithTimezone = new Date(rowData[field]);

                        const dateUTC = new Date(
                            dateWithTimezone.toISOString()
                        );

                        const formattedDate = dateUTC.toLocaleString('en-US', {
                            year: 'numeric',
                            month: '2-digit',
                            day: '2-digit',
                            timeZone: 'UTC',
                        });

                        return `<td style="width: ${column.width}; text-align:${column.align}">
                                    ${formattedDate}
                                </td>`;
                    } else if (column.type === 'format') {
                        return `<td style="width: ${column.width}; text-align:${
                            column.align
                        }">
                                    ${VND.format(rowData[field])}
                                </td>`;
                    } else if (column.type === 'img') {
                        return `<td style="width: ${column.width}; text-align:${column.align}">
                            <img src="../product_img/${rowData[field]}" alt="Logo product">
                    </td>`;
                    } else {
                        return `<td style="width: ${column.width}; text-align:${column.align}">
                                    ${rowData[field]}
                                </td>`;
                    }
                }
            });

            if (showAction) {
                if (rowData[fieldStatus] && rowData[fieldStatus] != 0) {
                    cellsHTML.push(`
                        <td>
                            <button class="btn btn_show" onclick="handleShow(${rowData.id})">
                               Detail
                            </button>
                            <button class="btn btn_edit" onclick="handleEdit(${rowData.id})">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="btn btn_delete" onclick="handleDelete(${rowData.id})">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    `);
                } else {
                    cellsHTML.push(`
                    <td>
                        <button class="btn btn_show" onclick="handleShow(${rowData.id})">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                        <button class="btn btn_confirm" onclick="handleConfirm(${rowData.id})">
                            <i class="fa-solid fa-check"></i>
                        </button>
                        <button class="btn btn_cancel" onclick="handleCancel(${rowData.id})">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                        <button class="btn btn_edit" onclick="handleEdit(${rowData.id})">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button class="btn btn_delete" onclick="handleDelete(${rowData.id})">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                `);
                }
            }

            return `<tr>${cellsHTML.join('')}</tr>`;
        });
        tbody.innerHTML = rowsHTML.join('');

        const rows = table.querySelectorAll('tbody tr');
        if ($('#search').val() !== '') {
            const searchTerm = $('#search').val();
            const filteredData = data.filter((item) =>
                Object.values(item).some(
                    (value) =>
                        typeof value === 'string' && value.includes(searchTerm)
                )
            );

            rows.forEach((row, index) => {
                const rowData = data[index];
                if (filteredData.includes(rowData)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    }
}

function searchTable(data, searchSelector, columns, showAction) {
    const searchInput = document.querySelector(searchSelector);
    const table = document.querySelector('#table');

    searchInput.addEventListener('input', function () {
        const searchTerm = this.value;

        const filteredData = data.filter((item) =>
            Object.values(item).some(
                (value) =>
                    typeof value === 'string' && value.includes(searchTerm)
            )
        );

        const rows = table.querySelectorAll('tbody tr');
        rows.forEach((row, index) => {
            const rowData = data[index];
            if (filteredData.includes(rowData)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });

        if ($(this).val() === '') {
            renderTable(data, columns, true);
        }

        $('#total_item').text(filteredData.length);
    });
}
