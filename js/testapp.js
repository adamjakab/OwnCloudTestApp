/*
JS
 */
(function ($) {
    $(document).ready(function () {
        let $app_content = $("#app-content")
        let $btn = $(".klikker", $app_content);

        $btn.on("click", function(e) {
            alert("You are a star!");
            e.preventDefault();
        });
    });
})(jQuery);
