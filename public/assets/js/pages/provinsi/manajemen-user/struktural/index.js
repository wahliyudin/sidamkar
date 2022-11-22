$(document).ready(function () {
    const scrollContainer = document.querySelector(".dataTables_wrapper");
    if (scrollContainer.offsetWidth <= 750) {
        scrollContainer.addEventListener("wheel", (evt) => {
            evt.preventDefault();
            scrollContainer.scrollLeft += evt.deltaY * (50 / 100);
        });
    }

    addEventListener("resize", (event) => {
        event.preventDefault();
        $('.table.dataTable').css('width', scrollContainer.offsetWidth);
    });
});
