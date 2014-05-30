<?php

class PulseCheckController extends Controller
{
	public function actionIndex()
	{
		$model=new PulseCheckForm;
		
		if (isset($_POST['PulseCheckForm'])) {

			//print_r($_POST);
			//exit;
			ini_set('max_execution_time', 300);			
			$service_id=$_POST['PulseCheckForm']['service_id'];
			
			if ($service_id==1) {
				exec("c:\gammu\bin\gammu -c c:\gammu\bin\gammurc getussd *888#", $hasil);
					
				for ($i=0; $i<=count($hasil)-1; $i++)
				{
				if (substr_count($hasil[$i], 'Service reply') > 0) $index = $i;
				}
				
				$model->message=$hasil[$index];
				
			} elseif ($service_id==2) { //Cek Bonus
				
				exec("c:\gammu\bin\gammu -c c:\gammu\bin\gammurc getussd *887#", $hasil);
					
				for ($i=0; $i<=count($hasil)-1; $i++)
				{
				if (substr_count($hasil[$i], 'Service reply') > 0) $index = $i;
				}
				
				$model->message=$hasil[$index];
								
			} elseif ($service_id==3) { // Cek Transaksi Terakhir

				exec("c:\gammu\bin\gammu -c c:\gammu\bin\gammurc getussd *889#", $hasil);
					
				for ($i=0; $i<=count($hasil)-1; $i++)
				{
				if (substr_count($hasil[$i], 'Service reply') > 0) $index = $i;
				}
				
				$model->message=$hasil[$index];
								
			} elseif ($service_id==4) { // Matikan Service
				exec("c:\gammu\bin\gammu -c c:\gammu-smsd -k -c smsdrc -n gammuSMSD", $hasil);
			} elseif ($service_id==5) { //Jalankan Service
				exec("c:\gammu\bin\gammu -c c:\gammu-smsd -s -c smsdrc -n gammuSMSD", $hasil);
			}
			

					
			//exec("c:\gammu\bin\gammu -c c:\gammu-smsd -k -c smsdrc -n gammuSMSD", $hasil);			
			//exec("c:\gammu\bin\gammu -c c:\gammu-smsd -s -c smsdrc -n gammuSMSD", $hasil);
			
				
			//$model->message='gafur';
			
			//$this->redirect( array('index') );
			
			
		}
		
		$this->render('index',array('model'=>$model));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}