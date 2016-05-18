$(document).ready(function(){
	$("#gc-domaine").change(function () {
          var str = "";
          $("#gc-domaine option:selected").each(function () {
                str += $(this).val() + " ";
              });
		
		if (str == -1) {
			$(".gc-img").show();
		}
		else {
			$(".gc-img").not('.' + str).hide();
			$(".gc-img").filter('.' + str).show();
		}

        });
	
});

$(document).ready(function(){
	$("#gc-theme").change(function () {
          var str2 = "";
          $("#gc-theme option:selected").each(function () {
                str2 += $(this).val() + " ";
              });
		if (str2 == -1) {
			$(".gc-img").show();
		}
		else {
			$(".gc-img").not('.' + str2).hide();
			$(".gc-img").filter('.' + str2).show();
		}

        });
	
});