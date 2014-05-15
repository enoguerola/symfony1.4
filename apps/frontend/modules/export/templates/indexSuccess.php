<div id="export">
    
    <h4><?php echo "Proyecto a exportar: ".$project; ?></h4>
    <form id="export" name="export" action="<?php echo url_for('export/index'); ?>" method="post">        
        
        <label for="language">Lenguaje</label>
        <select id="language" name="export[language]">
        <?php foreach ($languages as $key => $language): ?>
            <option value="<?php echo $language; ?>"><?php echo $language; ?></option>
        <?php endforeach; ?>
        </select>
        
        <label for="format">Formato</label>
        <select id="format" name="export[format]">
            <option value="xls">Excel</option>
        </select>
        <input id="upload" class="button" type="submit" value="Descargar" /> 
        
    </form>
    
</div>