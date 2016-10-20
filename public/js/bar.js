/**
 * Created by Alex Barnett on 20/10/16.
 */
setTimeout(function start() {
    var $bing = $('.wrap').width() / 2;
    $('.wrap').css({
        "visibility": "visible"
    });
    $('.verticalLine').each(function() {
        var $line = $(this);

        var $negativeOffset = parseFloat($line.attr('data-ratio')) + 0.5;

        console.log($negativeOffset);
        $line.css({
            "width": $('.wrap').width() / 5 - 4
        });
    });
    $('.bar').each(function(i) {
        var $bar = $(this);
        if ($bar.attr('data-ratio') > -0) {
            $bar.css({
                "left": $bing
            });
            $bar.animate({
                duration: 100,
                easing: 'swing',
                right: 0,
                width: Math.abs($bar.attr('data-ratio')) * 100 + "%",
            });
        } else {
            var $offset = $bing + $bar.attr('data-ratio') * 100;
            $bar.css({
                "left": $bing
            });
            $bar.animate({
                duration: 1,
                left: $bing - Math.abs($bar.attr('data-ratio')) * $('.wrap').width(),
                width: Math.abs($bar.attr('data-ratio')) * 100 + "%",
            });
        }

    });
    $(window).resize(function() {
        var $bing = $('.wrap').width() / 2;
        $('.wrap').css({
            "visibility": "visible"
        });
        $('.verticalLine').each(function(){
            var $line = $(this);

            var $negativeOffset = parseFloat($line.attr('data-ratio'))+0.5;

            console.log($negativeOffset);
            $line.css({
                "width": $('.wrap').width()/5-4
            });
        });
        $('.bar').each(function(i) {
            var $bar = $(this);
            var $bing = $('.wrap').width() / 2;
            if ($bar.attr('data-ratio') > -0) {
                $bar.css({
                    "left": $bing,
                    "width": Math.abs($bar.attr('data-ratio')) * 100 + "%"
                });

            } else {
                var $offset = $bing + $bar.attr('data-ratio') * 100;
                $bar.css({
                    "left": $bing - Math.abs($bar.attr('data-ratio')) * $('.wrap').width(),
                    "width": Math.abs($bar.attr('data-ratio')) * 100 + "%",
                });

            }
        });
    });

}, 500)