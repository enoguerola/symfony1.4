<?php if ($texts->count() != 0): ?>
    <table id="listLanguages" cellpadding="0" cellspacing="0" >
        <tr>
            <th>Texto</th>
            <?php foreach ($languages as $language): ?>
                <th><?php echo strtoupper($language); ?></th>    
            <?php endforeach; ?>
            <th class="action"></th>
        </tr>

        <?php foreach ($texts as $onlyText) : ?>
            <tr>
                <td><?php echo $onlyText['Translation'][$actualLang]['paragraph']; ?>&nbsp;</td>
                <?php foreach ($languages as $language): ?>
                    <td style="<?php echo ((($text != '') && stristr($onlyText['Translation'][$language]['paragraph'], $text)) ? 'background-color: #ffd8d8;' : '') ?>">
                        <?php if (array_key_exists($language, $onlyText['Translation']->getRawValue())) : ?>
                            <?php echo ((int) $onlyText['Translation'][$language]['status'] == 0 ? image_tag('inactive.png', array('class' => 'ic-status', 'alt' => 'No activo')) : image_tag('active.png', array('class' => 'ic-status', 'alt' => 'Activo'))); ?>
                            <span>
                                <?php $text = $onlyText['Translation'][$language]['paragraph']; ?>    
                                <?php if (strlen($text) > 250): ?>
                                    <?php echo substr($text, 0, 250) . " [...]"; ?>
                                <?php else: ?>
                                    <?php echo $text; ?> 
                                <?php endif; ?>  
                            </span>
                        <?php endif; ?>
                    </td>    
                <?php endforeach; ?>
                <td class="action">
                    <?php
                    echo link_to(image_tag('edit.png', array('alt' => 'Editar traducciones')), url_for('/text/' . $onlyText['idtext'] . '/edit', array('class' => 'ic-action', 'alt' => 'Editar texto')));
                    ?>
                    <?php
                    echo link_to(image_tag('trash.gif', array('alt' => 'Eliminar traducciones')), url_for('/text/delete?id=' . $onlyText['idtext'], array('class' => 'Eliminar texto')), array(
                        'method' => 'delete',
                        'confirm' => '¿Estás seguro de querer borrar el texto?',
                    ));
                    ?>
                </td>     
            </tr> 
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <div class="title not-found">No hay resultados</div>
<?php endif; ?>