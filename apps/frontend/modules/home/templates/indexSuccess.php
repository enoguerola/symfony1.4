<form action="<?php echo url_for('home/index'); ?>" method="post">
    <div id="filter"> 
        
        <label for="project">Project</label>
        <select id="project" name="project">
        <?php foreach ($projects as $id => $option): ?>
              <option  <?php echo ($id == $option ? 'selected="selected"' : ''); ?> value="<?php echo $id; ?>"><?php echo $option; ?> </option>
        <?php endforeach; ?>           
        </select>
        
        <label for="language">Language</label>
        <select id="language" name="language">
        <?php foreach ($languages as $id => $option): ?>
              <option <?php echo ($id == $option ? 'selected="selected"' : ''); ?> value="<?php echo $id; ?>"><?php echo $option; ?> </option>
        <?php endforeach; ?>           
        </select>
        
        <input id="search" type="text" value="<?php echo $text; ?>" name="text" size="30" />
        <input class="button" type="submit" value="buscar" /> 
        
    </div>  
</form>

<div id="content">
     <?php include_partial('listlanguages', array(
           'texts' => $texts,
           'languages' => $languages,
           'language' => $language,
           'text' => $text
     )); ?>
</div>

<div class="clear"></div>
