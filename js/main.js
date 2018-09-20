//MENU SCROLL
$(".menu a").click(function() {
  //on click, we get the target value of the selected element
  var target = $(this).attr("target");
  //we then scroll our body until the top of the corresponding div in 700ms
  var mh = $(".menu").height();
  $("body").animate({ scrollTop: $("#" + target).offset().top - mh }, 700);
});

//SCROLLSPY
function scrollSpy() {
  var mh = $(".menu").height();
  $("#landing").css("padding-top", mh + "px");

  $(".menu a").removeClass("active"); //we remove active from every menu element

  //we get the divs offsets looping the menu links and getting the targets (this is dynamic: when we change div #suzy's height, code won't break!)
  var divs = [];
  $(".menu a").each(function(i) {
    var appo = $(this).attr("target");
    //here we get the distance from top of each div
    divs[i] = $("#" + appo).offset().top;
  });

  //gets actual scroll and adds window height/2 to change the active menu voice when the lower div reaches half of screen (it can be changed)
  var pos = $(window).scrollTop();
  var off = $(window).height() / 2;

  pos = pos + off;

  //we parse our "div distances from top" object (divs) until we find a div which is further from top than the actual scroll position(+ of course window height/2). When we find it, we assign "active" class to the Nth menu voice which is corresponding to the last div closer to the top than the actual scroll -> trick is looping from index=0 while Nth css numeration starts from 1, so when the index=3 (fourth div) breaks our cycly, we give active to the third element in menu.
  var index = 0;

  for (index = 0; index < divs.length; index++) {
    if (pos < divs[index]) {
      break;
    }
  }
  $(".menu li:nth-child(" + index + ") a").addClass("active");
}

$(window).scroll(function() {
  scrollSpy();
});
$(document).ready(function() {
  scrollSpy();
});

//owl slider
$(document).ready(function() {
  $("#mainowl").owlCarousel({
    items: 1,
    loop: true,
    dots: false,
    autoplay: true,
    autoplaySpeed: 1000
  });
});

//torna su
var scrollTrigger = 200; // px
function backToTop() {
  var scrollH = $(window).scrollTop();
  if (scrollH > scrollTrigger) {
    $("#totop").addClass("show");
  } else {
    $("#totop").removeClass("show");
  }
}
backToTop(); //@document ready
$(window).on("scroll", function() {
  //@each scroll
  backToTop();
});

$("#totop").on("click", function() {
  $("html,body").animate({ scrollTop: 0 }, 700, function() {
    $("#totop").removeClass("show");
  });
});

//instagram
$(document).ready(function() {
  $.ajax({
    method: "get",
    url: "/helper.php",
    dataType: "json"
  })

    .done(function(res) {
      $.each(res.data, function(i, v) {
        var pic = this.images.standard_resolution.url;
        var like = this.likes.count;
        var comms = this.comments.count;
        var capt = this.caption ? this.caption.text : "";
        var spazio = capt.indexOf(" ", 80);
        if (spazio != -1) {
          capt = capt.substr(0, spazio) + "...";
        }
        $("#insta").append(
          '<div class="instapic"><img class="img-responsive" src="' +
            pic +
            '"><p class="instmobinfo"><i class="fa fa-instagram"></i><span>' +
            like +
            ' <i class="fa fa-heart"></i>    ' +
            comms +
            ' <i class="fa fa-comment"></i></span></p><div class="instover"><div class="zaninstalogo"><img src="/img/logo_w.png" class="img-responsive"></div><div class="likecomms"><div class="like"><i class="fa fa-heart"></i><br>' +
            like +
            '</div><div class="comms"><i class="fa fa-comment"></i><br>' +
            comms +
            '</div></div><p class="instacapt">' +
            capt +
            "</p></div></div>"
        );
      });
      $("#insta").imagesLoaded(function() {
        $("#insta").masonry({
          itemSelector: ".instapic"
        });
      });
    })

    .fail(function() {
      console.log("We couldn't get instagram feed");
    });
});

$("#insta").on("click", ".instapic", function() {
  window.open("https://www.instagram.com/zanellazine/", "_blank");
});

//modal
$(".trgmod").click(function() {
  var prodid = $(this)
    .attr("id")
    .replace("prod", "");
  $.ajax({
    method: "post",
    url: "prod.php",
    data: { id: prodid },
    dataType: "json"
  })

    .done(function(data) {
      $(".modal-title").html(data.tit);
      $(".modal-subtitle").html(data.prezzo);
      $("#fotomodal").attr("src", data.img);
      if (data.img1 != "/backend/imgups/") {
        $("#fotoalt1").html(
          "<img src=" + data.img1 + " class='img-responsive altfoto'>"
        );
      } else {
        $("#fotoalt1").html("");
      }
      if (data.img2 != "/backend/imgups/") {
        $("#fotoalt2").html(
          "<img src=" + data.img2 + " class='img-responsive altfoto'>"
        );
      } else {
        $("#fotoalt2").html("");
      }
      if (data.img3 != "/backend/imgups/") {
        $("#fotoalt3").html(
          "<img src=" + data.img3 + " class='img-responsive altfoto'>"
        );
      } else {
        $("#fotoalt3").html("");
      }
      $("#testoprod").html(data.testo);
      if (data.link != "") {
        $("#btnshop").html(
          "<a class='btn' href=" + data.link + " target='_blank'>Buy Now!</a>"
        );
      } else {
        $("#btnshop").html(
          "<a class='btn' href='#contact us' target='_blank'>Contact Us!</a>"
        );
      }
    })

    .fail(function() {
      alert("ko");
    });
});

//altimg modal
$(".modal").on("click", ".altfoto", function() {
  var appo = $("#fotomodal").attr("src");
  $("#fotomodal").attr("src", $(this).attr("src"));
  $(this).attr("src", appo);
});

//chiudi modal
$("#btnshop").on("click", ".btn", function() {
  $(".modal .close").click();
});

//contatti
$(".form #name").keyup(function() {
  checkForm();
});
$(".form #cog").keyup(function() {
  checkForm();
});
$(".form #mail").keyup(function() {
  checkForm();
});
$(".form #msg").keyup(function() {
  checkForm();
});

function validateEmail(email) {
  var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
  return re.test(email);
}

function checkForm() {
  if ($(".form #name").val() == "") {
    $("#sbm").removeClass("ok");
    return 0;
  }
  if ($(".form #cog").val() == "") {
    $("#sbm").removeClass("ok");
    return 0;
  }
  if ($(".form #mail").val() == "" || !validateEmail($(".form #mail").val())) {
    $("#sbm").removeClass("ok");
    return 0;
  }
  if ($(".form #msg").val() == "") {
    $("#sbm").removeClass("ok");
    return 0;
  }
  if (!$("#sbm").hasClass("ok")) {
    $("#sbm").addClass("ok");
  }
  if ($("#sbm").hasClass("error")) {
    $("#sbm").removeClass("error");
  }
}

$(".form").on("click", ".btnform.ok", function() {
  $.ajax({
    data: {
      nome: $(".form #name").val(),
      cognome: $(".form #cog").val(),
      mail: $(".form #mail").val(),
      msg: $(".form #msg").val()
    },
    url: "mailer.php",
    method: "post"
  })
    .done(function() {
      $(".btnform.ok").addClass("done");
      $(".btnform.ok").html("Message sent!");
      $(".btnform.ok").removeClass("ok");
    })
    .fail(function() {
      $(".btnform.ok").addClass("error");
      $(".btnform.ok").html("Error! Refresh the page");
      $(".btnform.ok").removeClass("ok");
    });
});
