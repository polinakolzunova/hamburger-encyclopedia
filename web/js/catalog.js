function clearSearchForm() {
    window.location.href = document.location.origin + "/catalog" + document.location.search;
}

Array.prototype.subarray = function (start, end) {
    if (!end) {
        end = -1;
    }
    return this.slice(start, this.length + 1 - (end * -1));
};

let pagination = {};
calculatePagination();

function calculatePagination() {
    pagination = {
        total: 0,
        current: 1,
        page: 2,
        content: $(".burger-item"),
        container: $("#burgersList")
    };
    pagination.total = Math.ceil(pagination.content.length / 2);
    pagination.container.empty();
    $("#pagination").html(templateNav());
    navPage(1);
}

function templateNav() {
    let navstart = `
        <li id="first" class="page-control page-item">
            <button class="page-link" aria-label="Previous" onclick="navPage(1)">
                <span aria-hidden="true">&lt;&lt;</span>
                <span class="sr-only">Previous</span>
            </button>
        </li>
        <li id="previous" class="page-control page-item" onclick="navPrev()">
            <button class="page-link" aria-label="Previous">
                <span aria-hidden="true">&lt;</span>
                <span class="sr-only">Previous</span>
            </button>
        </li>`;
    let navend = `
        <li id="next" class="page-control page-item">
            <button class="page-link" aria-label="Next" onclick="navNext()">
                <span aria-hidden="true">&gt;</span>
                <span class="sr-only">Next</span>
            </button>
        </li>
        <li id="last" class="page-control page-item">
            <button class="page-link" aria-label="Next" onclick="navPage(${pagination.total})">
                <span aria-hidden="true">&gt;&gt;</span>
                <span class="sr-only">Next</span>
            </button>
        </li>`;
    let navcenter = "";

    for (let i = 1; i <= pagination.total; i++) {
        navcenter += templateNavItem(i);
    }

    return navstart + navcenter + navend;
}

function templateNavItem(number) {
    return `
        <li id="page${number}" class="page-onepage page-item">
            <button class="page-link" onclick="navPage(${number})">${number}</button>
        </li>`;
}

function navPrev() {
    navPage(pagination.current - 1);
}

function navNext() {
    navPage(pagination.current + 1);
}

function navPage(number) {

    if (number < 1 || number > pagination.total) {
        return;
    }

    let index = (number - 1) * 2;
    $(".page-control").removeClass("disabled");
    $(".page-onepage").removeClass("active");
    $(`#page${number}`).addClass("active");

    if (number === 1) {
        $("#first").addClass("disabled");
        $("#previous").addClass("disabled");
    }
    if (number === pagination.total) {
        $("#next").addClass("disabled");
        $("#last").addClass("disabled");
    }

    pagination.current = number;
    pagination.container.empty();
    for (let i = index; i < pagination.page + index; i++) {
        pagination.container.append(pagination.content[i]);
    }

}
