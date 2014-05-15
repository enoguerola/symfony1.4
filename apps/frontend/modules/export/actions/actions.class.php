<?php

/**
 * export actions.
 *
 * @package    sf_sandbox
 * @subpackage export
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class exportActions extends sfActions {

    const CULTURE = 'es';
    
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) 
    {
        $objUser = $this->getUser();

        if ($request->isMethod(sfRequest::POST)) {
            $export = $request->getParameter('export');
            $objUser->setLang($export['language']);
            $this->forward('export', $export['format']);
        }
        $this->project = Doctrine_Core::getTable('Project')->find($objUser->getIdProject())->getName();
    }

    /**
     * Executes xls action
     * 
     * @param sfWebRequest $request
     */
    public function executeXls(sfWebRequest $request) {
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->
                getProperties()
                ->setCreator("Enterprise")
                ->setLastModifiedBy("Enterprise")
                ->setTitle("Excel")
                ->setSubject("Documento")
                ->setDescription("Listado de traducciones")
                ->setKeywords("lenguajes")
                ->setCategory("reportes");

        $objUser = $this->getUser();
        $languages = LanguageTable::getAll();
        $idProj = $objUser->getIdProject();

        $texts = TextTable::getSearch(null, $idProj);


        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, 1, 'ID');
        $column = 1;
        foreach ($languages as $language) {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, 1, strtoupper($language));
            $column++;
        }

        $row = 2;
        foreach ($texts as $onlyText) {
            $cols = 0;
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($cols, $row, $onlyText['Translation'][self::CULTURE]['idtext']);
            foreach ($languages as $language) {
                if (array_key_exists($language, $onlyText['Translation'])) {
                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($cols + 1, $row, $onlyText['Translation'][$objUser->getLang()]['paragraph']);
                } else {
                    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($cols + 1, $row, "");
                }
                $cols++;
            }
            $row++;
        }

        $objPHPExcel->getActiveSheet()->setTitle('Traducciones');
        $objPHPExcel->setActiveSheetIndex(0);


        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="languages.xls"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        
        return sfView::NONE;
    }
}