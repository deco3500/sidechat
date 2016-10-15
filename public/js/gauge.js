/**
 * Created by Christopher Lane on 13/10/16.
 */
$(function () {
    var polar_to_cartesian, svg_circle_arc_path, svg_circle_arc_path_neg, animate_arc;
    polar_to_cartesian = function (cx, cy, radius, angle) {
        var radians;
        radians = (angle - 90) * Math.PI / 180.0;
        return [Math.round((cx + (radius * Math.cos(radians))) * 100) / 100, Math.round((cy + (radius * Math.sin(radians))) * 100) / 100];
    };
    svg_circle_arc_path = function (x, y, radius, start_angle, end_angle) {
        var end_xy, start_xy;
        start_xy = polar_to_cartesian(x, y, radius, end_angle);
        end_xy = polar_to_cartesian(x, y, radius, start_angle);
        return "M " + start_xy[0] + " " + start_xy[1] + " A " + radius + " " + radius + " 0 0 0 " + end_xy[0] + " " + end_xy[1];
    };
    svg_circle_arc_path_neg = function (x, y, radius, start_angle, end_angle) {
        var end_xy, start_xy;
        start_xy = polar_to_cartesian(x, y, radius, end_angle);
        end_xy = polar_to_cartesian(x, y, radius, start_angle);
        return "M " + start_xy[0] + " " + start_xy[1] + " A " + radius + " " + radius + " 0 0 1 " + end_xy[0] + " " + end_xy[1];
    };
    animate_arc = function (ratio, svg, perc, swing, metric) {
        var arc, center, radius, startx, starty;
        arc = svg.path('');
        center = 500;
        radius = 450;
        startx = 0;
        starty = 450;
        if (ratio < -.09 && ratio >= -.27) {
            swing.text("Left Leaning");
            metric.className += " swing";
        }
        else if (ratio < -.27) {
            swing.text("Very Left Leaning");
            metric.className += " bigswing";
        }
        else if (ratio > .09 && ratio <= .27) {
            swing.text("Right Leaning");
            metric.className += " swing";
        }
        else if (ratio > .27) {
            swing.text("Very Right Leaning");
            metric.className += " bigswing";
        }
        else if (ratio > -.0025 && ratio < .0025) {
            swing.text("Very Balanced");
            metric.className += " perfect";
        }
        else {
            metric.className += " neutral";
        }
        if (ratio >= 0) {
            return Snap.animate(0, ratio, (function (val) {
                var path;
                arc.remove();
                path = svg_circle_arc_path(500, 500, 450, 0, val * 180.0);
                arc = svg.path(path);
                arc.attr({
                    class: 'data-arc'
                });
                perc.text((100 - Math.round(2 * val * 100)) / 10 + "/10");
            }), Math.round(2000 * ratio), mina.easeinout);
        }
        else {
            return Snap.animate(0, ratio, (function (val) {
                var path;
                arc.remove();
                path = svg_circle_arc_path_neg(500, 500, 450, 0, val * 180);
                arc = svg.path(path);
                arc.attr({
                    class: 'data-arc'
                });
                perc.text((100 - Math.round(2 * -val * 100)) / 10 + "/10");
            }), Math.round(-2000 * ratio), mina.easeinout);
        }
    };
    $('.metric').each(function () {
        var ratio, svg, perc, swing, metric;
        ratio = $(this).data('ratio');
        svg = Snap($(this).find('svg')[0]);
        perc = $(this).find('text.percentage');
        swing = $(this).find('text.swing');
        metric = this;
        if (ratio != "1") {
            animate_arc(ratio, svg, perc, swing, metric);
        } else {
            metric.className += " neutral";
            perc.text("New");
            swing.text("")
        }
    });
});