function testAnim(a){$("#animationSandbox").removeClass().addClass(a+" animated").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",function(){$(this).removeClass()})}$(document).ready(function(){$(".js--triggerAnimation").click(function(a){a.preventDefault();var b=$(".js--animations").val();testAnim(b)}),$(".js--animations").change(function(){var a=$(this).val();testAnim(a)})});