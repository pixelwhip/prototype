(function ($) {
  Drupal.behaviors.nameSpace = {
    attach: function(context, settings) {
    }
  };

  $(document).ready(function(){

    // Toggle dropdown class.
    // -----------------------------------------------------------------------
    $('.block--dropdown').find('.block-title').click(function() {
      $(this).parents('.block--dropdown').toggleClass('is-expanded');
    });
  });
})(jQuery);
