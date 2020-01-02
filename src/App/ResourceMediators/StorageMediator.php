<?php
namespace App\ResourceMediators;

use laraflex\Contracts\ResourceMediator;

class StorageMediator extends ResourceMediator
{
    protected $image = array('jpg', 'png', 'svg', 'jpeg','tif', 'gif','bmp', 'BMP', 'exif', 'webp');
    protected $doc = array('pdf', 'doc', 'docx', 'xls', 'xslx', 'ppt', 'pptx', 'pps');
    protected $media = array('mp3', 'mp4', 'wav', 'mkv', 'avi', 'divix','mov', 'xvid');
    protected $compactor = array('rar', 'zip', 'tar.zg');
    protected $fileType = array('image', 'doc', 'media');

    public function toArray ($data, $type = NULL)
    {

        if ($type == NULL){
            $extensions = array_merge($this->image, $this->doc, $this->media, $this->compactor);
        }else{
            $type = strtoupper($type);
            if ($type == 'IMAGE' OR $type == 'IMAGEM'){
                $extensions = $this->image;
            }elseif($type == 'DOC' OR   $type == 'DOCUMENTO'){
                $extensions = $this->doc;
            }elseif($type == 'MEDIA' OR $type == 'MIDIA'){
                $extensions = $this->media;
            }else{
                $extensions = array();
            }
        }

        $var = [
            'file' => $data['filename'],
            'baseName' => $data['basename'],
            'dirName' => $data['dirname'],
            'path' => $data['path'],
            'date' => date("y/m/Y", strtotime($data['timestamp'])),
            'type' => $data['type'],
            'fileName' => $data['basename'],
            'filePath' => $data['dirname'],
        ];
        if ($data['type'] == 'file' && !empty($data['extension'])){
            $dataExtension = $data['extension'];


            if (in_array($dataExtension, $extensions)) {
                $var['extension'] = $data['extension'];
                $var['size'] = $data['size'];

            }else{
                return NULL;
            }
        }else{
            if($type != NULL && $data['type'] == 'dir'){
                return NULL;
            }
        }


        return $var;
    }

    public static function create()
    {
        return new StorageMediator();
    }


    public function collection($collection, $type = NULL)
    {
            $collectionDir = array();
            $collectionFile = array();
            if (!empty($collection)){
                foreach($collection as $item){
                    if ($item['type'] == 'dir'){
                        $itemTmp = $this->toArray($item, $type);
                        if (!empty($itemTmp)){
                            $collectionDir[] = $itemTmp;
                        }
                    }elseif($item['type'] == 'file'){
                        $itemTmp = $this->toArray($item, $type);
                        if (!empty($itemTmp)){
                            $collectionFile[] = $itemTmp;
                        }
                    }
                }
            }
            $collectionTmp = array_merge($collectionDir, $collectionFile);
            if ($collectionTmp!=NULL){
                return $collectionTmp;
            }else{
                return NULL;
            }

    }
    /**
     * Return Json collection
     */
    public function jsonCollection($collection, $type = NULL)
    {
        $collectionTmp = $this->collection($collection, $type);
        if ($collectionTmp != NULL){
            return json_encode($collectionTmp);
        }else{
            return NULL;
        }
    }
    /**
     * Return collection object Json
     */
    public function objectCollection($collection, $type = NULL)
    {
        $collectionTmp = $this->jsonCollection($collection, $type);
        return json_decode($collectionTmp);
    }
}



