<?php 
namespace PH7;
defined('PH7') or exit('Restricted access');
/*
Created on 2021-09-30 11:34:12
Compiled file from: C:\xampp\htdocs\pH7CMS\_protected\app/system/modules/admin123\views/base\tpl\tool\cache.tpl
Template Engine: PH7Tpl version 1.4.1 by Pierre-Henry Soria
*/
/**
 * @author     Pierre-Henry Soria
 * @email      hello@ph7cms.com
 * @link       https://ph7cms.com
 * @copyright  (c) 2011-2021, Pierre-Henry Soria. All Rights Reserved.
 */
?><div class="center"> <div class="border m_marg vs_padd"> <p class="bold">Clear Cache</p> <a href="javascript:void(0)" onclick="cache('general','<?php echo $csrf_token; ?>')"><?php echo t('Database and Other Data'); ?></a> &nbsp; &bull; &nbsp; <a href="javascript:void(0)" onclick="cache('tpl_compile','<?php echo $csrf_token; ?>')"><?php echo t('Server Code Template'); ?></a> &nbsp; &bull; &nbsp; <a href="javascript:void(0)" onclick="cache('tpl_html','<?php echo $csrf_token; ?>')"><?php echo t('HTML Template'); ?></a> &nbsp; &bull; &nbsp; <a href="javascript:void(0)" onclick="cache('static','<?php echo $csrf_token; ?>')"><?php echo t('Static Files'); ?></a> </div> <div class="s_marg"> <script src="https://www.google.com/jsapi"></script> <script> google.load("visualization", "1", {packages:["corechart"]}); google.setOnLoadCallback(showCacheChart); function showCacheChart() { $('#cache_chart').html(''); var oDataTable = new google.visualization.DataTable(); oDataTable.addColumn('string', '<?php echo t('Cache'); ?>'); oDataTable.addColumn('number', '<?php echo t('Size'); ?>'); var aData = [ <?php foreach($aChartData as $aData) { ?> ["<?php echo $aData['title'] ;?>", {v:<?php echo $aData['size'] ;?>, f:"<?php echo Framework\File\Various::bytesToSize($aData['size']) ;?>"}], <?php } ?> ]; oDataTable.addRows(aData); new google.visualization.PieChart($('#cache_chart')[0]).draw(oDataTable); } </script> <div id="cache_chart"></div> </div></div>