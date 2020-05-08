$(document).ready(function () {
    $("body").on("mouseover", "video", function(){
        this.play();
      });
      $("body").on("mouseleave", "video", function(){
        this.stop();
    });
});