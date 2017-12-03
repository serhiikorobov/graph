<?php

/* @var $this yii\web\View */
/* @var $model \frontend\models\site\Index */

$this->title = 'Graph';
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js');
//$this->registerJsFile('//cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.js', array('depends' => ['yii\web\YiiAsset']));
//$this->registerJsFile('//cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.date.extensions.js', array('depends' => ['yii\web\YiiAsset']));
$this->registerJsFile('//cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.js', array('depends' => ['yii\web\YiiAsset']))

?>
<div class="site-index">

    <div class="body-content">

        <?php if ($model->hasErrors() || !($dataExist = $model->getChartData())): ?>
            <div class="messages">
                <?php foreach ($model->getErrors() as $field => $fieldErrors): ?>
                    <div class="alert alert-danger" role="alert"><?php echo implode('. ', $fieldErrors) ?></div>
                <?php endforeach; ?>
                <?php if (!$dataExist): ?>
                    <div class="alert alert-danger" role="alert">Any data does not find!</div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <form class="form-horizontal" action="/" id="filters">
            <div class="form-group">
                <label for="filter_tier" class="col-sm-2 control-label">Event info filter</label>
                <div class="col-sm-3">
                    <select multiple name="filter_tier[]" id="filter_tier" class="form-control">
                        <?php foreach ($model->getTierOptions() as $option): ?>
                            <option value="<?php echo $option['value'] ?>" <?php echo isset($option['selected']) ? 'selected="selected"' : '' ?>><?php echo $option['label'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-3">
                    Tier level is based on levels of Impact/Involvement/Production cost. Tier 1 being highest, and 5 being lowest
                </div>
            </div>

            <div class="form-group">
                <label for="filter_date" class="col-sm-2 control-label">Date range filter</label>
                <div class="col-sm-3">
                    <input id="filter_date" name="filter_date" class="form-control" value="<?php echo $model->filter_date ?>" />
                </div>
                <label for="filter_month" class="col-sm-1 control-label">Month</label>
                <div class="col-sm-1">
                    <select id="filter_month" name="filter_month" class="form-control">
                        <option <?php echo $model->filter_month == 6 ? 'selected="selected"': '' ?> value="6">6</option>
                        <option <?php echo $model->filter_month == 12 ? 'selected="selected"': '' ?> value="12">12</option>
                        <option <?php echo $model->filter_month == 18 ? 'selected="selected"': '' ?> value="18">18</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-2">

                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-success">Filter</button>
                    <input type="reset" class="btn btn-info" onclick="setTimeout(function() { jQuery('#filter_tier option:selected').removeAttr('selected'); jQuery('#filter_tier option[value=0]').prop('selected', true); $('#filter_date').val(''); jQuery('form').submit(); }, 100)" value="Reset"/>
                </div>
            </div>

        </form>

        <br>
        <br>

        <div class="row">
            <div class="col-lg-12">
                <div style="">
                    <canvas id="myChart" ></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    #chartjs-tooltip {
        opacity: 1;
        position: absolute;
        background: rgba(0, 0, 0, .7);
        color: white;
        border-radius: 3px;
        -webkit-transition: all .1s ease;
        transition: all .1s ease;
        -webkit-transform: translate(-50%, 0);
        transform: translate(-50%, 0);
    }

    #chartjs-tooltip a {
        color: #c0c0c0;
    }

    .chartjs-tooltip-key {
        display: inline-block;
        width: 10px;
        height: 10px;
        margin-right: 10px;
    }
</style>

<script>

    /* Chart.types.Bubble.extend({
     name: "BubbleWithLine",
     initialize: function () {
     Chart.types.Bubble.prototype.initialize.apply(this, arguments);
     },
     draw: function () {
     Chart.types.Bubble.prototype.draw.apply(this, arguments);
     debugger;
     this.chart.ctx.beginPath();
     this.chart.ctx.moveTo(0, 5);
     this.chart.ctx.lineTo(100, 100);
     this.chart.ctx.stroke();
     }
     });*/


    /*
     Chart.Controllers.bubble = Chart.controllers.bubble.extend({
     draw: function() {
     Chart.controllers.bubble.prototype.draw.call(this, arguments);


     console.log(this); // but no any console log appear
     }
     }); */


    function formatDate(date)
    {
        var options = {
            //era: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
            /*
             weekday: 'long',
             timezone: 'UTC',
             hour: 'numeric',
             minute: 'numeric',
             second: 'numeric'*/
        };

        return date.toLocaleString("en-US", options);
    }

    document.addEventListener("DOMContentLoaded", function() {
        var originalBarController = Chart.controllers.bubble;
        Chart.controllers.bubble = Chart.controllers.bubble.extend({
            draw: function(a,b,c) {
                //debugger;
                originalBarController.prototype.draw.call(this, arguments[0]);

                var venueType = null;
                var obj = this._data.length ? this._data[0] : null;
                if (obj && obj.venueType) {
                    venueType = obj.venueType;
                }

                if (venueType == 'internal') {
                    var data = this.getMeta().data;
                    for(var i = 0; i < data.length; i++) {

                        var element = data[i];
                        var color = element._view.backgroundColor;
                        var point = element.getCenterPoint();
                        var useDash = obj.lineStyle == '<?php echo $model::DOTTED_LINE ?>'
                        if (useDash) {
                            this.chart.chart.ctx.setLineDash([8, 5]);
                        }
                        this.chart.chart.ctx.beginPath();
                        this.chart.chart.ctx.moveTo(point.x, 0);
                        this.chart.chart.ctx.lineTo(point.x, this.chart.chart.height - 30);
                        this.chart.chart.ctx.lineWidth = 2;
                        this.chart.chart.ctx.strokeStyle = color;

                        this.chart.chart.ctx.stroke();
                        if (useDash) {
                            this.chart.chart.ctx.setLineDash([0, 0]);
                        }
                    }
                }
            }
        });

        var customTooltips = function(tooltip) {
            // Tooltip Element
            var tooltipEl = document.getElementById('chartjs-tooltip');

            if (!tooltipEl) {
                tooltipEl = document.createElement('div');
                tooltipEl.id = 'chartjs-tooltip';
                tooltipEl.innerHTML = "<table></table>"
                this._chart.canvas.parentNode.appendChild(tooltipEl);
            }

            // Hide if no tooltip
            if (tooltip.opacity === 0) {
                //tooltipEl.style.opacity = 0;
                return;
            }

            // Set caret Position
            tooltipEl.classList.remove('above', 'below', 'no-transform');
            if (tooltip.yAlign) {
                tooltipEl.classList.add(tooltip.yAlign);
            } else {
                tooltipEl.classList.add('no-transform');
            }

            function getBody(bodyItem) {
                return bodyItem.lines;
            }

            // Set Text
            if (tooltip.body) {
                var titleLines = tooltip.title || [];
                var bodyLines = tooltip.body.map(getBody);

                var innerHtml = '<thead>';

                titleLines.forEach(function(title) {
                    innerHtml += '<tr><th>' + title + '</th></tr>';
                });
                innerHtml += '</thead><tbody>';

                bodyLines.forEach(function(body, i) {
                    var colors = tooltip.labelColors[i];
                    var style = 'background:' + colors.backgroundColor;
                    style += '; border-color:' + colors.borderColor;
                    style += '; border-width: 2px';
                    var span = '<span class="chartjs-tooltip-key" style="' + style + '"></span>';
                    innerHtml += '<tr><td>' + span + body + '</td></tr>';
                });
                innerHtml += '</tbody>';

                var tableRoot = tooltipEl.querySelector('table');
                tableRoot.innerHTML = innerHtml;
            }

            var positionY = this._chart.canvas.offsetTop;
            var positionX = this._chart.canvas.offsetLeft;

            // Display, position, and set styles for font
            tooltipEl.style.opacity = 1;
            tooltipEl.style.left = positionX + tooltip.caretX + 'px';
            tooltipEl.style.top = positionY + tooltip.caretY + 'px';
            tooltipEl.style.fontFamily = tooltip._fontFamily;
            tooltipEl.style.fontSize = tooltip.fontSize;
            tooltipEl.style.fontStyle = tooltip._fontStyle;
            tooltipEl.style.padding = tooltip.yPadding + 'px ' + tooltip.xPadding + 'px';
        };

        var myChart = new Chart(jQuery('#myChart'), {
            type: 'bubble',
            responsive: true,
            data: {
                datasets: <?php echo json_encode($model->getChartData()); ?>
            },
            options: {
                legend: {
                    display:false,
                    hidden: true
                },
                elements: {
                    points: {
                        borderWidth: 1,
                        borderColor: 'rgb(0, 0, 0)'
                    }
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            <?php if ($minDate = $model->getMinDate()): ?>
                            //min: <?php echo $minDate->getTimestamp() * 1000; ?>,
                            <?php endif; ?>
                            <?php if ($maxDate = $model->getMaxDate()): ?>
                            //max: <?php echo $maxDate->getTimestamp() * 1000; ?>,
                            <?php endif; ?>
                            callback: function(value, index, values) {
                                var date = new Date(value);
                                return formatDate(date);
                            }
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            min: -1,
                            max: <?php echo $model->maxTier + 1; ?>,
                            callback: function(value, index, values) {
                               if (value >= 0 && Number(value) === value && value % 1 === 0) {
                                   var label = 'Tier ' + value + ' Events';
                                   if (value == 0) {
                                       label = 'Product Launch';
                                   }
                                   return label;
                               }

                                return null;
                            }
                        }
                    }]
                },

                tooltips: {
                    enabled: false,
                    //mode: 'index',
                    position: 'nearest',
                    custom: customTooltips,

                    callbacks: {
                        title: function(tooltipItems, data) {
                            var index = tooltipItems[0].datasetIndex;
                            var obj = data.datasets[index];
                            return obj.label
                        },
                        label: function(tooltipItems, data) {
                            var index = tooltipItems.datasetIndex;
                            var obj = data.datasets[index];
                            var point = obj.data[0];

                            var html = 'Event start date ' + formatDate(new Date(point.x));
                            html += '<br/><a href="' + obj.url + '" target="_blank">View more details</a>';

                            return html;
                        }
                    }
                }
            }
        });

        $("#filter_date").inputmask({ alias: "mm/dd/yyyy"});
    });

</script>
