//This should have each valid amount that can be selected in the slider 
var sliderAmountMap = ["Very Left Leaning", "Left Leaning", "Balanced", "Right Leaning", "Very Right Leaning"];
 
$(function() {
    $( ".slidercontainer > .slider" ).each(function() {
        
            $( this ).slider({
                value: 0, //array index of onload selected default value on slider, for example, 45000 in same array will be selected as default on load
                min: -2, //the values will be from 0 to array length-1
                max: sliderAmountMap.length-3, //the max length, slider will snap until this point in equal width increments
                slide: function( event, ui ) {
                $(this).parent().find(".balance").html(sliderAmountMap[ui.value+2] ); //map selected "value" with lookup array
                $(this).parent().find(".hiddenbalance").val(ui.value);   
                if (ui.value == -2 || ui.value == 2){    
                    $(this).parent().find( ".balance" ).css({'color' : '#D31604'});
                    $(this).find( "span" ).css({'background' : '#D31604'});
                } else if (ui.value == -1 || ui.value == 1){
                    $(this).parent().find( ".balance" ).css({'color' : '#f65d07'});
                    $(this).find( "span" ).css({'background' : '#f65d07'});
                } else {
                    $(this).parent().find( ".balance" ).css({'color' : '#17b494'});
                    $(this).find( "span" ).css({'background' : '#17b494'});
                }
            }
        });
        $(this).find( "span" ).css({'background' : '#17b494'});
    });
    $(".slider").css({'position' : 'relative'}, {'width' : '50%'}, {'display' : 'inline-block'});
});