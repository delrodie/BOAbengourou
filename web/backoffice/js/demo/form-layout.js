$(document).ready(function(){$(".demo-panel-ref-btn").jasmineOverlay().on("click",function(){var b,a=$(this);a.jasmineOverlay("show"),b=setInterval(function(){a.jasmineOverlay("hide"),clearInterval(b)},2e3)}),$("[data-click=panel-expand]").click(function(a){a.preventDefault();var b=$(this).closest(".panel");$("body").hasClass("panel-expand")&&$(b).hasClass("panel-expand")?($("body, .panel").removeClass("panel-expand"),$(".panel").removeAttr("style")):($("body").addClass("panel-expand"),$(this).closest(".panel").addClass("panel-expand")),$(window).trigger("resize")}),$("[data-click=panel-collapse]").click(function(a){a.preventDefault(),$(this).closest(".panel").find(".panel-body").slideToggle()}),$("[data-click=panel-reload]").click(function(a){a.preventDefault();var b=$(this).closest(".panel");if(!$(b).hasClass("panel-loading")){var c=$(b).find(".panel-body"),d='<div class="panel-loader"><span class="spinner-small"></span></div>';$(b).addClass("panel-loading"),$(c).prepend(d),setTimeout(function(){$(b).removeClass("panel-loading"),$(b).find(".panel-loader").remove()},2e3)}})});