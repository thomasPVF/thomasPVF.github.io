$(document).ready(function () {
    var p2 = $("#relleno2");
    var p3 = $("#relleno3");
    var b2 = $("#b2");
    var b3 = $("#b3");
    var i=0;

    var elemento2 = $("#elemento2").hide();
    var elemento3 = $("#elemento3").hide();

 
    $(p3).prop('disabled', true);
    
    p2.click(function () {
        var clicks = $(this).data('clicks');
        elemento2.toggle(1000);
        
        
        if (clicks) {
           
            $(p3).prop('disabled', true);
            $(b2).prop('disabled', true);
        } else {
            
            $(p3).prop('disabled', false);
            $(b2).prop('disabled', false);
        }
        $(this).data("clicks", !clicks);
                
        
    });
   
    p3.click(function () { 
        
        var clicks = $(this).data('clicks');
        elemento3.toggle(1000);
        
        
        if (clicks) {
            
            $(p2).prop('disabled', false);
            $(p3).prop('disabled', true);
            $(b3).prop('disabled', true);
        } else {
            $(b3).prop('disabled', false);
            $(p2).prop('disabled', true);
        }
        $(this).data("clicks", !clicks);
        

    });


    
    
  
   
  });