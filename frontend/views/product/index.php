<?php

/* @var $this yii\web\View */
/* @var $model \frontend\models\site\Index */

$this->title = 'My Yii Application';
//$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js');
//$this->registerJsFile('//cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.js', array('depends' => ['yii\web\YiiAsset']));
//$this->registerJsFile('//cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.date.extensions.js', array('depends' => ['yii\web\YiiAsset']));

//$this->registerCssFile('//code.jquery.com/ui/jquery-ui-git.css');
$this->registerCssFile('//code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css');


//$this->registerCssFile('//code.jquery.com/ui/1.12.1/themes/blitzer/jquery-ui.css');
$this->registerCssFile('//cdnjs.cloudflare.com/ajax/libs/jqgrid/4.6.0/css/ui.jqgrid.css');

$this->registerJsFile('//cdnjs.cloudflare.com/ajax/libs/jqgrid/4.6.0/js/i18n/grid.locale-en.js', array('depends' => ['yii\web\YiiAsset']));
$this->registerJsFile('//cdnjs.cloudflare.com/ajax/libs/jqgrid/4.6.0/plugins/jquery.searchFilter.js', array('depends' => ['yii\web\YiiAsset']));
$this->registerJsFile('//cdnjs.cloudflare.com/ajax/libs/jqgrid/4.6.0/js/jquery.jqGrid.min.js', array('depends' => ['yii\web\YiiAsset']));


?>
<div class="site-index">
    <div class="body-content">
        <table id="list" ></table>
        <div id="pager"></div>
    </div>
</div>

<script>

    document.addEventListener("DOMContentLoaded", function() {
        jQuery("#list").jqGrid({
            url:'<?php echo \yii\helpers\Url::to('product/json') ?>',
            datatype: "json",
            colNames:['#','Date', 'Client', 'Amount','Tax','Total','Notes'],
            colModel:[
                {name:'id',index:'id', width:55},
                {name:'invdate',index:'invdate', width:90},
                {name:'name',index:'name asc, invdate', width:100},
                {name:'amount',index:'amount', width:80, align:"right"},
                {name:'tax',index:'tax', width:80, align:"right"},
                {name:'total',index:'total', width:80,align:"right", stype:"select",
                    searchoptions: {
                        value: "-1:All;1:Active;0:Inactive",
                        defaultValue: "1"
                    }
                },
                {name:'note',index:'note', width:150, sortable:false, search : false}
            ],
            autowidth: true,
            height:'auto',
            rowNum:10,
            rowList:[10,20,30],
            pager: '#pager',
            sortname: 'id',
            viewrecords: true,
            sortorder: "desc",
            caption:"Products"
            //multipleSearch: true
        });
        //jQuery("#list").jqGrid('searchGrid', {multipleSearch:true});
        //jQuery("#list").jqGrid('navGrid','#pager',{edit:false,add:false,del:false}, {},{},{} ,{multipleSearch: true});
        jQuery("#list").jqGrid('navGrid','#pager',{edit:false,add:false,del:false, search: false});
        jQuery("#list").jqGrid('filterToolbar', {

        });

    });

</script>
