$('.ipWidget-FAQ form').on('ipSubmitResponse', function(e, response) {
    var $this = $(this);
    var $widget = $this.closest('.ipWidget-FAQ');

    if (response.status == 'ok') {
        $widget.find('.ipsFAQForm').addClass('hidden');
        $widget.find('.ipsThankYou').removeClass('hidden');
    }
});
