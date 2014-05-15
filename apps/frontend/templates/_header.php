<div id="logo">
    <span class="tooltip" title="Ir a home"><?php echo link_to('Enterprise', url_for('home/index')); ?></span>
    <span class="subproject tooltip" title="Enterprise">Enterprise</span>
</div> 
<ul class="nav main">
    <li class="tooltip ic-project" title="Mostrar traducciones">
      <?php echo link_to(image_tag('/images/webs.png', array('alt'=>'Mostrar traducciones')), url_for('home/index'));  ?> 
   </li> 
   <li class="tooltip ic-project" title="Gestionar proyectos">
      <?php echo link_to(image_tag('/images/project.png',  array('alt'=>'Gestionar proyectos')), url_for('project'));  ?> 
   </li>
   <li class="tooltip" title="Gestionar idiomas">
      <?php echo link_to(image_tag('/images/ic-language.png',  array('alt'=>'Gestionar idiomas')), url_for('language'));  ?> 
   </li>  
   <li class="tooltip" title="Crear traducción">
      <?php echo link_to(image_tag('/images/pencil.png',  array('alt'=>'Crear textos')), url_for('text/new'));  ?> 
   </li>  
   <li class="tooltip" title="Exportar" onclick="openDialog('/export/index', 'Export')"><?php  echo image_tag('/images/Database.png', array('alt'=>'Exportar ficheros')); ?></li>   
</ul>
<div id="dialogExport"></div>
<?php
 echo jq_javascript_tag("
     $(document).ready(function(){
        $('#dialogExport').dialog({
          dialogClass: 'alert',
          modal: true,
          closeText: 'Cerrar',
          autoOpen: false,
          autoResize: true,
          height: 280,
          width: 490,
          resizable: false,
          title: 'Exportar proyecto'
         });
       });
  ");
 ?>