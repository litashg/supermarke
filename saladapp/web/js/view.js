



 document.getElementById('modalyes').onclick=function(){
		var report_id = this.getAttribute("data-id");
		var report_current_id = this.getAttribute("data-current-id");
		var modal = document.getElementById('modelyes_save');
		modal.href = '/admin/confirm?id=' + report_id + '&current_id='+report_current_id;

	};

 document.getElementById('modelyes_save').onclick=function(){
		var modal= document.getElementById('modelyes_save');

		var accept_comment = document.getElementById('textarea_yes').value;
		if(accept_comment==null){
            var final_href = modal.href;
		}else{
			var final_href = modal.href +'&comment='+accept_comment ;
		}
		modal.href = final_href;
	};




 document.getElementById('modalno').onclick=function(){
		var report_id = this.getAttribute("data-id");
	 	var report_current_id = this.getAttribute("data-current-id");
		var modal = document.getElementById('modelno_save');
	 	modal.href = '/admin/deny-confirm?id=' + report_id + '&current_id='+report_current_id;
	};
 document.getElementById('modelno_save').onclick=function(){
		var modal= document.getElementById('modelno_save');

		var accept_comment =document.getElementById('textarea_no').value;
		if(accept_comment==null){
            var final_href = modal.href;
		}else{
            var final_href = modal.href +'&comment='+accept_comment ;
		}
		modal.href = final_href;
	};


