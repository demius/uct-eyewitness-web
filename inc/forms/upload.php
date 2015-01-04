<?php
require '../../vendor/autoload.php';

require('../utilities/mime_type.php');
require('../utilities/crypto.php');

use Eyewitness\Utilities;

if(sizeof($_FILES) > 0){
    $uploader = new Uploader();
    $results = [];
    foreach($_FILES as $file){
        $upload_result = $uploader->save($file);
        if($upload_result){
            array_push($results, $upload_result);
        }
    }
    header('Content-Type: application/json');
    echo json_encode($results);
}

class Uploader {
    private $_allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
    private $_sizeLimit = 5242880; // 5 * 1024 * 1024
    private $_upload_dir = '../../uploads';

    public function save($file){
        $original_filename = $file['name'];
        $ext = strtolower(pathinfo($original_filename, PATHINFO_EXTENSION));
        $mime_type = Utilities\MimeType::Get($ext);

        $path_info = $this->get_target_path($ext);
        $relative_uri = '/uploads/' . $path_info['filename'];

        if($this->file_too_large($file)){
            return [
                'succeeded' => false,
                'filename' => $file['name'],
                'error' => 'The maximum size allowed is ' . $this->_sizeLimit . ' bytes.'
            ];
        }

        if($this->file_type_disallowed($file)){
            return [
                'succeeded' => false,
                'filename' => $file['name'],
                'error' => 'Only the following file types are allowed: ' . implode(', ', $this->_allowedExtensions)
            ];
        }

        if(!move_uploaded_file($file['tmp_name'], $path_info['path'])){
            return [
                'succeeded' => false,
                'filename' => $file['name'],
                'error' => 'Upload failed for an unknown reason. Please contact the administrator.'
            ];
        }

        // generate a thumbnail if the file is an image
        if(getimagesize($path_info['path'])){
            try
            {
                $thumb_path = pathinfo($path_info['path'], PATHINFO_DIRNAME) . '\\thumbs\\' . $path_info['filename'];
                $thumb = new PHPThumb\GD($path_info['path']);
                $thumb->resize(200);
                $thumb->save($thumb_path);
            }
            catch (Exception $e){}
        }

        return [
            'succeeded' => true,
            'path' => $path_info['path'],
            'filename' => $path_info['filename'],
            'original_filename' => $file['name'],
            'relative_uri' => $relative_uri,
            'mime_type' => $mime_type
        ];
    }

    private function file_type_disallowed($file){
        return !in_array(strtolower(pathinfo($file['name'], PATHINFO_EXTENSION)), $this->_allowedExtensions);
    }

    private function file_too_large($file){
        return $file['size'] > $this->_sizeLimit;
    }

    private function get_target_path($ext){
        $filename = Utilities\Crypto::generate_rnd_string(8) . '.' . $ext;
        return [
            'path' => realpath($this->_upload_dir) . '\\' . $filename,
            'filename' => $filename
        ];
    }
}