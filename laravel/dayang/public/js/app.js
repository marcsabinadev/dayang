document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var options  = {
        "duration": 1000
    }
    var instances = M.Carousel.init(elems, options);
  });