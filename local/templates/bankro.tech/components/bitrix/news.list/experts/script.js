$(function () {
    // modal experts
    $('.btn--expert').click(function () {
        // $('.bn-overlay').fadeIn(200);
        // $('.bn-modal-custom-experts').fadeIn(200);
        // window.scroll_hidden();

        $.ajax({
            type: "POST",
            url: '/ajax/show_expert.php',
            data: {
                expert_id: $(this).val()
            },
            timeout: 3000,
            success: function(data) {
                $('#js-show-expert-info').html(data);
            }
        });
    });
});
