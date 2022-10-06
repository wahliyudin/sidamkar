let dataTable = new simpleDatatables.DataTable(document.getElementById("table1"));
// Move "per page dropdown" selector element out of label
// to make it work with bootstrap 5. Add bs5 classes.
function adaptPageDropdown(el) {
    const selector = el.wrapper.querySelector(".dataTable-selector");
    selector.parentNode.parentNode.insertBefore(selector, selector.parentNode);
    selector.classList.add("form-select");
}

// Add bs5 classes to pagination elements
function adaptPagination(el) {
    const paginations = el.wrapper.querySelectorAll(
        "ul.dataTable-pagination-list"
    );

    for (const pagination of paginations) {
        pagination.classList.add(...["pagination", "pagination-primary"]);
    }

    const paginationLis = el.wrapper.querySelectorAll(
        "ul.dataTable-pagination-list li"
    );

    for (const paginationLi of paginationLis) {
        paginationLi.classList.add("page-item");
    }

    const paginationLinks = el.wrapper.querySelectorAll(
        "ul.dataTable-pagination-list li a"
    );

    for (const paginationLink of paginationLinks) {
        paginationLink.classList.add("page-link");
    }
}

// Patch "per page dropdown" and pagination after table rendered
dataTable.on("datatable.init", function () {
    adaptPageDropdown(dataTable);
    adaptPagination(dataTable);
});

// Re-patch pagination after the page was changed
dataTable.on("datatable.page", adaptPagination(dataTable));

let dataTable2 = new simpleDatatables.DataTable(document.getElementById("table2"));
dataTable2.on("datatable.init", function () {
    adaptPageDropdown(dataTable2);
    adaptPagination(dataTable2);
});

// Re-patch pagination after the page was changed
dataTable2.on("datatable.page", adaptPagination(dataTable2));
