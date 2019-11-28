$(document).ready(function() {
    $(document).on("click", ".pagination a", function(event) {
        event.preventDefault();
        var page = $(this)
            .attr("href")
            .split("page=")[1];
        var container = $(this).parents()[6].id;
        fetch_data(page, container);
    });

    function fetch_data(page, container) {
        $.ajax({
            url: "/home/fetch_data/?page=" + page,
            type: "Get",
            method: "get",
            data: { type: container },
            success: function(data) {
                $("#" + container).html(data);
            }
        });
    }
});
