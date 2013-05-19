	$(document).ready(function(){
		$("#opentodo").click(function(){
			if ($("#opentodo").hasClass("show")) {
				$("#opentodo").html("展开TODO List ▼");
				$("#opentodo").removeClass("show");
				$(".notfirst").css("display","none");
			} else {
				$("#opentodo").html("隐藏TODO List ▲");
				$("#opentodo").addClass("show");
				$(".notfirst").css("display","block");
			}
		});

	});
	
	