$(document).ready(function(){
    $.ajax({
       
        url: "php/getAll.php?",
        type: "GET",
        dataType: "text", // should be returning json but instead returns plain text
        success: function(result){
      
            // console.log(result);
            console.log(result.data) // return undefined when it should return the objects in json asrrays
            console.log(result[1]); // prints { 
            console.log(result[2]); // prints "
            return result;
        },
        error: function(result) {
            console.log('error');
        }
    });
});


// Menu Toggle Script 
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});


$("#menu-toggle").click(function(e) {
e.preventDefault();
$("#wrapper").toggleClass("toggled");
});