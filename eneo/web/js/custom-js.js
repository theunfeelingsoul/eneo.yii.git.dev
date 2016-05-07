$( document ).ready(function() {
     var pgurl = window.location.href.substr(window.location.href
.lastIndexOf("/")+1);
     $(".nav-sidebar li a").each(function(){
          if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
          $(this).addClass("nav-sidebar-active");
     })

      $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });

    // scroll to the comment div on load
    // this is to help ease the pain of scrolling all the time
    // this for all the pages with this class
    $('html, body').animate({
        scrollTop: $('.business-detail-review-comment').offset().top
    }, 'slow');
});



// $(document).ready(function () {
//     // Handler for .ready() called.
//     $('html, body').animate({
//         scrollTop: $('#what').offset().top
//     }, 'slow');
// });