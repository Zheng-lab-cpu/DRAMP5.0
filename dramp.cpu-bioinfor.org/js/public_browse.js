
	 	function CreateFile(FORMAT,THE_NAME)
				{
					var quick_down=document.getElementsByName(THE_NAME);
					var selected_ids=[];
					var i;
					
					for (i=0;i<quick_down.length;++i)
					{
						if (quick_down[i].checked)
						{
							selected_ids.push(quick_down[i].value);
						}
					}

					var download_url="../down_load/download.php?load_id="
						+encodeURIComponent(selected_ids.join(" "))
						+"&format="+encodeURIComponent(FORMAT);
					var browse_page=window.location.pathname.split("/").pop();
					var browse_order=new URLSearchParams(window.location.search).get("order");
					var download_panel=document.getElementById("myFunction");
					var dataset=download_panel ? download_panel.getAttribute("data-download-dataset") : "";

					if(browse_page){
						download_url += "&browse_page="+encodeURIComponent(browse_page);
					}
					if(browse_order !== null){
						download_url += "&browse_order="+encodeURIComponent(browse_order);
					}
					if(dataset){
						download_url += "&dataset="+encodeURIComponent(dataset);
					}

					window.location.href=download_url;
				}
				
			
		function SelectAll(THE_ALL,THE_CHILD)
		{		
				//alert(THE_CHILD);		
 				var checkboxs=document.getElementsByName(THE_CHILD);
				var the_all_=document.getElementsByName(THE_ALL);
 				for (var i=0;i<checkboxs.length;i++) {
  					var e=checkboxs[i];
 					  e.checked=the_all_[0].checked;
				}
				
		}	
		
		
		function init(){
				$("#edit_query").hide();
		} 
		
		
		function Hide_Show(){
			if ($(document.getElementById("hide_or_show")).html() == "Hide Query"){
				document.getElementById("hide_or_show").innerHTML="Show Query";
				$("#edit_query").hide(1200);
			}else{
				document.getElementById("hide_or_show").innerHTML="Hide Query";
				$("#edit_query").show(1200);
			}
		}	
		
