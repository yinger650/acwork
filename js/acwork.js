	$(document).ready(function(){
		$("#opentodo").click(function(){
			if ($("#opentodo").hasClass("show")) {
				$("#opentodo").html("展开TODO List <span class='badge badge-error'></span>▼");
				i = $(".accordion-group").size();
				$(".badge").html(i);
				$("#opentodo").removeClass("show");
				$(".notfirst").css("display","none");
			} else {
				$("#opentodo").html("隐藏TODO List ▲");
				$("#opentodo").addClass("show");
				$(".notfirst").css("display","block");
			}
		});
		
		i = $(".accordion-group").size();
		$(".badge").html(i);

	});
	
	