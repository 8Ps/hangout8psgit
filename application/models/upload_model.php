<?php

class Upload_model extends CI_Model {

	function __construct(){

		ini_set('max_execution_time', 10000);

	}

	function simple_upload($path,$field){
		
		
		$caminho = realpath("uploads/".$path) . "/";

		$config['upload_path'] = $caminho;
		$config['allowed_types'] = 'png|doc|docx|gif|jpeg|pdf|jpg|rtf|txt|text|xls|csv|zip|rar'; 
		$config['max_size']	= '50000';
		$config['max_width']  = '3000';
		$config['max_height']  = '1500';
		$config['file_name'] = url_title(rand(5,98874)."_".$_FILES[$field]['name'],'dash', TRUE);
	
		
		
		
		$this->load->library('upload', $config);
		//$this->load->library('image_lib', $config);
		$this->upload->initialize($config);

		$arquivo = $this->upload->do_upload($field);
		
		
		

		if(!$arquivo){

				$error = array('error' => $this->upload->display_errors());
				echo "error";
			
				print_r($error);
			die();

			}else{

				return true;
		}
	}

	function upload($path){

		$caminho = realpath("uploads/".$path) . "/";

		$config['upload_path'] = $caminho;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '50000';
		$config['max_width']  = '2000';
		$config['max_height']  = '1000';
		$config['file_name'] = url_title(rand(15000,2000000)."_".$_FILES['userfile']['name'],'dash', TRUE);



		$this->load->library('upload', $config);
		$this->load->library('image_lib', $config);
		$this->upload->initialize($config);

		$arquivo = $this->upload->do_upload('userfile');



	}

function upload_small($path){

		$caminho = realpath("uploads/".$path) . "/";

		$config['upload_path'] = $caminho;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '50000';
		$config['max_width']  = '2000';
		$config['max_height']  = '1000';
		$config['file_name'] = url_title($_FILES['userfile2']['name'],'dash', TRUE);



		$this->load->library('upload', $config);
		$this->load->library('image_lib', $config);
		$this->upload->initialize($config);

		$arquivo = $this->upload->do_upload('userfile2');



	}

	function upload_set($path,$type,$aspect,$field){

		$field_name = $field;

		$caminho = realpath("uploads/".$path) . "/";

		$config['upload_path'] = $caminho;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '50000';
		$config['max_width']  = '2000';
		$config['max_height']  = '2000';
		$config['file_name'] = url_title($_FILES[$field]['name']);

		$this->load->library('upload', $config);
		$this->load->library('image_lib', $config);
		$this->upload->initialize($config);

		$arquivo = $this->upload->do_upload($field_name);

		if(!$arquivo){

			$error = array('error' => $this->upload->display_errors());
			print_r($error);
			return false;

		}else{

			$image_data = $this->upload->data();
			$nome_img_thumb = url_title($image_data['file_name']);



			if($type == 'crop'){

				$altura_crop = $aspect['width'] / 4;
				$largura_crop = $aspect['height'] / 15;


				$config = array(

					'source_image' => $image_data['full_path'],
					'new_image' => $caminho . 'thumbs/'.$nome_img_thumb,
					'width' => $aspect['width'],
					'height' => $aspect['height'],
					'x_axis' => $largura_crop,
					'y_axis' => $altura_crop,
					'maintain_ratio' => false,

				);

				$this->load->library('image_lib', $config);
				$this->image_lib->initialize($config);
				if(! $this->image_lib->crop()) {

					echo $caminho . 'thumbs/';
					echo $this->image_lib->display_errors();
					die();

				}
			}else{




				$image_data = $this->upload->data();
				$nome_img_thumb = url_title($image_data['file_name']);

				$config = array(

					'source_image' => $image_data['full_path'],
					'new_image' => $caminho . 'thumbs/'.$nome_img_thumb,

					'width' => $aspect['width'],
					'height' => $aspect['height'],
					'maintain_ratio' => true,



				);

				$this->load->library('image_lib', $config);
				$this->image_lib->initialize($config);
				if(! $this->image_lib->resize()){

					echo $caminho . 'thumbs/';
					echo $this->image_lib->display_errors();
					die();

				}


			}
		}


	}



}


?>