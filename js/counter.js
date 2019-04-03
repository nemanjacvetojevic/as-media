(function($) {
  $(document).ready(function() {
    var defaultOption = {
      strokeWidth: 3,
      trailWidth: 5,
      easing: 'easeInOut',
			count:100,
      duration: 1400,
      text: {
        autoStyleContainer: false
      },
      from: {
        color: '#aaa',
        width: 1
      },
      to: {
        color: '#bbb',
        width: 4
      },
      // Set default step function for all animate calls
      step: function(state, circle) {
        circle.path.setAttribute('stroke', state.color);
        circle.path.setAttribute('stroke-width', state.width);

        var value = Math.round(circle.value() * circle._opts.count);
        if (value === 0) {
          circle.setText('');
        } else {
          circle.setText(value);
        }
      }
    };
    var a = 0;
    if($('.counter').length) {
    $(window).scroll(function() {

      var oTop = $('.counter').offset().top - window.innerHeight;
      if (a == 0 && $(window).scrollTop() > oTop) {
        $('.counter').each(function(index, element) {
          var options = $.extend({}, defaultOption);
          options.from.color = $(element).data('fromcolor');
          options.to.color = $(element).data('tocolor');
					options.count = $(element).data('count');

          var bar = new ProgressBar.Circle(element, options);
					bar.animate(1.0);

        });
        a = 1;
      }

    });
  }
  });
})(jQuery);
